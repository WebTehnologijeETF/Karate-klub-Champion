<!doctype html>
    <head>
        <TITLE>KK Champion Ilidža</TITLE>
        <meta http-equiv="Content-Type" content ="text/html; charset=utf-8">
        <link rel="stylesheet" href="css/stilovi.css">
        <link rel="shortcut icon" href="slike/logo.ico">
    </head>


    <body id="testbody">
        <div id="testdiv" class="testdiv">
                <br>
                <div>
                    <a href="#"><img src="slike/home.png" alt="pocetna" id = "pocetna" onclick="poziv('prva.html')"></a>
                    <a href="kontaktstranica.php"><img src="slike/contact.png" alt="contact" id = "contact"></a>
                    <a href="#"><img src="slike/korpa.png" alt="proizvodi" id="korpa" onclick="poziv('studenti.html')"></a>
                </div>
                <br>
                <br>
                <a id="grb">
                    <img alt="grb" src="slike/logo.png">
                </a>
                <h1>KK CHAMPION </h1>

                <div id="baner">
                    <a href="https://plus.google.com/107832376365287177485"><img id="google" alt="+google" src="slike/google.png"></a>
                    <a href="https://instagram.com/"><img id="instagram" alt="insta" src="slike/instagram.png"></a>
                    <a href="https://www.youtube.com/channel/UCmBNNXgaHksNGHSWqPqVONg"><img id="youtube" alt="jutjub" src="slike/youtube.png"></a>
                    <a href="https://twitter.com/KK_Champion"><img id="twitter" alt="tviter" src="slike/twitter.png"></a>
                    <a href="https://www.facebook.com/k.k.champion"><img id="facebook" alt="fejs" src="slike/facebook.png"></a>
                    <br>
                </div>

                <nav class="menu">
                    <ul id="meni">
                        <li>
                            <a href="#" onClick="Otvori('onama')">O NAMA</a>
         
                            <ul class="sub-menu" id="onama">
                            	<li><a href="#" onclick="poziv('o_nama.html')">HISTORIJAT KLUBA</a></li>
                        		<li><a href="#" onclick="poziv('treneriasistenti.html')">TRENERI I ASISTENTI</a></li>
                                <li><a href="#" onclick="poziv('takmicari.html')">TAKMIČARI</a></li>
		                        <li><a href="#" onclick="poziv('takmicenja.html')">TAKMIČENJA</a></li>
                                <li><a href="#" onclick="poziv('rezultati.html')">REZULTATI</a></li>
                            </ul>
                        </li>

                        <li>
                        	<a href="#" onclick="Otvori('clanstvo')">ČLANSTVO</a>
                            <ul class="sub-menu" id ="clanstvo">
                        		<li><a href="#" onclick="poziv('clanstvo.html')">TERMINI TRENINGA</a></li>
                                <li><a href="#" onclick="poziv('lokacija.html')">NASA LOKACIJA</a></li>
                     		</ul>
                        </li>
                        <li><a href="#" onclick="Otvori('galerija')">GALERIJA</a>
                        	<ul class="sub-menu" id ="galerija">
                        		<li><a href="#" onclick="poziv('galerija.html')">SLIKE SA TRENINGA</a></li>
                        		<li><a href="#" onclick="poziv('galerija.html')">SLIKE SA TURNIRA</a></li>
                        		<li><a href="#" onclick="poziv('galerija.html')">SLIKE SA DRUZENJA</a></li>
                        		<li><a href="#" onclick="poziv('galerija.html')">VIDEO BORBE</a></li>
                        	</ul>
                        </li>
                        <li><a href="#" onclick="Otvori('kontakti')">KONTAKTI</a>
                            <ul class="sub-menu" id="kontakti">
                                <li><a href="kontaktstranica.php">KONTAKT FORMA</a></li>
                                <li><a href="#" onclick="poziv('eksternilinkovi.html')"> EKSTERNI LINKOVI</a></li>
                     			<li><a href="#" onclick="poziv('kontakttelefoni.html')">KONTAKTI TRENERA</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
		    <br><br><br>

		    <div id ="promijeni">
		    	<!-- DIO HTML-a KOJI SE MIJENJA PO LOADU STRANICE-->
		    </div>
		    <?php
               include 'phpvalidacija.php';
		    ?>
		    <div id="append">
				<?php 
					include $formaV;
				?>
			</div>

    		<div id="footer">
				<img alt="savezi" id="futer1" src="slike/ClanSaveza.jpg">
				<img alt="media" id="futer2" src="slike/medijskiPartner1.jpg">
			</div>
    	</div>
    	<SCRIPT src="js/meni.js"></SCRIPT> 
    </body>