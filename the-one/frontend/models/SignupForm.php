<?php
namespace frontend\models;

use common\models\User;
use common\models\UserProfessionalInfo;
use yii\base\Model;
use Yii;
use yii\base\Security;
use yii\bootstrap\Html;
use yii\helpers\Url;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $email;
    public $passwordRepeat;
    public $password;

    protected $user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'passwordRepeat', 'email'], 'required', 'message' => 'Это обязательное поле'],


            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Данный адрес уже занят'],

            ['password', 'string', 'min' => 6],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Введённые пароли не совпадают']
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'password' => 'Пароль',
            'passwordRepeat' => 'Повторите пароль'
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $this->user = new User();
            $this->user->email = $this->email;
            $this->user->setPassword($this->password);
            $this->user->generateAuthKey();
            $this->user->slug = 'user_' . Yii::$app->security->generateRandomString(8);

            if ($this->user->save()) {
                $this->user->link('userProfessionalInfo', new UserProfessionalInfo());
                $this->sendValidationMessage();
                return true;
            }

        }
        return false;

    }

    protected function sendValidationMessage()
    {
        $url = Url::to(['api/auth/submit/' . $this->user->id . '/' . $this->user->auth_key], true);
        $mailBody = "Перейдите пожалуйста по этой ссылке для подтверждения регистрации: ";
        $mailBody .= $url;
        return Yii::$app->mailer->compose()
            ->setFrom('theone.wedmag@gmail.com')
            ->setTo($this->user->email)
            ->setSubject('THE-ONE Подтверждение регистрации')
            ->setTextBody($mailBody)
            ->send();

    }
}
