<?php
/*Модель для редактирования главной страницы*/

namespace app\admin\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

class Service extends ActiveRecord
{
    public static function tableName()
    {
        return '{{service}}';
    }

    public function rules()
    {
        return [
            [['text'], 'required'],
            [['id'], 'required'],
            [['text'], 'string'],
            [['text'], 'integer'],
        ];
    }

    public function search()
    {
        $query = Service::find()->all();

        // add conditions that should always apply here

        /*$dataProvider = new ActiveDataProvider([
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
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);*/

        return $query;
    }


}