<?php 

$options = [
   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

$user = 'root';
$pass = '';
$dsn = 'mysql:host=localhost;dbname=better.loc';

try {
   $pdo = new PDO($dsn, $user, $pass, $options);
} catch(PDOException $e) {
   $e->getMessage();
}

