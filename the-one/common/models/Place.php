<?php

namespace common\models;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "place".
 *
 * @property string $place_id
 * @property double $lat
 * @property double $lng
 * @property string $adress
 * @property integer $country_id
 * @property integer $city_id
 */
class Place extends \yii\db\ActiveRecord
{
    private $_placeAttributes;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'place';
    }

    /**
     * @param array|string $config
     */
    public function __construct($config = [],$relatedToUser = true)
    {
        if(is_string($config)){
            $googleInfo = $this->getGoogleInfoByPlaceId($config);

            $config = [
                'lat' => $googleInfo['lat'],
                'lng' => $googleInfo['lng'],
                'country_id' => self::checkCountry($googleInfo['country']),
                'city_id' => self::checkCity($googleInfo['city']),
                'place_id' => $config,
                'address'=> $googleInfo['address']
            ];
            if($relatedToUser){
                $config['country_id'] = self::checkCountry($googleInfo['country']);
                $config['city_id']= self::checkCity($googleInfo['city']);
            }
        }

        parent::__construct($config);
    }


    public static function checkCountry($countryName)
    {
        $country = Country::findOne(['name' => $countryName]);
        if(!$country){
            $country = new Country([
                'name' => $countryName,
            ]);
            $country->save();
        }
        return $country->id;
    }

    public static function checkCity($cityName)
    {
        $city = City::findOne(['name' => $cityName]);
        if(!$city){
            $city = new City([
                'name' => $cityName,
            ]);
            $city->save();
        }
        return $city->id;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_id'], 'required'],
            [['lat', 'lng'], 'number'],
            [['country_id', 'city_id'], 'integer'],
            [['place_id', 'address'], 'string', 'max' => 255],
            [['place_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'place_id' => 'Place ID',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'adress' => 'Adress',
            'country_id' => 'Country ID',
            'city_id' => 'City ID',
        ];
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(),['id'=>'country_id']);
    }

    public function getCity(){
        return $this->hasOne(City::className(),['id'=>'city_id']);
    }
    protected static function getGoogleInfoByPlaceId($placeId){
        $googleResult = Json::decode(file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?language=ru_RU&placeid='.$placeId.'&key='.Yii::$app->params['googleApiKey']));
        $parsedResult = [
            'lat' => $googleResult['result']['geometry']['location']['lat'],
            'lng' => $googleResult['result']['geometry']['location']['lng'],
            'address'=>$googleResult['result']['formatted_address']
        ];
        foreach ($googleResult['result']['address_components'] as $adm) {

            @list($type1, $type2) = $adm['types'];

            if($type1 === 'locality' && $type2 === 'political'){
                $parsedResult['city'] = $adm['long_name'];
            }else if($type1 === 'country' && $type2 === 'political'){
                $parsedResult['country'] = $adm['long_name'];
            }
        }

        return $parsedResult;
    }
}
