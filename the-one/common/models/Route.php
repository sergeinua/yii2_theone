<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "route".
 *
 * @property integer $id
 * @property string $route
 *
 * @property RouteToBanner[] $routeToBanners
 */
class Route extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'route';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route' => 'Route',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRouteToBanners()
    {
        return $this->hasMany(RouteToBanner::className(), ['route_id' => 'id']);
    }
}
