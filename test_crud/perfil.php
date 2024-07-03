<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Funcionários</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function verPerfil(id) {
            window.location.href = 'perfil.php?id=' + id;
        }

        function editarFuncionario(id) {
            window.location.href = 'formulario.php?id=' + id;
        }

        function excluirFuncionario(id) {
            if (confirm('Tem certeza que deseja excluir este funcionário?')) {
                window.location.href = 'excluir.php?id=' + id;
            }
        }
    </script>
</head>
<body>
    <button onclick="window.location.href='formulario.php'">Adicionar Funcionário</button>

    <?php
   require './conexao.php';

    $sql = "SELECT id, endereco, idade, telefone FROM perfis_funcionario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>id</th>
                    <th>endereco</th>
                    <th>idade</th>
                    <th>telefone</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id']. "</td>
                    <td>" . $row['telefone']. "</td>
                    <td>" . $row['endereco']. "</td>
                    <td>" . $row['idade']. "</td>
                    <td>
                        <button onclick='editarFuncionario(" . $row["id"] . ")'>Editar</button>
                        <button onclick='excluirFuncionario(" . $row["id"] . ")'>Excluir</button>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "0 resultados";
    }

    $conn->close();
    ?>
</body>
</html>
