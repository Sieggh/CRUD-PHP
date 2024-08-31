<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Deletar o usuário do banco de dados
    $sql = "DELETE FROM usuário WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Usuário deletado com sucesso!";
        $messageType = "success";
    } else {
        $message = "Erro ao deletar usuário: " . $conn->error;
        $messageType = "danger";
    }

    $conn->close();
} else {
    $message = "ID do usuário não fornecido.";
    $messageType = "warning";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Usuário</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="alert alert-<?php echo $messageType; ?>" role="alert">
        <?php echo $message; ?>
    </div>
    <a href="index.php" class="btn btn-primary">Voltar para a lista de usuários</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
