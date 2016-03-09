<?php
// $user = new User();
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// exit;
// if ( $_SESSION['role'] == $user->isAdmin() )
// 	$home = 'home';
// else if ( $_SESSION['role'] != $user->isAdmin() )
// 	$home = 'home';
// else
// 	$home = 'home_login';

if (isset($_SESSION['id'],$_SESSION['login']))
{
	require('views/home.phtml');
}
else
{
	require('views/home_login.phtml');
}

?>