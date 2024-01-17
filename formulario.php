<?php 
include "template.php";
if ($_GET["acao"]=="i") {
    $id          = '';
    $nome        = '';
    $data        = '';
    $preco       = '';
    $descricao   = '';
    $email       = '';
    $fases       = '';
    $multiplayer = '';
    $categoria   = '';
    $imagem   = '';
    $mensagem_botao = "Confirmar";

    $pagina_acao = "incluir";
} else if($_GET["acao"]=="e"){
    $id = $_GET["id"];
    $sql = "select * from games where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $dados = get_result($stmt)[0];

    // var_dump($dados);

    $id = $dados->id;
    $nome = $dados->nome;
    $data = $dados->data;
    $preco = $dados->preco;
    $descricao = $dados->descricao;
    $email = $dados-> email;
    $fases = $dados->fases;
    $multiplayer = $dados->multiplayer;
    $categoria = $dados->categoria;
    $imagem = $dados->imagem;
    $mensagem_botao = "Editar";
    $pagina_acao = "editar";

} else if ($_GET["acao"]=="d") {
    $id = $_GET["id"];
    $sql = "select * from games where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $dados = get_result($stmt)[0];

    // var_dump($dados);

    $id = $dados->id;
    $nome = $dados->nome;
    $data = $dados->data;
    $preco = $dados->preco;
    $descricao = $dados->descricao;
    $email = $dados-> email;
    $fases = $dados->fases;
    $multiplayer = $dados->multiplayer;
    $categoria = $dados->categoria;
    $imagem = $dados->imagem;

$mensagem_botao = "Deletar";
    $pagina_acao = "deletar"; 
}
?>    
<form method="post" action="/games/php/<?php echo $pagina_acao; ?>.php<?php echo "?id=" . $id ?>" enctype="multipart/form-data"> 
        <header> 
            <h1 class="titulo"> Formulário de submissão de jogos</h1>
        </header>
        <div>
            <label>Nome do jogo:</label>
            <input name="nome" type="text" value="<?php echo $nome; ?>"/><br /><br />
        </div>

        <div>
            <label>Data de lançamento:</label>
            <input name="data" type="date" value = "<?php echo $data; ?>" /><br /><br />
        </div>

        <div>
            <label>Preço R$:</label>
            <input name="preco" type="number" step="any" value = "<?php echo $preco; ?>" /><br /><br />
        </div>

        <div>
            <label>Descrição do jogo:</label>
            <input name="descricao" type="text" value = "<?php echo $descricao; ?>"/><br /><br />
        </div>

        <div>
            <label>Email de contato:</label>
            <input name="email" type="email" value = "<?php echo $email; ?>"/><br /><br />
        </div>

        <div>
            <label>Número de fases:</label>
            <input name="fases" type="number" value = "<?php echo $fases; ?>"/><br /><br />
        </div>

        <div>
            <label>Multiplayer:</label>
            <input name="multiplayer" type="checkbox" value = "<?php echo $multiplayer; ?>"/><br /><br />
        </div>

        <div>
            <label>Categoria:</label> 
            <select name="categoria" id="categoria">
                <option <?php if ($categoria == 'Lt') echo 'selected'; ?> value="Lt">Luta</option>
                <option <?php if ($categoria == 'Es') echo 'selected'; ?> value="Es">Esportes</option>
                <option <?php if ($categoria == 'Av') echo 'selected'; ?> value="Av">Aventura</option>
                <option <?php if ($categoria == 'Tr') echo 'selected'; ?> value="Tr">Tiro</option>
                <option <?php if ($categoria == 'Co') echo 'selected'; ?> value="Co">Corrida</option>
            </select>
        </div>

        <div>
            <label>Imagem prévia (opcional):</label>
            <input name="imagem" type="file" /><br /><br />
        </div>
        
        <br>
        <button onclick="window.location = 'lista.php' " type="button" class="enviar">Voltar</button>
        <button class="enviar" type="submit"><?php echo $mensagem_botao;?></button>
    </form>
<?php if(!empty($imagem)){
?> 
imagem:
<img src="<?php echo 'uploads/'.$imagem?>" alt="">
<?php
} else{
    echo 'nao tem imagem';
}
include("footer.php");
?> 
   
