<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form about `common\models\User`.
 */
class UserSearch extends User
{
    public $sort;
    public $group;
    public $city;
    public $country;
    public $userBased;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['first_name','group', 'last_name','status', 'auth_key','city','country', 'password_hash', 'password_reset_token', 'email', 'city', 'slug','role','type','sort'], 'safe'],
        ];
    }

    public function __construct($config=[]){
        if(isset($config['userBased'])){
            $this->userBased = $config['userBased'];
        }
        parent::__construct($config);
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
    public function search($params,$userBased= false)
    {

        $query = User::find()->distinct();
        $query->joinWith('userProfessionalInfo');
        $query->joinWith('professionalGroups');
        $query->joinWith('place');
        $query->joinWith('city');
        $query->joinWith('country');
//        $query->joinWith('professionalGroups.userCount');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
//        $query->andFilterWhere(['=','status',User::STATUS_AVAILABLE]);

        $query
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
//            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['=', 'status', $this->status]);

        if(isset($this->city)){
            $query->andFilterWhere(['=','city.name',$this->city]);
        }

        if(isset($this->country)){
            $query->andFilterWhere(['=','country.name',$this->country]);
        }

        if(isset($this->group)){
            $query->andFilterWhere(['=','professional_group.slug',$this->group]);
        }

        if($this->userBased){
            $query->orderBy('hidden_order_parameter desc');
        }
        return $dataProvider;
    }
}
