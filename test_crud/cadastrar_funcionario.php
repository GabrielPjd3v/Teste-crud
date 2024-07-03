<?php
require './conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];


    try {
        // Preparando para consulta
        $stmt = $pdo->prepare('INSERT INTO funcionarios (nome,cargo,salario) VALUES (:nome,:cargo,:salario)');
        // Parametros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':salario', $salario);
        // Executando a consulta
        $stmt->execute();
        echo 'Registro cadastrado com sucesso!';
    } catch (\PDOException $e) {
        echo 'Erro ao cadastrar: ' . $e->getMessage();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de funcionario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="max-width:20rem; margin-left: auto; margin-right: auto; margin-top: 20rem"> 



    <form action="cadastrar_funcionario.php" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"></label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe Nome">
        </div>

        <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label"></label>
    <input type="text" class="form-control" id="Cargo" name="cargo" placeholder="Cargo">
        </div>
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"></label>
            <input type="tel" class="form-control" id="Salario" name="salario" placeholder="Salário">
        </div>
        
        <button type="submit">Enviar</button>

        <button href="index.php">Voltar</button>
    </form>


</body>

</html>