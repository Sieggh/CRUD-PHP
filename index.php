<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD em PHP</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Gerenciamento de Usuários</h1>
    
    <!-- Formulário para criar usuário -->
    <form action="create.php" method="POST" class="mb-4">
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Nome" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="idade" name="idade" class="form-control" placeholder="Idade" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Usuário</button>
    </form>
    
    <!-- Listagem de usuários -->
    <h2>Usuários</h2>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Idade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'db.php';
            
            $sql = "SELECT * FROM usuário";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['idade'] . "</td>";
                    echo "<td>
                            <a href='update.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Editar</a> 
                            <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Tem certeza que deseja deletar este usuário?');\">Deletar</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>Nenhum usuário encontrado.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
