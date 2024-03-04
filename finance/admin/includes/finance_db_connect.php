<?php 

$dsn = "mysql:host=localhost;dbname=finance";
$dbusername = 'root';
$dbpass = '';

try {
	// DSN
	$pdo = new PDO($dsn, $dbusername, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	// if($pdo) {
	// 	echo "connected";
	// }

} catch(PDOException $e) {
	die("Connection failed" . $e->getMessage());
}