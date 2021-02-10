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

	


		<header>
			<h1 class="blog_title">BLOG SPORT SANTÉ</h1></br>
		</header>	
			</br >
				<div class="post_design">
						<h3>
						<?php echo htmlspecialchars($post['title']); ?>
						<em>le <?php echo $post['creation_date_formatted']; ?></em>
						</h3>
				
				<!-- On affiche le contenu du billet -->
						<p>
						<?php echo(htmlspecialchars($post['content'])); ?>
						</p>
				</div>

<?php
	while ($comment = $comments->fetch())
	{
?>

<!-- On affiche les commentaires -->
	<div class="post_comments_design">
	<p><strong><?php echo htmlspecialchars($comment['author']); ?></strong> le <?php echo $comment['comment_date_formatted']; ?></p>
	<p><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></p>
	</div>

<?php
} 
?>


<!-- Création d'un formulaire pour poster un commentaire -->
		<form method="post" action="blog_post_view.php?action=addComment&amp;post_id=<?php echo $post['id']; ?>"> <!-- Important pour la redirection après avoir posté le commentaire -->
					<p>
    				Pseudo <input type="text" name="pseudo" /><br />
    				<br/ >
    				Commentaire <textarea name="commentaire" rows="5" cols="45"></textarea>
					</p>

					<input type="submit" value="Valider" /><br/ >
					
		</form>

<a href="blog_home_controller.php">Revenir aux articles</a>

</body>
</html>
