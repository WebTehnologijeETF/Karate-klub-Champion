<?php
	$veza = new PDO("mysql:dbname=kkchampion;host=localhost;charset=utf8", "root", "");
    $veza->exec("set names utf8");

    if(isset($_REQUEST['komentarID']))
    {
	    $komID = (int)$_REQUEST['komentarID'];
        $veza->query("DELETE FROM komentar WHERE id = {$komID}");   
    }

    if(isset($_REQUEST['novostID']))
    {
    	$novID = (int)$_REQUEST['novostID'];
        $veza->query("DELETE FROM komentar WHERE novost = {$novID}");
        $veza->query("DELETE FROM novost WHERE id = {$novID}");   
    }



    if(isset($_REQUEST['korisnikID']))
    {
    	if (isset($_REQUEST['flag']))
    	{
	    	$korID = $_REQUEST['korisnikID'];
	    	$usr = htmlspecialchars($_REQUEST['korisnikID']);
	    	$veza->query("DELETE FROM admin WHERE username = '{$usr}'");
	    }
    }

    if(isset($_REQUEST['korisnikID2']))
    {
		$korID = $_REQUEST['korisnikID2'];
    	$usr = htmlspecialchars($_REQUEST['korisnikID2']);
    	$update = 	'<div>
        	            <strong class = "input"><small>Username: </small></strong><br>
    	                <input type="text" class="input" name="nalog"
			    	</div>';
		echo $update;
//	    $veza->query("UPDATE admin")
    }
?>