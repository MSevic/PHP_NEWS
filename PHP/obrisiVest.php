<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		require 'connect.php';
		$query = "DELETE FROM `vesti` WHERE `vesti`.`ID` = '{$id}'";
		mysqli_query($conn, $query);
		$query = "DELETE FROM `komentari` WHERE `komentari`.`VestID` = '{$id}'";
		mysqli_query($conn, $query);
		header("Location: /Vesti/index.php");
		
	}