<?php 
try {
	
	// Getting the records in database
	$query = "SELECT * FROM services";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	$results = $stmt->fetchall();


} catch (Exception $e) {
	die("Connection faild" . $e->getMessage());
}