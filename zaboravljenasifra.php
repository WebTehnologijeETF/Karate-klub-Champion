<?php
    ini_set ("display_errors", 1);
	include 'zaglavlje.html'
?>

<?php
    ini_set ("display_errors", 1);
    $veza = new PDO("mysql:dbname=kkchampion;host=localhost;charset=utf8", "root", "");
    $veza->exec("set names utf8");
    print "<div><br><h4 style='margin-left:34%'>Loguj se za administratorska ovlaštenja:</h4></div>";

    $komentarForma = '<br><br><div> <form method="POST" action="" id="kforma">
                      <div style="margin-left:30%">
                          <strong class = "input"><small>Korisnički nalog:</small></strong><br>
                          <input type="text" class="input" name="username" ';
    if(isset($_REQUEST['username']))
    {
    	$komentarForma = $komentarForma.' value="'.htmlspecialchars($_REQUEST['username']).'"';
    }
    $komentarForma = $komentarForma.'>
    				  </div>
                      <br>
                      <br>
                      <br>
                      <div style="margin-left:45%">
                      	   <input type="submit" name="prijava" value="Pošalji password"> 
                      </div>
                      <div>
                      </div>
                      </form>';
    print $komentarForma;
?>

<?php
    ini_set ("display_errors", 1);

	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (isset($_REQUEST['username'])) 
		{
			$username = htmlspecialchars($_REQUEST['username']);
	    $get_info = $veza->query("SELECT email FROM admin WHERE username = '{$username}' LIMIT 0, 1");
	    $info = $get_info->fetch();

	    $to = $info['email'];
	    $new_pass	= substr(md5(time()), 0, 10);

	    $veza->query("UPDATE admin SET password = '{$new_pass}' WHERE username = '{$username}' LIMIT 0, 1");

	    $tekst = "Uspješno ste promijenili password! Vaš novi password glasi: ".$new_pass;
			ini_set("SMTP","webmail.etf.unsa.ba");
			ini_set("smtp_port","465");
			ini_set('sendmail_from','akiselica1@etf.unsa.ba');
	    $naslov = "Promjena vaše šifre na Karate Klub Champion";

	    $header = "From: akiselica1@etf.unsa.ba\r\n"."Content-Type: text/html; charset=\"UTF-8\""."\r\n";
  		$poruka = "Username: ".$username."\r\n".$tekst;	
  		$dodatno = "Reply-to: noreply@akiselica1.com";
  		$poslanMail = mail($to, $naslov, $poruka, $dodatno);
	    echo ($poslanMail == 1) ? "Zahvaljujemo vam sto ste nas kontaktirali." : "Došlo je do greške pri slanju maila.";
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