<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo  = $_POST['tipo'];

    $conn->query("INSERT INTO usuarios (nome, email, senha, tipo) 
                  VALUES ('$nome', '$email', '$senha', '$tipo')");
    $usuario_id = $conn->insert_id;

    if ($tipo == 'professor') {
        $disciplina_id = $_POST['disciplina_id'];
        $conn->query("INSERT INTO professores (usuario_id, disciplina_id) 
                      VALUES ('$usuario_id', '$disciplina_id')");
    } elseif ($tipo == 'aluno') {
        $data = $_POST['dataNascimento'];
        $turma_id = $_POST['turma_id'];
        $conn->query("INSERT INTO alunos (usuario_id, data_nascimento, turma_id) 
                      VALUES ('$usuario_id', '$data', '$turma_id')");
    }

    echo "Cadastro realizado! <a href='index.php'>Fazer login</a>";
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Cadastro</title></head>
<body>
    <h1>Cadastro</h1>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <label for="tipo">Tipo:</label>
        <select name="tipo" required>
            <option value="aluno">Aluno</option>
            <option value="professor">Professor</option>
        </select><br>

        <label for="disciplina_id">Disciplina (só professor):</label>
        <select name="disciplina_id">
            <option value="">--</option>
            <?php
            $r = $conn->query("SELECT id, nome FROM disciplinas");
            while ($d = $r->fetch_assoc()) {
                echo "<option value='{$d['id']}'>{$d['nome']}</option>";
            }
            ?>
        </select><br>

        <label for="dataNascimento">Data de Nascimento (só aluno):</label>
        <input type="date" name="dataNascimento"><br>

        <label for="turma_id">Turma (só aluno):</label>
        <select name="turma_id">
            <option value="">--</option>
            <?php
            $r = $conn->query("SELECT id, nome FROM turmas");
            while ($t = $r->fetch_assoc()) {
                echo "<option value='{$t['id']}'>{$t['nome']}</option>";
            }
            ?>
        </select><br>

        <input type="submit" value="Cadastrar">
    </form>
    <p>Já tem conta? <a href="index.php">Login</a></p>
</body>
</html>