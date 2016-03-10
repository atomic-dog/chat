<?php
require('models/Message.class.php');
require('models/MessageManager.class.php');


$messageManager = new MessageManager($db);


if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'create')
	{
		if (isset($_POST['content_message']))
		{
			try
			{
				$manager = new UserManager($db);
				$user = $manager->getById($_SESSION['id']);
				$message = $messageManager->create($_POST['content_message'], $user);
					header('Location: home');
					exit;
			}
			catch (Exception $e)
			{
				$error = $e->getMessage();
			}
		}
	}

}
// ?>