<?php
    ini_set ("display_errors", 1);
	include 'zaglavlje.html';
?>

<div id ="promijeni">
    <!-- DIO HTML-a KOJI SE MIJENJA PO LOADU STRANICE-->

<?php
	if(!isset($_SESSION['username']) )
	{
    ini_set ("display_errors", 1);
    $veza = new PDO("mysql:dbname=kkchampion;host=localhost;charset=utf8", "root", "");
    $veza->exec("set names utf8");
    print "<div><br><h4 style='margin-left:34%'>Loguj se za administratorska ovlaštenja:</h4></div>";

    $komentarForma = '<br><br><div> <form method="POST" action="adminpanel.php" id="kforma">
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
                      <div style="margin-left:30%">
                          <strong class = "input"><small>Šifra:</small></strong><br>
                          <input type="password" class="input" name="password">
                      </div>
                      <br>
                      <br>
                      <br>
                      <div style="margin-left:45%">
                      	   <input type="submit" name="prijava" value="Prijava"> 
                      </div>
                      <div>
                      	<a href="zaboravljenasifra.php" style="margin-left:42%">Zaboravili ste sifru!</a>
                      </div>
                      </form>';
    print $komentarForma;
    }
?>

</div>

<?php
    ini_set ("display_errors", 1);
	session_start();
	if (isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];

		$odjava = "Odjavi se";
		echo "<form method = 'POST' action = 'odjava.php'><input type='submit' name='odjava' value='Odjava'> </form>";
		include 'privilegije.php';
	}	
	else
	{
		if (isset($_REQUEST['username'])) 
		{
			$username = htmlspecialchars($_REQUEST['username']);
		    $password = htmlspecialchars($_REQUEST['password']);

		    $admin = $veza->query("SELECT username, password from admin where username='{$username}' LIMIT 0, 1");
			$holder = $admin->fetch();
		    $bool = 0;
	        if($admin == false){
		        $bool = 1;
			}
		    if ($bool == 1)
		    {
		        $greska = $veza->errorInfo();
		        $greskaTekst = "SQL greska: ".$greska[2];
		        print $greskaTekst;
		        exit();
		    }
		    if ($holder['username'] == $username && $holder['password'] == $password)
		    {
//		    	echo "konjuuu";
				$_SESSION['username'] = $username;
				header("Location: prikazipanel.php");
		    }		    
		}
	}
?>

<?php
		print	'<div id="footer">
				<img alt="savezi" id="futer1" src="slike/ClanSaveza.jpg">
				<img alt="media" id="futer2" src="slike/medijskiPartner1.jpg">
			</div>
    	</div>
    	<SCRIPT src="js/meni.js"></SCRIPT>
    </body>';
?>