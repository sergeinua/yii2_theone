<?php
namespace common\models;

use frontend\components\OneNotify;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            // rememberMe must be a boolean value
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
//                OneNotify::prepareNotify('error','Неправильный адрес или пароль.');
            }

        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        $user = $this->getUser();

        if ($this->validate()) {
//            dump($this->validate());die;
            switch ($user->status){
                case User::STATUS_BANNED:
                    OneNotify::prepareNotify('error','Ваш аккаунт забанен или удалён');
                    break;
                case User::STATUS_NEW:
                    OneNotify::prepareNotify('error','Вы не активировали свой аккаунт.Перейдите по ссылка,которая была выслана вам в письме после регистрации');
                    break;
                default:
//                    OneNotify::prepareNotify('success','Вход выполнен успешно');
                    return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            }

        }
        return false;

    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }
}
