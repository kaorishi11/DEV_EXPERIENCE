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
    <title>Cesi</title>
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
    <div>
        <h2>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h2>
        <h2>Minhas Turmas</h2>
        <table border="1">
        <tr>
            <th>Turma</th>
            <th>Disciplina</th>
        </tr>
        <?php
        $r = $conn->query("SELECT t.nome AS turma, d.nome AS disc FROM professor_turma_disciplina ptd JOIN turmas t ON t.id = ptd.turma_id
                        JOIN disciplinas d ON d.id = ptd.disciplina_id
                        WHERE ptd.professor_id = $prof_id");
        while ($x = $r->fetch_assoc()) {
            echo "<tr><td>{$x['turma']}</td><td>{$x['disc']}</td></tr>";
        }
        ?>
        </table>
    </div>
</body>
</html>