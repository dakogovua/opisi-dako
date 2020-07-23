<?php
require_once("includes/connection.php"); 

//file_put_contents("callback.jason", $date."-".print_r($_POST)."\r\n", FILE_APPEND);

//$id = key($_POST);
$id = $HTTP_RAW_POST_DATA;

userinfo($id);
function userinfo($id) {

global $date;

        $result = "SELECT FIO, position FROM `users` where login = (SELECT user FROM kartochki WHERE id = "."'$id'".")";
        $resultdate = "SELECT date_zapisi FROM kartochki WHERE id = "."'$id'";
	$response = mysql_query($result) or die("Invalid query: " . mysql_error());
	$responsedate = mysql_query($resultdate) or die("Invalid query: " . mysql_error());

//file_put_contents("callback.jason", $date."-".$result."\r\n", FILE_APPEND);		
	$rows = array();



//		while($data = mysql_fetch_array($response)){ Выдало 2 
//		while($data = mysqli_fetch_assoc($response)){  Не сработало вообще
		while($data = mysql_fetch_assoc($response)){  

		 $rows = $data;
		  }
// Добавим дату в json выдачу		

		while($data = mysql_fetch_assoc($responsedate)){  


		$rows += $data;

		  }



//$rows[key($rowsdate)] = $rowsdate[key($rowsdate)];
// print_r($rows);

print json_encode($rows, JSON_UNESCAPED_UNICODE);


}              

?>