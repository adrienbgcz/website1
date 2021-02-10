<?php
if ((isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) OR (isset($_COOKIE['id']) AND isset($_COOKIE['pseudo'])))
	{
    	echo 'Bonjour ' . $_SESSION['pseudo'] . ' !';
    	include("../pages_sections/disconnection_section.php");
	}
		else
			{
				include("../pages_sections/connection_inscription.php");
			}
?>