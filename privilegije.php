
<?php
// DODAJ NOVOST
	echo '<br><br><div style="margin-left:30px"><strong><h3>Opcije: </h3></strong></div>';
	$ispis = '<br><br><form>
				<input style="margin-left:50px" type="radio" name="opcija" value="dodajN"> Dodaj novost
				<br>
			</form>';
	//echo $ispis;
		include 'dodajnovost.php';
	echo "<br><br><br>";
		include 'dodajkorisnika.php';
	echo "<br><br><br>";
		include 'obrisiadmina.php';
?>