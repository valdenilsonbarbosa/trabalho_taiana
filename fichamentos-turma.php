<?php
include_once('config.php');

// Recebe a turma vinda da página anterior
$turma_id = $_POST['turma_id'] ?? null;
if (!$turma_id) {
    die("Nenhuma turma selecionada.");
}

// Pega todos os livros
$sql = "SELECT livro FROM livro ORDER BY livro";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolher Livro</title>
    <link rel="stylesheet" href="CSS/style.css" />
    
</head>

<body>

<style>
  .box{
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>
    <header>
        <div class="logo" style="text-align:center; margin-top:20px;">
            <img src="IMG/logo-litera-Photoroom.png" alt="Logo" width="250px" height="30px">
        </div>
    </header>

    <div class="corp-title">
        <div class="title">
            <h2>Escolha o Livro</h2>
        </div>
    </div>

    <div class="fichar-container">
        <form action="fichamentos-turma-livro.php" method="post">
            <input type="hidden" name="turma_id" value="<?php echo $turma_id; ?>">

            <div class="box">
                <select name="titulo" class="inputs" required>
                    <option value="">-- Escolha um livro --</option>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <option value="<?php echo htmlspecialchars($row['livro']); ?>">
                            <?php echo htmlspecialchars($row['livro']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="btn">
                <button type="submit">Ver Fichamentos</button>
            </div>
        </form>
    </div>
</body>

</html>
