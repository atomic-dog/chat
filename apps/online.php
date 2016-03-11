<?php
$count = 0;
$max = sizeof($list);
while ($count < $max)
{
	$user = $list[$count];
  	require('views/online.phtml');
	$count++;
}
?>
