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
		<?php include("../pages_sections/header.php"); ?>
			<h1 class="blog_title">BLOG SPORT SANTÉ</h1></br>
			</br >
				<div  class="posts_organisation">
				<section>
				
					<?php
					while($data = $posts->fetch())
					{
					?>
					<!-- On affiche le titre -->
						<div class="posts_design">
							<h3>
								<?php echo htmlspecialchars($data['title']); ?>
								<em>Le <?php echo $data['creation_date_formatted']; ?></em>
							</h3>
					
					<!-- On affiche le contenu du billet -->
							<p>
								<?php echo(htmlspecialchars($data['content'])); ?>
							</p>
								<a href="blog_post_controller.php?post_id=<?php echo $data['id']; ?>">Commentaires</a>

						</div>
				</div>

				<?php
					}  
				$posts->closeCursor();

		?>
			</section>

		</div>
	</body>
</html>