<?php

    $veza = new PDO("mysql:dbname=kkchampion;host=localhost;charset=utf8", "root", "");
    $veza->exec("set names utf8");
    
    $emailV = 0;
    $nazivV = 0;
    $nazivRegex= "/^[0-9a-zA-Z ]+$/i";
    $emailRegex='/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
    $poruka = "";
    if(isset($_REQUEST['autor']))
    {
        $tekst = htmlspecialchars($_REQUEST['tekst']);
    }
    if (!isset($_REQUEST['naslov']))
    {
        $_REQUEST['naslov'] = "";
    }
    if (!isset($_REQUEST['autor']))
    {
        $_REQUEST['autor'] = "";
    }
    if (isset($_REQUEST['naslov']))
    {
        $naziv = htmlEntities($_REQUEST['naslov'], ENT_QUOTES);
        if($_REQUEST['naslov'] == "" || ctype_space($_REQUEST['naslov']) || ($_REQUEST['naslov'] != 0 && preg_match($nazivRegex, $naziv)))
        {
            $nazivV = 1;
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


    $komentarForma = '<div> <form method="POST" action="adminpanel.php" id="kforma">
                          <div>
                              <strong class = "input"><small>Naslov: </small></strong><br>
                              <input type="text" class="input" name="naslov"';
        $komentarForma = $komentarForma.' value="'.htmlspecialchars($_REQUEST['naslov']).'"';
    $komentarForma = $komentarForma.'></div>';
    $komentarForma = $komentarForma."<br>
                          <div>
                              <strong class = 'input'><small>Autor: </small></strong><br>
                              <input type='text' class='input' name='autor'";
    if(isset($_REQUEST['autor']) && $emailV == 0) 
    {
        $komentarForma = $komentarForma.' value="'.htmlspecialchars($_REQUEST['autor']).'"';
    }
    $komentarForma = $komentarForma.'></div>';
    $komentarForma = $komentarForma."<div><br>
                                <strong class = 'input'><small>URL slike: </small></strong><br>
    							<input type='text' class='input' name='slika'>
    						  </div><br>";
    $komentarForma = $komentarForma."
    						  <div>
                              <strong class = 'input'><small>Tekst:</small></strong><br>
                              <textarea class='input' name='tekst' rows ='6' cols='51'></textarea></div><br>
                              <div>
                              <strong class = 'input'><small>Detaljnije:</small></strong><br>
                              <textarea class='input' name='detaljnije' rows ='5' cols='51'></textarea></div><br> ";

    $komentarForma = $komentarForma."<input type='submit' class='input' value='Unesi novost'>
                              </form></div>";
    echo $komentarForma;
    if($emailV == 0 && $nazivV == 0)
    {
    	echo "kloc";
        $autorU = trim($_REQUEST['autor']);
        $tekstU = trim($_REQUEST['tekst']);
        $mailU = trim($_REQUEST['naslov']);
        $slikaU = trim($_REQUEST['slika']);
        $detaljU = trim($_REQUEST['detaljnije']);
        $upis = $veza->query("INSERT into novost (autor, slika, opis, naslov, detaljnije) values('".htmlspecialchars($autorU)."','".htmlspecialchars($slikaU)."','".htmlspecialchars($tekstU)."','".htmlspecialchars($mailU)."','".htmlspecialchars($detaljU)."')");
        header("Location: index.html");
    }

?>