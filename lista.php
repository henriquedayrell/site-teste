<?php
include "template.php";

$sql = "SELECT * FROM games";
$result = $conn->query($sql);
?>
<div class="container">
    <div class="row">
        <div class="col">
            <header>
                <h1 class="titulo">Lista de Envios</h1>
            </header>

            <table class="table table-bordered table-striped" id="myTable">
                <thead>
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
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr> 
                    <td>" . $row["nome"] . "</td>
                    <td>" . $row["data"] . "</td>
                    <td>" . $row["preco"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["fases"] . "</td>
                    <td>" . $row["multiplayer"] . "</td>
                    <td>" . $row["categoria"] . "</td>    
                    <td><a href='/games/formulario.php?acao=e&id=" . $row["id"] . "'>Editar</a></td>
                    <td><a href='/games/formulario.php?acao=d&id=" . $row["id"] . "'>Deletar</a></td>
                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>0 results</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <hr />
            <button onclick="window.location = 'formulario.php?acao=i'" type="button" class="btn btn-success">Incluir Jogos</button>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="http://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<link href="http://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" />
<script type="text/javascript">
    let table = new DataTable('#myTable');
</script>
<style>
    table.dataTable>thead>tr>th,
    table.dataTable>thead>tr>td {
        border-top: 1px solid #999;
    }
</style>
<?php
include("footer.php");

?>