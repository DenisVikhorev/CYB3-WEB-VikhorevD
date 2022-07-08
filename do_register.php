<?php
    session_start();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Регистрация</title>
	</head>
	<body>
		<?php
    
			$user = $_REQUEST["txtUserName"];
			$email = $_REQUEST["txtEmail"];
			$login = $_REQUEST["txtLogin"];
			$pwd = $_REQUEST["txtPwd"];
			$hash = hash('sha256', $pwd);
				
			//$sql = "INSERT INTO users (UserName,Email,Login,PasswordHash) VALUES ('$user','$email','$login','$hash')";
			$sql = "INSERT INTO users (UserName,Email,Login,PasswordHash) VALUES (?,?,?,?)";
			$db_server = getenv("cyb3_db_server");
			$db_user = getenv("cyb3_db_user");
			$db_pwd = trim(getenv("cyb3_db_pwd"));
			$conn = mysqli_connect($db_server,$db_user,$db_pwd,"cyb3");

			if (!$conn)
				die("Connection failed: " . mysqli_connect_error());

			$stat=mysqli_prepare($conn,$sql);
			mysqli_stmt_bind_param($stat,"ssss",$user,$email,$login,$hash);
			mysqli_stmt_execute($stat);
			//$result = mysqli_stmt_get_result($stat);
			echo(mysqli_stmt_get_result($stat));
			echo "<h2>Успешная регистрация. Вы будете перенаправлены на форму авторизации.</h2>";
			mysqli_close($conn);

			header("Refresh:2; url=login.php");
			
			// if ($result==1){
			// 	echo "<h2>Успешная регистрация. Вы будете перенаправлены на форму авторизации.</h2>";
			// }
			// else
			// 	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			
			

		?>
	</body>
</html>