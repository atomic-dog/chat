<?php 
var_dump('coucou');
var_dump('coucou');
// SESSION
session_start();

<<<<<<< HEAD
$db = mysqli_connect("192.168.1.24", "chat", "chat", "chat");
// // <-- DEBUT TEST
// require('models/Message.class.php');
// require('models/MessageManager.class.php');
// $manager = new MessageManager($db);
// // $manager->create("doazijdoazijdoazjidoazijzd");
// $list = $manager->getAll();
// var_dump($list);
// // FIN TEST -->

=======
// $db = mysqli_connect("192.168.1.24", "chat", "chat", "chat");
// $db = mysqli_connect("localhost", "root", "", "chat");
$db = mysqli_connect("localhost", "3wa", "troiswa", "chat");
>>>>>>> 90368ab10000a737e202c1f5b515f21c89fec3d0
if (!$db)

	require('apps/offline.php');

// SECURISATION DE LA VARIABLE PAGE -> $page
$page = "home";
$access_page = ['home'];
$access_page_log = ['account', 'admin', 'home_login'];

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

require('apps/skel.php'); 
?>