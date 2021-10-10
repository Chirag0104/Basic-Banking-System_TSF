<?php   
    $host = 'localhost';
    $db = 'bank_data';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        throw new PDOException($e -> getMessage());
    }

    require_once 'crud.php';
    $crud = new crud($pdo); 
    // here crud with new is the class 

?>