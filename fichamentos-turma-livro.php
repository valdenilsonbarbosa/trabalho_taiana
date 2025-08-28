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
            color: black;
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
            border: 1px solid black;
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
  <div class="logo">
            <img src="IMG/logo-litera-Photoroom.png" alt="" width="250px" height="30px">
             </div>
         </div>


    <div class="menu-mobile-button">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
  </header>

  <!-- Menu Mobile -->
  <div class="menu-mobile">
    <ul>
      <li><a href="index.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-house-fill" viewBox="0 0 16 16">
            <path
              d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
          </svg>Home</a></li>
      <li><a href="livros_atualizado.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-book-half" viewBox="0 0 16 16">
            <path
              d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
          </svg> Livros</a></li>

      <li><a href="turmas.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-person-workspace" viewBox="0 0 16 16">
            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
            <path
              d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
          </svg>Turmas</a>
      </li>

      <li><a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
          </svg>Login</a></li>

    </ul>
  </div>

  <!-- Overlay (cobertura preta) -->
  <div class="menu-overlay"></div>

  <script src="JS/menu-moba.js"></script>



  <nav class="menu-desktop">
    <ul>
      <li>
        <a href="index.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-house-fill" viewBox="0 0 16 16">
            <path
              d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
          </svg></a>
      </li>
      <!--HOME ICON-->

      <li>
        <a href="livros_atualizado.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-book-half" viewBox="0 0 16 16">
            <path
              d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
          </svg></a>
      </li>
      <!--LIVROS ICON-->

      <li>
        <a href="turmas.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-person-workspace" viewBox="0 0 16 16">
            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
            <path
              d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
          </svg></a>
      </li>
      <!--TURMAS ICON-->

      <li>
        <a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
          </svg></a>
      </li>
      <!--LOGIN ICON-->
    </ul>
  </nav>
  </header>

    <div class="corp-title">
        <h2>Pareceres - Turma <?php echo htmlspecialchars($turma_nome); ?> - Livro <?php echo htmlspecialchars($titulo); ?></h2>
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
