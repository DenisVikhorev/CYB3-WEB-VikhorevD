<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <style>
		input {
			width: 150px;
			margin: 5px;
		}
	</style>
</head>
<body>
    <a href ="index1.html">Домашняя страница</a>
	<form action="do_register.php" method="POST" >
		Введите имя <br/>
		<input type="text" name="txtUserName" /> <br />
		Введите адрес электронной почты <br/>
		<input type="text" name="txtEmail" /> <br />
		Введите логин <br/>
		<input type="text" name="txtLogin" /> <br />
		Введите пароль<br/>
		<input type="password" name="txtPwd" /> <br />
		<input type="submit" value="Зарегистрироваться" />

		<p>Автор: Вихорев Денис (gm6161654@gmail.com)</p>
	</form>
</body>
</html>