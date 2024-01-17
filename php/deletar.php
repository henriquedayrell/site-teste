<?php
include "php/checkauth.php";
include "conexao.php";

$id = $_GET["id"];

$sql = "select imagem from games where id = ?";
$stmt = $conn->prepare($sql);  
$stmt->bind_param("s", $id);   
$dados = get_result($stmt);
// var_dump($dados[0]->imagem);
// exit;
if (!file_exists($dados[0]->imagem)){
    unlink($dados[0]->imagem);
}

$sql = "delete from games 
where id = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("location: /games/lista.php");
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
include("../footer.php");