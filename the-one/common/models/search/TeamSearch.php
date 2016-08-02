<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Team;

/**
 * TeamSearch represents the model behind the search form about `common\models\Team`.
 */
class TeamSearch extends Team
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'soc_tw'], 'integer'],
            [['name', 'photo', 'profession', 'top_quote', 'main_quote', 'soc_fb', 'soc_vk', 'soc_in', 'slug'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Team::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'soc_tw' => $this->soc_tw,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'profession', $this->profession])
            ->andFilterWhere(['like', 'top_quote', $this->top_quote])
            ->andFilterWhere(['like', 'main_quote', $this->main_quote])
            ->andFilterWhere(['like', 'soc_fb', $this->soc_fb])
            ->andFilterWhere(['like', 'soc_vk', $this->soc_vk])
            ->andFilterWhere(['like', 'soc_in', $this->soc_in])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
