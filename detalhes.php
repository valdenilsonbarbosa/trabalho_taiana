<?php
session_start();
include_once('config.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
}

$logado = $_SESSION['email'] ?? null;

// Função para excluir
if (isset($_POST['acao']) && $_POST['acao'] === 'excluir' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $stmt = $conexao->prepare("DELETE FROM fichamento WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "<script>alert('Fichamento excluído com sucesso!'); window.location.href='livros_atualizado.php';</script>";
    exit;
}

// Função para editar
if (isset($_POST['acao']) && $_POST['acao'] === 'editar' && isset($_POST['id']) && isset($_POST['novo_fichamento'])) {
    $id = intval($_POST['id']);
    $novo_fichamento = $_POST['novo_fichamento'];
    $stmt = $conexao->prepare("UPDATE fichamento SET fichamento = ? WHERE id = ?");
    $stmt->bind_param("si", $novo_fichamento, $id);
    $stmt->execute();
    echo "<script>alert('Fichamento atualizado com sucesso!'); window.location.href='?id=$id';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Detalhes do Fichamento</title>
<link rel="stylesheet" href="CSS/style.css">
<style>
.caixa {
    max-width: 800px;
    min-height: 400px; /* sempre grande */
    margin: 50px auto;
    padding: 20px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
    font-family: "Merriweather", serif;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.texto-fichamento {
    text-align: justify;
    font-size: 18px;
    line-height: 1.6;
    color: #333;
    white-space: pre-wrap;
    flex-grow: 1;
}
.botoes-acoes {
    margin-top: 20px;
    display: flex;
    gap: 15px;
    justify-content: center;
}
.botoes-acoes button {
    padding: 10px 20px;
    border-radius: 6px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    cursor: pointer;
    transition: 0.3s;
}
.btn-editar {
    background-color: #4CAF50;
    color: white;
}
.btn-excluir {
    background-color: #e74c3c;
    color: white;
}
.botoes-acoes button:hover {
    opacity: 0.85;
    transform: scale(1.05);
}
textarea {
    width: 100%;
    height: 200px;
    padding: 10px;
    font-size: 16px;
    margin-bottom: 15px;
    resize: none;
}
</style>
</head>
<body>

<div class="caixa">
<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conexao->prepare("SELECT * FROM fichamento WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $livro = $result->fetch_assoc();
        if (isset($_GET['edit'])) {
            // Formulário de edição
            echo "<form method='POST'>
                    <textarea name='novo_fichamento'>".htmlspecialchars($livro['fichamento'])."</textarea>
                    <input type='hidden' name='id' value='{$livro['id']}'>
                    <input type='hidden' name='acao' value='editar'>
                    <div class='botoes-acoes'>
                        <button type='submit' class='btn-editar'>Salvar Alterações</button>
                        <a href='?id={$livro['id']}' class='btn-excluir' style='text-decoration:none;padding:10px 20px;border-radius:6px;background:#555;color:white;'>Cancelar</a>
                    </div>
                  </form>";
        } else {
            // Exibição do fichamento
            echo "<div class='texto-fichamento'><strong>Parecer:</strong><br>".htmlspecialchars($livro['fichamento'])."</div>";
            echo "<form method='POST' class='botoes-acoes' onsubmit='return confirm(\"Tem certeza?\")'>
                    <input type='hidden' name='id' value='{$livro['id']}'>
                    <button type='button' class='btn-editar' onclick=\"window.location.href='?id={$livro['id']}&edit=1'\">Editar</button>
                    <input type='hidden' name='acao' value='excluir'>
                    <button type='submit' class='btn-excluir'>Excluir</button>
                  </form>";
        }
    } else {
        echo "Fichamento não encontrado.";
    }
    $stmt->close();
} else {
    echo "ID do fichamento não fornecido.";
}
$conexao->close();
?>
</div>

</body>
</html>
