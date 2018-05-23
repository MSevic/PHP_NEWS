<?php
session_start();
$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
?>
<!DOCTYPE HTML>
<head>
<title> Vesti </title>
<link rel="stylesheet" type="text/css" href="../css/Style.css">
</head>
<body>
<header>
<!--dobrodosli u vesti-->
<h1>Dodavanje nove Vesti</h1>
</header>
<nav>
<!--ovde je samo navigacija, dodavanje je u artiklu-->
<a href="../index.php">Povratak</a>
</nav>
<article align="middle" id="art">
<!--ovde se nalazi naredba bazi-->
<p>========================================</p>
<section>

					<form action="#" method="POST">
					<input type="text" name="Naslov" placeholder="Naslov"/>
					<p><textarea rows="4" cols="60" placeholder="Ovde upisite vest" name="Vest"></textarea></p>
					<input type="submit" name="Dodaj" value="Dodaj"/>
					</form>
<p>========================================</p>
</section>
<section id="poruka">
	<?php
	if($_SESSION['userAgent'] == $_SERVER['HTTP_USER_AGENT'])
{
		if(isset($_POST['Naslov'])){
						$Naslov= htmlentities(trim($_POST['Naslov']));
						$Vest = htmlentities(trim($_POST['Vest']));
						$Autor = htmlentities(trim($_SESSION['uname']));
						require 'connect.php';
						$Vest = mysqli_real_escape_string($conn, $Vest);
						$Autor = mysqli_real_escape_string($conn, $Autor);
						if(!empty($_POST['Vest'])){
						$query = "INSERT INTO vesti (Naslov, Autor, Vest) VALUES ('{$Naslov}', '{$Autor}', '{$Vest}')";
						}
						if(mysqli_query($conn, $query) === TRUE){
							echo "Nova vest uspešno dodata";
						}else{echo "Greska";}
						$Komentar= "";
						$_SESSION['status']="admin";
						
					}
}
	?>
</section>
</article>
</body>