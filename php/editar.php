
<?php
include "php/checkauth.php";

include "conexao.php";
// recebe valores do get 
$id = $_GET["id"];
// recebe valores do formulário
$nome = $_POST["nome"];
$data = $_POST["data"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$email = $_POST["email"];
$fases = $_POST["fases"];

if (isset($_POST["multiplayer"]))
    $multiplayer = 1;
else
    $multiplayer = 0;
$categoria = $_POST["categoria"];

// verifica se a imagem atual existe
$sql = "select imagem from games where id = ?";
$stmt = $conn->prepare($sql);  
$stmt->bind_param("s", $id);   
$dados = get_result($stmt);
// var_dump($dados[0]->imagem);
// exit;
if (!file_exists($dados[0]->imagem)){
    unlink($dados[0]->imagem);
}
// edita a imagem substituindo-a 
$target_dir = "../uploads/";
$nome_arquivo = basename($_FILES["imagem"]["name"]);
$target_file = $target_dir . $nome_arquivo;
if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["imagem"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }



$sql = "update games 
SET nome = ?,
data = ?,
preco = ?,
descricao = ?,
email = ?,
fases = ?,
multiplayer = ?,
categoria = ?,
imagem = ?
where id = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdssiissi", $nome, $data, $preco, $descricao, $email, $fases, $multiplayer, $categoria,$nome_arquivo, $id);


if ($stmt->execute()) {
   header("location: /games/lista.php");
} else {
   echo "Error: " . $stmt->error;
}


$stmt->close();
include("../footer.php");
