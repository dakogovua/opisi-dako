<?php
require("constants.php");

$con = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die("Cannot select DB");
	mysql_query("SET NAMES utf8");

// $date = date("Y-m-d H:i:s");

?>