<?php
include 'conexao.php';
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'professor') {
    header("Location: ../index.php"); exit;
}
$prof_id = $_SESSION['professor_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <header>
        <h1>Cesi</h1>
        <nav>
            <ul>
                <li><a href="professor.php">Início</a></li>
                <li><a href="calendario.php">Calendário</a></li>
                <li><a href="tarefas.php">Tarefas</a></li>
                <li><a href="comunicados.php">Comunicados</a></li>
                <li><a href="notas.php">Notas</a></li>
                <li><a href="faltas.php">Faltas</a></li>
                <li><a href="materiais.php">Materiais</a></li>
                <li><a href="../logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>