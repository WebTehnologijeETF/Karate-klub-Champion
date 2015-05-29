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
	    $emailV = 0;
	    $nazivV = 0;
	    $nazivRegex= "/^[0-9a-zA-Z ]+$/i";
	    $poruka = "";
	    if (isset($_REQUEST['tekst']))
	    {
	        $tekst = htmlspecialchars($_REQUEST['tekst']);
	    }
	    if (!isset($_REQUEST['naslov']))
	    {
	        $_REQUEST['naslov'] = $holder['naslov'];
	    }
	    if (!isset($_REQUEST['autor']))
	    {
	        $_REQUEST['autor'] = $holder['autor'];
	    }
	    if (!isset($_REQUEST['slika']))
	    {
	    	$_REQUEST['slika'] = $holder['slika'];
	    }
	    if (!isset($_REQUEST['tekst']))
	    {
	    	$_REQUEST['tekst'] = $holder['opis'];
	    }
	    if (!isset($_REQUEST['detaljnije']))
	    {
	    	$_REQUEST['detaljnije'] = $holder['detaljnije'];
	    }
	    if (isset($_REQUEST['naslov']))
	    {
	        $naziv = htmlEntities($_REQUEST['naslov'], ENT_QUOTES);
	        if($_REQUEST['naslov'] == "" || ctype_space($_REQUEST['naslov']) || ($_REQUEST['naslov'] != 0 && preg_match($nazivRegex, $naziv)))
	        {
//	            $nazivV = 1;
	            $poruka = "FORMAT NASLOVA NIJE ADEKVATAN";
	        }
	    }
	    if (isset($_REQUEST['autor']) && $_REQUEST['autor'] != "" && $nazivV == 0)
	    {
	        $mail = htmlEntities($_REQUEST['autor'], ENT_QUOTES);
	        if (!preg_match($nazivRegex, $mail))
	        {
	            $emailV = 1;
	            $poruka = "FORMAT NAZIVA NIJE ADEKVATAN";
	        }
	    }
	    print "<div><br><h4 style='margin-left:30px'>Unesi novost:</h4></div>";


	    $komentarForma = '<form method="POST" action="index.html" id="kforma">
	                          <div>
	                              <strong class = "input"><small>Naslov: </small></strong><br>
	                              <input type="text" class="input" name="naslov"';
	        $komentarForma = $komentarForma.' value="'.htmlspecialchars($holder['naslov']).'"';
	    $komentarForma = $komentarForma.'></div>';
	    $komentarForma = $komentarForma."<br>
	                          <div>
	                              <strong class = 'input'><small>Autor: </small></strong><br>
	                              <input type='text' class='input' name='autor'";
        $komentarForma = $komentarForma.' value="'.htmlspecialchars($holder['autor']).'"';
	    $komentarForma = $komentarForma.'></div>';
	    $komentarForma = $komentarForma."<div><br>
	                                <strong class = 'input'><small>URL slike: </small></strong><br>
	    							<input type='text' class='input' name='slika'";
	    $komentarForma .= " value='".htmlspecialchars($holder['slika'])."'";
	    $komentarForma = $komentarForma."></div><br>";
	    $komentarForma = $komentarForma."
	    						  <div>
	                              	<strong class = 'input'><small>Tekst:</small></strong><br>
	                              	<textarea class='input' name='tekst' rows ='6' cols='51'>";
	    $komentarForma .= htmlspecialchars($holder['opis']);
	    $komentarForma .="</textarea></div><br>
	                              <div>
	                              	<strong class = 'input'><small>Detaljnije:</small></strong><br>
 	                              	<textarea class='input' name='detaljnije' rows ='5' cols='51'>";
	    $komentarForma .= htmlspecialchars($holder['detaljnije']);
	    $komentarForma .= "</textarea>
	    						  </div><br>";
	    $komentarForma = $komentarForma."<input type='submit' class='input' value='Unesi novost'>
	                              </form>";
	    echo $komentarForma;
	}
?>


<?php
	if($emailV == 0 && $nazivV == 0 && isset($_REQUEST['tekst']) && isset($_REQUEST['slika']) && isset($_REQUEST['detaljnije']) && isset($_REQUEST['autor']) && isset($_REQUEST['naslov']))
    {
   	    echo $emailV." ".$nazivV;
    	$id = htmlspecialchars($_REQUEST['nID']);	    	
        $autorU = htmlspecialchars($_REQUEST['autor']);
        $tekstU = htmlspecialchars($_REQUEST['tekst']);
        $mailU = htmlspecialchars($_REQUEST['naslov']);
        $slikaU = htmlspecialchars($_REQUEST['slika']);
        $detaljU = htmlspecialchars($_REQUEST['detaljnije']);
        if ($autorU != "")
        {
        	$upis = $veza->query("UPDATE novost set autor = '{$autorU}' where id = {$id}");
        }
        if ($tekstU != "")
        {
        	$upis = $veza->query("UPDATE novost set opis = '{$tekstU}' where id = {$id}");
        }
        if ($slikaU != "")
        {
        	$upis = $veza->query("UPDATE novost set slika = '{$slikaU}' where id = {$id}");
        }
        if ($mailU != "")
        {
        	$upis = $veza->query("UPDATE novost set naslov = '{$mailU}' where id = {$id}");
        }
        if ($detaljU != "")
        {
        	$upis = $veza->query("UPDATE novost set autor = '{$detaljU}' where id = {$id}");
        }
    }
?>

			<div id="footer">
				<img alt="savezi" id="futer1" src="slike/ClanSaveza.jpg">
				<img alt="media" id="futer2" src="slike/medijskiPartner1.jpg">
			</div>
    	</div>
    	<SCRIPT src="js/meni.js"></SCRIPT>
    </body>	