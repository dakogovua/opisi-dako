<?php


// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');
require_once("../includes/constants.php");
$input = filter_input_array(INPUT_POST);

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}
$pass = md5($input['pass']);

if ($input['action'] === 'edit') {
		$mysqli->set_charset("utf8");
    $mysqli->query("UPDATE users SET login='" . $input['login'] . "', pass='" . $pass . "', rights='" . $input['rights'] . "', FIO='" . $input['FIO'] . "', position='" . $input['position'] . "' WHERE id='" . $input['id'] . "'");
} else if ($input['action'] === 'delete') {
    $mysqli->query("DELETE FROM users WHERE id='" . $input['id'] . "'");
} else if ($input['action'] === 'restore') {
    $mysqli->query("UPDATE users SET deleted=0 WHERE id='" . $input['id'] . "'");
}
mysqli_close($mysqli);


echo json_encode($input);