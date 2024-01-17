<?php 
include "php/checkauth.php";
// conecta com o banco de dados
include "conexao.php";

// recebe valores do formulário
    $nome = $_POST["nome"];
    $data = $_POST["data"];
    $preco = $_POST["preco"];
    $descricao = $_POST ["descricao"];
    $email = $_POST ["email"];
    $fases = $_POST ["fases"];

    if (isset ($_POST ["multiplayer"]))
    $multiplayer = 1; 
    else 
    $multiplayer = 0;
    $categoria = $_POST["categoria"];

    // var_dump($_FILES); 
    // exit;

     // faz o upload da imagem
     $target_dir = "../uploads/";
     $nome_arquivo = basename($_FILES["imagem"]["name"]);
     $target_file = $target_dir . $nome_arquivo;
     if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
         echo "The file ". htmlspecialchars( basename( $_FILES["imagem"]["name"])). " has been uploaded.";
       } else {
         echo "Sorry, there was an error uploading your file.";
       }
      
// insere no banco de dados
    $sql = "INSERT INTO games (nome, data, preco, descricao, email, fases, multiplayer, categoria, imagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdssiiss", $nome, $data, $preco, $descricao, $email, $fases, $multiplayer, $categoria, $nome_arquivo);
    
    if ($stmt->execute()) {
        header("location: /games/lista.php");
    } else {
        echo "Error: " . $stmt->error;
    }

   
// fecha a conexão com o banco
    $stmt->close();
    include("../footer.php");


