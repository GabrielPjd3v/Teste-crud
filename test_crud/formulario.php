<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar/Editar Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="max-width:20rem; margin-left: auto; margin-right: auto; margin-top: 20rem">
    <h1><?php echo isset($_GET['id']) ? 'Editar' : 'Editar'; ?></h1>

    <?php
    require './conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idade = $_POST['idade'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
    
    
        try {
            // Preparando para consulta
            $stmt = $pdo->prepare('UPDATE into perfis_funcionario (idade, endereco, telefone) VALUES (:idade,:endereco,:telefone) where id=' .$_REQUEST['id']);
            
            // Parametros
            $stmt->bindParam(':idade', $idade);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':telefone', $telefone);
            // Executando a consulta
            $stmt->execute();
            echo 'Registro cadastrado com sucesso!';
        } catch (\PDOException $e) {
            echo 'Erro ao cadastrar: ' . $e->getMessage();
        }
    }
    ?>

    <form action="atualizar.php" method="post">
        
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
    <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"></label>
            <input type="tel" class="form-control" id="idade" name="idade" placeholder="idade">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"></label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"></label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
        </div>
        <input type="submit" value="<?php echo isset($_GET['id']) ? 'Atualizar' : 'Adicionar'; ?>">
    </form>

    <p><a href="index.php">Voltar</a></p>
</body>
</html>
