<!-- checa se o usuario esta logado para fazer mudancas nos outros formularios -->
<?php 
session_start();
if(!isset($_SESSION["usuarioautenticado"]) || !$_SESSION["usuarioautenticado"])
header("location: /games/login.php");
?>