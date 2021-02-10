<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="site_projet_1.css" />
		<title>Blog</title>
	</head>



<body class="page_block">

	<?php include("../pages_sections/session.php");?>


		<header>
			<h1 class="blog_title">BLOG SPORT SANTÉ</h1></br>
		</header>	
</br >

	<?php
	try
				{
				$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				}

				catch(Exception $e)
				{
        		die('Erreur : '.$e->getMessage());
				}

// Récupération du billet

	$tickets=$bdd->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_formatted FROM tickets WHERE id = ?');
	$tickets->execute(array($_GET['ticket']));

	$tickets_data = $tickets->fetch();

	?>

	<!-- On affiche le titre du billet -->
		<div class="post_design">
						<h3>
						<?php echo htmlspecialchars($tickets_data['title']); ?>
						<em>le <?php echo $tickets_data['creation_date_formatted']; ?></em>
						</h3>
				
				<!-- On affiche le contenu du billet -->
						<p>
						<?php echo(htmlspecialchars($tickets_data['content'])); ?>
						</p>
		</div>
<?php

	$tickets->closeCursor(); // Important : on libère le curseur pour la prochaine requête
?>

	

<?php

// Récupération des commentaires
	$comments=$bdd->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_formatted FROM comments WHERE post_id = ? ORDER BY comment_date');	
	$comments->execute(array($_GET['post_id'])); 

	while ($comments_data = $comments->fetch())
	{
?>

<!-- On affiche les commentaires -->
	<div class="tickets_comments_design">
	<p><strong><?php echo htmlspecialchars($comments_data['author']); ?></strong> le <?php echo $comments_data['comment_date_formatted']; ?></p>
	<p><?php echo nl2br(htmlspecialchars($comments_data['comment'])); ?></p>
	</div>

<?php
} 

$comments->closeCursor(); 
?>


<!-- Création d'un formulaire pour poster un commentaire -->
		<form method="post" action="../post/post_blog_comments.php?ticket=<?php echo $tickets_data['id']; ?>"> <!-- Important pour la redirection après avoir posté le commentaire -->
					<p>
    				Pseudo <input type="text" name="pseudo" /><br />
    				<br/ >
    				Commentaire <textarea name="commentaire" rows="5" cols="45"></textarea>
					</p>

					<input type="submit" value="Valider" /><br/ >
					
		</form>

<a href="blog_index_controller.php">Revenir aux articles</a>

</body>
</html>






