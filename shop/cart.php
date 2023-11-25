<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Корзина товаров</title>
	<link rel="icon" type="image/png" href="images/bask.png"> 
    <link rel="stylesheet" href="css/style.css">
	<style>
/* body {
background-image:url(../images/fon2.jpg);
} */
</style>
</head>
<body>
<main>
<div class="header">
	<a href="index.php" class="conteiner"><img src="images/asd.png" ></a>
	<h1 class="site-title">Guitar Shop </h1>
</div>	
    <div class="main-cart"></div>
    <div class="email-field">
        
		 
        <TR><TD><B>Имя:<B></TD>
            <TD><INPUT NAME="Name" SIZE=20 id="ename"
                  onBlur="this.value=this.value.toUpperCase()"></TD></TR>
		<TR><TD><B>Email:<B></TD>
            <TD><INPUT NAME="Family" SIZE=20 id="email"
                  onBlur="this.value=this.value.toUpperCase()"></TD></TR>		  
        
        <TR><TD><B>Телефон:<B></TD>
            <TD><INPUT NAME="Phone" SIZE=10 id="ephone"></TD></TR>
		 <h3><p><button class="send-email">Оформить Заказ</button></p> </h3>	
    </div>
</main>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/cart.js"></script>
</body>
</html>