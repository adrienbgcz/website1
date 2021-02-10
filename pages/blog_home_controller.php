<?php
session_start();
?>


<?php
require('blog_model.php');

$posts = getPosts();

require('blog_home_view.php');



		
