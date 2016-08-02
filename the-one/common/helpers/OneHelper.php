<?php

namespace common\helpers;
use Yii;
use Zelenin\yii\behaviors\Service\Slugifier;


class OneHelper{
    /**
     * http://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string
     * @param $text
     * @return mixed|string
     */
    public static function getSlug($text){
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text))
        {
            return 'n-a';
        }

        return $text;
    }

    public static function getImgUrl($img,$size=false){
        if(!$size){
//        return Yii::$app->params['frontEndDomain']
        return Yii::$app->params['frontEndDomainName']
        .Yii::$app->params['imgWeb']
        .$img;
        }else{
//            return Yii::$app->params['frontEndDomain']
            return Yii::$app->params['frontEndDomainName']
                .Yii::$app->params['imgWeb']
                .$size.'/'
                .$img;
        }
    }

    public static function getVideoUrl($userUrl)
    {
        if(preg_match('/^(http|https):\/\/w{0,3}.?vimeo.com\/(channels\/\w+\/)?(\d+)/',trim($userUrl), $matches)){
            return 'http://player.vimeo.com/video/'. end($matches);
        }else if(preg_match('/^(http|https):\/\/w{0,3}.?(youtu.be|youtube.com)\/(watch\?v=)?(.+)$/',trim($userUrl), $matches)){
            return 'http://www.youtube.com/embed/'. end($matches);
        }
        return false;
    }

    public static function getCodeVideo($contentUrl){
        $code = str_replace('https://player.vimeo.com/video/','',$contentUrl);
        return str_replace('https://www.youtube.com/embed/','',$code);
    }
}
/**
 * Created by PhpStorm.
 * User: jerichozis
 * Date: 03.11.15
 * Time: 16:32
 */