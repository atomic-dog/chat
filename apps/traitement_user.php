<?php
 // DEBUG
// var_dump('coucou');
// var_dump('coucou');
// var_dump($_POST);
// var_dump($_GET);
// exit;
require('models/User.class.php');
require('models/UserManager.class.php');
$userManager = new UserManager($db);

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'login')
	{
		if (isset($_POST['login'], $_POST['password']))
		{
			try
			{
				$manager = new UserManager($db);
				$user = $userManager->getByLogin($_POST['login']);
				$user->verifPassword($_POST['password']);
				$_SESSION['id'] = $user->getIdUser();
				$_SESSION['login'] = $user->getLoginUser();
				// $_SESSION['role'] = $user->isAdmin();
				header('Location: home');
				exit;
			}
			catch (Exception $e)
			{
				$error = $e->getMessage();
			}
		}
	}
	else if ($action == 'register')
	{
		if (isset($_POST['login'], $_POST['password1'], $_POST['password2']))
		{
			try
			{
				$userManager->create($_POST['login'], $_POST['password1'], $_POST['password2']);
				$_SESSION['id'] = mysqli_insert_id($db);
				$_SESSION['login'] = $login;
				// var_dump($userManager);exit;
				// $_SESSION['id'] = $user->getIdUser();
				// $_SESSION['login'] = $user->getLoginUser();
				// $_SESSION['role'] = $user->isAdmin();
				header('Location: home');
				exit;
			}
			catch (Exception $e)
			{
				$error = $e->getMessage();
			}

		}
	}












	
	// else if ($action == 'edit_user')
	// {
	// 	// Etape 1
	// 	if (isset($_POST['oldPassword'], $_POST['newPassword1'], $_POST['newPassword2']))
	// 	{
	// 		if ($new_password !== $new_password_repeat)
	// 		{
	// 			$error = "Les mots de passe ne correspondent pas";
	// 		}			
	// 		$query = "SELECT * FROM users WHERE id_user='".$_SESSION['id']."'";
	// 		$res = mysqli_query($db, $query);
	// 		$user = mysqli_fetch_assoc($res);

	// 		if (password_verify($old_password, $user['hash_user']))
	// 		{
	// 			// Etape 4
	// 			$login = mysqli_real_escape_string($db, $login);
	// 			$password = password_hash($new_password, PASSWORD_BCRYPT, ['cost'=>12]);
	// 			$password = mysqli_real_escape_string($db, $password);

	// 			$query = "UPDATE users SET login_user='".$login."', hash_user='".$password."' WHERE id_user='".$_SESSION['id']."'";
	// 			// var_dump($query);die;
	// 			$res = mysqli_query($db, $query);
	// 			if ($res)
	// 			{
	// 				Etape 5
	// 				header('Location: account');
	// 				exit;
	// 			}
	// 		}			
	// 	}
	// }

	else if ($action == 'logout')
	{
		session_destroy();
		$_SESSION = array();
		header('Location: home');
		exit;
	}
	else
		$error = "Erreur interne (filou détecté !!!)";
}

?>
