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



if (isset($_POST['waist']) AND isset($_POST['hips']))

{
	$waist = htmlspecialchars($_POST['waist']);
	$hips = htmlspecialchars($_POST['hips']);
	$whr = $waist/$hips;
}




if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
	$session_id = $_SESSION['id'];
	$req = $bdd->query("SELECT member_id FROM health WHERE member_id = '$session_id'");
	$data = $req->fetch();
	$data['member_id'];

	$member_id = $data['member_id'];
	$bdd->exec("UPDATE health SET waist = '$waist', hips = '$hips', whr = '$whr' WHERE member_id = '$member_id'");
}

?>

	<form method="post" action="post_coaching3_results.php">

	<h2>Souhaitez-vous apporter des précisions sur votre niveau d’activité physique ?</h2>

	<input type="radio" name="activity" value="lv1" id="lv1" /> <label for="lv1">Sédentaire</label><br />

	<input type="radio" name="activity" value="lv2" id="lv2" /> <label for="lv2">Faiblement actif</label><br />

	<input type="radio" name="activity" value="lv3" id="lv3" /> <label for="lv3">Moyennement actif</label><br />

	<input type="radio" name="activity" value="lv4" id="lv4" /> <label for="lv4">Actif</label><br />

	<input type="radio" name="activity" value="lv5" id="lv5" /> <label for="lv5">Très actif</label><br />

	<input type="radio" name="activity" value="0" id="0" /> <label for="0">Je ne sais pas</label><br />

	<input type="hidden" name="height" value="<?php echo $_POST['height']; ?>" />
		
	<input type="hidden" name="weight" value="<?php echo $_POST['weight']; ?>" />
		
	<input type="hidden" name="sexe" value="<?php echo $_POST['sexe']; ?>" />

	<input type="hidden" name="waist" value="<?php echo $_POST['waist']; ?>" />

	<input type="hidden" name="hips" value="<?php echo $_POST['hips']; ?>" />
<br/ >
	<input type="submit" value="Valider" />

	

</form>



