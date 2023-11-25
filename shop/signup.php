

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
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
		width: 50%;
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
		
		<form action="insert.php" method="POST">
			<div style="font-size: 20px;margin: 10px;color: white;">Регистрация</div>

			<input id="text" type="text" name="login"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Зарегистрироваться"><br><br>

			<a href="login.php">Войти</a><br><br>
		</form>
	</div>
</body>
</html>