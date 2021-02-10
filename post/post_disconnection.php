<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="../site_projet_1.css" />
		<title>Adrien Bogacz</title>
	</head>



Souhaitez-vous vraiment fermer votre session ?


<form method="post" action="post_disconnection_validation.php">
<p><input type="radio" name="disconnection" value="yes" id="yes" checked="checked" /> <label for="yes">Oui</label>
		<input type="radio" name="disconnection" value="No" id="No" /> <label for="No">Non</label></p>
<br/ >
<input type="submit" value="Valider" /><br/ >
</form>
