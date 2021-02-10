<?php

require('blog_model.php');

if (isset($_GET['post_id']) AND $_GET['post_id'] > 0) 
{
    $post = getPost($_GET['post_id']);
    $comments = getComments($_GET['post_id']);
    require('blog_post_view.php');
}
else 
{
    echo 'Erreur : aucun identifiant de billet envoyé';
}



//NE FONCTIONNE PAS
function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) 
    {
        die('Impossible d\'ajouter le commentaire !');
    }
    else 
    {
        header('Location: blog_post_view.php?action=post&id=' . $postId);
    }
}

?>