<?php
class UserManager
{
	// Déclarer les propriétés
	private $db;

	// Constructeur
	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getByLogin($login)
	{
		// $login = mysqli_real_escape_string($this->db, $login);
		// $query = "SELECT * FROM users WHERE login_user='".$login."'";
		$login = $this->db->quote($login);
		$query = "SELECT * FROM users WHERE login_user=".$login;
		// $res = mysqli_query($this->db, $query);
		$res = $this->db->query($query);
		if ($res)
		{
			// $user = mysqli_fetch_object($res, "User");
			$user = $res->fetchObject("User");
			if ($user)
			{
				return $user;
			}
			else
				throw new Exception("Utilisateur non existant");
		}
		else
			throw new Exception("Erreur interne");

	}
	public function getById($id)
	{
		// $id = intval($id);
		// $query = "SELECT * FROM users WHERE id_user='".$id."'";
		// $res = mysqli_query($this->db, $query);
		$id = intval($id);
		$query = "SELECT * FROM users WHERE id_user=".$id;
		$res = $this->db->query($query);
		if ($res)
		{
			// $user = mysqli_fetch_object($res, "User");
			$user = $res->fetchObject("User");
			if ($user)
			{
				return $user;
			}
			else
				throw new Exception("Utilisateur non existant");
		}
		else
			throw new Exception("Erreur interne");
	}

	public function create($login, $password1, $password2)
	{
		$user = new User();
		$user->setLoginUser($login);
		$user->setAdminUser(false);
		$user->initPassword($password1, $password2);
		// $login = mysqli_real_escape_string($this->db, $user->getLoginUser());
		// $hash = mysqli_real_escape_string($this->db, $user->getHash());
		$login = $this->db->quote($user->getLoginUser());
		$hash = $this->db->quote($user->getHash());
		// $query = "INSERT INTO users (login_user, hash_user) VALUES('".$login."', '".$hash."')";
		$query = "INSERT INTO users (login_user, hash_user) VALUES(".$login.", ".$hash.")";
		
		try
		{
				$res = $this->db->exec($query);
		}
		catch (Exception $e)
		{
			throw new Exception("erreur interne");
		}
		return $this->getByLogin($user->getLoginUser());	
	}

	public function getAll()
	{

		$query = "SELECT * FROM users ORDER BY login_user ASC ";
		// $res = mysqli_query($this->db, $query);
		$res = $this->db->query($query);
		if ($res)
		{
			$users = [];
			// while ($message = mysqli_fetch_object($res, 'Message', [$this->db]))// On récupère les résultats de notre requête un par un
			while ($user = $res->fetchObject("User"))
			{
				$users[] = $user;
			}
			return $users;
		}
		else
			throw new Exception("Erreur interne");
	}

	public function isOnline()
	{
	
		$query = "SELECT * FROM users WHERE date_user>CURRENT_TIMESTAMP	- 5";
		$res = $this->db->query($query);
		if ($res)
		{
			$users = [];
			// while ($message = mysqli_fetch_object($res, 'Message', [$this->db]))// On récupère les résultats de notre requête un par un
			while ($user = $res->fetchObject("User"))
			{
				$users[] = $user;
			}
			return $users;
		}
		else
			throw new Exception("Erreur interne");
	}

	public function updateCurrentUser()
	{
		$id = intval($_SESSION['id']);
		// $user = $this->getById($id);
		$query = "UPDATE users SET date_user=CURRENT_TIMESTAMP WHERE id_user='".$id."'";
		// var_dump($query);die;
		$res = $this->db->exec($query);
		
	}




	// public function edit($oldPassword, $newPassword1, newPassword2)
	// {

	// }
}
	// public function editPassword($oldPassword, $newPassword1, $newPassword2)
	// {

	// 			$password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>12]);
	// 			$password = mysqli_real_escape_string($db, $password);

	// 			$query = "INSERT INTO users (hash_user) VALUES('".$password."')";
	// 			$res = mysqli_query($this->db, $query);
	// 			if ($res)
	// 			{
	// 				$user = mysqli_fetch_object($res, "User");
	// 		if ($user)
	// 		{
	// 			return $user;
	// 		}
	// 		else
	// 			throw new Exception("erreur mot de passe");
	// 		}
	// 		else
	// 		throw new Exception("Erreur interne");
	// } 

?>