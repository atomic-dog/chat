<?php
$manager = new MessageManager($db);
$list = $manager->getAll();
require('views/message_list.phtml');
?>
