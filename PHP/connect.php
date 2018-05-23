<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "vesti";


$conn = mysqli_connect($serverName, $username, $password, $dbName);

if(!$conn){
	die("Veza nije uspela: ".mysqli_connect_error());
}

?>