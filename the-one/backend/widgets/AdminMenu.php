<?php
namespace backend\widgets;
use dmstr\widgets\Menu;

/**
 * Created by PhpStorm.
 * User: jerichozis
 * Date: 06.11.15
 * Time: 15:31
 */
   class AdminMenu extends Menu{

       protected function isItemActive($item)
       {
           $pathInfo = \Yii::$app->request->getPathInfo();
            if(isset($item['url'])&&!empty($pathInfo)){
                return strpos($item['url'][0],\Yii::$app->request->getPathInfo())!=false;
            }
           return false;
       }
   }