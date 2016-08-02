<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $contact;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'contact', 'subject', 'body'], 'required'],
            // verifyCode needs to be entered correctly
//            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name'=>'Имя',
            'verifyCode' => 'Verification Code',
            'contact'=>'Email или телефон',
            'subject'=>'Тема сообщения',
            'body'=>'Сообщение'
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string  $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($email='injericho@gmail.com')
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom(['website@aea.we' => 'website@aea.we'])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
