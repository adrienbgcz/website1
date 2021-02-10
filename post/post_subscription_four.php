<?php
//Fonctionne

//connexion à la base de données
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
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$password = htmlspecialchars($_POST['password']);
	$password_again = htmlspecialchars($_POST['password_again']);
	$email = htmlspecialchars($_POST['email']);
}


// Vérification qu'aucun champ n'est vide
if ((empty($pseudo)) OR (empty($password)) OR (empty($password_again)) OR (empty($email)))
{

	echo '<p>Vous devez remplir tous les champs !</p>';
	echo '<p><a href="../pages/subscription.php">Retourner à la page d\'inscription</a></p>';

}
	else
	{
	//Vérification du pseudo	
		
		$req = $bdd->query('SELECT COUNT(*) AS existing_pseudo FROM members WHERE pseudo = \'' . $pseudo . '\'');
		$donnees = $req->fetch();

		if ($donnees['existing_pseudo'] > 0)
		{
			echo '<p>Ce pseudo est déjà utilisé, veuillez en choisir un autre.</p>';
		}


		//Vérication du mot de passe 
		if (((preg_match("#^[a-zA-Z0-9\#!^$()[\]{}?+*.\|-]{8}$#", $password))) AND (($password) == ($password_again)))
		{
			
		}
			else
			{
				echo '<p>Les mots de passe doivent être identiques et comporter au moins 8 caractères parmi lesquels : lettres minuscules et/ou majuscules et/ou les caractères spéciaux #!^$()[]{}?+*.\|- !</p>';
			}
		
		//Vérication de l'adresse mail
		if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
		{
		
		}
			else
			{
				echo '<p>L\'adresse mail doit être au format xyz@nom_de_domaine.</p>';
			}

	echo '<p><a href="../pages/subscription.php">Retourner à la page d\'inscription</a></p>';

	}


// Insertion du membre dans la base de données
if ((((preg_match("#^[a-zA-Z0-9\#!^$()[\]{}?+*.\|-]{8}$#", $password))) AND (($password) == ($password_again))) AND (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) AND ($donnees['existing_pseudo'] == 0)) 
{
	$password_hash = password_hash($password, PASSWORD_DEFAULT);
	$req = $bdd->prepare('INSERT INTO members(pseudo, password, email, subscription_date) VALUES(?, ?, ?, NOW())');
	$req->execute(array($pseudo, $password_hash, $email));

	echo 'Inscription réussie !';
}

?>


