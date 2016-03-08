<?php
// $user = new User();
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// exit;
if ( $_SESSION['role'] == $user->isAdmin() )
	$home = 'home';
else if ( $_SESSION['role'] != $user->isAdmin() )
	$home = 'home';
else
	$home = 'home_login';

require('views/home.phtml');
require('views/home_login.phtml');
?>