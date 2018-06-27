<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<form method="post" action="/admin/main/index">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <textarea id="editor1" class="form-control" name="Main[text]" rows="10" cols="80" aria-required="true" style="visibility: hidden; display: none;"><?=$model['text']?></textarea>
        <input type="submit" value="внести изменения">
</form>
<script>
    CKEDITOR.replace( 'editor1', {
        language: 'ru',
        width: '95%',
        height: 500,
    } );
</script>