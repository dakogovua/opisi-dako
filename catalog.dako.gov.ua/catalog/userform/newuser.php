<?php

// print_r($_POST); Мы вывели пост-запрос и данные ассоциативного массива вставили в инсерт


	session_start(); // проверяем роль	
	
	if($_SESSION["role"] != "admin") {
	
	  
	header("location: ../login.php");
	echo "session role не установлено".($_SESSION["role"]);
	//exit();
	}
  
if(!isset($_POST["login"]) && !isset($_POST["pass"]) && !isset($_POST["rights"])  && !isset($_POST["FIO"])){
	echo "Чёто не до введено";
	exit();
}


$log = "SELECT * FROM `users` WHERE `login` = '".$_POST['login']."'";
// $log - это генерация sql-запроса, но без выполнения

file_put_contents("check.txt", $log."\r\n", FILE_APPEND);
// запишем запрос в лог.

require_once("../includes/connection.php"); // эта фигня делает соединение с бд

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


mysql_query("SET NAMES utf8"); // просто херачим запрос для utf8 кириллицы


$query = mysql_query($log); // делаем переменную с  запросом в mysql, типа 4
$result=mysql_num_rows($query); // функция считает из выполнения mysql_query($log) количество рядов

// file_put_contents("check.txt", "mysqli_query($log)".$result."\r\n", FILE_APPEND);
// file_put_contents("check.txt", "mysql_num_rows($result)".$result."\r\n", FILE_APPEND);


if($result > 0)
    {
        echo "Логин занят ";
		?> <hr><a onclick="javascript:history.back(-2); return false;">Назад</a><?
        exit();
    }
    else
    {
		$pass = md5($_POST['pass']);
        echo "логин свободен";
		mysql_query("INSERT INTO `users`(`login`, `pass`, `rights`, `FIO`, `position`) VALUES ('".$_POST['login']."','". $pass ."','".$_POST['rights']."','".$_POST['FIO']."','".$_POST['position']."')") or die("Invalid query: " . mysql_error());;
    }




		echo "Added";

 

?>
<hr>
<a onclick="javascript:history.back(-2); return false;">Назад</a>