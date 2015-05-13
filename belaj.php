<div id="forma">
	<form method="POST" action="kontaktstranica.php" id="kforma">
		<strong>Ime i prezime pošiljaoca:</strong><br>
		<input class="input" id ="naziv" name="naziv" type="text" maxlength="50" value="<?php if(isset($_REQUEST['naziv'])) {print htmlspecialchars($_REQUEST['naziv']);} ?>">
		<div id="greska1" class="greskai"><?php if($nazivV==1){ print '<img style="width:12px;height:12px;" src="slike/greska.png" alt="belaj">';}  ?></div>
		<br><br>
		<strong>Email adresa: (opcionalno)</strong><br>
		<input class="input" id="mail" name="mail" type="email" maxlength="50" value="<?php if (isset($_REQUEST['mail'])) {print htmlspecialchars($_REQUEST['mail']);} ?>">
		<div id="greska2" class="greskai"><?php if($emailV==1){ print '<img style="width:12px;height:12px;" src="slike/greska.png" alt="belaj">';}  ?></div>
		<br><br>
		<strong>Kontakt telefon: (*)</strong><br>
		<input class="input" type="tel" id="telefon" name="telefon" maxlength="50" value="<?php if (isset($_REQUEST['telefon'])) {print htmlspecialchars($_REQUEST['telefon']);} ?>">
		<div id="greska3" class="greskai"><?php if($telefonV==1){ print '<img style="width:12px;height:12px;" src="slike/greska.png" alt="belaj">';}  ?></div>
		<br><br>
		<strong>Predmet poruke: (*)</strong><br>
		<input class="input" id="predmet" name="predmet" type="text" maxlength="50" value="<?php if (isset($_REQUEST['predmet'])) {print htmlspecialchars($_REQUEST['predmet']);} ?>">
		<div id="greska4" class="greskai"><?php if($predmetV==1){ print '<img style="width:12px;height:12px;" src="slike/greska.png" alt="belaj">';}  ?></div>
		<br><br>
		<div class="greskaj"><strong>Današnji datum:</strong></div>
		<input class="input" type="date" value="2015-04-16" min="2015-04-16" max="2015-12-31">
		<br><br><br>
        <div class="greskaj"><strong>Mjesto:</strong></div>
        <input class ="input" type="text" maxlength="20" id="mjesto"><p id="uslov"></p>
        <br>
        <div class="greskaj"><strong>Postanski broj:</strong></div>
        <input class ="input" type="text" maxlength="20" id="posta"><p id="uslov"></p>
        <br><br>
		<strong>Ponovi dati niz znakova: (*)</strong><br>
		<input class="input" id="string1" name="string1" type="text" value="<?php if (isset($_REQUEST['string1'])) {print $_REQUEST['string1'];} ?>" ><br><br>
		<input class="input" id="string2" name="string2" type="text" maxlength="6"  value="<?php if (isset($_REQUEST['string2'])) {print $_REQUEST['string2'];} ?>">
		<div id="greska5" class="greskai"><?php if($porediV==1){ print '<img style="width:12px;height:12px;" src="slike/greska.png" alt="belaj">';}  ?></div>
		<br><br>
			<div id="greska"><?php print $poruka?></div>
		<div class="greskaj"><strong>Tekst poruke:</strong></div>
		<textarea class="input" id="area" name="area" rows ="10" cols="51" ><?php if (isset($_REQUEST['area'])) {print htmlspecialchars($_REQUEST['tekst']);} ?></textarea>
		<br><br>
		<input class="input" id="dugme" type="submit" value="Posalji"> <!--onclick="return validacijaKontaktForme()"> -->
	</form>
</div>