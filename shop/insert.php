<?php 
session_start();

	require("connection.php");
	require("functions.php");

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$link = mysqli_connect("localhost", "root", "", "shop_db");

	if ($link == false){
    	print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
	}
	else {
    	print("Соединение установлено успешно");
	}

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Если что-то запостили, то:
		$login = $_POST['login'];
		$password = $_POST['password'];

		if(!empty($login) && !empty($password) && !is_numeric($login))
		{
			//Сохраняем пользователя в БД
			$user_id = random_num(8);
			$query = "insert into `users` (`user_id`,`login`,`password`) values ('$user_id','$login','$password')";
			$result = mysqli_query($con, $query);

			if ($result == false) {
				print("Произошла ошибка при выполнении запроса");
			};
	
			header("Location: login.php");
            die;
		}else
		{
			echo "Имя пользователя или пароль не удовлетворяют условиям!";
		}
	}
?>