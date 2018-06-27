<?php

namespace app\models;

use yii\base\Model;

class FeedbackForm extends Model
{
	
	public $name;
	public $text;
	
	public function rules()
	{
		return [[['name', 'text'], 'required']];
	}
	

}