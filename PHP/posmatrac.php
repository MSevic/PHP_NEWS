<?php

require 'connect.php';
if($_SESSION['userAgent'] == $_SERVER['HTTP_USER_AGENT'])
{
	$query="SELECT * FROM vesti";
	$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
					//Naslov vesti
					echo "<details><summary><b>".$row['Naslov']."</b> &emsp; &emsp; &emsp; &emsp; by: ".$row['Autor']."</summary>";
					//Vest i podvucena crta pre komentara
					echo "<p>".$row['Vest']."<br/>_________________________________________</p>";
					//Ucitavanje vrednosti za komentare
					$id = $row['ID'];
					$result2 = mysqli_query($conn, "SELECT * FROM komentari WHERE VestID={$id} ORDER BY Vreme DESC");
					//Naslov komentara
					echo "<p><details><summary><b>Komentari (".mysqli_num_rows($result2)."):</b></summary>";
					//za korisnika i admina ovde dodje forma za unos komentara
					//ako ima komentara
					if(mysqli_num_rows($result2) > 0){
							while($row2 = mysqli_fetch_assoc($result2)){
								echo "<p>".$row2['Autor']."&emsp; &emsp;".$row2['Vreme']."<br/>";
								echo $row2['Komentar']."<br/>";
								echo "========================================</p>";
								}
								//kraj komentara
								echo "</details>";
					//ako nema komentara			
					}else{ 
					echo'Nema komentara </details><p>========================================</p>';}
					//kraj vesti
					echo "</p></details>";
			}

		}else{ echo'Nema vesti';}
}



?>