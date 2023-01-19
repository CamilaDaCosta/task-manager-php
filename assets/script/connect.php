<?php
/** 
 * FORMA 1
 * $conn = mysqli_connect("db","user","pass","task-manager") or die(mysqli_error());
 * echo "Conectado";
 * $conn->close();
 **/

try{
    $pdo = new PDO('mysql:host=db;dbname=task-manager','user','pass');    
}catch(PDOException $e){
    echo "Erro ao Conectar: " . $e->getMessage();
}