<?php
session_start();
?>

<?php
if (isset($_POST['disconnection']) AND $_POST['disconnection'] == "yes")
{
	session_destroy();

}
