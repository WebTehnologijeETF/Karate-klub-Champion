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
			$datum = "'".str_replace( "\r\n", '<br>', $datum )."'";
			$autor ="'".str_replace( "\r\n", '<br>', $autor )."'";
			$naslov ="'".str_replace( "\r\n", '<br>', $naslov )."'";
			$slika ="'".str_replace( "\r\n", '<br>', $slika )."'";
			$opis ="'".str_replace( "\r\n", '<br>', $opis )."'";
			$detaljnije ="'".str_replace( "\r\n", '<br />', $detaljnije )."'";
			$link = '<a href="#" class="detaljnije" onClick="UcitajDetaljnije('
				.$datum.','.$autor.','.$naslov.','.$slika.','.$opis.','.$detaljnije.')">Detaljnije...</a>';
		}
		$novostiDiv = $novostiDiv.'<br>'.$link.'</div>';
	   	echo $novostiDiv;
	}
?>