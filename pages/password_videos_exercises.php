<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="../site.css" />
		<title>Adrien Bogacz</title>
	</head>

Salut <?php echo $_SESSION['prenom'] . ' ' . '!'; ?>


	<body>


    <p>Veuillez entrer votre mot de passe :</p>


<form action="../targets/target_videos_exercises.php" method="post">
<p>
    <input type="password" name="password_videos_exercises" />
    <input type="submit" value="Valider" />		
</p>
</form>


</body>
</html>

