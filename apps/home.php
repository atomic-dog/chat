<?php
// $user = new User();
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// exit;

if (isset($_SESSION['id'],$_SESSION['login']))
{
	require('views/home.phtml');
}
else
{
	require('views/home_login.phtml');
}

// require('views/home.phtml');
// require('views/home_login.phtml');
?>