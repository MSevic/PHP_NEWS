<?php
session_start();
$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
?>
<!DOCTYPE HTML>
<head>
<title> Vesti </title>
<link rel="stylesheet" type="text/css" href="../css/Style.css">
<script>
var check = function() {
  if (document.getElementById('password').value == document.getElementById('password2').value) 
	{
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password je isti';
	} else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password nije isti';
	}
}
</script>
</head>
<body>
<header>
<!--dobrodosli u vesti-->
<h1>Dodavanje novog korisnika</h1>
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
	<label> Ime: <br/>
	<input type="text" name="Ime" required/></label><br/>
	<label> Prezime: <br/>
	<input type="text" name="Prezime" required/></label><br/>
	<label> E-mail: <br/>
	<input type="text" name="email" required/></label><br/>
	<label> Username: <br/>
	<input type="text" name="Uname" required/></label><br/>
	<label>Password : <br/>
	<input name="password" id="password" type="password" onkeyup='check();' required/></label><br/>
	<label>Potvrdi password: <br/>
	<input type="password" name="password2" id="password2"  onkeyup='check();' required/> <br/><span id='message'></span> </label><br/><br/>
	<input type="submit" name="insert" value="Dodaj"> <br/>
</form>
<p>========================================</p>
</section>
<section id="poruka">
	<?php
	if($_SESSION['userAgent'] == $_SERVER['HTTP_USER_AGENT'])
{
		if(isset($_POST['insert'])){
					$Ime = htmlentities(trim($_POST['Ime']));
					$Prezime = htmlentities(trim($_POST['Prezime']));
					$email = htmlentities(trim($_POST['email']));
					$Uname = htmlentities(trim($_POST['Uname']));
					$Pass = htmlentities(trim($_POST['password']));
					$Pass2 = htmlentities(trim($_POST['password2']));
					if($Pass==$Pass2){
					require 'connect.php';
					$Ime = mysqli_real_escape_string($conn, $Ime);
					$Prezime = mysqli_real_escape_string($conn, $Prezime);
					$email = mysqli_real_escape_string($conn, $email);
					$Uname = mysqli_real_escape_string($conn, $Uname);
					$Pass = mysqli_real_escape_string($conn, $Pass);
					
					$query = "INSERT INTO users (Uname, Pass, Ime, Prezime, email) VALUES ('{$Uname}','{$Pass}','{$Ime}','{$Prezime}', '{$email}')";
					
					
					if(mysqli_query($conn, $query) === TRUE){
						echo "Novi kontakt uspešno dodat";
					}else{echo "Greska";}
					}else{echo "Passwordi se ne poklapaju";}
		}
}
	?>
</section>
</article>
</body>