<?php
session_start();
$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
?>

<!DOCTYPE html>

<head>
<title> Vesti </title>
<link rel="stylesheet" type="text/css" href="css/Style.css">

</head>
<body>
<header>
<!--dobrodosli u vesti-->
<h1>Vesti iz nesvesti!!!</h1>
</header>
<nav>
<!--ovde se nalaze olazni parametri za login-->
<a href="php/add.php">Novi korisnik</a>
<p>========================================</p>
<form action="#" method="POST">
	<input type="text" name="uname" placeholder="Username">
	<input type="password" name="pword" placeholder="Password">
	<input type="submit" name="login" value="Login">
</form>
<?php include 'php/login.php';
echo $_SESSION['uname']." ";
echo $_SESSION['status'];
?>
</nav>
<article align="middle">
<!--Ovde se nalaze vesti-->
<p>========================================</p>
<?php

	include 'php/getResults.php';
?>
</article>
</body>