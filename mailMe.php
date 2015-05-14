			<?php
				if(!isset($_REQUEST['area']))
				{
					$_REQUEST['area'] = "";
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
				if(isset($_REQUEST['area']) && isset($_REQUEST['naziv']) && isset($_REQUEST['predmet']) && isset($_REQUEST['telefon']))
				{
					$naziv = htmlspecialchars($_REQUEST['naziv']);
					$telefon = htmlspecialchars($_REQUEST['telefon']);
					$predmet = htmlspecialchars($_REQUEST['predmet']);
					$poruka =  htmlspecialchars($_REQUEST['area']);
					$url = 'https://api.sendgrid.com/';
					//
					//password Jr1PKCirj1
					//username Iukjpg6CYO
					//
					$user = 'Iukjpg6CYO';
					$pass = 'Jr1PKCirj1';
					$request =  $url.'api/mail.send.json';
					$session = curl_init($request);
					if (isset($_REQUEST['mail']))
					{
//						echo "TU SMO";
						$mail = htmlspecialchars($_REQUEST['mail']);
						$parametri = array(
						    "api_user"  => $user,
						    "api_key"   => $pass,
						    "to"		=> 'kisa.aldin@hotmail.com',
						    "cc"		=> 'vljubovic@etf.unsa.ba',
						    "subject"   => $predmet,
						    "text"      => $poruka,
						    "from"      => $mail,
						    "replyto"	=> $mail,
						  );
					}
					else
					{
						$parametri = array(
						    "api_user"  => $user,
						    "api_key"   => $pass,
						    "to"        => 'aldin.kiselica.94@gmail.com',
//						    "cc"		=> 'vljubovic@etf.unsa.ba',
						    "subject"   => $predmet,
						    "text"      => $poruka,
						  );
					}
					curl_setopt ($session, CURLOPT_POST, true);
					curl_setopt ($session, CURLOPT_POSTFIELDS, $parametri);
					curl_setopt ($session, CURLOPT_HEADER, false);
					curl_setopt ($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
					curl_setopt ($session, CURLOPT_RETURNTRANSFER, true);

					$response = curl_exec($session);
					curl_close($session);
					print_r($response);
					echo "Hvala Vam jer ste nas kontaktirali!";
				}
			?>