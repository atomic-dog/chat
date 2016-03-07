
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

	// Liste des setters
	public function setLoginUser($login_user)
	{
		if (strlen($login_user) > 3 && strlen($login_user) < 31)
			$this->login_user = $login_user;
	}
	public function setAdminUser($admin_user)
	{
		if ($admin_user === true || $admin_user === false)
			$this->admin_user = $admin_user;
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
			}
		}
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
			}
		}
	}
}

// Tout ça n'a rien a foutre dans le fichier User.class.php, mais c'est plus pratique pour apprendre
// On va instancier notre classe User
$user = new User();
// $user -> objet
// User -> classe
// Un objet est une instance d'une classe
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => null
  private 'hash' => null
  private 'date' => null
  private 'admin' => null
*/
$user->setLoginUser("toto");
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => null
  private 'date' => null
  private 'admin' => null
*/
$user->setLoginUser("aa");
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => null
  private 'date' => null
  private 'admin' => null
*/
$user->initPassword("totototo", "totototo");
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => string '$2y$12$9n144prWnPaTt2SmtJGj6OVfHX9lZZQVELrQWwQqwD0OHPiYmQzBi' (length=60)
  private 'date' => null
  private 'admin' => null
*/
$user->initPassword("titititi", "titititi");
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => string '$2y$12$9n144prWnPaTt2SmtJGj6OVfHX9lZZQVELrQWwQqwD0OHPiYmQzBi' (length=60)
  private 'date' => null
  private 'admin' => null
*/
?>