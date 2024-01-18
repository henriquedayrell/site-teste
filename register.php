<?php
include "countries.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <!-- cria os inputs para registrar novos usuarios  -->
  <body><div class="container">
    <h1> Registrar </h1>
  <form  action="/games/php/incluirusuarios.php" method="post">
  <div class="mb-3">
    <label for="" class="form-label">Nome</label>
    <input required name="nome" type="text" class="form-control" id="">
  </div> <div class="mb-3">
  <div class="mb-3">
    <label for="" class="form-label">Idade</label>
    <input required name="idade" type="number" class="form-control" id="">
  </div> <div class="mb-3">
  <label for="pais">Selecione um país:</label> 
  <select id="pais" name="pais">
   <!-- puxa dropbox do arquivo countries.php -->
  <?php echo getCountryOptions();?> 
    </select>
  </div> <div class="mb-3">
    <label for="" class="form-label">Cep</label>
    <input required name="cep" type="text" class="form-control" id="">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Endereço de email</label>
    <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha</label>
    <input required name="senha" type="password" class="form-control" id="exampleInputPassword1">
  </div>    
  <!-- registra ou retorna para o login -->
  <a href="login.php" type="button" class="btn btn-primary">Voltar</a>
  <button type="submit" class="btn btn-primary">Registrar</button>
</form> </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>