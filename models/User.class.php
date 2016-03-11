<?php

class User
{
	// Déclarer les propriétés
	private $id_user;
	private $login_user;
	private $hash_user;
	private $date_user;
	private $admin_user;

	// Déclarer les méthodes
	// Liste des getters
	
	public function getIdUser()
	{
		return $this->id_user;// On récupère la propriété id de $this
		// Pas de $ après ->
	}
	public function getLoginUser()
	{
		return $this->login_user;
	}
	public function getDateUser()
	{
		return $this->date_user;
	}
	public function isAdmin()// Un getter d'un booleen transforme le get en is
	{
		return $this->admin_user;
	}
	public function getHash()
	{
		return $this->hash_user;
	}

	// Liste des setters
	public function setLoginUser($login_user)
	{
		if (strlen($login_user) > 3 && strlen($login_user) < 31)
			$this->login_user = $login_user;
		else
			throw new Exception("Login incorrect (doit être compris entre 4 et 30 caractères)");
	}
	public function setAdminUser($admin_user)
	{
		if ($admin_user === true || $admin_user === false)
			$this->admin_user = $admin_user;
		else
			throw new Exception("Admin incorrect (doit être égal à true ou false)");
		// OU
		$this->admin_user = (bool)$admin_user;// (bool) permet de "caster" une variable en un type particulier, transformer n'importe quel type en booleen (ici)
	}

	// Liste des méthodes "autres"
	// verifier password ?
	public function verifPassword($password)
	{
		return password_verify($password, $this->hash_user);
	}
	// modifier password ?
	public function editPassword($oldPassword, $newPassword1, $newPassword2)
	{
		if ($newPassword1 === $newPassword2)
		{
			$newPassword = $newPassword1;
			if (strlen($newPassword) > 5)
			{
				if ($this->verifPassword($oldPassword))
				{
					$this->hash_user = password_hash($newPassword, PASSWORD_BCRYPT, ["cost"=>12]);
				}
				else
					throw new Exception("Ancien mot de passe incorrect");
			}
			else
				throw new Exception("Mot de passe est trop court (< 6 caractères)");
		}
		else
			throw new Exception("Les deux mots de passes ne correspondent pas");
	}
	public function initPassword($newPassword1, $newPassword2)
	{
		if ($this->hash_user == null)
		{
			if ($newPassword1 === $newPassword2)
			{
				$newPassword = $newPassword1;
				if (strlen($newPassword) > 5)
				{
					$this->hash_user = password_hash($newPassword, PASSWORD_BCRYPT, ["cost"=>12]);
				}
				else
					throw new Exception("Mot de passe est trop court (< 6 caractères)");
			}
			else
				throw new Exception("Les deux mots de passes ne correspondent");
		}
		else
			throw new Exception("Impossible d'initialiser un mot de passe une seconde fois");
	}
}


?>