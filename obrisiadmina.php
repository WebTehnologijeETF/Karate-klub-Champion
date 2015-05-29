<?php
	$veza = new PDO("mysql:dbname=kkchampion;host=localhost;charset=utf8", "root", "");
    $veza->exec("set names utf8");
	$username = htmlspecialchars($_SESSION['username']);
    $admin = $veza->query("SELECT username, email from admin where username != '{$username}'");
	$holder = $admin->fetchAll();
	$opis = "<h4 style='margin-left:30px'>Uređivanje korisnika:</h4>";
	echo $opis;
    foreach ($holder as $a) {
		$brisanje = '<a href="#" class="detaljnije" onClick="ObrisiKorisnika('."'".htmlspecialchars($a['username'], ENT_QUOTES)."'".','."'1'".')" >Obrisi korisnika</a>';
		$uredi = '<a href="uredikorisnika.php?kID='.htmlspecialchars($a['username']).'" class="detaljnije">Uredi korisnika</a>';
		$adminDiv ='<br><div class="intro" style="height:100px">
			<h2 class="naslovi">'.htmlspecialchars($a['username']).'</h2>'.$brisanje.'
			<br>
			<a href="#" class="datum">'.htmlspecialchars($a['email']).'</a><br>';
    	$adminDiv .= $uredi;
		echo $adminDiv.'</div><form><br><br>';
    }

?>