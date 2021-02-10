<?php 

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet1;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



if (isset($_POST['pseudo']) AND isset($_POST['password']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = htmlspecialchars($_POST['password']);
}


// Vérification qu'aucun champ n'est vide
if ((empty($pseudo)) OR (empty($password)))
{

	echo '<p>Vous devez remplir tous les champs !</p>';
	echo '<p><a href="../pages/connection.php">Retour à la page de connexion</a></p>';

}


//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare('SELECT id, password FROM members WHERE pseudo = ?');
$req->execute(array($pseudo));
$data = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['password'], $data['password']);



if ($isPasswordCorrect != $password)
{
    echo 'Mauvais identifiant ou mot de passe !';
    echo '<p><a href="../pages/connection.php">Retour à la page de connexion</a></p>';
}

	else
	{

		if ($isPasswordCorrect = $password)
		{
			if (isset($_POST['automatic_connection']))
			{
				setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
				setcookie('id', $data['id'], time() + 365*24*3600, null, null, false, true);
				setcookie('password', $data['password'], time() + 365*24*3600, null, null, false, true);
				session_start();
				$_SESSION['id'] = $data['id'];
				$_SESSION['pseudo'] = $pseudo;

				echo 'Vous êtes connecté !';
				echo '<p><a href="../pages/coaching1_height_weight.php">Retour à l\'accueil</a></p>';
			}
				else
				{
					session_start();
					$_SESSION['id'] = $data['id'];
					$_SESSION['pseudo'] = $pseudo;

					echo 'Vous êtes connecté !';
					echo '<p><a href="../pages/coaching1_height_weight.php">Retour à l\'accueil</a></p>';
				}
			
		}
	}	

?>