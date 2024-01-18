<?php 
include "conexao.php"; 

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "select * from usuarios where email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$dados = get_result($stmt);
if (isset($dados[0]))
$dados = $dados[0];

if (empty($dados)){
    die("Usuário não encontrado");
}
else {
    $senhabanco = $dados->senha; 
    $senhausuario = hash("sha256", $senha);
    if ($senhabanco == $senhausuario){
        session_start();
        $_SESSION["usuarioautenticado"]=true;
        header("location: /games/captcha/registrationform.php");

    }
    else die ("Senha Inválida");
}