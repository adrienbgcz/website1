<?php
session_start();

//Vérifier le fonctionnement des cookies
setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
setcookie('id', $data['id'], time() + 365*24*3600, null, null, false, true);
setcookie('password', $password, time() + 365*24*3600, null, null, false, true);
?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="../pages/site_projet_1.css" />
		<title>Coaching</title>
	</head>



<?php

include("../pages_sections/session.php");
include("../pages_sections/db_connection.php");

$height = $_POST['height'];
$weight = $_POST['weight'];
$gender = $_POST['sexe'];
$waist = $_POST['waist'];
$hips = $_POST['hips'];
$activity = $_POST['activity'];

$imc = round ($weight/($height*$height), 1);

if ($waist AND $hips != 0)
{
	$whr = round ($waist/$hips, 2);
}


//Insertion dans la bdd si membre connecté

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
	$session_id = $_SESSION['id'];
	$req = $bdd->query("SELECT member_id FROM health WHERE member_id = '$session_id'");
	$data = $req->fetch();
	$data['member_id'];

	$member_id = $data['member_id'];
	$bdd->exec("UPDATE health SET imc = $imc, activity_level = '$activity' WHERE member_id = '$member_id'");
	$req->closeCursor();


	$req = $bdd->prepare('INSERT INTO health_check (member_id, height, weight, imc, gender, waist, hips, whr, activity_level, checking_date) VALUES (?, ? , ?, ?, ?, ?, ?, ?, ?, NOW())');
		$req->execute(array($_SESSION['id'], $height, $weight, $imc, $gender, $waist, $hips, $whr, $activity));
	
}




//Affichage taille, poids, IMC

echo '<p>Vous pesez ' . $weight . ' kg pour ' . $height . ' m. <br />
Votre Indice de Masse Corporelle (IMC) est donc de ' . $imc . '. Cela signifie que ';


//Interprétation IMC
		if($imc > 18.5 AND $imc < 25)
		{
			echo 'vous avez un poids normal par rapport à votre taille.</p>';
		}

		if($imc < 18.5)
		{
			echo 'vous avez un poids insuffisant par rapport à votre taille.</p>';
		}

		if($imc >= 25 AND $imc < 30)
		{
			echo 'vous êtes en surpoids.</p>';
		}

		if($imc >= 30 AND $imc < 35)
		{
			echo 'vous êtes en situation d\'obésité modérée.</p>';
		}

		if($imc >= 35)
		{
			echo 'vous êtes en situation d\'obésité sévère.</p>';
		}
	


//Affichage tour taille et hanches

if (($waist != 0) AND ($hips == 0))
{
	echo '<p>Vous avez un tour de taille de ' . $waist . ' cm et vous n\'avez pas renseigné votre tour de hanches.</p>';
}

if (($waist == 0) AND ($hips != 0))
{
	echo '<p>Vous avez un tour de hanches de ' . $hips . ' cm et vous n\'avez pas renseigné votre tour de taille.</p>';
}


if (($waist == 0) AND ($hips == 0))
{
	echo '<p>Vous n\'avez pas renseigné vos tours de taille et de hanches.</p>';
}


if (($waist != 0) AND ($hips != 0))
{
	echo '<p>Vous avez un tour de taille de ' . $waist . ' cm et un tour de hanches de ' . $hips . ' cm. Cela vous donne un ratio taille/hanches de ' . $whr . '.</p>';
}


//Interprétation tour taille
if ($gender == 'M')
{
	if ($waist < 102) 
	{
		echo 'Vous avez un tour de taille normal. ';
	}

	if ($waist >= 102) 
	{
		echo 'Vous avez un tour de taille trop élevé. ';
	}
	
}


if ($gender == 'F')
{
	if ($waist < 88) 
	{
		echo 'Vous avez un tour de taille normal. ';
	}

	if ($waist >= 88) 
	{
		echo 'Vous avez un tour de taille trop élevé. ';
	}
}





//Interprétation ratio taille hanches
if (($whr <= 0.80) AND ($gender == 'F'))
{
	echo 'Votre ratio taille-hanches reflète un faible risque pour la santé.<br />';
}

if (($whr >= 0.81 AND $whr < 0.85) AND ($gender == 'F'))
{
	echo 'Votre ratio taille-hanches reflète un risque modéré pour la santé.';
}

if (($whr >= 0.85) AND ($gender == 'F'))
{
	echo 'Votre ratio taille-hanches reflète un haut risque pour la santé.';
}

if (($whr <= 0.95) AND ($gender == 'M'))
{
	echo 'Votre ratio taille-hanches reflète un faible risque pour la santé.';
}

if (($whr >= 0.96 AND $whr < 1.0) AND ($gender == 'M'))
{
	echo 'Votre ratio taille-hanches reflète un risque modéré pour la santé.';
}

if (($whr >= 1.0) AND ($gender == 'M'))
{
	echo 'Votre ratio taille-hanches reflète un haut risque pour la santé.';
}




//Affichage activité physique
switch ($activity) // on indique sur quelle variable on travaille
{ 
    case lv1: 
        echo "<p>Vous avez un mode de vie sédentaire.</p>";
    break;
    
    case lv2: 
        echo "<p>Vous avez un niveau d'activité physique faible.</p>";
    break;
    
    case lv3: 
        echo "<p>Vous avez un niveau d'activité physique moyen.</p>";
    break;
    
    case lv4: // etc. etc.
        echo "<p>Vous êtes physiquement actif.</p>";
    break;
    
    case lv5:
        echo "<p>Vous êtes très actif physiquement.</p>";
    
	case 0:
        echo "<p>Vous n'avez pas renseigné votre niveau d'activité physique.</p>";

}




echo '<p><a href="../pages/coaching1_height_weight.php">Retour</a></p>';

?>