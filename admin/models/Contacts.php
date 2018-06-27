<?php
/*Модель для редактирования главной страницы*/

namespace app\admin\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

class Contacts extends ActiveRecord
{
    public static function tableName()
    {
        return '{{contact}}';
    }

    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string'],

        ];
    }
}