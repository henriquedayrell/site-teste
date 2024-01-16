    <!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="main.css">
</head>

<body class="dark-theme">
<?php
if($_GET["acao"]=="i")
$pagina_acao = "incluir";
elseif($_GET["acao"]=="e")
$pagina_acao = "editar";
else if ($_GET["acao"]=="d")
$pagina_acao = "deletar"; 
?>    
<form method="post" action="/games/php/<?php echo $pagina_acao; ?>.php"> 
        <header> 
            <h1 class="titulo"> Formulário de submissão de jogos</h1>
        </header>
        <div>
            <label>Nome do jogo:</label>
            <input name="nome" type="text" /><br /><br />
        </div>

        <div>
            <label>Data de lançamento:</label>
            <input name="data" type="date" /><br /><br />
        </div>

        <div>
            <label>Preço R$:</label>
            <input name="preco" type="number" step="any" /><br /><br />
        </div>

        <div>
            <label>Descrição do jogo:</label>
            <input name="descricao" type="text" /><br /><br />
        </div>

        <div>
            <label>Email de contato:</label>
            <input name="email" type="email" /><br /><br />
        </div>

        <div>
            <label>Número de fases:</label>
            <input name="fases" type="number" /><br /><br />
        </div>

        <div>
            <label>Multiplayer:</label>
            <input name="multiplayer" type="checkbox" /><br /><br />
        </div>

        <div>
            <label>Categoria:</label>
            <select name="categoria" id="categoria">
                <option value="Es">Esportes</option>
                <option value="Lt">Luta</option>
                <option value="Av">Aventura</option>
                <option value="Tr">Tiro</option>
                <option value="Co">Corrida</option>
            </select>
        </div>

        <div>
            <label>Imagem prévia (opcional):</label>
            <input name="imagem" type="file" /><br /><br />
        </div>

        <div>
            <button type = "button" class="btn">Light theme</button>
        </div>
        <br>
        <button onclick="window.location = 'lista.php' " type="button" class="enviar">Voltar</button>
        <button class="enviar" type="submit">Enviar</button> 
    </form>

    <script src="app.js"></script>
    <noscript>You need to enable JavaScript to view the full site. </noscript>

</body>

</html>