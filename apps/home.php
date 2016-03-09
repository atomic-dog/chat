<?php
// $user = new User();
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// var_dump($user->isAdmin());
// exit;
<<<<<<< HEAD

=======
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
>>>>>>> 90368ab10000a737e202c1f5b515f21c89fec3d0

// require('views/home.phtml');
// require('views/home_login.phtml');
?>