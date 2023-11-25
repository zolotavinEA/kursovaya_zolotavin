<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "shop_db";

//$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$con = mysqli_connect('localhost','root','','auth_db'))
{

	die("Ошибка подключения к БД!");
}
