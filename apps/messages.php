<?php

$count = 0;
$max = sizeof($list);
while ($count < $max)
{
	$message = $list[$count];
  	require('views/message.phtml');
	$count++;
}
?>