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
<link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Koulen&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <link rel="stylesheet" href="CSS/style.css">
    
<style>
 

/* empurra a caixa pra baixo */



.caixa {
    
    max-width: 900px;
    min-height: 1000px;
    padding: 30px;
    background: #fff7e6;
    border: 3px solid #8b0000;
    border-radius: 6px;
    margin: 120px auto 0 auto;  /* 👈 isso desce a caixa pra baixo do header */
    box-shadow: 0px 4px 8px #8b0000(0,0,0,0.15);

    display: flex;
    flex-direction: column;
    align-items: center;
    
}



.titulo {
    text-align: center;
    color: #a52a2a;
    font-weight: bold;
    font-size: 30px;
    margin-bottom: 5px;
}

.subtitulo {
    text-align: center;
    color: black;
    font-weight: bold;
    font-size: 24px;
    margin-bottom: 20px;
}

.texto-fichamento {
    text-align: justify;
    font-size: 18px;
    line-height: 1.7;
    color: #2c2c2c;
    border: 3px solid #8b0000;
    padding: 20px;
    border-radius: 6px;
    background: #fff7e6;

    /* 👇 Correções */
    width: 100%;               /* ocupa toda a largura da caixa externa */
    min-height: 800px;         /* altura mínima fixa */
    max-width: 750px;          /* largura máxima parecida com a da imagem */
    margin: 0 auto;            /* centraliza a caixa */
    
    overflow-wrap: break-word; /* quebra palavras grandes */
    word-break: break-word;    /* força quebra de palavras longas */
    white-space: pre-wrap;     /* mantém quebras de linha do banco */
    
}



.botoes-acoes {
    margin-top: 25px;
    display: flex;
    gap: 15px;
    justify-content: center;
}
.botoes-acoes button {
    padding: 10px 22px;
    border-radius: 6px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    cursor: pointer;
    transition: 0.3s;
}
.btn-editar {
    background-color: #f3ba2b;
    color: white;
}
.btn-excluir {
    background-color: #5a2d0c;
    color: white;
}
.botoes-acoes button:hover {
    opacity: 0.85;
    transform: scale(1.05);
}

textarea {
    width: 750px;         /* largura fixa igual à caixa de exibição */
    min-height: 800px;    /* altura mínima */
    padding: 20px;
    font-size: 18px;
    line-height: 1.7;
    border: 3px solid #8b0000;
    border-radius: 6px;
    resize: none;
    display: block;
    margin: 0 auto;       /* centraliza na tela */
    font-family: "Times New Roman", serif;
    text-align: justify;
    white-space: pre-wrap;
    overflow-wrap: break-word;
    word-break: break-word;
    background:#fff7e6;
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
            <li><a href="livros_atualizado.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
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




    <div class="menu-desktop">
        <nav>
            <ul>
                <li>
                    <a href="index.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
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

                <li>
                    <a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg></a>
                </li>
                <!--LOGIN ICON-->
            </ul>
        </nav>
    </div>
    </header>

<div class="caixa">
<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conexao->prepare("SELECT f.*, t.t AS turma_nome 
                               FROM fichamento f 
                               LEFT JOIN turma t ON f.turma = t.id 
                               WHERE f.id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $livro = $result->fetch_assoc();

        echo "<div class='titulo'>PARECER PESSOAL DE LEITURA</div>";
        echo "<div class='titulo'>".htmlspecialchars($livro['titulo'])."</div>";
        echo "<div class='subtitulo'>".htmlspecialchars($livro['nome'])." – ".htmlspecialchars($livro['turma_nome'])."</div>";

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
            echo "<div class='texto-fichamento'>".nl2br(htmlspecialchars($livro['fichamento']))."</div>";
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
