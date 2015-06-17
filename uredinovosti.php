<?php
    $veza = new PDO("mysql:dbname=kkchampion;host=localhost;charset=utf8", "root", "");
    $veza->exec("set names utf8");

	if(isset($_REQUEST['nID']))
	{
		$id = htmlspecialchars($_REQUEST['nID']);
		if(isset($_REQUEST['nNaslov']))
		{
			$name = htmlspecialchars($_REQUEST['nNaslov']);
			if(isset($_REQUEST['nAutor']))
			{
				$autor = htmlspecialchars($_REQUEST['nAutor']);
				if(isset($_REQUEST['nSlika']))
				{
					$pic = htmlspecialchars($_REQUEST['nSlika']);
					if(isset($_REQUEST['nOpis']))
					{
						$desc = htmlspecialchars($_REQUEST['nOpis']);
						if(isset($_REQUEST['nDetaljnije']))
						{
							$detaljnije = htmlspecialchars($_REQUEST['nDetaljnije']);
					        if ($autor != "")
					        {
					        	$upis = $veza->query("UPDATE novost set autor = '{$autor}' where id = {$id}");
					        }
					        if ($desc != "")
					        {
					        	$upis = $veza->query("UPDATE novost set opis = '{$desc}' where id = {$id}");
					        }
					        if ($pic != "")
					        {
					        	$upis = $veza->query("UPDATE novost set slika = '{$pic}' where id = {$id}");
					        }
					        if ($name != "")
					        {
					        	$upis = $veza->query("UPDATE novost set naslov = '{$name}' where id = {$id}");
					        }
					        if ($detaljnije != "")
					        {
					        	$upis = $veza->query("UPDATE novost set autor = '{$detaljnije}' where id = {$id}");
					        }
//							$upis = $veza->query("UPDATE novost set autor = '{$name}' , naslov = '{$name}' , slika = '{$pic}' , opis = '{$desc}' , detaljnije = '{$detaljnije}' where id = {$id}");        	
						}
					}
				}
			}
		}
	}
?>