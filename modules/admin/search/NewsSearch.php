<?php

namespace app\modules\admin\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\entities\News;

/**
 * NewsSearch represents the model behind the search form of `app\entities\News`.
 */
class NewsSearch extends News
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'link', 'description', 'author', 'comments', 'enclosure', 'guid', 'pubDate', 'source'], 'safe'],
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
        $query = News::find();

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
            'pubDate' => $this->pubDate,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'enclosure', $this->enclosure])
            ->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'source', $this->source]);

        return $dataProvider;
    }
}
