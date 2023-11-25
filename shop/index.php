<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>GUITAR SHOP </title>
	
	<link type="text/css" rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="header">
	<a href="index.php" class="conteiner"><img src="images/asd.png"></a>
	<h1 class="site-title">Guitar Shop </h1>
	<div class="user">
                    <p style="font-size: 19px; line-height: 30px; font-weight: bold";> Текущий пользователь: <br> <i> <?php echo $user_data['login'] ?> </i>
                    <span> <a href='logout.php'>Выйти</a> </span> </p>
                    <!--<img class="user-icon" src="images/user-icon.png" width="60" height="60" style="margin-bottom: 20px;" alt="hmm"> -->
                </div> 
</div>	
<div class="wrapper">
	<main>
		<div class="goods-out"></div>
	</main>
	<aside class="sidebar"> 
		<div class="cart-space">
		<div class="goods-count"></div>
		<a href="cart.php" class="cart-button" style="display: flex;"><img src="images/cartt.png"></a>
	</div>
	</aside>
</div>

<script defer src="js/jquery-3.6.0.min.js"></script>
<script defer src="js/main.js"></script>
</body>
</html>
