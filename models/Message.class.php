
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
	public function getIdMessage()
	{
		return $this->id_message;// On récupère la propriété id de $this
		// Pas de $ après ->
	}
	public function getContentMessage()
	{
		return $this->content_message;
	}
	public function getDateMessage()
	{
		return $this->date_message;
	}
	public function getIdUserMessage()
	{
		return $this->id_user_message;
	}

	// Liste des setters
	public function setContentMessage($content_message)
	{
		if (strlen($content_message) > 1 && strlen($content_message) <1023)
			$this->content_message = $content_message;
	}
	

	// Liste des méthodes "autres"
	
	
	
}

// Tout ça n'a rien a foutre dans le fichier User.class.php, mais c'est plus pratique pour apprendre
// On va instancier notre classe User
$message = new Message();
// $user -> objet
// User -> classe
// Un objet est une instance d'une classe
var_dump($message);
/*
object(User)[1]
  private 'id' => null
  private 'login' => null
  private 'hash' => null
  private 'date' => null
  private 'admin' => null
*/
$message->setContentMessage("toto");
var_dump($message);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => null
  private 'date' => null
  private 'admin' => null
*/

?>git statu