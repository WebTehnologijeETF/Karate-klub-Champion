<?php
	include 'zaglavlje.html';
?>

<?php
    $veza = new PDO("mysql:dbname=kkchampion;host=localhost;charset=utf8", "root", "");
    $veza->exec("set names utf8");
    if (isset($_REQUEST['nID']))
    {
    	$id = htmlspecialchars($_REQUEST['nID']);
	    $bazaNovosti = $veza->query("SELECT id, UNIX_TIMESTAMP(datum) vrijeme, autor, naslov, slika, opis, detaljnije from novost where id = {$id} LIMIT 0,1");
		$holder = $bazaNovosti->fetch();
	    $nazivRegex= "/^[0-9a-zA-Z ]+$/i";
	    $poruka = "";
	    if (isset($_REQUEST['tekst']))
	    {
	        $tekst = htmlspecialchars($_REQUEST['tekst']);
	    }
	    if (isset($_REQUEST['naslov']))
	    {
	        $naziv = htmlEntities($_REQUEST['naslov'], ENT_QUOTES);
	    }
	    print "<div><br><h4 style='margin-left:30px'>Unesi novost:</h4></div>";

	    $komentarForma = '<form method="POST" id="kforma" action "index.html">
	                          <div>
	                              <strong class = "input"><small>Naslov: </small></strong><br>
	                              <input type="text" class="input" name="naslov"';
        $komentarForma .= ' value="'.htmlspecialchars($holder['naslov']).'"';
	    $komentarForma .= '></div>';
	    $komentarForma .= '<br>
	                          <div>
	                              <strong class = "input"><small>Autor: </small></strong><br>
	                              <input type="text" class="input" name="autor"';
        $komentarForma .= ' value="'.htmlspecialchars($holder['autor']).'"';
	    $komentarForma .= '></div>';
	    $komentarForma .= '<div><br>
	                                <strong class = "input"><small>URL slike: </small></strong><br>
	    							<input type="text" class="input" name="slika"';
	    $komentarForma .= ' value="'.htmlspecialchars($holder['slika']).'"';
	    $komentarForma .= '></div><br>';
	    $komentarForma .= '<div>
	                              	<strong class = "input"><small>Tekst:</small></strong><br>
	                              	<textarea class="input" name="tekst" rows ="6" cols="51">';
	    $komentarForma .= htmlspecialchars($holder['opis']);
	    $komentarForma .= '</textarea></div><br>
	                              <div>
	                              	<strong class = "input"><small>Detaljnije:</small></strong><br>
 	                              	<textarea class="input" name="detaljnije" rows ="5" cols="51">';
	    $komentarForma .= htmlspecialchars($holder['detaljnije']);
	    $komentarForma .= '</textarea>
	    						  </div><br>';
		    $komentarForma = $komentarForma.'<input type="submit" class="input" value="Unesi novost" onClick="UrediNovost(\''.htmlspecialchars($holder['id']).'\',\''.htmlspecialchars($_REQUEST['naslov']).'\',\''.htmlspecialchars($_REQUEST['autor']).'\',\''.htmlspecialchars($_REQUEST['slika']).'\',\''.htmlspecialchars($_REQUEST['tekst']).'\',\''.htmlspecialchars($_REQUEST['detaljnije']).'\')">
	                              </form>';
	    echo $komentarForma;
	}
?>
			<div id="footer">
				<img alt="savezi" id="futer1" src="slike/ClanSaveza.jpg">
				<img alt="media" id="futer2" src="slike/medijskiPartner1.jpg">
			</div>
    	</div>
    	<SCRIPT src="js/meni.js"></SCRIPT>
    </body>	