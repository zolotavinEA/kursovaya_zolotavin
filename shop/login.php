<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Если что-то запостили, то:
		$login = $_POST['login'];
		$password = $_POST['password'];

		if(!empty($login) && !empty($password) && !is_numeric($login))
		{

			//Проверяем, есть ли юзер в БД
			$query = "select * from users where login = '$login' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
					}
				}
			}
			
			echo "Неверное имя пользователя или пароль!";
		}else
		{
			echo "Неверное имя пользователя или пароль!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Вход</div>

			<input id="text" type="text" name="login" value="login"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Зарегистрироваться</a><br><br>
		</form>
	</div>
</body>
</html>