
<?php
class MessageManager
{
	// Déclarer les propriétés
	private $db;

	// Constructeur
	public function __construct($db)
	{
		$this->db = $db;
	}


	public function create($content_message)
	{
		$message = new Message();
		$message->setContentMessage($content_message);
		$content_message = mysqli_real_escape_string($this->db, $message->getContentMessage());
      	$query = "INSERT INTO messages (content_message, id_user_message) VALUES('".$content_message."', '".$_SESSION['id']."')";
		try
		{
			$res = mysqli_query($this->db, $query);
		}
		catch (Exception $e)
		{
			throw new Exception("Erreur interne");
		}
		// return $this->getById($content_message->create());
	}

	// public function create($content_message)
	// {
	// 	$content_message = mysqli_real_escape_string($this->db, $content_message);
 //      	$query = "INSERT INTO messages (content_message, id_user_message) VALUES('".$content_message."', '".$_SESSION['id']."')";
	// 	$res = mysqli_query($this->db, $query);
	// 	if ($res)
	// 	{
	// 		$content_message = mysqli_fetch_object($res, "Message");
	// 		if ($content_message)
	// 		{
	// 			return $content_message;
	// 		}
	// 	}
	// 	else
	// 		throw new Exception("Erreur interne");
	// }

	// public function getById($id_message)
	// {
	// 	$id_message = mysqli_real_escape_string($this->db, $id_message);
	// 	$query = "SELECT * FROM messages WHERE id_message='".$id_message."'";
	// 	$res = mysqli_query($this->db, $query);
	// 	if ($res)
	// 	{
	// 		$content_message = mysqli_fetch_object($res, "Message");
	// 		if ($content_message)
	// 		{
	// 			return $content_message;
	// 		}
	// 		else
	// 			throw new Exception("Message non trouvé");
	// 	}
	// 	else
	// 		throw new Exception("Erreur interne");
	// }

	public function getAll()
	{
		$query = "SELECT * FROM messages";
		$res = mysqli_query($this->db, $query);
		if ($res)
		{
			$messages = [];
			while ($message = mysqli_fetch_object($res, 'Message'))// On récupère les résultats de notre requête un par un
			{
				$messages[] = $message;
			}
			return $messages;
		}
		else
			throw new Exception("Erreur interne");
	}

	// public function getAllFromId()
	// {
	// 	$query = "SELECT * FROM messages";
	// 	$res = mysqli_query($this->db, $query);
	// 	if ($res)
	// 	{
	// 		$content_message = mysqli_fetch_object($res, "Message");
	// 		if ($content_message)
	// 		{
	// 			return $content_message;
	// 		}
	// 	}
	// 	else
	// 		throw new Exception("Erreur interne");
	// }
}
?>