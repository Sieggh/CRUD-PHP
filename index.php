<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD em PHP</title>
</head>
<body>
    <h1>Gerenciamento de Usuários</h1>
    
    
    <form action="create.php" method="POST">
        <input type="text" name="name" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="idade" name="idade" placeholder="Idade" required>
        <button type="submit">Adicionar Usuário</button>
    </form>
    
    
    <h2>Usuários</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>

        <?php
        include 'db.php';
        
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['idade'] . "</td>";
                echo "<td>
                        <a href='update.php?id=" . $row['id'] . "'>Editar</a> | 
                        <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Tem certeza que deseja deletar este usuário?');\">Deletar</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum usuário encontrado.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
