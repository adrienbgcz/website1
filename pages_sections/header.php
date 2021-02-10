<header>
				


				<div id="main_title">
					<div id="logo">
						<img src="../images/hand_heart.png" alt="" />
					</div>
					<h1>Adrien B.<br/><span>Coaching Sport Santé</span></h1>				
					 <script type="text/javascript" src="test.js" defer></script>
				</div>

				<?php
	
				if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
				{
				?>
					<nav>
						<ul>
							<li><a href="../pages/coaching1_height_weight.php">COACHING</a></li>
							<li><a href="../pages/infos.php">INFOS</a></li>
							<li><a href="../pages/formulaire_message.php">CONTACT</a></li>
							<li><a href="../pages/blog_home_controller.php">BLOG</a></li>
							<li><a href="../pages/health_check.php">MES BILANS</a></li>
						</ul>
					</nav>
				<?php
				}
					else
					{
					?>
						<nav>
							<ul>
								<li><a href="../pages/coaching1_height_weight.php">COACHING</a></li>
								<li><a href="../pages/infos.php">INFOS</a></li>
								<li><a href="../pages/formulaire_message.php">CONTACT</a></li>
								<li><a href="../pages/blog_home_controller.php">BLOG</a></li>
							</ul>
						</nav>
					<?php
					}
					?>


			</header>