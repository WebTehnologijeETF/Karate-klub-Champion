<?php
//	include 'zaglavlje.html';
?>
<?php
	$emailV = 0;
	$nazivV = 0;
	$nazivRegex= "/^[0-9a-zA-Z ]+$/i";
	$emailRegex='/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
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
	if (isset($_REQUEST['naziv']))
	{
		$naziv = htmlEntities($_REQUEST['naziv'], ENT_QUOTES);
		if($_REQUEST['naziv'] == "" || ctype_space($_REQUEST['naziv']) || ($_REQUEST['naziv'] != 0 && preg_match($nazivRegex, $naziv)))
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