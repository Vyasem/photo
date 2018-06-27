<?php
/*Модель для редактирования главной страницы*/

namespace app\admin\models;

use Yii;
use \yii\db\ActiveRecord;

class Index extends ActiveRecord
{
    public static function tableName()
    {
        return 'main';
    }

    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string'],
        ];
    }


}