<?php
/* ##PASCAL ~> Pas besoin de passer par une variable ici, c'est juste une remarque */
if ( $session_role == 'admin' )
	$header = 'header_admin';
else if ( $session_role == 'user' )
	$header = 'header_user';
else
	$header = 'header';

require('views/'.$header.'.phtml');
// require('views/header.phtml');
// require('views/header_user.phtml');
// require('views/header_admin.phtml');
?>