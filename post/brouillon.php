<?php

if ((isset($_POST['pseudo'])) AND (isset($_POST['password'])) AND (isset($_POST['password_again'])) AND (isset($_POST['email'])))
{
	($_POST['pseudo']) = htmlspecialchars($_POST['pseudo']);
	($_POST['password']) = htmlspecialchars($_POST['password']);
	($_POST['password_again']) = htmlspecialchars($_POST['password_again']);
	($_POST['email']) = htmlspecialchars($_POST['email']);

	if (
		(($_POST['pseudo']) != '') 
		AND ((preg_match("#^[a-z0-9\#!^$()[\]{}?+*.\|-]{8}$#", $_POST['password'])) == ((preg_match("#^[a-z0-9\#!^$()[\]{}?+*.\|-]{8}$#", $_POST['password_again']))) 
			AND (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
		)
	{
		echo 'yes';
	}

	else
	{
		echo 'no';
	}
}

?>







<?php
//fonctionne 
if (isset($_POST['pseudo']) AND isset($_POST['password']) AND isset($_POST['password_again']) AND isset($_POST['email']))

{
	$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
	$_POST['password'] = htmlspecialchars($_POST['password']);
	$_POST['password_again'] = htmlspecialchars($_POST['password_again']);
	$_POST['email'] = htmlspecialchars($_POST['email']);



	if ((($_POST['pseudo']) != '') AND ($_POST['password']) == ($_POST['password_again']) AND (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])))
	{	
		echo 'yes';

	}

	else
	{
		echo 'no';
	}

}

//fonctionne 
?>




AND isset($_POST['password']) AND isset($_POST['password_again']) AND isset($_POST['email']))




$_POST['password'] = htmlspecialchars($_POST['password']);
	$_POST['password_again'] = htmlspecialchars($_POST['password_again']);
	$_POST['email'] = htmlspecialchars($_POST['email']);



	AND (preg_match($_POST['password']) == ($_POST['password_again'])) AND (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])))
//fonctionne 












<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet1;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



if (isset($_POST['pseudo']) AND isset($_POST['password']) AND isset($_POST['password_again']) AND isset($_POST['email']))

{
	$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
	$_POST['password'] = htmlspecialchars($_POST['password']);
	$_POST['password_again'] = htmlspecialchars($_POST['password_again']);
	$_POST['email'] = htmlspecialchars($_POST['email']);



	$req = $bdd->query('SELECT COUNT (*) AS existing_pseudo FROM members WHERE pseudo = '.$_POST['pseudo'].'');
	$donnees = $req->fetch();


		if ($donnees = 0)

		{
			echo 'yes';
		}

			else
			{
			echo 'no';
			}
	
}

?>



<?php
//Fonctionne
try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=projet1;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}

			catch(Exception $e)
			{
        		die('Erreur : '.$e->getMessage());
			}

if ((empty($_POST['pseudo'])) OR (empty($_POST['password'])) OR (empty($_POST['password_again'])) OR (empty($_POST['password_again'])))
{

	echo '<p>Vous devez remplir tous les champs !</p>';
	echo '<p><a href="../pages/subscription.php">Retourner à la page dinscription</a></p>';

}

else
	{
		// Insertion du message à la bdd à l'aide d'une requête préparée
		$req = $bdd->prepare('INSERT INTO members(pseudo, pass, email, subscription_date) VALUES(?, ?, ?, NOW())');
		$req->execute(array($_POST['pseudo'], $_POST['password'], $_POST['email']));
	}
//Fonctionne
?>






<?php
//Fonctionne
try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=projet1;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}

			catch(Exception $e)
			{
        		die('Erreur : '.$e->getMessage());
			}

if ((empty($_POST['pseudo'])) OR (empty($_POST['password'])) OR (empty($_POST['password_again'])) OR (empty($_POST['password_again'])))
{

	echo '<p>Vous devez remplir tous les champs !</p>';
	echo '<p><a href="../pages/subscription.php">Retourner à la page dinscription</a></p>';

}
	else
	{
		if ((preg_match("#^[a-z0-9\#!^$()[\]{}?+*.\|-]{8}$#", $_POST['password'])))
		{
			
		}

			if (($_POST['password']) == ($_POST['password_again'])) 
			{
				$req = $bdd->prepare('INSERT INTO members(pseudo, pass, email, subscription_date) VALUES(?, ?, ?, NOW())');
				$req->execute(array($_POST['pseudo'], $_POST['password'], $_POST['email']));

				echo 'Inscription réussie !';
			}
		
			else
			{
				echo 'Les deux mots de passe doivent être identiques !';
				echo '<p><a href="../pages/subscription.php">Retourner à la page dinscription</a></p>';
			}
	}
//Fonctionne

	


?>











<?php
//Fonctionne
try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=projet1;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}

			catch(Exception $e)
			{
        		die('Erreur : '.$e->getMessage());
			}

if ((empty($_POST['pseudo'])) OR (empty($_POST['password'])) OR (empty($_POST['password_again'])) OR (empty($_POST['password_again'])))
{

	echo '<p>Vous devez remplir tous les champs !</p>';
	echo '<p><a href="../pages/subscription.php">Retourner à la page dinscription</a></p>';

}
	else
	{
		if ((preg_match("#^[a-z0-9\#!^$()[\]{}?+*.\|-]{8}$#", $_POST['password'])))
		{
			
		}
			else
			{
				echo 'Le mot de passe doit faire au moins 8 caractères !';
				echo '<p><a href="../pages/subscription.php">Retourner à la page dinscription</a></p>';
			}

			if (($_POST['password']) == ($_POST['password_again'])) 
			{
				$req = $bdd->prepare('INSERT INTO members(pseudo, pass, email, subscription_date) VALUES(?, ?, ?, NOW())');
				$req->execute(array($_POST['pseudo'], $_POST['password'], $_POST['email']));

				echo 'Inscription réussie !';
			}
		
			else
			{
				echo 'Les deux mots de passe doivent être identiques !';
				echo '<p><a href="../pages/subscription.php">Retourner à la page dinscription</a></p>';
			}
		
	}
//Fonctionne

	


?>