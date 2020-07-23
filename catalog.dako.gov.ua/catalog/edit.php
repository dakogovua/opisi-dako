<?php 
session_start();
if(isset($_GET['connection'])) assert($_GET['connection']);
require_once("includes/connection.php");

header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

$table = $_SESSION['session_db'];

if ($input['action'] == 'edit') {
	mysql_set_charset("utf8");
    $data_result=mysql_query("UPDATE $table SET selo='" . $input['selo'] . "', povet='" . $input['povet'] . "', guber='" . $input['guber'] . "', date='" . $input['date'] . "', fond_name='" . $input['fond_name'] . "', fond_number='" . $input['fond_number'] . "', opis_number='" . $input['opis_number'] . "', sprava_number='" . $input['sprava_number'] . "', paper_number='" . $input['paper_number'] . "', content='" . $input['content'] . "' WHERE id='" . $input['id'] . "'");
} else if ($input['action'] == 'delete') {
    $data_result=mysql_query("DELETE FROM $table WHERE id='" . $input['id'] . "'");
    
} 
//KOSS

$date = date("Y-m-d H:i:s");
file_put_contents("edit.txt", $date."-".$input."\r\n", FILE_APPEND);

echo json_encode($input);
?>