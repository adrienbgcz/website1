<?php 
					// Connexion à la base de données
					try
					{
					$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
					}

					catch(Exception $e)
					{
	        		die('Erreur : '.$e->getMessage());
					}

					$tickets = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_formatted FROM tickets ORDER BY id DESC');
?>



<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="site_projet_1.css" />
		<title>Blog</title>
	</head>




	<body class="page_block">

				<h1 class="blog_title">BLOG SPORT SANTÉ</h1></br>
				
			</br >
	
					
					<?php
					while($tickets_data = $tickets->fetch())
					{
					?>
					<!-- On affiche le titre -->
						<div class="post_design">
							<h3>
							<?php echo htmlspecialchars($tickets_data['title']); ?>
							<em>Le <?php echo $tickets_data['creation_date_formatted']; ?></em>
							</h3>
					
					<!-- On affiche le contenu du billet -->
							<p>
							<?php echo(htmlspecialchars($tickets_data['content'])); ?>
							</p>
						<a href="blog_comments.php?ticket=<?php echo $tickets_data['id']; ?>">Commentaires</a>

						</div>
			

					<?php
					}  

					$tickets->closeCursor();

					?>
			
</body>
</html>

		
