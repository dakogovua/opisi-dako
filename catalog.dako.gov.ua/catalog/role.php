<?php                    

session_start();

if(isset($_SESSION["session_username"]))
 {
 echo $_SESSION['role'];
 }
 else 
 {
 echo "no role set";
 }

?>