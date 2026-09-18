<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $r = $conn->query("SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'");

    if ($r->num_rows == 1) {
        $u = $r->fetch_assoc();

        $_SESSION['id']    = $u['id'];
        $_SESSION['nome']  = $u['nome'];
        $_SESSION['tipo']  = $u['tipo'];

        if ($u['tipo'] == 'admin') {
            header("Location: adm/dashboard.php");
        } elseif ($u['tipo'] == 'professor') {
            header("Location: professor/professor.php");
        } else {
            $a = $conn->query("SELECT id, turma_id FROM alunos WHERE usuario_id={$u['id']}")->fetch_assoc();
            $_SESSION['aluno_id'] = $a['id'];
            $_SESSION['turma_id'] = $a['turma_id'];
            header("Location: aluno/aluno.php");
        }
        exit;
    } else {
        echo "Email ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
<title>Login</title>
</head>
<body>
    <h1>Login CEON</h1>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>
        <input type="submit" value="Entrar">
    </form>
    <p>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
</body>
</html>