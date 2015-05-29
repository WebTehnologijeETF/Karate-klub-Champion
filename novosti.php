<!-- NOVOSTI IZ baze -->
<?php 
	session_start();
    $veza = new PDO("mysql:dbname=kkchampion;host=localhost;charset=utf8", "root", "");
    $veza->exec("set names utf8");
    $bazaNovosti = $veza->query("SELECT id, UNIX_TIMESTAMP(datum) vrijeme, autor, naslov, slika, opis, detaljnije from novost order by datum desc");
    $komentar = $veza->query("SELECT id, tekst, autor, UNIX_TIMESTAMP(datum) vrijeme3, tekst, novost from komentar");
    $greskaTekst = "";
    $bool = 0;
    if ($bazaNovosti == false) {
        $bool = 1;
    }
    if($komentar == false){
    	$bool = 1;
    }
    if ($bool == 1)
    {
        $greska = $veza->errorInfo();
        $greskaTekst = "SQL greska: ".$greska[2];
	    print $greskaTekst;
	    exit();
    }
    foreach ($bazaNovosti as $vijest) {
    	$format = 'd.m.Y H:i:s';
    	$datum = trim($vijest['vrijeme']);
    	$datum = date ($format, $vijest['vrijeme']);
	   	
    	$link ="";
    	$detaljnije="";
	    $komentarLink ="";
    	
    	$autor = trim($vijest['autor']);
    	$naslov = trim($vijest['naslov']);
    	$slika = trim($vijest['slika']);
    	$opis = trim($vijest['opis']);
    	$detaljnije = trim($vijest['detaljnije']);
		$novostiDiv ='<div class="intro">
			<h2 class="naslovi">'.$naslov.'</h2>
			<br>
			<img src="'.$slika.'" class="novostslika" alt="novostslika">
			'.$opis.'<br><br>
			<a href="#" class="datum">'.$datum.'</a>
			<a href="#" class="autor">'.$autor.'</a>';
        	$datum = "'".trim(preg_replace('/\s+/', ' ',$vijest['vrijeme']))."'"; 
        	$autor =  "'".trim(preg_replace('/\s+/', ' ',$vijest['autor']))."'";
        	$naslov =  "'".trim(preg_replace('/\s+/', ' ',$vijest['naslov']))."'";
        	$slika =  "'".trim(preg_replace('/\s+/', ' ',$vijest['slika']))."'";
    	    $opis =  "'".trim(preg_replace('/\s+/', ' ',$vijest['opis']))."'";
	        $detaljnije =  "'".trim(preg_replace('/\s+/', ' ',$vijest['detaljnije']))."'";
        if ($detaljnije !="")
        {
			$link = '<a href="#" class="detaljnije" onClick="UcitajDetaljnije('.htmlspecialchars($datum).','.htmlspecialchars($autor).','.htmlspecialchars($naslov).','.htmlspecialchars($slika).','.htmlspecialchars($opis).','.htmlspecialchars($detaljnije).')">Detaljnije...</a>';
        }
        $brisanje = '';
        $uredi = '';
        if(isset($_SESSION['username'])){
            $brisanje .= '<a href="#" class="detaljnije" onClick="ObrisiNovost('.htmlspecialchars($vijest['id']).')" >Obrisi novost</a>';
            $uredi .=  '<a href="uredinovost.php?nID='.htmlspecialchars($vijest['id']).'" class="detaljnije" >Uredi novost</a>';
        }
        $komentarCount = $veza->query("SELECT id from komentar where novost = ".htmlspecialchars($vijest['id']))->fetchAll();
        $count = sizeof($komentarCount);
        $komentarLink = '<a href="#" class="detaljnije" onClick="UcitajKomentare('.$vijest['id'].')">'.$count.' komentara</a>';
        $novostiDiv = $novostiDiv.$link.'<br><br><br>&nbsp;&nbsp;'.$komentarLink.'<br><br><br>'.$uredi.$brisanje.'</div>';
	    echo $novostiDiv;
    }

?>


<!-- NOVOSTI IZ novosti/#.txt -->
<?php
	$novostiDiv="";
	$txtNovosti = glob("novosti/*.txt");

	foreach ($txtNovosti as $txt) 
	{
		$sadrzaj = file($txt);
		$datum = trim($sadrzaj[0]);
		$autor = trim($sadrzaj[1]);
		$naslov = strtolower(trim($sadrzaj[2]));
		$naslov = ucfirst($naslov);
		$slika = trim($sadrzaj[3]);
		$opis = "";
		$detaljnije = "";
		$link = "";
		$i = 4;
		$j = count($sadrzaj);
		while ($j-1 != $i && trim($sadrzaj[$i]) != "--") 
		{
			$opis = $opis.$sadrzaj[$i];
			$i++;
		}
		if(trim($sadrzaj[$i]) == "--")
		{
			$i++;
			while ($i != count($sadrzaj)) 
			{
				$detaljnije = $detaljnije.$sadrzaj[$i];
				$i++;
			}
		}
		$novostiDiv ='<div class="intro">
				<h2 class="naslovi">'.$naslov.'</h2>
				<br>
				<img src="'.$slika.'" class="novostslika" alt="novostslika">
				'.$opis.'<br><br>
				<a href="#" class="datum">'.$datum.'</a>
				<a href="#" class="autor">'.$autor.'</a>';
		if ($detaljnije != "")
		{
			$datum = "'".trim(preg_replace('/\s+/', ' ',$datum))."'";
			$autor = "'".trim(preg_replace('/\s+/', ' ',$autor))."'";
			$naslov = "'".trim(preg_replace('/\s+/', ' ',$naslov))."'";
			$slika = "'".trim(preg_replace('/\s+/', ' ',$slika))."'";
			$opis = "'".trim(preg_replace('/\s+/', ' ',$opis))."'";
			$detaljnije = "'".trim(preg_replace('/\s+/', ' ',$detaljnije))."'";
			$link = '<a href="#" class="detaljnije" onClick="UcitajDetaljnije('.$datum.','.$autor.','.$naslov.','.$slika.','.$opis.','.$detaljnije.')">Detaljnije...</a>';
		}
		$novostiDiv = $novostiDiv.'<br>'.$link.'</div>';
	   	echo $novostiDiv;
	}
?>