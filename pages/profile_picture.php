<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="site.css" />
		<title>Adrien Bogacz</title>
	</head>

Salut <?php echo $_SESSION['prenom'] . ' ' . '!'; ?>


<form action="../targets/target_profile_picture.php" method="post" enctype="multipart/form-data">
        <p>
                Formulaire d'envoi de fichier :<br />
                <br />
                <input type="file" name="profile_picture" /><br />
                <br />
                <input type="submit" value="Envoyer le fichier" />
        </p>
</form>