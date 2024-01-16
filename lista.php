<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista de envios</title>

</head>
<header> 
    <h1 class="titulo"> Lista de envios</h1>
</header>
<body>
    <?php 
    include "php/conexao.php";  
    $sql = "SELECT * From games";
$result = $conn->query($sql);

?>
    
    <table border="1" style="border-collapse: collapse;" cellpadding="5">
        <tr>
            <th> nome </th>
            <th> data </th>
            <th> preço </th>
            <th> fases </th>
            <th> multiplayer </th>  
            <th> categoria </th>
            <th> editar </th>
            <th> deletar </th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr> 
    <td>" . $row["nome"]."</td>
    <td>" . $row["data"]."</td>
    <td>" . $row["preco"]."</td>
    <td>" . $row["fases"]."</td>
    <td>" . $row["multiplayer"]."</td>
    <td>" . $row["categoria"]."</td>    
    <td><a href='/games/formulario.php?acao=e&id=".$row["id"]."'>editar</a></td>
    <td><a href='/games/formulario.php?acao=d&id=".$row["id"]."'>deletar</a></td>

    </tr>";
  } 
} else {
  echo "0 results";
} 
?>

    </table>
    <hr/>
    <button onclick="window.location = 'formulario.php?acao=i' " type="button" class="btn">incluir jogos</button>
    <button onclick= "window.location = 'formulario.php?acao=e' "type="button" class="btn">editar envios</button>
    <button onclick="window.location = 'formulario.php?acao=d' "type="button" class="btn">deletar envios</button>
</body>
</html>
<?php
$conn->close(); 
?>