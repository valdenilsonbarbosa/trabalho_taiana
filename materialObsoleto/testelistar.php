

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Livros</title>
</head>
<body>
  <h2>Lista de Livros</h2>

  <?php
  // Conexão com o banco
  include_once('config.php');

  if ($conexao->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
  }

  $sql = "SELECT id, titulo FROM livros";
  $result = $conexao->query($sql);

  if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
      echo "<li><a href='detalhes.php?id=" . $row['id'] . "'>" . htmlspecialchars($row['titulo']) . "</a></li>";
    }
    echo "</ul>";
  } else {
    echo "Nenhum livro encontrado.";
  }

  $conexao->close();
  ?>
</body>
</html>