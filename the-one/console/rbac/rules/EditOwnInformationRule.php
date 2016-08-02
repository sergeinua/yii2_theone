<?php
namespace console\rbac\rules;
/**
 * Class EditOwnInformationRule a rule which defines if user can edit his own information
 * @package console\rbac\rules
 */
class EditOwnInformationRule extends \yii\rbac\Rule{
    public $name = 'editOwnInformation';
    public function execute($user,$item,$params){
        //will be able to edit his information
//        if(\Yii::$app->user->identity->status===5){
//            return false;
//        }
    }
}