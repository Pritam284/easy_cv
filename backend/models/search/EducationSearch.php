<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\db\Education;

/**
 * EducationSearch represents the model behind the search form of `common\models\db\Education`.
 */
class EducationSearch extends Education
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'degree', 'subject'], 'integer'],
            [['institute', 'year_from', 'year_to'], 'safe'],
            [['result'], 'number'],
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
        $query = Education::find();

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
            'user_id' => $this->user_id,
            'degree' => $this->degree,
            'subject' => $this->subject,
            'year_from' => $this->year_from,
            'year_to' => $this->year_to,
            'result' => $this->result,
        ]);

        $query->andFilterWhere(['like', 'institute', $this->institute]);

        return $dataProvider;
    }
}
