<?php

namespace app\models\tables;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Ticket;

/**
 * TicketSearch represents the model behind the search form of `app\models\tables\Ticket`.
 */
class TicketSearch extends Ticket
{
    public $authorName;
    public $responsibleName;
    public $statusName;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'author_id', 'responsible_id', 'status_id'], 'integer'],
            [['title', 'description', 'created_at', 'updated_at', 'authorName', 'responsibleName', 'statusName',], 'safe'],
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
        $query = Ticket::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
             $query->where('0=1');
            $query->joinWith([
                'users' => function ($q) {
                    $q->from('users us');
                    },
                ]);

            $query->joinWith(['ticket_status']);

            return $dataProvider;
        }

        $this->addCondition($query, 'author_id');
        $this->addCondition($query, 'responsible_id');
        $this->addCondition($query, 'status_id');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'author_id' => $this->author_id,
            'responsible_id' => $this->responsible_id,
            'status_id' => $this->status_id,
            'ticket.created_at' => $this->created_at,
            'ticket.updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

            $query->joinWith(['author' => function ($q) {
                $q->from('users usa');
                $q->where('usa.username LIKE "%' . $this->authorName . '%"');
            }]);

/*
            if($this->responsibleName != null && $this->responsibleName != 'не определен'){
                $query->joinWith(['responsible' => function ($q) {
                    $q->from('users usr');
                    $q->where('usr.username LIKE "%' . $this->responsibleName . '%"');
                }]);
            } 

            if ($this->responsibleName == 'не определен') {
                $query->andWhere(['is', 'responsible_id', new \yii\db\Expression('null')]);
            }

            */

            if($this->responsibleName != null && $this->responsibleName != 'не определен'){
                $query->joinWith(['responsible' => function ($q) {
                    $q->from('users usr');
                    $q->where('usr.username LIKE "%' . $this->responsibleName . '%"');
                }]);
            } 

            if ($this->responsibleName == 'не определен') {
                $query->andWhere(['is', 'responsible_id', new \yii\db\Expression('null')]);
            }










            $query->joinWith(['status' => function ($q) {
                $q->where('ticket_status.title LIKE "%' . $this->statusName . '%"');
            }]);

        return $dataProvider;
    }

    protected function addCondition($query, $attribute, $partialMatch = false)
    {
        if (($pos = strrpos($attribute, '.')) !== false) {
            $modelAttribute = substr($attribute, $pos + 1);
        } else {
            $modelAttribute = $attribute;
        }

        $value = $this->$modelAttribute;
        if (trim($value) === '') {
            return;
        }
    }
}
