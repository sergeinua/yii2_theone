<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banner". The `$positions` property has every placeholders for banners.
 * You can add some new position and then use them at pages. The key value is `route`.
 *
 * @property integer $id
 * @property string $route
 * @property string $banner
 * @property integer $size
 * @property integer $type
 * @property string $url
 *
 * @property RouteToBanner[] $routeToBanners
 */
class Banner extends \yii\db\ActiveRecord
{
    public $_bannerFile;

    public static $positions = [
        'site/index'=>[
            'route'=>'site/index',
            'name'=>'Главная страница',
            'pos'=>[
                [
                    'name'=>'В центре',
                    'value'=>'center'
                ],
            ],
        ],
        'professionals/index'=>[
            'name'=>'Страница со списком профессионалов',
            'route'=>'professionals/index',
            'pos'=>[
                ['name'=>'В контенте(3/3)','value'=>'content-3-3'],
                ['name'=>'В контенте(2/3)','value'=>'content-2-3'],
                ['name'=>'В контенте(1/3)','value'=>'content-1-3'],
                ['name'=>'В контенте(1/2)','value'=>'content-1-2'],
                ['name'=>'В контенте(1/4)','value'=>'content-1-4'],
                ['name'=>'Сайдбар','value'=>'sidebar'],
            ]
        ],
        'article/honeymoon'=>[
            'name'=>'Lifstyle',
            'route'=>'article/honeymoon',
            'pos'=>[
                ['name'=>'В контенте(3/3)','value'=>'content-3-3'],
                ['name'=>'В контенте(2/3)','value'=>'content-2-3'],
                ['name'=>'В контенте(1/3)','value'=>'content-1-3'],
                ['name'=>'В контенте(1/2)','value'=>'content-1-2'],
                ['name'=>'В контенте(1/4)','value'=>'content-1-4'],
                ['name'=>'Сайдбар','value'=>'sidebar'],
            ]
        ],
        'article/the-one-news'=>[
            'name'=>'The One News',
            'route'=>'article/the-one-news',
            'pos'=>[
                ['name'=>'В контенте(3/3)','value'=>'content-3-3'],
                ['name'=>'В контенте(2/3)','value'=>'content-2-3'],
                ['name'=>'В контенте(1/3)','value'=>'content-1-3'],
                ['name'=>'В контенте(1/2)','value'=>'content-1-2'],
                ['name'=>'В контенте(1/4)','value'=>'content-1-4'],
                ['name'=>'Сайдбар','value'=>'sidebar'],
            ]
        ],
        'article/articles'=>[
            'name'=>'Репортажи',
            'route'=>'article/articles',
            'pos'=>[
                ['name'=>'В контенте(3/3)','value'=>'content-3-3'],
                ['name'=>'В контенте(2/3)','value'=>'content-2-3'],
                ['name'=>'В контенте(1/3)','value'=>'content-1-3'],
                ['name'=>'В контенте(1/2)','value'=>'content-1-2'],
                ['name'=>'В контенте(1/4)','value'=>'content-1-4'],
                ['name'=>'Сайдбар','value'=>'sidebar'],
            ]
        ],
        'article/creative-weddings'=>[
            'name'=>'Свадьба',
            'route'=>'article/creative-weddings',
            'pos'=>[
                ['name'=>'В контенте(3/3)','value'=>'content-3-3'],
                ['name'=>'В контенте(2/3)','value'=>'content-2-3'],
                ['name'=>'В контенте(1/3)','value'=>'content-1-3'],
                ['name'=>'В контенте(1/2)','value'=>'content-1-2'],
                ['name'=>'В контенте(1/4)','value'=>'content-1-4'],
                ['name'=>'Сайдбар','value'=>'sidebar'],
            ]
        ],
        'article/workshops'=>[
            'name'=>'Мастер-классы',
            'route'=>'article/workshops',
            'pos'=>[
                ['name'=>'В контенте(3/3)','value'=>'content-3-3'],
                ['name'=>'В контенте(2/3)','value'=>'content-2-3'],
                ['name'=>'В контенте(1/3)','value'=>'content-1-3'],
                ['name'=>'В контенте(1/2)','value'=>'content-1-2'],
                ['name'=>'В контенте(1/4)','value'=>'content-1-4'],
                ['name'=>'Сайдбар','value'=>'sidebar'],
            ]
        ],
        'article/interview'=>[
            'name'=>'Интервью',
            'route'=>'article/interview',
            'pos'=>[
                ['name'=>'В контенте(3/3)','value'=>'content-3-3'],
                ['name'=>'В контенте(2/3)','value'=>'content-2-3'],
                ['name'=>'В контенте(1/3)','value'=>'content-1-3'],
                ['name'=>'В контенте(1/2)','value'=>'content-1-2'],
                ['name'=>'В контенте(1/4)','value'=>'content-1-4'],
                ['name'=>'Сайдбар','value'=>'sidebar'],
            ]
        ],
        'article/advices-and-ideas'=>[
            'name'=>'Невеста',
            'route'=>'article/advices-and-ideas',
            'pos'=>[
                ['name'=>'В контенте(3/3)','value'=>'content-3-3'],
                ['name'=>'В контенте(2/3)','value'=>'content-2-3'],
                ['name'=>'В контенте(1/3)','value'=>'content-1-3'],
                ['name'=>'В контенте(1/2)','value'=>'content-1-2'],
                ['name'=>'В контенте(1/4)','value'=>'content-1-4'],
                ['name'=>'Сайдбар','value'=>'sidebar'],
            ]
        ],
        'professionals/single'=>[
            'name'=>'Страница одного профессионала',
            'route'=>'professionals/single',
            'pos'=>[
                ['name'=>'Сайдбар','value'=>'sidebar'],
            ]
        ],
        'poster/poster'=>[
            'name'=>'Страница афиши',
            'route'=>'poster/poster',
            'pos'=>[
                ['name'=>'Сайдбар','value'=>'sidebar'],
            ]
        ],
        'profile/index'=>[
            'name'=>'Главная страница профиля',
            'route'=>'profile/index',
            'pos'=>[
                ['name'=>'Центр','value'=>'center'],
            ]
        ]
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route', 'size', 'position', 'url'], 'required'],
            //[['banner'], 'string'],
            [['size'], 'integer'],
            [['route', 'url'], 'string', 'max' => 255],
            [['bannerFile'],'safe']
        ];
    }

    public function setBannerFile($bannerFile){
        $this->_bannerFile = $bannerFile;
        $fileNameOfSaved = md5(microtime()).'.'. $bannerFile->extension;
        $this->banner = $fileNameOfSaved;
    }

    public function getBannerFile(){
        return $this->_bannerFile;
    }

    public function beforeSave($insert){
        if (parent::beforeSave($insert)) {
            if($this->_bannerFile)
                $this->_bannerFile->saveAs(\Yii::$app->params['imgPath'].$this->banner);
            return true;

        } else {
            return false;
        }
    }
    public function afterDelete(){
        parent::afterDelete();
        unlink(Yii::$app->params['imgPath'].$this->banner);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route' => 'Путь',
            'banner' => 'Баннер',
            'size' => 'Размер',
            'position' => 'Позиция',
            'url' => 'Ссылка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

}
