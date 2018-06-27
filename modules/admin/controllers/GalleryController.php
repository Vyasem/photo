<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Gallery;
use app\models\GallerySearch;
use app\models\Category;
use app\models\DataBase;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Gallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gallery model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        if(!empty($_FILES['photo']) && !empty($_REQUEST['cat']))
        {
            $arNewFiles = Gallery::arrayBuild($_FILES['photo']);
            foreach($arNewFiles as $key => $val)
            {
                $objGal = new Gallery();
                $objGal->queryHandling($val, $_REQUEST['cat']);
                unset($objGal);
                //var_dump(memory_get_usage());
            }

        }
        $catList = Category::find()->all();
        return $this->render('create', ['catList' => $catList]);
    }

    public function actionRemove()
    {

        if(!empty($_REQUEST['cat']))
        {
            $elList = Gallery::find()->where(['id_cat' => $_REQUEST['cat']])->all();
            return $this->render('remove', ['elList' => $elList]);
        }
        elseif(!empty($_REQUEST['delete']))
        {
            foreach($_REQUEST['delete'] as $dVal)
            {
                $filesName = Gallery::find()->where('id =' . $dVal)->all();
                Gallery::deleteFiles($filesName);
                Gallery::deleteAll('id =' . $dVal);
            }
            $catList = Category::find()->all();
            return $this->render('remove', ['catList' => $catList]);
        }
        else
        {
            $catList = Category::find()->all();
            return $this->render('remove', ['catList' => $catList]);
        }

    }


    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
