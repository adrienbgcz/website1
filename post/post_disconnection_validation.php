<?php
session_start();


if ($_POST['disconnection'] == 'yes')
{
	$_SESSION = array();
	session_destroy();
	setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
	setcookie('id', $data['id'], time() + 365*24*3600, null, null, false, true);
	setcookie('password', $password, time() + 365*24*3600, null, null, false, true);
	header('Location: ../pages/coaching1_height_weight.php');
}
	else
	{
		header('Location: ../pages/coaching1_height_weight.php');
	}

?>