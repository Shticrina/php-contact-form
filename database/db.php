<?php

// MySQL connection details
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'becodeDB';
 
//Custom PDO options.
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

// Connect to MySQL and instantiate our PDO object
try {
	$pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password, $options);
	echo "Connected successfully<br>";
} catch (Exception $e) {
	die("Connection failed: " . $e->getMessage());
}

?>