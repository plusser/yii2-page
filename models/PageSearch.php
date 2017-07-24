<?php 

namespace page\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use page\models\Page;

class PageSearch extends Page
{

    public function rules()
    {
        return [
            [['id', 'title', 'content', 'keywords', 'description', 'layout'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Page::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if($this->validate()){
            $query->andFilterWhere(['like', 'id', $this->id])
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'content', $this->content])
                ->andFilterWhere(['like', 'keywords', $this->keywords])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['layout' => $this->layout]);
        }

        return $dataProvider;
    }

}
