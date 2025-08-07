<?php
// Conexão com o banco
include_once('config.php');

// Verifica se o ID foi passado
if (isset($_GET['capitulo'])) {
    $id = $_GET['capitulo'];

    // Consulta preparada para segurança
    $stmt = $conn->prepare("SELECT * FROM fichamento WHERE capitulo = ?");
/*     $stmt->bind_param("i", $id); // "i" = inteiro
    $stmt->execute();
    $result = $stmt->get_result(); */

    // Exibe os detalhes do livro
    if ($result->num_rows > 0) {
        $livro = $result->fetch_assoc();
       /*  echo "<h2>" . htmlspecialchars($livro['titulo']) . "</h2>"; */
        echo "<p><strong>Autor:</strong> " . htmlspecialchars($livro['fichamento']) . "</p>";
     /*    echo "<p><strong>Descrição:</strong> " . htmlspecialchars($livro['descricao']) . "</p>"; */
    } else {
        echo "Livro não encontrado.";
    }
} else {
    echo "ID do livro não fornecido.";
}
?>
