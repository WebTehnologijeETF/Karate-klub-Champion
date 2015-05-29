<?php
    ini_set ("display_errors", 1);
    session_start();
    //session_destroy();
// VALIDACIJA FORME ZA KOMENTARE
    $emailV = 0;
    $nazivV = 0;
    $nazivRegex= "/^[0-9a-zA-Z ]+$/i";
    $emailRegex='/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
    $poruka = "";
    if(isset($_REQUEST['autor']))
    {
        $tekst = htmlspecialchars($_REQUEST['tekst']);
    }
    if (!isset($_REQUEST['autor']))
    {
        $_REQUEST['autor'] = "";
    }
    if (!isset($_REQUEST['mail']))
    {
        $_REQUEST['mail'] = "";
    }
    if (isset($_REQUEST['autor']))
    {
        $naziv = htmlEntities($_REQUEST['autor'], ENT_QUOTES);
        if($_REQUEST['autor'] == "" || ctype_space($_REQUEST['autor']) || ($_REQUEST['autor'] != 0 && preg_match($nazivRegex, $naziv)))
        {
            $nazivV = 1;
            $poruka = "FORMAT IMENA NIJE ADEKVATAN";
        }
    }
    if (isset($_REQUEST['mail']) && $_REQUEST['mail'] != "" && $nazivV == 0)
    {
        $mail = htmlEntities($_REQUEST['mail'], ENT_QUOTES);
        if (!preg_match($emailRegex, $mail))
        {
            $emailV = 1;
            $poruka = "FORMAT E-MAIL ADRESE NIJE ADEKVATAN";
        }
    }
?>

<?php
    $id = htmlspecialchars($_REQUEST['novostID']);
    
    $veza = new PDO("mysql:dbname=kkchampion;host=localhost;charset=utf8", "root", "");
    $veza->exec("set names utf8");
    
    $bazaNovosti = $veza->query("SELECT id, UNIX_TIMESTAMP(datum) vrijeme, autor, naslov, slika, opis, detaljnije from novost where id=".$id)->fetchAll();
    $datum = $bazaNovosti[0]['vrijeme'];
    $format = 'd.m.Y H:i:s';
    $datum = date ($format, $datum);
    $autor = $bazaNovosti[0]['autor'];
    $naslov = $bazaNovosti[0]['naslov'];
    $slika = $bazaNovosti[0]['slika'];
    $opis = $bazaNovosti[0]['opis'];
    $detaljnije = $bazaNovosti[0]['detaljnije'];

    $komentari = $veza->query("SELECT id, tekst, autor, UNIX_TIMESTAMP(datum) vrijemeK, email, novost from komentar where novost =".$id." order by datum desc");

    $greskaTekst = "";
    $bool = 0;
    if ($bazaNovosti == false) {
        $bool = 1;
    }
    if($komentari == false){
        $bool = 1;
    }
    if ($bool == 1)
    {
        $greska = $veza->errorInfo();
        $greskaTekst = "SQL greska: ".$greska[2];
        print $greskaTekst;
        exit();
    }
// ISPIS NOVOSTI IZ BAZE
    $novostiDiv ='<div class="intro">
        <h2 class="naslovi">'.htmlspecialchars($naslov).'</h2>
        <br>
        <img src="'.htmlspecialchars($slika).'" class="novostslika" alt="novostslika">
        '.htmlspecialchars($opis).'<br><br>
        <a href="#" class="datum">'.htmlspecialchars($datum).'</a>
        <a href="#" class="autor">'.htmlspecialchars($autor).'</a></div>';

    echo $novostiDiv;


// FORMA ZA UNOS KOMENTARA
    print "<div><br><h4 style='margin-left:30px'>Ostavi komentar:</h4></div>";

    $komentarForma = '<div> <form method="POST" action="komentari2.php" id="kforma">
                          <div>
                              <input type="hidden" name="novostID" value="'.htmlspecialchars($id).'">
                          </div>
                          <div>
                              <strong class = "input"><small>Ime pošiljaoca: *</small></strong><br>
                              <input type="text" class="input" name="autor"';
    if(isset($_REQUEST['autor']) && $nazivV == 0) 
    {
        $komentarForma = $komentarForma.' value="'.htmlspecialchars($_REQUEST['autor']).'"';
    } 
    $komentarForma = $komentarForma.'></div>';
    if($nazivV==1)
    { 
        $komentarForma = $komentarForma.'<div id="greska2" class="greskai"><img style="width:12px;height:12px;" src="slike/greska.png" alt="belaj"></div>';
    }  
    $komentarForma = $komentarForma."<br>
                          <div>
                              <strong class = 'input'><small>E-mail adresa: (opcionalno)</small></strong><br>
                              <input type='text' class='input' name='mail'";
    if(isset($_REQUEST['mail']) && $emailV == 0) 
    {
        $komentarForma = $komentarForma.' value="'.htmlspecialchars($_REQUEST['mail']).'"';
    }
    $komentarForma = $komentarForma.'></div>';
    if($emailV==1)
    {
        $komentarForma = $komentarForma.'<div id="greska2" class="greskai"><img style="width:12px;height:12px;" src="slike/greska.png" alt="belaj"></div><br>';        
    }
    if($nazivV==1 || $emailV==1)
    {
        $komentarForma = $komentarForma.'<div id="greska">'.htmlspecialchars($poruka).'</div>';
    }
    $komentarForma = $komentarForma."<div>
                              <strong class = 'input'><small>Komentar:</small></strong><br>
                              <textarea class='input' name='tekst' rows ='10' cols='51' ";
    $komentarForma = $komentarForma."></textarea></div><br>";
    $komentarForma = $komentarForma."<input type='submit' class='input' value='Ostavi komentar'>
                              </form></div>";
    echo $komentarForma;    
  
// ISPIS POSTOJECIH KOMENTARA
    print "<div><br><h4 style='margin-left:30px'>Komentari:</h4></div>";
    $komentariDiv ="";
    foreach($komentari as $komentar){
        $format = 'd.m.Y H:i:s';
        $datumKomentar = $komentar['vrijemeK'];
        $datumK = date ($format, $datumKomentar);
        $autorK = $komentar['autor'];
        $tekstK = $komentar['tekst'];
        $emailK = $komentar['email'];
        $komentariDiv = '<div ><div class="intro" style="height:140px">';
        if($emailK != "")
        {
            $komentariDiv = $komentariDiv.'<h3><a class="autor" href="mailto:'.htmlspecialchars($emailK).'">'.htmlspecialchars($autorK).'</a></h3>';
        }
        else
        {
            $komentariDiv = $komentariDiv.'<h3>'.htmlspecialchars($autorK).'</h3>';
        }

        $dugmic_za_brisanje = '';
        if(isset($_SESSION['username'])){
            $dugmic_za_brisanje .= '<a href="#" onClick="ObrisiKomentar('.htmlspecialchars($komentar['id']).')" >Obrisi komentar</a>';
        }

        $komentariDiv = $komentariDiv.'<br><br>
            '.htmlspecialchars($tekstK).'
            <a href="#" class="detaljnije">'.htmlspecialchars($datumK).'</a>
            <br>
            <br>
            <a href="#" class="detaljnije">'.htmlspecialchars($emailK).'</a>
            '.$dugmic_za_brisanje.'
            </div></div>';
        echo $komentariDiv;
    }

    
?>
<?php
    if(isset($_REQUEST['tekst']) && trim($_REQUEST['tekst']) != " " && $emailV == 0 && $nazivV == 0)
    {
        $autorU = trim($_REQUEST['autor']);
        $tekstU = trim($_REQUEST['tekst']);
        $mailU = trim($_REQUEST['mail']);
        $novostU = trim($_REQUEST['novostID']);
        $upis = $veza->query("INSERT into komentar (autor, tekst, email, novost) values('".htmlspecialchars($autorU)."','".htmlspecialchars($tekstU)."','".htmlspecialchars($mailU)."','".htmlspecialchars($novostU)."')");
        header("Location: index.html");
    }
?>

        <div id="footer">
            <img alt="savezi" id="futer1" src="slike/ClanSaveza.jpg">
            <img alt="media" id="futer2" src="slike/medijskiPartner1.jpg">
        </div>
    </div>
    <SCRIPT src="js/meni.js"></SCRIPT> 
</body>