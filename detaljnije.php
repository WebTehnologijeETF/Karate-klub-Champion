<?php
$novostiDiv ="";
$naslov = $_REQUEST['naslov'];
$slika = $_REQUEST['slika'];
$opis = $_REQUEST['opis'];
$detalji = $_REQUEST['detaljnije'];
$datum = $_REQUEST['datum'];
$autor = $_REQUEST['autor'];

$novostiDiv ='<div class="intro">
				<h2 class="naslovi">'.$naslov.'</h2>
				<img src="'.$slika.'" class="novostslika" alt="novostslika">
				'.$opis.$detalji.'
				<a href="#" class="datum">'.$datum.'</a>
				<a href="#" class="autor">'.$autor.'</a>
				<br>
			</div>';
echo $novostiDiv;
?>