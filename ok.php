<div id="forma">
	<h3>Provjerite da li ste ispravno popunili kontakt formu!</h3>
	<br>
	<div id="provjeraUnosa">
		<p> <strong> <?php print "Ime i prezime: </strong>".htmlspecialchars($_REQUEST['naziv']) ?></p>
		<p> <strong> <?php print "E-mail: </strong>".htmlspecialchars($_REQUEST['mail']) ?></p>
		<p> <strong> <?php print "Kontakt telefon: </strong>".htmlspecialchars($_REQUEST['telefon']) ?></p>
		<p> <strong> <?php print "Predmet poruke </strong>".htmlspecialchars($_REQUEST['predmet']) ?></p>
<!--		<p> <strong> <?php //print "Datum: </strong>".$_REQUEST['datum'] ?></p> -->
		<p> <strong> <?php print "Tekst poruke: </strong>".htmlspecialchars($_REQUEST['area']) ?></p>
	</div>
	<br>
	<h4>Da li ste sigurni da želite poslati ove podatke?</h4>
	<br>
	<form class="forma" method="POST" action="mailMe.php">
		<input class="input" id="dugme" type="submit" value="Siguran sam">
	</form>
	<br><br>
	<form method="POST" action="kontaktstranica.php" id="kforma">
		<strong>Ime i prezime pošiljaoca:</strong><br>
		<input class="input" id ="naziv" name="naziv" type="text" maxlength="50" value="<?php if(isset($_REQUEST['naziv'])) {print htmlspecialchars($_REQUEST['naziv']);} ?>">
		<br><br>
		<strong>Email adresa: (opcionalno)</strong><br>
		<input class="input" id="mail" name="mail" type="email" maxlength="50" value="<?php if (isset($_REQUEST['mail'])) {print htmlspecialchars($_REQUEST['mail']);} ?>">
		<br><br>
		<strong>Kontakt telefon: (*)</strong><br>
		<input class="input" type="tel" id="telefon" name="telefon" maxlength="50" value="<?php if (isset($_REQUEST['telefon'])) {print htmlspecialchars($_REQUEST['telefon']);} ?>">
		<br><br>
		<strong>Predmet poruke: (*)</strong><br>
		<input class="input" id="predmet" name="predmet" type="text" maxlength="50" value="<?php if (isset($_REQUEST['predmet'])) {print htmlspecialchars($_REQUEST['predmet']);} ?>">
		<br><br>
		<div class="greskaj"><strong>Današnji datum:</strong></div>
		<input class="input" type="date" name ="datum" value="2015-04-16" min="2015-04-16" max="2015-12-31">
		<br><br><br>
        <div class="greskaj"><strong>Mjesto:</strong></div>
        <input class ="input" type="text" maxlength="20" id="mjesto"><p id="uslov"></p>
        <br>
        <div class="greskaj"><strong>Postanski broj:</strong></div>
        <input class ="input" type="text" maxlength="20" id="posta"><p id="uslov"></p>
        <br><br>
			<div id="greska"><?php print $poruka?></div>
		<div class="greskaj"><strong>Tekst poruke:</strong></div>
		<textarea class="input" id="area" name="area" rows ="10" cols="51"><?php if (isset($_REQUEST['area'])) {print htmlspecialchars($_REQUEST['area']);} ?></textarea>
		<br><br>
		<input class="input" id="dugme" type="submit" value="Posalji"> <!--onclick="return validacijaKontaktForme()"> -->
	</form>
</div>