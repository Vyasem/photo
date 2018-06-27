<?php

namespace app\admin\controllers;

use Yii;
use app\admin\models\Contacts;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\admin\models\LoginForm;


class ContactsController extends Controller
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

    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest)
        {
            $id = 1;
            $dataProvider = Contacts::findOne($id);
           
            if ($dataProvider->load(Yii::$app->request->post()) && $dataProvider->save()) {
               return $this->redirect('contacts');
            } else {
                return $this->render('index', [
                    'servicePage' => $dataProvider['text'],
                    'id' => $dataProvider['id'],
                ]);
            }

       }

        return 'Польхователь не зарегестрирован!';
    }


}