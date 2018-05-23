<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		require 'connect.php';
		$query = "DELETE FROM `komentari` WHERE `komentari`.`ID` = '{$id}'";
		mysqli_query($conn, $query);
		header("Location: /Vesti/index.php");
		
	}