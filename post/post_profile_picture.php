<?php

// J'ai un problème avec les IF sur cette page

session_start();
setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
setcookie('id', $data['id'], time() + 365*24*3600, null, null, false, true);
setcookie('password', $password, time() + 365*24*3600, null, null, false, true);


include("../pages_sections/db_connection.php");

// On teste la présence du fichier
if ($_FILES['profile_picture']['name'] == '')
{
    echo '<p>Veuillez choisir un fichier !</p>';
    echo '<p><a href ="../pages/coaching1_height_weight.php">Retour</a></p>';
}


// On teste si le fichier a bien été envoyé et s'il n'y a pas d'erreur

if (isset($_FILES['profile_picture']) AND $_FILES['profile_picture']['error'] == 0)
{
    // On teste si le fichier n'est pas trop gros : je ne comprends pas bien l'intérêt sachant que s'il est trop la ligne du dessus me mets déjà en erreur. Le fichier php.ini est paramétré sur 2 Mo mais même si je le change j'ai toujours une erreur si je veux upload des images plus grosses.

    if ($_FILES['profile_picture']['size'] <= 2000000)
    {
                // On teste si l'extension est autorisée

        $fileInfos = pathinfo($_FILES['profile_picture']['name']);
        $fileExtension = $fileInfos['extension'];
        $authorizedExtensions = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($fileExtension, $authorizedExtensions))
            {
            // On déclare des variables pour modifier le nom du fichier envoyé par l'utilisateur lors de l'enregistrement sur le serveur
                        
                // Création d'un nombre aléatoire de 2 chiffre entre 0 et 99
                $randomNumber = rand(0,99);

                // Enregistrement de la date et heure
                $date = date("Hisdmy");

                // Ajout du chiffre aléatoire, de la date et de l'extension au nom de fichier 
                $nameInServer = 'FR' . $randomNumber . '-' . $date . '.' . pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);


                // On valide le fichier et on le stocke définitivement sur le serveur
                move_uploaded_file($_FILES['profile_picture']['tmp_name'], '../uploads/' . $nameInServer);
                echo '<p>L\'envoi a bien été effectué !</p>';
                echo '<p><a href=../pages/coaching1_height_weight.php>Retour à l\'accueil<a></p>';

                // On stocke l'adresse de l'image dans la base de données
                $pseudo_bdd = $_SESSION['pseudo'];
                $bdd->exec("UPDATE members SET profile_picture = '$nameInServer' WHERE pseudo = '$pseudo_bdd'");
               
            }
    }
                
}

else
{
echo 'Le fichier ne doit pas être supérieur à 2 Mo et avoir une extension .jpg, .jpeg, .png ou .gif';
echo '<p><a href ="../pages/coaching1_height_weight.php">Retour</a></p>';
}

?>