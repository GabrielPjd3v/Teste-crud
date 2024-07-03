<?php
// Incluir o arquivo de conexão
require './conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idade = $_POST['idade'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    // Escrever a query para atualizar o registro
    $sql = "UPDATE perfis_funcionario SET idade='$idade', telefone='$telefone', endereco='$endereco' where id=13";

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar o registro: " . $conn->error;
    }

    // Fechar a conexão
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Atualizado</title>
</head>
<body>
    <h1>Registro Atualizado</h1>
    <p><a href="index.php">Voltar à lista de registros</a></p>
</body>
</html>