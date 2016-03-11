<?php
$manager = new MessageManager($db);
$list = $manager->getAll();
require('views/message_list.phtml');
var_dump($list);


?>
