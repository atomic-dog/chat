<?php
// $user = new User();
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// exit;
<<<<<<< HEAD
<<<<<<< HEAD

=======
// if ( $_SESSION['role'] == $user->isAdmin() )
// 	$home = 'home';
// else if ( $_SESSION['role'] != $user->isAdmin() )
// 	$home = 'home';
// else
// 	$home = 'home_login';
=======
>>>>>>> 095504fe6e4c163743d35209be449e3173145b2a

if (isset($_SESSION['id'],$_SESSION['login']))
{
	require('views/home.phtml');
}
else
{
	require('views/home_login.phtml');
}
>>>>>>> 90368ab10000a737e202c1f5b515f21c89fec3d0

// require('views/home.phtml');
// require('views/home_login.phtml');
?>