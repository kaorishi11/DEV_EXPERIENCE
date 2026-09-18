<?php
require_once "../conexao.php";

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] !== 'aluno') {
    header("Location: ../index.php");
    exit;
}

$aluno_id = $_SESSION['aluno_id'];
$turma_id = $_SESSION['turma_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesi</title>
</head>
<body>
    <header>
        <h1>Cesi</h1>
        <nav class="menu-aluno">
            <a href="aluno.php">Início</a>
            <a href="calendario.php">Calendário</a>
            <a href="tarefas.php">Tarefas</a>
            <a href="notas.php">Notas</a>
            <a href="faltas.php">Faltas</a>
            <a href="comunicados.php">Comunicados</a>
            <a href="material.php">Materiais</a>
            <a href="eventos.php">Eventos</a>
            <a href="logout.php">Sair</a>
        </nav>
    </header>
    <div>
        <h2>Bem-vindo, <?php echo $_SESSION['usuario_nome']; ?>!</h2>
    </div>
</body>
</html>