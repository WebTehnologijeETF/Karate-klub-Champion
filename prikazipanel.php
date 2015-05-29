<?php
	include 'zaglavlje.html';
?>

<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		$user = $_SESSION['username'];		
		print "<div style='margin-left:40%'>Prijavljeni ste kao ".htmlspecialchars($user)."</div><br><br>";
		echo "<form style='margin-left:44%' method = 'POST' action = 'odjava.php'><input type='submit' name='odjava' value='Odjava'> </form><br><br>";
		include 'privilegije.php';
	}
?>

			<div id="footer">
				<img alt="savezi" id="futer1" src="slike/ClanSaveza.jpg">
				<img alt="media" id="futer2" src="slike/medijskiPartner1.jpg">
			</div>
    	</div>
    	<SCRIPT src="js/meni.js"></SCRIPT>
    </body>