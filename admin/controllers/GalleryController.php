<?php

namespace app\admin\controllers;

use Yii;
use app\admin\models\Gallery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\admin\models\LoginForm;


class GalleryController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest)
       {

           if(!empty($_FILES['photo']) && !empty($_REQUEST['cat']))
           {
               Gallery::$name = '{{gallery}}';
               $arNewFiles = Gallery::arrayBuild($_FILES['photo']);
               foreach($arNewFiles as $key => $val)
               {
                   $objGal = new Gallery();
                   $objGal->queryHandling($val, $_REQUEST['cat']);
                   unset($objGal);
               }

           }

           Gallery::$name = '{{category}}';
           $catList = Gallery::find()->all();
           return $this->render('create', ['catList' => $catList]);
      }

        return 'Польхователь не зарегестрирован!';
    }

    public function actionRemove()
    {

        if(!empty($_REQUEST['cat']))
        {
            Gallery::$name = '{{gallery}}';
            $elList = Gallery::find()->where(['id_cat' => $_REQUEST['cat']])->all();
            return $this->render('remove', ['elList' => $elList]);
        }
        elseif(!empty($_REQUEST['delete']))
        {

            Gallery::$name = '{{gallery}}';
            foreach($_REQUEST['delete'] as $dVal)
            {
                $filesName = Gallery::find()->where('id =' . $dVal)->all();
                Gallery::deleteFiles($filesName);
                Gallery::deleteAll('id =' . $dVal);
            }

            Gallery::$name = '{{category}}';
            $catList = Gallery::find()->all();
            return $this->render('category', ['catList' => $catList]);
        }
        else
        {
            Gallery::$name = '{{category}}';
            $catList = Gallery::find()->all();
            return $this->render('category', ['catList' => $catList]);
        }

    }


}