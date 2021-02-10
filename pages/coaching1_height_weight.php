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
		<link rel="stylesheet" href="site_projet_1.css" />
		 <script type="text/javascript" src="test.js" defer></script>
		<title>Coaching</title>
	</head>



<body>

<?php include("../pages_sections/session.php");

?>

	
	<div class="page_block">

			<?php include("../pages_sections/header.php"); ?>

			<?php include("../pages_sections/banner.php"); ?>


<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			
			<div>
				<form method="post" action="../post/post_coaching1_measurements.php">
			<p>Renseignez vos informations pour obtenir des conseils personnalisés</p>
			<p>
    			Taille <input type="text" name="height_meters" />m<input type="text" name="height_centimeters" />cm<br />
    			Poids (kg) <input type="text" name="weight" />
			</p>
			<p>
				Sexe 
				<input type="radio" name="sexe" value="F" id="woman" checked="checked" /> <label for="woman">Femme</label>
				<input type="radio" name="sexe" value="M" id="man" /> <label for="man">Homme</label>

			</p>
				<input type="submit" value="Valider" /><br/ >
				</form>
			</div>
		



	</div>

</body>
<br/>





