<?php
$this->title = 'Услуги фотографа';
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div id="general_fedback">
	<h1 id="h1_style">Отзывы о нас</h1>
	<div>
		<?foreach($data as $feed_list){?>
			<div class="decor_feedback">
				<div class="client_name"><b>Меня зовут - <?=$feed_list['name']?></b></div>
				<div class="client_feedback"><?=$feed_list['text']?></div>
				<div class="date_feedback">Дата: <?=$feed_list['date']?> </div>
			</div>
		<?}?>
		<h1>Добавить свой отзыв</h1>
		<?php $form = ActiveForm::begin(['id' => 'feddback_form']); ?>
			<?=$form->field($modelForm, 'name', ['template' => 'Ваше имя: <br> {input}<br><span style="color: #ff0000;">' . $modelFormEr["name"] .'</span><br><br>'])?>
		    <?=$form->field($modelForm, 'text', ['template' => 'Ваше отзыв: <br> {input}<br><span style="color: #ff0000;">' . $modelFormEr["text"] .'</span><br><br>'])->textarea()?>
			<?= Html::submitButton('Отправить отзыв', ['id' => 'button_feedback', 'name' => 'contact-button']) ?>
		<?php ActiveForm::end(); ?>
	</div>
</div>