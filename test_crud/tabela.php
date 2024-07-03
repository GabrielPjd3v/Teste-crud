<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"> 
    <script>
        function verPerfil(id) {
            window.location.href = 'perfil.php?id=' + id;
        }

      
        </script>
</head>
<body>
    <h1>funcionarios</h1>
<!-- fazendo requisicao para o banco de dados -->
    <?php
        require './conexao.php'; 

//comando sql para selecionar a tabela e imprimir na tela
    $sql = 'SELECT id, nome, cargo, salario  from funcionarios';
    $result = $conn->query($sql);
   
    if ($result->num_rows > 0 ) {
    echo "<table border = '1'>
        <tr>  
            <th>id</th>   
            <th>nome</th>   
            <th>cargo</th>   
            <th>salario</th>
        </tr>";
    };
    
    while($row = $result->fetch_assoc()){
        echo 
        "<tr> 
        <td>" . $row["id"]."</td> 
        <td>" . $row["nome"]."</td> 
        <td>" . $row["cargo"]."</td>
        <td>" . $row["salario"]."</td>
        <td> 
            <button onclick='verPerfil(" . $row["id"] . ")'>Ver Perfil</button>
         </td>
        </tr>";
    
    } 

    echo "</table>";


?>
<a href="index.php">Voltar</a>
</body>
</html>