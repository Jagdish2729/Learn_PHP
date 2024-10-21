<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname ="player_details";
 
$conn = mysqli_connect($server,$username,$password,$dbname);
if($conn){
   //echo "connection ok";
}else{
   die ("connection failed". mysql_connect_error());
}

?>