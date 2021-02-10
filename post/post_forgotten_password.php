<?php

//connexion à la base de données
include("../pages_sections/db_connection.php");

if (isset($_POST['pseudo']) AND isset($_POST['email']))

{
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$email = htmlspecialchars($_POST['email']);
}


// Vérification qu'aucun champ n'est vide
if ((empty($pseudo)) OR (empty($email)))
{

	echo '<p>Vous devez remplir tous les champs !</p>';
	echo '<p><a href="../pages/forgotten_password.php">Retour à la page précédente</a></p>';
}

else
	{
	//Vérification du pseudo	
		
		$req_pseudo = $bdd->query('SELECT COUNT(*) AS existing_pseudo FROM members WHERE pseudo = \'' . $pseudo . '\'');
		$data_pseudo = $req_pseudo->fetch();

		if ($data_pseudo['existing_pseudo'] == 1) 	
		{
			//Vérification du mail
			$req_email = $bdd->query('SELECT COUNT(*) AS existing_email FROM members WHERE email = \'' . $email . '\'');
			$data_email = $req_email->fetch();

			if ($data_email['existing_email'] == 1) 
			{
				$req_select_email = $bdd->query('SELECT email FROM members WHERE email = \'' . $email . '\'');
				$data_select_email = $req_select_email->fetch();


				// ENVOI DU MAIL A CREER


			}
				else
				{
					echo '<p>Identifiants incorrects. Veuillez renseigner des identifiants valides ou vous inscrire.</p>';
				}
		}

		else
		{
			echo '<p>Identifiants incorrects. Veuillez renseigner des identifiants valides ou vous inscrire.</p>';
		}

	}
?>