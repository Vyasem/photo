<div id="general">
	<div>
		<?=$contactPage?>
		<form id="feddback_form" method="post" action="">
			<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">
			Ваше имя: <br>
			<input id="save_name" type="text" name="name" value="<?=$save_name ?>"><br>
			<span id="er_name" style="color: red;"><?=$er_name ?></span>
			<br>Ваш e-mail для связи: <br>
			<input id="save_mail" type="text" name="mail" value="<?=$save_mail ?>"><br>
			<span id="er_email" style="color: red;"><?=$er_email ?></span>
			<br><br>
			Что вы хотите спросить, а можеть быть предложить: <br>
			<textarea id="save_text" name="text"><?=$save_text?></textarea><br>
			<span id="er_text" style="color: red;"><?=$er_text ?></span><br><br>
			<input id="button_feedback" type="submit" value="Отправить">
		</form>
	</div>
</div>