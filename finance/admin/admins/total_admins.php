<?php 

try {
	function rowCount($pdo) {
		$query = "SELECT * FROM admins";
		$stmt = $pdo->prepare($query);
		$stmt->execute();
		return $stmt->rowCount();
	}

} catch(PDOException $e) {
	die("query Failed" . $e->getMessage());
	
}