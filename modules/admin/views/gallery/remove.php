<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */
$this->title = 'Удаление фотографий из галлереи';
?>
<?if(!empty($catList)){?>
    <form enctype="multipart/form-data" method="post" >
        <input type="hidden" name="<?=Yii::$app->getRequest()->csrfParam?>" value="<?=Yii::$app->getRequest()->getCsrfToken()?>">
        Выбирите категорию галереи:<br>
        <select name="cat">
            <option value="0">Выбирите категорию</option>
            <?php foreach($catList as $cat): ?>
                <option value="<?=$cat['id_cat']?>"><?=$cat['name']?></option>
            <?php endforeach ?>
        </select><br>
        <input type="submit" value="Показать">
    </form>
<?}else{?>
    <form enctype="multipart/form-data" method="post" >
        <input type="hidden" name="<?=Yii::$app->getRequest()->csrfParam?>" value="<?=Yii::$app->getRequest()->getCsrfToken()?>">
        <?php foreach ($elList as $view): ?>
            <div class="category">
                <img src="../../img/gallery/<?=$view['id_cat']?>/small/<?=$view['name']?>">
                <br><input type="checkbox" name="delete[]" value="<?=$view['id'] ?>">
            </div>
        <?php endforeach ?>
        <input type="submit" value="Удалить выбранные">
    </form>
<?}?>


