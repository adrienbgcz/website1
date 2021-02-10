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


if (isset($_POST['height_meters']) AND isset($_POST['height_centimeters']) AND isset($_POST['weight']) AND isset($_POST['sexe']))

{
	$height = htmlspecialchars($_POST['height_meters']) . '.' . htmlspecialchars($_POST['height_centimeters']);
	$weight = htmlspecialchars($_POST['weight']);
	$gender = htmlspecialchars($_POST['sexe']);
}


// Vérification qu'aucun champ n'est vide
if ((empty($height)) OR (empty($weight)))
{

	echo '<p>Vous devez remplir tous les champs !</p>';
	echo '<p><a href="../pages/coaching1_height_weight.php">Retour</a></p>';

}
	else
	{
		?>
		<h2>Souhaitez-vous apporter un complément d’informations sur votre physique ?</h2>

	<form method="post" action="post_coaching2_activity.php">
		<p>Tour de taille<input type="text" name="waist" />cm</p>
		<p>Tour de hanches<input type="text" name="hips" />cm</p>
		
		<input type="hidden" name="height" value="<?php echo $_POST['height_meters'] . '.' . $_POST['height_centimeters']; ?>" />
		<input type="hidden" name="weight" value="<?php echo $_POST['weight']; ?>" />
		<input type="hidden" name="sexe" value="<?php echo $_POST['sexe']; ?>" />
		<input type="submit" value="Valider" />
		<input type="submit" value="Passer" />

	</form>
	<?php
	}
	

//Insertion dans la bdd si membre connecté
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
	$session_id = $_SESSION['id'];
	$req = $bdd->query("SELECT member_id FROM health WHERE member_id = '$session_id'");
	$data = $req->fetch();
	$data['member_id']; // OK


	
	// Insertion d'une nouvelle ligne dans health si elle n'existe pas
	if($data['member_id'] == 0)
	{
		$req = $bdd->prepare('INSERT INTO health (member_id, height, weight, gender) VALUES (?, ? , ?, ?)');
		$req->execute(array($_SESSION['id'], $height, $weight, $gender));
		$req->close_cursor();
	}
		else
			// Mise à jour des données si elles existent
		{
			$member_id = $data['member_id'];
	        $bdd->exec("UPDATE health SET height = '$height', weight = '$weight', gender = '$gender' WHERE member_id = '$member_id'");
		}

}



?>










		

        