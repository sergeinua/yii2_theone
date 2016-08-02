<?php
namespace frontend\controllers;

use yii\image\drivers\Image;
use yii\image\drivers\Image_GD;
use yii\image\drivers\Image_Imagick;
use yii\image\drivers\Kohana_Image;
use yii\web\NotFoundHttpException;

class ImgController extends  \frontend\components\OneController{
    public $sizes = [
      'thumbnail'=>[
          'w'=>400,
          'h'=>200,
          'd'=> null
      ],
      'articleThumb'=>[
            'w'=>300,
            'h'=>300,
          'd'=> Kohana_Image::CROP
        ],
        'krakenSized'=>[
            'w'=>1200,
            'h'=>1300,
            'd'=> null
        ]
        ,'icon'=>[
            'w'=>48,
            'h'=>48,
            'd'=> Kohana_Image::WIDTH
        ],
        'extraSmall'=>[
            'w'=>5,
            'h'=>5,
            'd'=> Kohana_Image::WIDTH
        ],
        'bannerFullWidth'=>[
            'w'=>1200,
            'h'=>250,
            'd'=>Kohana_Image::CROP
        ]
    ];

    public function actionIndex($img =null,$size=null){
        $imgPath = \Yii::$app->params['imgPath'];

        if(!$size){
            self::responseWithFile(\Yii::getAlias($imgPath.$img));
        }
        $size = $this->sizes[$size];
        $cachedFilePath = \Yii::getAlias("{$imgPath}cache/{$size['w']}_{$size['h']}_{$img}");
        if(file_exists($cachedFilePath)){
            self::responseWithFile($cachedFilePath);
        }
        /**
         * @var $image Image_GD
         *
         */
        $image = \Yii::$app->image->load($imgPath.$img);
        $image->background('#fff');
        $image->resize($size['w'],$size['h'],$size['d']);
        $image->save($cachedFilePath);
        self::responseWithFile($cachedFilePath);
    }
    public static function responseWithFile($filePath)
    {
        if(file_exists($filePath)){
            $image = \Yii::$app->image->load($filePath);
            header("Content-Type: {$image->mime}; charset=utf-8");
            readfile($image->file);
            exit;
        }
        throw new NotFoundHttpException();
    }
}