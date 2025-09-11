<?php
session_start();
include_once("config.php");

// precisa estar logado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    echo "<script>alert('Você precisa estar logado para cadastrar um fichamento!'); window.location.href='login.php';</script>";
    exit;
}

$logado = $_SESSION['email'];

// pega nome/turma preferencialmente da sessão, mas busca no banco para garantir
$nome  = $_SESSION['nome'] ?? '';
$turma = $_SESSION['turma'] ?? null;

// tenta obter nome e turma direto da tabela aluno (garante consistência)
$stmt = $conexao->prepare("SELECT nome, fk_turma FROM aluno WHERE email = ? LIMIT 1");
if ($stmt) {
    $stmt->bind_param("s", $logado);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if (empty($nome) && isset($row['nome'])) {
            $nome = $row['nome'];
        }
        if (($turma === null || $turma === '') && isset($row['fk_turma'])) {
            $turma = intval($row['fk_turma']);
        }
        // salva na sessão para próximas páginas
        $_SESSION['nome']  = $nome;
        $_SESSION['turma'] = $turma;
    }
    $stmt->close();
}

// categoria_id pode vir via POST (da página anterior) ou GET
$categoria_id = $_POST['categoria_id'] ?? $_GET['categoria_id'] ?? '';

$errors = [];

// PROCESSAMENTO: só quando o formulário real for submetido (campo oculto 'form_envio')
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_envio'])) {
    $capitulo   = trim($_POST['capitulo'] ?? '');
    $fichamento = trim($_POST['fichamento'] ?? '');
    // manter categoria se veio no submit
    $categoria_id = $_POST['categoria_id'] ?? $categoria_id;

    // validação básica
    if ($capitulo === '' || $fichamento === '') {
        $errors[] = "Preencha todos os campos obrigatórios.";
    }

    if (empty($logado)) {
        $errors[] = "Usuário não autenticado.";
    }

    if (empty($errors)) {
        // turma no banco é INT segundo seu dump; garante inteiro
        $turma_int = is_numeric($turma) ? intval($turma) : 0;

        $stmt = $conexao->prepare("
            INSERT INTO fichamento (email_aluno, nome, capitulo, turma, fichamento, titulo)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        if ($stmt === false) {
            $errors[] = "Erro na preparação da query: " . $conexao->error;
        } else {
            $stmt->bind_param("sssiss", $logado, $nome, $capitulo, $turma_int, $fichamento, $categoria_id);
            if ($stmt->execute()) {
                // redirect limpo ao sucesso
                header("Location: livros_atualizado.php?msg=ok");
                exit;
            } else {
                $errors[] = "Erro ao cadastrar: " . $stmt->error;
            }
            $stmt->close();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Koulen&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <link rel="stylesheet" href="CSS/style.css">
    
  
  <title>PROJETO LITERATURA</title>
  
    <style>
    

    /* Container geral */
    .fichar-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 40px auto;
        max-width: 700px;
        padding: 30px;
        background: #fdf6e3;
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    /* Título */
    .login-text h2 {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: white;
        margin-bottom: 20px;
        text-align: center;
        background: #5a2d0c;
        padding: 10px 25px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    /* Textarea */
    #Fichamento {
        width: 90%;
        height: 350px;
        border: 2px solid #e0c097;
        border-radius: 12px;
        padding: 15px;
        font-size: 1rem;
        font-family: 'PT Sans', sans-serif;
        background: #fff;
        box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.05);
        transition: border 0.2s ease;
    }

    #Fichamento:focus {
        border: 2px solid #c17f59;
        outline: none;
    }

    /* Input título */
    .tituloficha {
        width: 100%;
        margin: 20px 0;
        display: flex;
        justify-content: center;
    }

    .tituloficha input {
        width: 60%;
        max-width: 500px;
        padding: 12px 14px;
        border: 2px solid #e0c097;
        border-radius: 12px;
        font-size: 1rem;
        font-family: 'PT Sans', sans-serif;
        transition: 0.2s ease;
    }

    .tituloficha input:focus {
        border: 2px solid #c17f59;
        outline: none;
    }

    /* Botão */


    /* Responsividade */
    @media (max-width: 768px) {
        .fichar-container {
            padding: 5px;
        }

        .login-text h2 {
            font-size: 1.6rem;
        }

        #Fichamento {
            height: 250px;
        }

        .btn input {
            width: 100%;
            padding: 12px;
        }
    }
    </style>
</head>

<body>

<body>
  <!-- Cabeçalho do site -->
  
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
            <li><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
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

            <?php if (isset($_SESSION['email'])): ?>
    <!-- Se estiver logado, mostra a porta 🚪 -->
    <li>
          <a href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
              class="bi bi-box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
              <path fill-rule="evenodd"
                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
            </svg>Sair</a>
        </li>
    
      <?php else: ?>
    <!-- Se não estiver logado, mostra o login -->
    <li>
                    <a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>Login</a>
                </li>
      <?php endif; ?>
        </ul>
    </div>

    <!-- Overlay (cobertura preta) -->
    <div class="menu-overlay"></div>

    <script src="JS/menu-moba.js"></script>




    <div class="menu-desktop">
        <nav>
            <ul>
                <li>
                    <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                            <path
                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                        </svg></a>
                </li>
                <!--HOME ICON-->

                <li>
                    <a href="livros_atualizado.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                            <path
                                d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                        </svg></a>
                </li>
                <!--LIVROS ICON-->

                <li>
                    <a href="turmas.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                            <path
                                d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                            <path
                                d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
                        </svg></a>
                </li>
                <!--TURMAS ICON-->

               <?php if (isset($_SESSION['email'])): ?>
    <!-- Se estiver logado, mostra a porta 🚪 -->
    <li>
          <a href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
              class="bi bi-box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
              <path fill-rule="evenodd"
                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
            </svg></a>
        </li>
    
      <?php else: ?>
    <!-- Se não estiver logado, mostra o login -->
    <li>
                    <a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg></a>
                </li>
      <?php endif; ?>
            </ul>
        </nav>
    </div>
    </header>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="fichar-container" novalidate>
    <div class="login-text"><h2>Parecer</h2></div>

    <!-- mostra o livro (se categoria_id foi passado e for numérico, tenta buscar o título) -->
    <?php
    if (!empty($categoria_id)) {
        // tenta resolver nome do livro (se categoria_id for id)
        if (is_numeric($categoria_id)) {
            $q = $conexao->prepare("SELECT livro FROM livro WHERE id = ? LIMIT 1");
            if ($q) {
                $id_cat = intval($categoria_id);
                $q->bind_param("i", $id_cat);
                $q->execute();
                $res = $q->get_result();
                if ($res && $res->num_rows > 0) {
                    $r = $res->fetch_assoc();
                    echo "<p style='font-weight:bold; margin-bottom:8px;'>Livro: " . htmlspecialchars($r['livro']) . "</p>";
                }
                $q->close();
            }
        } else {
            // se veio o nome do livro direto
            echo "<p style='font-weight:bold; margin-bottom:8px;'>Livro: " . htmlspecialchars($categoria_id) . "</p>";
        }
    }
    ?>

    

    <textarea id="Fichamento" name="fichamento" placeholder="Escreva aqui seu parecer..." required><?php echo isset($_POST['fichamento']) ? htmlspecialchars($_POST['fichamento']) : ''; ?></textarea>

    <div class="tituloficha">
        <input name="capitulo" type="text" placeholder="Insira o título do fichamento" class="inputex" required value="<?php echo isset($_POST['capitulo']) ? htmlspecialchars($_POST['capitulo']) : ''; ?>" />
    </div>

    <!-- campos ocultos: mantém categoria_id e marca que o formulário foi enviado -->
    <input type="hidden" name="categoria_id" value="<?php echo htmlspecialchars($categoria_id); ?>">
    <input type="hidden" name="form_envio" value="1">

    <div class="btn">
      <input type="submit" value="CADASTRAR">
    </div>
</form>

<?php $conexao->close(); ?>
</body>
</html>
