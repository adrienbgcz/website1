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

$session_id = $_SESSION['id'];
$req = $bdd->query("SELECT member_id, height, weight, imc, gender, waist, hips, whr, activity_level, DATE_FORMAT(checking_date, '%d/%m/%Y à %Hh%imin%ss') AS checking_date_formatted FROM health_check WHERE member_id = '$session_id'");


while ($data = $req->fetch())
{
	
	echo '<p><strong>Bilan du ' . $data['checking_date_formatted'] . '</strong></p>';
	echo '<p>Vous pesez ' . $data['weight'] . ' kg pour ' . $data['height'] . ' m. <br />
	Votre Indice de Masse Corporelle (IMC) est donc de ' . $data['imc'] . '. Cela signifie que ';


	//Interprétation IMC
			if($data['imc'] > 18.5 AND $data['imc'] < 25)
			{
				echo 'vous avez un poids normal par rapport à votre taille.</p>';
			}

			if($data['imc'] < 18.5)
			{
				echo 'vous avez un poids insuffisant par rapport à votre taille.</p>';
			}

			if($data['imc'] >= 25 AND $data['imc'] < 30)
			{
				echo 'vous êtes en surpoids.</p>';
			}

			if($data['imc'] >= 30 AND $data['imc'] < 35)
			{
				echo 'vous êtes en situation d\'obésité modérée.</p>';
			}

			if($data['imc'] >= 35)
			{
				echo 'vous êtes en situation d\'obésité sévère.</p>';
			}
		


	//Affichage tour taille et hanches

	if (($data['waist'] != 0) AND ($data['hips'] == 0))
	{
		echo '<p>Vous avez un tour de taille de ' . $data['waist'] . ' cm et vous n\'avez pas renseigné votre tour de hanches.</p>';
	}

	if (($data['waist'] == 0) AND ($data['hips'] != 0))
	{
		echo '<p>Vous avez un tour de hanches de ' . $data['hips'] . ' cm et vous n\'avez pas renseigné votre tour de taille.</p>';
	}


	if (($data['waist'] == 0) AND ($data['hips'] == 0))
	{
		echo '<p>Vous n\'avez pas renseigné vos tours de taille et de hanches.</p>';
	}


	if (($data['waist'] != 0) AND ($data['hips'] != 0))
	{
		echo '<p>Vous avez un tour de taille de ' . $data['waist'] . ' cm et un tour de hanches de ' . $data['hips'] . ' cm. Cela vous donne un ratio taille/hanches de ' . $data['whr'] . '.</p>';
	}


	//Interprétation tour taille
	if ($data['gender'] == 'M')
	{
		if ($data['waist'] < 102) 
		{
			echo 'Vous avez un tour de taille normal. ';
		}

		if ($data['waist'] >= 102) 
		{
			echo 'Vous avez un tour de taille trop élevé. ';
		}
		
	}


	if ($data['gender'] == 'F')
	{
		if ($data['waist'] < 88) 
		{
			echo 'Vous avez un tour de taille normal. ';
		}

		if ($data['waist'] >= 88) 
		{
			echo 'Vous avez un tour de taille trop élevé. ';
		}
	}





	//Interprétation ratio taille hanches
	if (($data['whr'] <= 0.80) AND ($data['gender'] == 'F'))
	{
		echo 'Votre ratio taille-hanches reflète un faible risque pour la santé.<br />';
	}

	if (($data['whr'] >= 0.81 AND $data['whr'] < 0.85) AND ($data['gender'] == 'F'))
	{
		echo 'Votre ratio taille-hanches reflète un risque modéré pour la santé.';
	}

	if (($data['whr'] >= 0.85) AND ($data['gender'] == 'F'))
	{
		echo 'Votre ratio taille-hanches reflète un haut risque pour la santé.';
	}

	if (($data['whr'] <= 0.95) AND ($data['gender'] == 'M'))
	{
		echo 'Votre ratio taille-hanches reflète un faible risque pour la santé.';
	}

	if (($data['whr'] >= 0.96 AND $data['whr'] < 1.0) AND ($data['gender'] == 'M'))
	{
		echo 'Votre ratio taille-hanches reflète un risque modéré pour la santé.';
	}

	if (($data['whr'] >= 1.0) AND ($data['gender'] == 'M'))
	{
		echo 'Votre ratio taille-hanches reflète un haut risque pour la santé.';
	}




	//Affichage activité physique
	switch ($data['activity']) // on indique sur quelle variable on travaille
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
?>
</br >

<?php

}

echo '<p><a href="../pages/coaching1_height_weight.php">Retour</a></p>';

?>