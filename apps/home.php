<?php

if ( $session_role == 'admin' )
	$home = 'home';
else if ( $session_role == 'user' )
	$home = 'home';
else
	$home = 'home_login';

require('views/home.phtml');
require('views/home_login.phtml');
?>