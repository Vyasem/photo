<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\DataBase;
use app\models\FeedbackForm;
use yii\bootstrap\ActiveForm;

class MainController extends Controller
{
	public function actionIndex()
	{
		$model = new DataBase();
		$mainData = $model->mainPage();
		return $this->render('index', ['mainData' => $mainData['text']]);
	}
	
	public function actionGallery()
	{
		if(!empty($_GET['id_cat']))
		{
			$model = new DataBase();
			$images = $model->imagesList($_GET['id_cat']);
			$categoryName = $model->imagesCategory($_GET['id_cat']);
			return $this->render('gallery', ['images' => $images, 'categoryName' => $categoryName[0]['name']]);
		}
		else
		{
			$model = new DataBase();
			$data = $model->galleryList();
			return $this->render('gallery', ['data' => $data]);
		}
		
	}
	
	public function actionService()
	{
		$model = new DataBase();
		$serviceData = $model->servicePage();
		return $this->render('service', ['serviceData' => $serviceData['text']]);
	}

	public function actionContact()
	{
		$model = new DataBase();
		$serviceData = $model->contactPage();
		return $this->render('contact', ['contactPage' => $serviceData['text']]);
	}
	
	public function actionFeedback()
	{
		$model = new DataBase();
		$data = $model->feedback();
		$modelForm = new FeedbackForm();
		if ($modelForm->load(Yii::$app->request->post()) && $modelForm->validate()) {
           	$model->addFeedback($modelForm['name'], $modelForm['text']);
			$data = $model->feedback();
            return $this->render('feedback', ['modelForm' => $modelForm, 'data' => $data]);
        } else {
			if(!empty($modelForm['errors']))
		   {
				$modelFormEr = $model->getErrors($modelForm['errors']);
		   }
		   return $this->render('feedback', ['modelFormEr' => $modelFormEr, 'data' => $data, 'modelForm' => $modelForm]);
        }
	}
}


?>