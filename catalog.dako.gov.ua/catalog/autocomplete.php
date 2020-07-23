<?php 
require_once("includes/connection.php"); 

$cr = trim($_GET['query']); 
$name = $_GET['name'];
file_put_contents("callback.jason",$date." ". $cr."-".$name."\r\n", FILE_APPEND);
$sql = "SELECT DISTINCT ".$name." FROM kartochki WHERE " . $name . " LIKE '%" . $cr . "%'";

$result = mysql_query($sql); 
$reply = array();
$reply['query'] = $cr;
$reply['suggestions'] = array();

while($row = mysql_fetch_assoc($result)) {
   	$reply['suggestions'][]=$row[$name];
}

echo json_encode($reply);

?>