<?php 
	$formaV ="ok.php";
	$emailV = 0;
	$nazivV = 0;
	$telefonV = 0;
	$predmetV = 0;
	$porediV = 0;
	$nazivRegex= "/^[0-9a-zA-Z ]+$/i";
	$emailRegex='/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
	$telRegex='/^\(?(\d{3})\)?[-]?(\d{3})[-]?(\d{4})$/';
	$poruka = "";
	if(isset($_REQUEST['naziv']))
	{
		$tekst = htmlspecialchars($_REQUEST['area']);
	}
	if (!isset($_REQUEST['naziv']))
	{
		$_REQUEST['naziv'] = "";
	}
	if (!isset($_REQUEST['mail']))
	{
		$_REQUEST['mail'] = "";
	}
	if (!isset($_REQUEST['telefon']))
	{
		$_REQUEST['telefon'] = "";
	}
	if (!isset($_REQUEST['predmet']))
	{
		$_REQUEST['predmet'] = "";
	}
	if (isset($_REQUEST['naziv']))
	{
		$naziv = htmlEntities($_REQUEST['naziv'], ENT_QUOTES);
		if($_REQUEST['naziv'] == "" || ctype_space($_REQUEST['naziv']) || ($_REQUEST['naziv'] != 0 && preg_match($nazivRegex, $naziv)))
		{
			$nazivV = 1;
			$poruka = "FORMAT NAZIVA NIJE ADEKVATAN";
			$formaV = "belaj.php";
		}
	}
	if (isset($_REQUEST['mail']) && $_REQUEST['mail'] != "" && $formaV == "ok.php")
	{
		$mail = htmlEntities($_REQUEST['mail'], ENT_QUOTES);
		if (!preg_match($emailRegex, $mail))
		{
			$emailV = 1;
			$poruka = "FORMAT E-MAIL ADRESE NIJE ADEKVATAN";
			$formaV = "belaj.php";
		}
	}
	if (isset($_REQUEST['telefon']) && $formaV == "ok.php")
	{
		$telefon = htmlEntities($_REQUEST['telefon'], ENT_QUOTES);
		if($_REQUEST['telefon'] == "" || ctype_space($_REQUEST['telefon']) || ($_REQUEST['telefon'] != 0 && preg_match($telRegex, $naziv)))
		{
			$telefonV = 1;
			$poruka = "FORMAT TELEFONA NIJE PRAVILAN<br>Traženi format za broj telefona: (061)-123-345 ili 061-123-456 ili 061123456<br>";
			$formaV = "belaj.php";
		}
	}
	if (isset($_REQUEST['predmet']) && $formaV == "ok.php")
	{
		if($_REQUEST['predmet'] == "" || ctype_space($_REQUEST['predmet']))
		{
			$predmetV = 1;
			$poruka = "FORMAT NASLOVA PORUKE NIJE ADEKVATAN";
			$formaV = "belaj.php";
		}
	}
	if (isset($_REQUEST['string1']) && $formaV == "ok.php") // TO DO 
	{	
//		$prvi = htmlEntities($_REQUEST['string1'], ENT_QUOTES);
//		$drugi = htmlEntities($_REQUEST['string2'], ENT_QUOTES);
		if((strcmp($_REQUEST['string1'], $_REQUEST['string2'])))
		{
			$porediV = 1;
			$formaV ="belaj.php";
		}
	}
//	include "mailMe.php";
?>