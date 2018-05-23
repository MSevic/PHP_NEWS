<?php
if($_SESSION['userAgent'] == $_SERVER['HTTP_USER_AGENT'])
{
	if($_SESSION['status']=="admin")
	{
		//uspesna autentikacija administratora
		include 'admin.php';
	} elseif($_SESSION['status']=="korisnik")
	{
		//uspesna autentikacija korisnika
		include 'korisnik.php';
	}else
	{
		//uspesna autentikacija posmatrača
		include 'posmatrac.php';
	}
}
?>

