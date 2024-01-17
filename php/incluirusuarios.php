<?php 
include "conexao.php";
 $nome = $_POST["nome"];
 $idade = $_POST["idade"];
 $pais = $_POST["pais"];
 $cep = $_POST ["cep"];
 $email = $_POST["email"];
 $senha = $_POST["senha"];
$senha = hash("sha256",$senha);
 $sql = "INSERT INTO usuarios (nome, idade, pais, cep, email, senha) VALUES (?, ?, ?, ?, ?, ?)";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param("sissss", $nome, $idade, $pais, $cep, $email, $senha);
 
 if ($stmt->execute()) {
     header("location: /games/login.php");
 } else {
     echo "Error: " . $stmt->error;
 }


// fecha a conexão com o banco
 $stmt->close();
 include("../footer.php");