<?php 

ini_set('session.use_only_cookie', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
	'lifetime' => 1800,
	'domain' => 'localhost',
	'path' => '/',
	'secure' => true,
	'httponly' => true

]);

session_start();

if(!isset($_SESSION["last_generation"])) {
	regeneration_session_id();
}	else {
	$interval = 60 * 30;
	regeneration_session_id();
}

function regeneration_session_id() {
	session_regenerate_id(true);
	$_SESSION["last_generation"] = time();
}
