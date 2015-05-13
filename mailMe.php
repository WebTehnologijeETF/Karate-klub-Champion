<?php

if(isset($_REQUEST['area']))
{
	$poruka = $_REQUEST['area'];
}

mail('akiselica1@etf.unsa.ba', $_REQUEST['predmet'], $poruka);
?>