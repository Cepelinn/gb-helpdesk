<?php

namespace app\models\user;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\user\UserRecord;

/**
 * UserSearchModel represents the model behind the search form of `app\models\user\UserRecord`.
 */
class UserSearchModel extends UserRecord
{
    public $roleName;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username', 'password', 'authKey', 'accessToken', 'name', 'email', 'created_at', 'updated_at', 'roleName'], 'safe'],
        ];
    }


    /**
     * {@inheritdoc}
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
        $query = UserRecord::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }



        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'authKey', $this->authKey])
            ->andFilterWhere(['like', 'accessToken', $this->accessToken])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->join('LEFT JOIN', 'auth_assignment', 'users.id = auth_assignment.user_id')
            ->andFilterWhere(['like', 'auth_assignment.item_name', $this->roleName]);

        return $dataProvider;
    }
}
