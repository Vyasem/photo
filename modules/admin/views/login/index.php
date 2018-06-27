<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>
    <meta http-equiv="Content-Type" content="text/html; charset=cp1251">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div id="login_page">
    <div class="wel"><span>Авторизация</span></div>
    <form enctype="multipart/form-data" method="post" >
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
		<table>
            <tr>
                <td><span>Имя пользователя:</span></td>
                <td><input class="input" type="text" name="login"></td>
            </tr>
            <tr>
                <td><span>Пароль:</span></td>
                <td><input class="input" type="password" name="password"></td>
            </tr>
        </table>
        <p><input type="checkbox"> Запомнить меня</p>
        <p><input  id="button" type="submit" value="Вход"></p>
    </form>
</div>
</body>
</html>