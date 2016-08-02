<?php
namespace frontend\components;

use yii\web\View;

class OneNotify{
    /**
     * This function use to store notify in session.
     * A notify can be one of three kinds:
     *  - error
     *  - information
     *  - success
     * @param $status
     * @param $message
     */
    public static function prepareNotify($status,$message){
        $sessionNotifies = \Yii::$app->session->get('notifies');
        if(empty($sessionNotifies)){
            $sessionNotifies = [];
        }
        array_push($sessionNotifies,['status'=>$status,'message'=>$message]);
        \Yii::$app->session->set('notifies',$sessionNotifies);
    }

    /**
     * This function used only once for each loading of page.
     * It shows every notifies if they exists and then removes them from session variable
     */
    public static function showNotifies(){
//        dump(\Yii::$app->session->get('notifies'));die;
        if($notifies = \Yii::$app->session->get('notifies')){
            foreach ($notifies as  $notify) {
                \Yii::$app
                    ->view
                    ->registerJs("rclNotify('{$notify['status']}', '{$notify['message']}')",View::POS_READY);
            }
            \Yii::$app->session->remove('notifies');
        }
    }
}