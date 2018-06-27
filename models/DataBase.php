<?php

namespace app\models;

use Yii;
use yii\base\Model;

class DataBase extends Model
{
	public function mainPage()
	{
		$post = Yii::$app->db->createCommand("SELECT * FROM main WHERE id='1'")->queryOne();
      	return $post;
	}

	public function contactPage()
	{
		$post = Yii::$app->db->createCommand("SELECT * FROM contact WHERE id='1'")->queryOne();
		return $post;
	}
	
	public function galleryList()
	{
		$post = Yii::$app->db->createCommand("SELECT * FROM category")->queryAll();
		return $post;
	}
	
	public function imagesList($id)
	{
		$post = Yii::$app->db->createCommand("SELECT * FROM gallery WHERE id_cat=:id_cat ORDER BY id_size")->bindValue(':id_cat', $id)->queryAll();
		return $post;
	}
	
	public function imagesCategory($id)
	{
		$post = Yii::$app->db->createCommand("SELECT name FROM category WHERE id_cat=:id_cat")->bindValue(':id_cat', $id)->queryAll();
		return $post;
	}
	
	public function servicePage()
	{
		$post = Yii::$app->db->createCommand("SELECT * FROM service WHERE id='1'")->queryOne();
      	return $post;
	}
	
	public function feedback()
	{
		$post = Yii::$app->db->createCommand("SELECT * FROM feedback")->queryAll();
		return $post;
	}
	
	 public function addFeedback($name, $text)
    {
        $date = date("d-m-Y");
		$name = htmlspecialchars($name);
		$text = htmlspecialchars($text);
		
		Yii::$app->db->createCommand("INSERT INTO feedback (name, date, text) VALUES ('$name', '$date', '$text')")->execute();
	}
	
	public function getErrors($arErrors = array())
	{
		foreach($arErrors as $key => $val)
		{
			
			switch($key)
			{
				case 'name':
					$arResErrors[$key] = 'Вы не ввели имя! Введите пожалуйста ваше имя ';
					break;
					
				case 'text':
					$arResErrors[$key] = 'Вы не ввели текст отзыва';
					break;
			}
		}
		
		return $arResErrors;
	}


}
?>