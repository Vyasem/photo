<?php

namespace app\admin\controllers;

use Yii;
use app\admin\models\Service;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\admin\models\LoginForm;


class ServiceController extends Controller
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
            $dataProvider = Service::findOne($id);

            if ($dataProvider->load(Yii::$app->request->post()) && $dataProvider->save()) {
               return $this->redirect('service');
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