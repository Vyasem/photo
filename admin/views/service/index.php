<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<form method="post" action="/admin/service">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">
    <input type="hidden" name="Service[id]" value="<?=$id?>" />
    <textarea name="Service[text]" id="editor1" rows="10" cols="80">
			<?=$servicePage?>
		</textarea>
    <input type="submit" value="внести изменения">
    <script>
        CKEDITOR.replace( 'editor1', {
            language: 'ru',
            width: '95%',
            height: 500,
        } );
    </script>
</form>

