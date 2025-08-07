

<?php
include_once('config.php');
session_start();

if ((!isset($_SESSION['email']) || !isset($_SESSION['senha']))) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    exit;
}

$logado = $_SESSION['email'];

// Buscar dados do aluno logado
$sql = "SELECT nome, fk_turma FROM aluno WHERE email = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $logado);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $turma = $row['fk_turma'];
} else {
    die("Aluno não encontrado.");
}

// Coletar dados do formulário
$capitulo = $_POST['capitulo'];
$fichamento = $_POST['fichamento'];
$categoria_id = $_POST['categoria_id'];

// Inserir dados no banco
$insert_sql = "INSERT INTO fichamento (fichamento, capitulo, turma, nome, titulo) VALUES (?, ?, ?, ?, ?)";
$insert_stmt = $conexao->prepare($insert_sql);
$insert_stmt->bind_param("sssss", $fichamento, $capitulo, $turma, $nome, $categoria_id);

if ($insert_stmt->execute()) {
    header('Location: livros_atualizado.php');
    exit;
} else {
    echo "Erro ao inserir fichamento: " . $conexao->error;
}
?>