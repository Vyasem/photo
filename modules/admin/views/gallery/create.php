<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */

$this->title = 'Добовление фотографии в галлерею';
?>
<?//var_dump($_FILES)?>
<?//var_dump(Yii::$app->getRequest())?>
<h1><?= Html::encode($this->title) ?></h1>
<form enctype="multipart/form-data" method="post" >
   <input type="hidden" name="<?=Yii::$app->getRequest()->csrfParam?>" value="<?=Yii::$app->getRequest()->getCsrfToken()?>">
    <br>
    Выбирите фотографию, которую вы бы хотели загрузить.<br>
    <input type="file" multiple name="photo[]"><br><br>
    Выбирите категорию галереи:<br>
    <select name="cat">
        <option value="0">Выбирите категорию</option>
        <?php foreach($catList as $cat): ?>
            <option value="<?=$cat['id_cat']?>"><?=$cat['name']?></option>
        <?php endforeach ?>
    </select><br>
    <input type="submit" value="ЗАГРУЗИТЬ">
</form>



