<?php 
include "template.php";
?>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }
        .dark-theme th {
            background-color: #000;
        }
        .dark-theme tr:nth-child(even) {
            background-color: #666;
        }

        button.btn {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        button.btn:hover {
            background-color: #45a049;
        }
    </style>
    <?php 
    $sql = "SELECT * FROM games";
    $result = $conn->query($sql);
    ?>
    
    <header> 
        <h1 class="titulo">Lista de Envios</h1>
    </header>

    <table>
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Preço</th>
            <th>Email</th>
            <th>Fases</th>
            <th>Multiplayer</th>  
            <th>Categoria</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr> 
                    <td>" . $row["nome"]."</td>
                    <td>" . $row["data"]."</td>
                    <td>" . $row["preco"]."</td>
                    <td>" . $row["email"]."</td>
                    <td>" . $row["fases"]."</td>
                    <td>" . $row["multiplayer"]."</td>
                    <td>" . $row["categoria"]."</td>    
                    <td><a href='/games/formulario.php?acao=e&id=".$row["id"]."'>Editar</a></td>
                    <td><a href='/games/formulario.php?acao=d&id=".$row["id"]."'>Deletar</a></td>
                </tr>";
            } 
        } else {
            echo "<tr><td colspan='9'>0 results</td></tr>";
        } 
        ?>
    </table>
    
    <hr/>
    <button onclick= "window.location = 'formulario.php?acao=i'" type="button" class="btn">Incluir Jogos</button>
    <?php
    include("footer.php");
?> 