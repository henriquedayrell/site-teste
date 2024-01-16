<?php 
include "conexao.php";
    $nome = $_POST["nome"];
    $data = $_POST["data"];
    $preco = $_POST["preco"];
    $descricao = $_POST ["descricao"];
    $fases = $_POST ["fases"];
    if (isset ($_POST ["multiplayer"]))
    $multiplayer = 1; 
    else 
    $multiplayer = 0;
    $categoria = $_POST["categoria"];


    $sql = "INSERT INTO games (nome, data, preco, descricao, fases, multiplayer, categoria) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsiis", $nome, $data, $preco, $descricao, $fases, $multiplayer, $categoria);

    if ($stmt->execute()) {
        echo "enviado.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

