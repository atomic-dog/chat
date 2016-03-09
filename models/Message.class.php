
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

		else
			throw new Exception("Votre message doit contenir entre 1 et 1023 caractères");
	}
	

	// Liste des méthodes "autres"
	

}

?>