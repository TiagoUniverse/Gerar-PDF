<?php

// conexão PDO no BD

$serverName = "SQLSERVER";
$database = "LAB_Louco";
$username = "tiagolopes";
$password = "gti2022";

try{
    $pdo = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    echo "Conexão com o banco de dados com sucesso!";
} catch (PDOException $e){
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}


require_once "arquivo pdf.php";