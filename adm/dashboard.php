<?php
include '../conexao.php';
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'admin') {
    header("Location: ../index.php"); exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesi</title>
</head>
<body>
    <div>
        <div>
            <h1>Dashboard do Administrador</h1>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Início</a></li>
                    <li><a href="usuarios.php">Usuários</a></li>
                    <li><a href="turmas.php">Turmas</a></li>
                    <li><a href="calendario.php">Calendário</a></li>
                    <li><a href="eventos.php">Eventos</a></li>
                    <li><a href="comunicados.php">Comunicados</a></li>
                    <li><a href="logout.php">Sair</a></li>
                </ul>
            </nav>
        </div>
        <div>
            <h2>Bem-vindo, <?php echo $_SESSION['usuario_nome']; ?>!</h2>
            <p>Você está logado como <?php echo $_SESSION['usuario_tipo']; ?>.</p>
            
            <div>
                <h3>Usuários</h3>
                <p><?php
                $sql = "SELECT COUNT(*) as total FROM usuarios";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['total'];
                ?></p>
            </div>
            <div>
                <h3>Professores</h3>
                <p><?php
                $sql = "SELECT COUNT(*) as total FROM usuarios WHERE tipo = 'professor'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['total'];
                ?></p>
            </div>
            <div>
                <h3>Alunos</h3>
                <p><?php
                $sql = "SELECT COUNT(*) as total FROM usuarios WHERE tipo = 'aluno'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['total'];
                ?></p>
            </div>
        </div>
    </div>
</body>
</html>