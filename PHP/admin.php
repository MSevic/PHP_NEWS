<?php

require 'connect.php';
if($_SESSION['userAgent'] == $_SERVER['HTTP_USER_AGENT']){
	$query="SELECT * FROM vesti ORDER BY Vreme DESC";
	$result = mysqli_query($conn, $query);
		echo "<a href='php/addVest.php'><b>Dodaj vest</b></a><br/>";
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
					//Naslov vesti
					echo "<details><summary><b>".$row['Naslov']."</b> &emsp; &emsp; &emsp; &emsp; by: ".$row['Autor'];
					?>  &emsp; <a href="php/izmeniVest.php?id=<?php echo $row['ID']?>">Izmeni</a>&emsp; <a href="php/obrisiVest.php?id=<?php echo $row['ID']?>">Obriši</a></summary><?php
					//Vest i podvucena crta pre komentara
					echo "<p>".$row['Vest']."<br/>_________________________________________</p>";
					//Ucitavanje vrednosti za komentare
					$id = $row['ID'];
					$result2 = mysqli_query($conn, "SELECT * FROM komentari WHERE VestID={$id} ORDER BY Vreme DESC");
					//Naslov komentara
					echo "<p><details><summary><b>Komentari (".mysqli_num_rows($result2)."):</b></summary>";
					//unos novog komentara
					?> 
					<form action="#" method="POST">
					<textarea rows="2" cols="60" placeholder="Komentar sa najvise 200 karaktera" name="Komentar"></textarea>
					<?php
					echo '<input type="submit" name="Dodaj'.$row['ID'].'" value="Dodaj"/>'
					?>
					</form>
					<?php
					
					if(isset($_POST['Dodaj'.$row['ID']])){
						
						$Komentar = htmlentities(trim($_POST['Komentar']));
						$Autor = htmlentities(trim($_SESSION['uname']));
						$VestIDnew = $row['ID'];
						require 'connect.php';
						$Komentar = mysqli_real_escape_string($conn, $Komentar);
						$Autor = mysqli_real_escape_string($conn, $Autor);
						$VestIDnew = mysqli_real_escape_string($conn, $VestIDnew);
						if(!empty($_POST['Komentar'])){
						$query = "INSERT INTO komentari (Komentar, Autor, VestID) VALUES ('{$Komentar}','{$Autor}','{$VestIDnew}')";
						}
						if(mysqli_query($conn, $query) === TRUE){
							echo "Novi komentar uspešno dodat";
						}else{echo "Greska";}
						$Komentar= "";
						$_SESSION['status']="admin";
						header("Location: /Vesti/index.php");
						
					}
		
					//ako ima komentara
					if(mysqli_num_rows($result2) > 0){
							while($row2 = mysqli_fetch_assoc($result2)){
								echo "<p>".$row2['Autor']."&emsp; &emsp;".$row2['Vreme'];
								?>&emsp; <a href="php/obrisiKomentar.php?id=<?php echo $row2["ID"]?>">Obriši</a><br/><?php
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