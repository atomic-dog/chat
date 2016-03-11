
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


	public function create($content_message, User $user)
	{
		$message = new Message($this->db);
		$message->setContentMessage($content_message);
		$message->setUser($user);
		// $content_message = mysqli_real_escape_string($this->db, $message->getContentMessage());
		// $id_user = intval($message->getUser()->getIdUser());
  //     $query = "INSERT INTO messages (content_message, id_user_message) VALUES('".$content_message."', '".$id_user."')";
		$content_message = $this->db->quote($message->getContentMessage());
		$id_user = intval($message->getUser()->getIdUser());
		$query = "INSERT INTO messages (content_message, id_user_message) VALUES(".$content_message.", ".$id_user.")";
		try
		{
			$res = $this->db-> exec($query);
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
		// $res = mysqli_query($this->db, $query);
		$res = $this->db->query($query);
		if ($res)
		{
			$messages = [];
			// while ($message = mysqli_fetch_object($res, 'Message', [$this->db]))// On récupère les résultats de notre requête un par un
			while ($message = $res->fetchObject("Message", [$this->db]))
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