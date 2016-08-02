<?php

/**
 * Created by PhpStorm.
 * User: jerichozis
 * Date: 10.12.15
 * Time: 16:24
 */

class ProfessionalRule extends \yii\rbac\Rule{
    public $name;

    public function execute($user,$item,$params){
        if(\Yii::$app->user->isGuest){
            return false;
        }

    }
}