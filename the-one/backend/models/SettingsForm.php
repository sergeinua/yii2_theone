<?php
namespace backend\models;

use common\models\Article;
use common\models\Color;
use common\models\Place;
use common\models\Setting;
use common\models\Term;
use common\models\TermToArticle;
use yii\base\Exception;
use yii\base\Model;
use yii\behaviors\SluggableBehavior;
use yii\db\Connection;
use yii\db\Transaction;
use yii\validators\ImageValidator;
use yii\web\UploadedFile;

class SettingsForm extends Model
{

    public $settings = [];

    public function rules()
    {

        return [
            [['main_page_heading'], 'string', 'max' => 128],
            [['block_1_url', 'block_2_url', 'ads_1_link', 'ads_2_link', 'ads_3_link'], 'url', 'defaultScheme' => 'http'],
            [[
                'ads_1_image',
                'ads_2_image',
                'ads_3_image',
                'block_1_image',
                'block_2_image',
                'about_block1_image',
                'about_block4_image',
                'about_block3_image',
                'menu_banner_image',
                'slide1_image',
                'slide2_image',
                'slide3_image',
                'slide4_image',
                'slide5_image',
                'slide6_image',
                'slide7_image',
                'slide8_image',
            ], 'file'],
            [
                [
                    'main_page_heading',
                    'main_page_text',
                    'soc_fb',
                    'soc_tw',
                    'soc_vimeo',
                    'soc_inst',
                    'soc_vk',
                    'block_1_url',
                    'block_1_subheading',
                    'block_1_heading',
                    'block_2_url',
                    'block_2_subheading',
                    'block_2_heading',
                    'ads_1_link',
                    'ads_1_image',
                    'ads_2_link',
                    'ads_2_image',
                    'ads_3_link',
                    'ads_3_image',
                    'about_block1_text',
                    'about_block2_text',
                    'about_block3_text',
                    'about_block4_text',
                    'about_block2_heading',
                    'about_block3_heading',
                    'about_block4_heading',
                    'contact_phones',
                    'contact_emails',
                    'contact_adress',
                    'contact_place_id',
                    'socials',
                    'menu_banner_url',
                    'slide1_link',
                    'slide2_link',
                    'slide3_link',
                    'slide4_link',
                    'slide5_link',
                    'slide6_link',
                    'slide7_link',
                    'slide8_link',
                ], 'safe'
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'about_block1_image' => 'Изображение в первом блоке',
            'about_block2_image' => 'Изображение во втором блоке',
            'about_block4_image' => 'Изображение в четвёртом блоке',
            'about_block1_text' => 'Текст в первом блоке',
            'about_block2_text' => 'Текст во втором блоке',
            'about_block3_text' => 'Текст в третьем блоке'

        ];
    }

    public function save()
    {


        if ($this->contact_place_id) {
            $place = Place::find()->where(['place_id' => $this->contact_place_id])->exists();
            if (!$place) {
                $place = new Place($this->contact_place_id, false);
                $place->save();
            }
        }

        foreach ($this->settings as $key => $value) {
            if (is_array($value)) {
                echo "Жизнь тебя к такому не готовила!";
                die;
//                $setting = Setting::find()->where(['=','key',$key]);
//                $group = $setting->group;
//                Setting::deleteAll(['=','key',$key]);
//                $insertValues = [];
//                foreach($value as $key=>$value){
//                    $insertValues[] = [
//                        'key'=>$key,
//                        'value'=>$value,
//                        'group'=>$group
//                    ];
//                }
//                \Yii::$app->getDb()->createCommand()->batchInsert(Setting::className(),);
//                continue;
            }
            $setting = Setting::find()->where(['=', 'key', $key])->one();
            if (!empty($this->findValidator('FileValidator', $key))) {
                if ($file = UploadedFile::getInstance($this, $key)) {
                    $prev = \Yii::$app->params['imgPath'] . $setting->value;
                    if (file_exists($prev) && !is_dir($prev)) {
                        unlink($prev);
                    }
                    $newfileName = $key . '_' . md5(microtime()) . '.' . $file->extension;
                    $file->saveAs(\Yii::$app->params['imgPath'] . $newfileName);
                    $setting->value = $newfileName;
                    $setting->update();
                    continue;
                } else {

                    $value = $setting->value;
                }
            }

            $setting->value = $value;
            $setting->update();
        }
    }

    /*
     * A function,that handles a corner case. It removes
     */
    public function findValidator($type, $attribute)
    {
        $validators = $this->getActiveValidators($attribute);
        return array_filter($validators, function ($el) use ($type) {
            return strpos($el::className(), $type) != false;
        });
    }

    /**
     * A getter that used to get settings from array $settings
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->settings)) {
            return $this->settings[$name];
        }
        $getter = 'get' . $name;
        if (method_exists($this, $getter)) {
            // read property, e.g. getName()
            return $this->$getter();
        }
    }

    /**
     * pushes attribute to settings
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->settings[$name] = $value;
    }

    /**
     * In one place of attribute settings we should get place to show that on the map
     * @return null|static
     */
    public function getContactPlace()
    {
        return Place::findOne($this->contact_place_id);
    }
}