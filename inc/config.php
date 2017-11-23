<?php
//Connect to DB PDO
define("DB_HOST", 'us-cdbr-iron-east-05.cleardb.net');
define("DB_USER", 'b9502f77308eab');
define("DB_PASS", '83ec21e9');
define("DB_NAME", 'heroku_b53c6be955ed9de');


try {
	$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
} catch(PDOException $e) {
	die("Error: could not connect". $e->getMessage());
}
?>