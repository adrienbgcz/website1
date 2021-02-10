<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="../site.css" />
		<title>Vidéos d'exercices</title>
	</head>

	<body>

		<?php
	if (isset($_POST['password_videos_exercises']) AND $_POST['password_videos_exercises'] == "VIP2020")
{

	echo 'Vidéos disponibles prochainement';

}

else
{
	echo 'Mot de passe incorrect';
}

?>

</body>
</html>