<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="../site.css" />
		<title>Blog</title>
	</head>

Salut <?php echo $_SESSION['prenom'] . ' ' . '!'; ?>


<?php
try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}

			catch(Exception $e)
			{
        		die('Erreur : '.$e->getMessage());
			}


if (($_POST['pseudo']) AND ($_POST['commentaire']) != '')
{

// Insertion du commentaire dans la bdd à l'aide d'une requête préparée

	$req = $bdd->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())');
	$req->execute(array($_GET['ticket'], $_POST['pseudo'], $_POST['commentaire']));
	$req->closeCursor(); 


// Redirection du visiteur vers la page des commentaires
	header('Location: ../pages/blog_comments.php?ticket='.$_GET['ticket']);
}

else
	{
		echo '<p>Vous devez remplir tous les champs !</p>';
		echo '<p><a href="../pages/blog_index.php">Retourner aux articles</a></p>';
		//J'aimerais pouvoir rediriger vers le commentaire en cliquant sur le lien comme précédemment mais le $_GET ne fonctionne pas dans le href
	}

?>