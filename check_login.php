<?php 
	session_start();
?>
<html>
	<head>
		<title>Проверка</title>
		<meta charset="utf-8" />
		<style>
		
			input {
				width: 150px;
				margin: 5px;
			}
			
		</style>
		
	</head>
	
	<body>
		<a href ="index1.html">Домашняя страница</a>
		<?php
			$user = $_REQUEST["txtUser"];
			$pwd = $_REQUEST["txtPwd"];
			$hash = hash('sha256', $pwd);
			
			$sql = "SELECT * FROM users WHERE Login=? AND PasswordHash=? ";
			$db_server = getenv("cyb3_db_server");
			$db_user = getenv("cyb3_db_user");
			$db_pwd = trim(getenv("cyb3_db_pwd"));
			$conn = mysqli_connect($db_server,$db_user,$db_pwd,"cyb3");

			$stat = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stat, "ss", $user, $hash);
			mysqli_stmt_execute($stat);
			$result = mysqli_stmt_get_result($stat);

			$num_rows = mysqli_num_rows($result);
			mysqli_close($conn);
			
			if ($num_rows >= 1) {
				echo "<h1>Привет, $user!</h1>";
				$_SESSION["user"] = $user;
			}
			else  {
				echo "<h1>Неверный логин!</h1>";
			}
			
		?>
		
	</body>

</html>