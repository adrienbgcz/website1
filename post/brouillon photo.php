<?php

// On déclare des variables pour modifier le nom du fichier envoyé par l'utilisateur lors de l'enregistrement sur le serveur
                        
                        // Création d'un nombre aléatoire de 2 chiffre entre 0 et 99
                        $randomNumber = rand(0,99);

                        // Enregistrement de la date et heure
                        $date = date("Hismdy");

                        // Ajout du chiffre aléatoire et la date au nom de fichier 
                        $nameInServer = 'FR' . $randomNumber . '-' . $date . '.' . pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);




                        else
                        {
                                echo 'Seuls les fichiers avec une extension .jpg, .jpeg, .png, et .gif sont autorisés.';
                        }



else
                {
                        echo 'Le fichier ne doit pas dépasser 4 Mo.';
                        echo '<p><a href ="../pages/coaching1_height_weight.php">Retour</a></p>';
                }





$req = $bbd->prepare('INSERT INTO members(profile_picture) VALUES (?)' )
                $req->execute(array('../uploads/' . $nameInServer);))



?>