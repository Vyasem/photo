<!DOCTYPE html>
<html>
	<head>
		<title><?=$title?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		<link rel="stylesheet" href="/css/style_admin.css" />
		<script src="/script/ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<div id="main_page">
            <div id="menu">
				<div class="menu_title">Главная страница</div>
				<div class="menu_link"><a href="/admin/index/">Редактировать главную страницу</a></div>
				<div class="menu_title">Галерея</div>
				<div class="menu_link"><a href="/admin/gallery/create">Добавить фотографии в галерею</a></div>
				<div class="menu_link"><a href="/admin/gallery/remove">Удалить фотографии из галереии</a></div>
				<div class="menu_title">Услуги</div>
				<div class="menu_link"><a href="/admin/service/">Редактировать страницу услуг</a></div>
				<div class="menu_title">Контакты</div>
				<div class="menu_link"><a href="/admin/contacts/">Редактировать контакты</a></div>
			</div>
            <div id="edit_page">
				<?=$content?>
            </div>
        </div>
	</body>
</html>
