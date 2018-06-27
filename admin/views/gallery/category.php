<?php

use yii\helpers\Html;

$this->title = 'Удаление фотографий из галлереи';
?>
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
