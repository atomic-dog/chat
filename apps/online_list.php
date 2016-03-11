<?php

$manager = new UserManager($db);
$list = $manager->getAll();
require('views/online_list.phtml');
?>
