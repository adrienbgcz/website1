<?php
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
    echo 'yes';
}
    else
    {
        echo 'error';
        echo print_r($FILES);
    }
    
//ESSAYER D'AFFICHER D'OU VIENT L'ERREUR




// On teste si le fichier n'est pas trop gros
    if ($_FILES['profile_picture']['size'] > 2000000)
    {
        echo 'Le fichier ne doit pas être supérieur à 2 Mo.';
        echo '<p><a href ="../pages/coaching1_height_weight.php">Retour</a></p>';         
    }
        // On teste si l'extension est autorisée
        
                




?>