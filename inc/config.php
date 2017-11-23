<?php
//Connect to DB PDO
define("DB_HOST", 'localhost');
define("DB_USER", 'loploz6x_admin');
define("DB_PASS", 'password');
define("DB_NAME", 'loploz6x_webstore');


try {
	$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
} catch(PDOException $e) {
	die("Error: could not connect". $e->getMessage());
}
?>