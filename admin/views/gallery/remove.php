<?php

use yii\helpers\Html;

$this->title = 'Удаление фотографий из галлереи';
?>
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

