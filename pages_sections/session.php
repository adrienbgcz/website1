<?php

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
	{
    	echo '<p>Bonjour ' . $_SESSION['pseudo'] . ' !</p>';


include("../pages_sections/db_connection.php");

$pseudo_bdd = $_SESSION['pseudo'];
$req = $bdd->query('SELECT profile_picture FROM members WHERE pseudo = \'' . $pseudo_bdd . '\'');
$data = $req->fetch();


		if ($data['profile_picture'] != '') 
		{
		echo '<img src="../uploads/' . $data['profile_picture'] . '" height="5%" width="5%" >';
		 
		?>
		<form action="../post/post_profile_picture.php" method="post" enctype="multipart/form-data">
        	<p>
                <input type="file" name="profile_picture" /><br />
                <input type="submit" value="Modifier ma photo" />
        	</p>
		</form>
		
		<?php
		}
		
			else
			{
?>
    	

		
    	<!-- On affiche un input pour envoyer une photo de profil --> 
 		<form action="../post/post_profile_picture.php" method="post" enctype="multipart/form-data">
        	<p>
                Ajouter une photo :<br />
                <input type="file" name="profile_picture" /><br />
                <input type="submit" value="Envoyer ma photo" />
        	</p>
		</form>
<?php
			}
    	include("../pages_sections/disconnection_section.php");

	}
		else
			{
				include("../pages_sections/connection_inscription.php");
			}
?>