<?php
 // DEBUG
// var_dump('coucou');
// var_dump('coucou');
// var_dump($_POST);
// var_dump($_GET);
// exit;
// Etape 1
if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'login')
	{
		// Etape 1
		if (isset($_POST['login'], $_POST['password']))
		{
			// Etape 2
			$login = $_POST['login'];
			$password = $_POST['password'];
			// Etape 3
			if (empty($login))
				$error = "Login vide";
			else if (empty($password))
				$error = "Password vide";
			else
			{
				// Etape 4
				$login = mysqli_real_escape_string($db, $login);
				$query = "SELECT * FROM users WHERE login_user='".$login."'";
				$res = mysqli_query($db, $query);
				if ($res)
				{
					$user = mysqli_fetch_assoc($res);
					if ($user)
					{
						if (password_verify($password, $user['hash_user']))
						{
							// Etape 5
							$_SESSION['id'] = $user['id_user'];
							$_SESSION['login'] = $user['login_user'];
							$_SESSION['role'] = $user['admin_user'];
							header('Location: home');
							exit;
						}
						else
							$error = "Mot de passe incorrect";

					}
					else
						$error = "Login incorrect";
				}
				else
					$error = "Erreur interne au serveur";
			}
		}
	}
	else if ($action == 'register')
	{
		// Etape 1
		if (isset($_POST['login'], $_POST['password1'], $_POST['password2']))
		{
// var_dump($_POST);
			// Etape 2
			$login = $_POST['login'];
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];

			// Etape 3
			if (strlen($login) < 3)
				$error = "Login trop court (< 3)";
			else if (strlen($login) > 31)
				$error = "Login trop long (> 31)";
			else if (strlen($password1) < 6)
				$error = "Mot de passe trop court";
			else if ($password1 !== $password2)
				$error = "Les mots de passe ne correspondent pas";
			else
			{
				$password = $password1;
				// Etape 4
				$login = mysqli_real_escape_string($db, $login);
				$password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>12]);
				$password = mysqli_real_escape_string($db, $password);

				$query = "INSERT INTO users (login_user, hash_user) VALUES('".$login."', '".$password."')";
				$res = mysqli_query($db, $query);
				var_dump(mysqli_error($db));
				if ($res)

				{
					// Etape 5
					$_SESSION['id'] = mysqli_insert_id($db);
					$_SESSION['login'] = $login;
					$_SESSION['role'] = 'user';
					header('Location: home');
					exit;
				}
				else
					$error = "Erreur interne au serveur";
			}
		}
	}

	else if ($action == 'edit_user')
	{
		// Etape 1
		if (isset($_POST['login'], $_POST['old_password'], $_POST['new_password'], $_POST['new_password_repeat']))
		{
			// var_dump($_POST);

			// Etape 2
			$login = $_POST['login'];
			$old_password = $_POST['old_password'];
			$new_password = $_POST['new_password'];
			$new_password_repeat = $_POST['new_password_repeat'];

			/* ##PASCAL ~> Les mots de passes correspondent pas, mais tant pis on continu quand meme :p */

			if ($new_password !== $new_password_repeat)
			{
				$error = "Les mots de passe ne correspondent pas";
			}			

			// Etape 3
			// else if (strlen($login) < 3)
			// 	$error = "Login trop court (< 3)";
			// else (strlen($login) > 31)
			// 	$error = "Login trop long (> 31)";

			$query = "SELECT * FROM users WHERE id_user='".$_SESSION['id']."'";
			$res = mysqli_query($db, $query);
			$user = mysqli_fetch_assoc($res);


			if (password_verify($old_password, $user['hash_user']))
			{

				// Etape 4
				$login = mysqli_real_escape_string($db, $login);
				$password = password_hash($new_password, PASSWORD_BCRYPT, ['cost'=>12]);
				$password = mysqli_real_escape_string($db, $password);

				$query = "UPDATE users SET login_user='".$login."', hash_user='".$password."' WHERE id_user='".$_SESSION['id']."'";
				// var_dump($query);die;
				$res = mysqli_query($db, $query);
				if ($res)
				{
					// Etape 5
					// header('Location: account');
					// exit;
				}
				else
					$error = "Erreur interne au serveur";

			}
			else
				$error = "Les mots de passe ne correspondent pas";
			
		}
	}

	else if ($action == 'logout'){
		session_destroy();
		$_SESSION = array();
		header('Location: home');
		exit;
	}
	else
		$error = "Erreur interne (filou détecté !!!)";
}

?>
