<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>



    <?php $form = ActiveForm::begin(['enctype' => 'multipart/form-data']); ?>

    <?=$form->field($model, 'id_cat')->textInput() ?>

    <?= $form->field($model, 'id_size')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<form enctype="multipart/form-data" method="post" >
    <br>
    Выбирите фотографию, которую вы бы хотели загрузить.<br>
    <input type="file" name="photo"><br><br>
    Выбирите категорию галереи:<br>
    <select name="cat[]">
        <option value="0">Выбирите категорию</option>
        <?php foreach($view_cat as $cat): ?>
            <option value="<?=$cat['id_cat']?>"><?=$cat['name']?></option>
        <?php endforeach ?>
    </select><br>
    <input type="submit" value="ЗАГРУЗИТЬ">
    </fom>
