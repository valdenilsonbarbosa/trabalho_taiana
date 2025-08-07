

<?php

session_start();

include_once('config.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  // header('Location: login.php');
}

$logado = $_SESSION['email'];


$sql = "SELECT * FROM livro";

$result = $conexao->query($sql);


?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Detalhes do Livro</title>
</head>
<body>
  <?php


  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conexao->prepare("SELECT * FROM fichamento WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $livro = $result->fetch_assoc();
/*       echo "<h2>" . htmlspecialchars($livro['titulo']) . "</h2>";
      echo "<p><strong>Autor:</strong> " . htmlspecialchars($livro['nome']) . "</p>";
      echo "<p><strong>Ano:</strong> " . htmlspecialchars($livro['capitulo']) . "</p>"; */
      echo "<p><strong>Fichamento:</strong><br>" . (htmlspecialchars($livro['fichamento'])) . "</p>";
    } else {
      echo "Livro não encontrado.";
    }

    $stmt->close();
  } else {
    echo "ID do livro não fornecido.";
  }

  $conexao->close();
  ?>

</body>
</html>
