<?php

$host = 'localhost'; 
$db = 'teste';
$user = 'root';
$password = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$conn = new mysqli($host, $user, $password, $db); 
if($conn ->connect_errno){
    echo "falha ao conectar (". $connect_errorno ." )  " . $conn->connect_error;
}


$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
