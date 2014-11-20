<?php
	require '../vendor/autoload.php';


	$router = new AltoRouter();

	$router->map( 'GET', '/', function() {
    	include __DIR__ . '/../views/index.php';
	});

	$router->map( 'GET', '/skickat', function() {
		include __DIR__ . '/../views/mailSent.php';
	});

	$router->map( 'POST', '/send-mail', function() {
		include __DIR__ . '/../views/sendMail.php';
	});

	// match current request url
	$match = $router->match();

	// call closure or throw 404 status
	if( $match && is_callable( $match['target'] ) ) {
		call_user_func_array( $match['target'], $match['params'] ); 
	} else {
		// no route was matched
		header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
	}
