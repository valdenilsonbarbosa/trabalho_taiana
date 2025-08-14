<?php
session_start();
include_once('config.php');

$turma_id = $_POST['turma_id'] ?? null;
$titulo = $_POST['titulo'] ?? null;

if (!$turma_id || !$titulo) {
    die("Filtros inválidos.");
}

$sql = "SELECT f.id, f.capitulo, f.nome, t.t AS turma_nome
        FROM fichamento f
        INNER JOIN turma t ON f.turma = t.id
        WHERE t.id = ? AND f.titulo = ?
        ORDER BY f.nome, f.capitulo";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("is", $turma_id, $titulo);
$stmt->execute();
$result = $stmt->get_result();

$capitulos_por_aluno = [];
$turma_nome = "";

while ($row = $result->fetch_assoc()) {
    $turma_nome = $row['turma_nome'];
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
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="stylesheet" href="CSS/fichamentos.css" />

    <title>Fichamentos da Turma <?php echo htmlspecialchars($turma_nome); ?></title>

    <style>
        body {
            font-family: 'PT Sans', sans-serif;
            background-color: #fefefe;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .corp-title {
            text-align: center;
            margin-top: 2rem;
        }

        h2 {
            font-family: 'Merriweather', serif;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            text-align: left;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 12px;
        }

        .logo{
            
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: dashed;
            color: blue;
            padding: 4px 8px;
            display: inline-block;
        }

        @media (max-width: 768px) {
            table {
                width: 95%;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="logo" style="text-align:center; margin-top:20px;">
            <img src="IMG/logo-litera-Photoroom.png" alt="Logo" width="250px" height="30px">
        </div>
    </header>

    <div class="corp-title">
        <h2>Fichamentos - Turma <?php echo htmlspecialchars($turma_nome); ?> - Livro <?php echo htmlspecialchars($titulo); ?></h2>
    </div>

    <?php if (!empty($capitulos_por_aluno)): ?>
        <table>
            <thead>
                <tr>
                    <th>Nome do Aluno</th>
                    <th>Capítulos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($capitulos_por_aluno as $nome => $capitulos): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($nome); ?></td>
                        <td>
                            <?php foreach ($capitulos as $cap): ?>
                                <a href="detalhes.php?id=<?php echo $cap['id']; ?>">
                                    <?php echo htmlspecialchars($cap['capitulo']); ?>
                                </a>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align:center; margin-top:20px;">Nenhum fichamento encontrado.</p>
    <?php endif; ?>

</body>
</html>
