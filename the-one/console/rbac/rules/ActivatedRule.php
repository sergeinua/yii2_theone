<?php
namespace console\rbac\rules;

use common\models\User;

class ActivatedRule extends \yii\rbac\Rule{
    public $name = 'activated';

    public function execute($user,$item,$params){

        return \Yii::$app->user->identity->status>=User::STATUS_ACTIVE;
    }
}