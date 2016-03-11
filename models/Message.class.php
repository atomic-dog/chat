
<?php

class Message
{
	// Déclarer les propriétés
	private $id_message;
	private $content_message;
	private $date_message;
	private $id_user_message;
	private $user;// Propriété calculée != db -> composition
	private $db;

	// Constructeur
	public function __construct($db)
	{
		$this->db = $db;
	}

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
	public function getUser()
	{
		if ($this->user == null)
		{
			$manager = new UserManager($this->db);
			$this->user = $manager->getById($this->id_user_message);
		}
		return $this->user;
	}

	// Liste des setters
	public function setContentMessage($content_message)
	{
		if (strlen($content_message) > 1 && strlen($content_message) <1023)
			$this->content_message = $content_message;

		else
			throw new Exception("Votre message doit contenir entre 1 et 1023 caractères");
	}
	public function setUser(User $user)
	{
		$this->user = $user;
		$this->id_user_message = $user->getIdUser();
	}

	// Liste des méthodes "autres"
	

}

?>