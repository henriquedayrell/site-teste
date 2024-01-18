<?php 
include "template.php";

    $sql = "SELECT * FROM games";
    $result = $conn->query($sql);
    ?>
    
    <header> 
        <h1 class="titulo">Lista de Envios</h1>
    </header>

    <table class="table table-bordered table-striped">
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
    <button onclick= "window.location = 'formulario.php?acao=i'" type="button" class="btn btn-success">Incluir Jogos</button>
    <?php
    include("footer.php");
?> 