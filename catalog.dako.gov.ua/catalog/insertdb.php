<?php
require_once("includes/connection.php"); 
session_start();

// Проверка роли в скрипте
if(isset($_SESSION["session_username"]) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'editor'))
{
new_insert();
}
else echo "role is missmissed";

////////////////////////////
function new_insert() {
 global $date;

    $user = $_SESSION["session_username"];

	$table = $_SESSION['session_db'];
	
	$result = "INSERT INTO `$table`(`guber`, `povet`, `selo`, `content`, `date`, `fond_number`, `fond_name`, `opis_number`, `sprava_number`, `paper_number`,  `date_zapisi`, `user`) VALUES (";

	foreach($_POST as $row){
		$row = mysql_real_escape_string($row); //убираем всякие символы, с которыми мускуэль не дружит
	    $result .=  "'$row'".",";
	}  
	$result .="'$date'".","."'$user'".")";
	//$result = mysql_real_escape_string($result);
	
file_put_contents("callback.jason", $date."-".$result."\r\n", FILE_APPEND);		
	mysql_set_charset("utf8");

	$response = mysql_query($result) or die("Invalid query: " . mysql_error());
    echo $response."Added";
}              
?>