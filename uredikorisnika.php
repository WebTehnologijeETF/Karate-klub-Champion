<?php
	include 'zaglavlje.html';
?>

<?php
	$veza = new PDO("mysql:dbname=kkchampion;host=localhost;charset=utf8", "root", "");
    $veza->exec("set names utf8");

    $emailV = 0;
    $nazivV = 0;
    $nazivRegex= "/^[0-9a-zA-Z ]+$/i";
    $emailRegex='/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
    if (!isset($_REQUEST['nalog']))
    {
        $_REQUEST['nalog'] = "";
    }
    if (!isset($_REQUEST['mail']))
    {
        $_REQUEST['mail'] = "";
    }

    if (isset($_REQUEST['nalog']))
    {
        $naziv = htmlEntities($_REQUEST['nalog'], ENT_QUOTES);
        if($_REQUEST['nalog'] == "" || ctype_space($_REQUEST['nalog']) || ($_REQUEST['nalog'] != 0 && preg_match($nazivRegex, $naziv)))
        {
            $nazivV = 1;
            $poruka = "FORMAT nalogA NIJE ADEKVATAN";
        }
    }
    if (isset($_REQUEST['mail']) && $_REQUEST['mail'] != "" && $nazivV == 0)
    {
        $mail = htmlEntities($_REQUEST['mail'], ENT_QUOTES);
        if (!preg_match($emailRegex, $mail))
        {
            $emailV = 1;
            $poruka = "FORMAT NAZIVA NIJE ADEKVATAN";
        }
    }
    print "<div><br><h4 style='margin-left:30px'>Uredi korisnika:</h4></div>";


    $komentarForma = '<div> <form method="POST" action="uredikorisnika.php" id="kforma">
                          <div>
                              <strong class = "input"><small>Username: </small></strong><br>
                              <input type="text" class="input" name="nalog"';
    if(isset($_REQUEST['kID']))
    {
    	$komentarForma = $komentarForma.' value="'.htmlspecialchars($_REQUEST['kID']).'"';
    }
    $komentarForma = $komentarForma.'></div>';

    $komentarForma .= '<br><div>
                              <strong class = "input"><small>Nova sifra: </small></strong><br>
                              <input type="text" class="input" name="pass"';
    if(isset($_REQUEST['pass']))
    {
    	$komentarForma = $komentarForma.' value="'.htmlspecialchars($_REQUEST['pass']).'"';    
    }
	$komentarForma = $komentarForma.'></div>';
    $komentarForma = $komentarForma."<br>
                          <div>
                              <strong class = 'input'><small>Novi e-mail: </small></strong><br>
                              <input type='text' class='input' name='mail'";
    if(isset($_REQUEST['mail']) && $emailV == 0) 
    {
        $komentarForma = $komentarForma.' value="'.htmlspecialchars($_REQUEST['mail']).'"';
    }
    $komentarForma = $komentarForma.'></div><br>';
    $new_pass   = substr(md5(time()), 0, 10);

    $komentarForma = $komentarForma."<input type='submit' class='input' value='Uredi korisnika'>
                              </form></div>";
    echo $komentarForma;

?>

<?php
    if($emailV == 0 && $nazivV == 0)
    {
        $user = htmlspecialchars($_REQUEST['nalog']);
        $mail = htmlspecialchars($_REQUEST['mail']);
        $pass = htmlspecialchars($_REQUEST['pass']);
        if ($mail != "" && $pass != "")
        {
            $upis = $veza->query("UPDATE admin set password = '{$pass}', email = '{$mail}' where username ='{$user}'");
        }
        else if ($mail == "" && $pass !="")
        {
			$upis = $veza->query("UPDATE admin set password = '{$pass}' where username ='{$user}'");	
        }
        else if ($mail !="" && $pass == "")
        {
            $upis = $veza->query("UPDATE admin set email = '{$mail}' where username ='{$user}'");        	
        }
        else
        {
        	echo "Pogrešan unos";
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