<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="site_projet_1.css" />
		<title>Adrien Bogacz</title>
	</head>



<body>

	<?php include("../pages_sections/session.php");?>

	<div class="page_block">
		

		<?php include("../pages_sections/header.php"); ?>

		<?php include("../pages_sections/banner.php"); ?>


		Laissez-moi un message, je vous recontacterai dans les plus brefs délais !
		<br />
		<br />
		<br />

		<form method="post" action="../targets/target_message.php">
			<textarea name="message" rows="8" cols="45">
			Votre message ici.
			</textarea>
			<br />
			<br />
		<input type="submit" value="Valider" />
	 
		</form>
	</div>

</body>

