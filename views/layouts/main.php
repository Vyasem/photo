<?php

use yii\helpers\Html;
use  yii\widgets\Menu;
?>
<!DOCTYPE html>
<html>
	<head>
		 <title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		<meta content="фотограф в алматы, love story, свадебный фотограф, детский фотограф, семейный фотограф, индивидуальная фотосъёмка" name="keywords">
		<meta content="Владимир Овчинников - проффесиональный фотограф в Алматы. Я как свадебный фотограф, детский фотограф, семейный фотограф -  запечатлю самые лучшие моменты вашей жизни, по доступным ценам" name="description">
		<link rel="stylesheet" href="/css/style.css" />
		<script language="javascript" src="/script/jquery-1.12.0.js"></script>
	</head>
	<body>
		<div id="main">
			<div id="header">
				<a href="index.php"><span id="logo"><img src="../img/logo.png"></span></a>
				<a href="https://www.instagram.com/ovchinnikov.vovka/" target="_balnk"><span id="instagram"><img src="../img/logo_instagram.png"></span></a>
				<a href="https://vk.com/club73215775" target="_balnk"><span id="vk"><img src="../img/logo_vk.png"></span></a>
				<a href="https://www.facebook.com/groups/1191533384198062/" target="_balnk"><span id="facebook"><img src="../img/logo_facebook.png"></span></a>
				<span id="tel">e-mail: <a href="mailto:Владимир Овчинников<info@nicephoto.kz>?subject=Письмо с сайта">info@nicephoto.kz</a><br/>сот.тел.: +7(707) 409-08-13</span>
			</div>
			<div id="top_menu">
				<?
				echo Menu::widget([
					'options' => ['tag' => 'div'],
					'itemOptions' => ['tag' => false],
					'items' => [
						['label' => 'Главная', 'url' => ['main/index']],
						['label' => 'Галерея', 'url' => ['main/gallery']],
						['label' => 'Услуги', 'url' => ['main/service']],
						['label' => 'Отзывы', 'url' => ['main/feedback']],
						['label' => 'Контакты', 'url' => ['main/contact']]
					],
				]);?>
			</div>
			<?=$content?>
			<script src="../script/qb/js/qb.js"></script>
			<div id="footer">
				<span id="footer_owner">Владимир Овчинников. 2015г.</span>
				<span id="footer_author">Разработчик: Семенов Вячеслав &copy;</span>
			</div>
		</div>
	</body>
</html>