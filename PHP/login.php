<?php
require 'connect.php';
if($_SESSION['userAgent'] == $_SERVER['HTTP_USER_AGENT'])
{
if(isset($_POST['login'])){
	if(!empty($_POST['uname'])){
		$Uname = htmlentities(trim($_POST['uname']));
		$Uname = mysqli_real_escape_string($conn, $Uname);
		$query = "SELECT * FROM users WHERE Uname LIKE '%{$Uname}%'";
		$result = mysqli_query($conn, $query);
		$resAssoc =  mysqli_fetch_assoc($result);
		$PassB = $resAssoc['Pass'];
		$PassA = htmlentities(trim($_POST['pword']));
		if($PassA==$PassB){
			
			switch ($resAssoc['Admin']){
				case 1:
				$_SESSION['status']="admin";
				$_SESSION['uname']=$resAssoc['Uname'];
				break;
				
				case 2:
				$_SESSION['status']="korisnik";
				$_SESSION['uname']=$resAssoc['Uname'];
				break;
				
				default:
				$_SESSION['status']="posmatrac";
				$_SESSION['uname']= "posmatrac";
				break;
				}
				
		}else{ 
				$_SESSION['status']="posmatrac";
				$_SESSION['uname']= "posmatrac";
		}
		
		}
		else{
			$_SESSION['status']="posmatrac";
			$_SESSION['uname']= "posmatrac";
			echo 'uneti korisničko ime';
		}
}
}
?>