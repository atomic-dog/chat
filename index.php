<?php 
// var_dump('coucou');
// var_dump('coucou');
$error = '';
spl_autoload_register(function($class)
{
    require('models/'.$class.'.class.php');
});
/*	AVANT :
function __autoload($class)
{
    require('models/'.$class.'.class.php');
}
*/
// SESSION
session_start();

// $db = mysqli_connect("192.168.1.24", "chat", "chat", "chat");
// // $db = mysqli_connect("localhost", "root", "", "chat");
// // $db = mysqli_connect("localhost", "3wa", "troiswa", "chat");
// if (!$db)

// 	require('apps/offline.php');

try
{
    $db = new PDO('mysql:dbname=chat;host=localhost', '3wa', 'troiswa');
    // $db = new PDO('mysql:dbname=chat;host=localhost', 'root', '');
}
catch (PDOException $e)
{
    $error = 'Erreur interne';
}

if (isset($_SESSION['id']))
{
	$manager = new UserManager($db);
	$manager->updateCurrentUser();
}

// SECURISATION DE LA VARIABLE PAGE -> $page
$page = "home";
$access_page = ['home', 'online'];
$access_page_log = ['account', 'admin', 'home_login', 'message'];

if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $access_page))
	{
		$page = $_GET['page'];
	} elseif (isset($_SESSION['id'])) {
		if (in_array($_GET['page'], $access_page_log))
		{
			$page = $_GET['page'];
		}
	}
	else
	{
		header('Location: home');
		exit;
	}
}

$traitements_action = [
	'login'=>'user',
	'logout'=>'user',
	'register'=>'user',
	'edit_user'=>'user',
	'create'=>'message',
];

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if (isset($traitements_action[$action])) {
		$value = $traitements_action[$action];
		require('apps/traitement_'.$value.'.php');
	} else {
		header('Location: home');
		exit;
	}

}
// index.php -> apps/message.php
// $_GET

if (isset($_GET['ajax']) && $page == 'message')
	require('apps/message_list.php');
else if (isset($_GET['ajax']) && $page == 'online')
	require('apps/online.php');
else
	require('apps/skel.php');

?>