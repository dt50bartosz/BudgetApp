<?php

$dsn = 'mysql:host=localhost;dbname=finance_app'; 
$username = 'root';     
$password = '';         

try {
   
    $pdo = new PDO($dsn, $username, $password);  
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
