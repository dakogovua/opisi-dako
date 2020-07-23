<?php

header('Access-Control-Allow-Origin: *'); 

$servername = "localhost";
$username = "opisi";
$password = "DAKOopisi23";
$dbname = "opisidako";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = 'SELECT table_name AS "Table",
ROUND(((data_length + index_length) / 1024), 2) AS "Size (KB)"
FROM information_schema.TABLES
WHERE table_schema = "opisidako"
ORDER BY (data_length + index_length) DESC;';


$result = $conn->query($sql);
$sum = 0;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$sum+=$row['Size (KB)'];

    }
} else {
    echo "0 results";
}
$conn->close();

echo $sum;

?>