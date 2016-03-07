
<?php

class Message
{
	// Déclarer les propriétés
	private $id_message;
	private $content_message;
	private $date_message;
	private $id_user_message;

	// Déclarer les méthodes
	// Liste des getters
	// getter de $id -> getId
	public function getId_message()
	{
		return $this->id_message;// On récupère la propriété id de $this
		// Pas de $ après ->
	}
	public function getContent_message()
	{
		return $this->content_message;
	}
	public function getDate_message()
	{
		return $this->date_message;
	}
	public function getId_user_message()
	{
		return $this->id_user_message;
	}

	// Liste des setters
	public function setContent_message($content_message)
	{
		if (strlen($login) > 1 && strlen($login) <1023)
			$this->login = $login;
	}
	

	// Liste des méthodes "autres"
	// verifier password ?
	public function verifPassword($password)
	{
		return password_verify($password, $this->hash);
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
					$this->hash = password_hash($newPassword, PASSWORD_BCRYPT, ["cost"=>12]);
				}
			}
		}
	}
	public function initPassword($newPassword1, $newPassword2)
	{
		if ($this->hash == null)
		{
			if ($newPassword1 === $newPassword2)
			{
				$newPassword = $newPassword1;
				if (strlen($newPassword) > 5)
				{
					$this->hash = password_hash($newPassword, PASSWORD_BCRYPT, ["cost"=>12]);
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
$user->setLogin("toto");
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => null
  private 'date' => null
  private 'admin' => null
*/
$user->setLogin("aa");
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