<?php
session_start();
include_once('config.php');

// Verifica login
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  // header('Location: login.php');
}
$logado = $_SESSION['email'];

// Recebe o id da turma vindo do outro arquivo
$turma_id = $_POST['turma_id'] ?? null;

// Se não veio turma, pode redirecionar ou mostrar erro
if (!$turma_id) {
  die("Nenhuma turma selecionada.");
}

// Consulta filtrando por turma
$sql = "SELECT id, fichamento,t AS t
        FROM fichamento
        INNER JOIN turma ON fichamento.turma_id = turma.id
        WHERE turma.id = ?";
        
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $turma_id);
$stmt->execute();
$result = $stmt->get_result();

$capitulos_por_aluno = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $nome = $row['nome'];
    $capitulo = [
      'id' => $row['id'],
      'capitulo' => $row['capitulo']
    ];

    if (!isset($capitulos_por_aluno[$nome])) {
      $capitulos_por_aluno[$nome] = [];
    }
    $capitulos_por_aluno[$nome][] = $capitulo;
  }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Fichamentos da Turma</title>
<style>
  table { border-collapse: collapse; margin: 20px auto; width: 80%; }
  th, td { border: 1px solid #333; padding: 8px; text-align: left; }
  th { background-color: #f2f2f2; }
</style>
</head>
<body>
<h2 style="text-align:center;">Fichamentos - Turma <?php echo htmlspecialchars($row['turma_nome'] ?? ""); ?></h2>
<table>
  <tr>
    <th>Nome</th>
    <th>Capítulos</th>
  </tr>
  <?php
  if (!empty($capitulos_por_aluno)) {
    foreach ($capitulos_por_aluno as $nome => $capitulos) {
      echo "<tr>";
      echo "<td>" . htmlspecialchars($nome) . "</td>";
      echo "<td>";
      foreach ($capitulos as $cap) {
        echo "<a href='detalhes.php?id=" . $cap['id'] . "'>" . htmlspecialchars($cap['capitulo']) . "</a> ";
      }
      echo "</td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan='2'>Nenhum fichamento encontrado para esta turma.</td></tr>";
  }
  ?>
</table>
</body>
</html>
