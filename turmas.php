<?php
session_start();
include_once('config.php');

// Se o usuário NÃO estiver logado, consideramos como "convidado"
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    $_SESSION['tipo'] = 'convidado'; // define tipo visitante
} else {
    $logado = $_SESSION['email'];
    $senha = $_SESSION['senha'];

    // Verifica se é o "professor"
    if (
    ($logado === 'gui@gmail.com' && $senha === '123456') ||
    ($logado === 'elias@gmail.com' && $senha === '123456')
) {
    $_SESSION['tipo'] = 'professor';
} else {
    $_SESSION['tipo'] = 'aluno';
}
}

$sql = "SELECT * FROM turma";
$result = $conexao->query($sql);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PROJETO LITERATURA</title>

  <!-- FONTES -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Koulen&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <link rel="stylesheet" href="CSS/style.css">
    
    


  <!-- ESTILOS -->
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-image: url(IMG/fundo-litera.png);
      background-repeat: repeat;
      background-size: cover;
      font-family: "PT Sans", sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      
      color: #333;
    }

   
  



    /* --- TITULO --- */
    .corp-titlei {
      text-align: center;
      margin: 3rem 0 2rem 0;
      
  display: grid;
  justify-content: center;
    }

    .corp-titlei .titlei{
      margin-top: 70px;
      font-family: "Playfair Display", sans-serif;
  letter-spacing: 2px;
  color: #fff;
  background-color: #5a2d0c;
  box-shadow: black 2px 2px 10px;
  padding: 2px 10px;
      font-family: "Playfair Display", sans-serif;
      font-size: 1.6rem;
      color: white;
    }

    /* --- CONTAINER DAS TURMAS --- */
    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      justify-content: center;
      align-items: stretch;
      padding: 20px;
      flex: 1;
    }

    .caixa {
      max-height:180px;
      background: #fff;
      border: 1px solid #ddd;
      padding: 25px;
      width: 270px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      text-align: center;
      border-radius: 12px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .caixa:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .turma-caix {
      margin-bottom: 1rem;
      font-size: 1.1rem;
      
      color: #333;
      font-family: "Playfair Display", sans-serif;
    }

    .buttona {
      font-family: "Koulen";
      background: #e9b124;
      color: #fff;
      border: none;
      border-radius: 25px;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .buttona:hover {
      background: #f3ba2b;
      transform: translateY(-2px);
    }

    /* BOTÃO FIXO CADASTRAR TURMA */
    .btnx {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background: #5a2d0c;
      padding: 15px;
      display: flex;
      justify-content: center;
      z-index: 200;
    }

    .btnx .button {
      font-family: "Koulen";
      font-size: 18px;
      color: #fff;
      background-color: #e9b124;
      border-radius: 25px;
      border: none;
      height: 45px;
      width: 200px;
      transition: all 0.3s ease;
      cursor: pointer;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .btnx .button:hover {
      background-color: #f3ba2b;
      transform: translateY(-2px);
    }

    footer {
      text-align: center;
      padding: 15px;
      background: #5a2d0c;
      color: #fff;
      font-size: 0.9rem;
    }

    /* RESPONSIVIDADE */

    @media (max-width:5000px){

      .corp-titlei{
      text-align: center;
      margin: -30rem 0 2rem 0;

    }
    }

    @media (max-width: 1200px) {
     
      .corp-titlei{
      text-align: center;
      margin: -30rem 0 2rem 0;
      }
     
     .container {
       margin-left:100px;
       gap: 20px;
     }
     .caixa {
       
       width: 100%;
       max-width: 300px;
     }
   }

   @media (max-width: 990px) {
     
    .corp-titlei{
      text-align: center;
      margin-top: 20px;
      margin: -30rem 0 2rem 0;

    }
     .container {
       margin-left:50px;
       gap: 20px;
     }
     .caixa {
       
       width: 100%;
       max-width: 300px;
     }
   }

    @media (max-width: 768px) {
     
      .corp-titlei{
      text-align: center;
      margin: 3rem 0 2rem 0;

    }
      .container {
        margin-left:5px;
        gap: 20px;
      }
      .caixa {
        
        width: 100%;
        max-width: 300px;
      }
    }

    @media (max-width: 576px) {
      .corp-titlei .titlei {
        font-size: 1.6rem;
      }

      .container {
        margin-left:13px;
        gap: 20px;
      }

      .caixa {
        padding: 15px;
      }
      .btnx .button {
        width: 100%;
        max-width: 250px;
      }
    }

    @media (max-width: 446px) {
      .corp-titlei .titlei {
        font-size: 1.6rem;
      }

      .container {
        margin-left:10px;
        gap: 20px;
      }

      .caixa {
        padding: 15px;
      }
      .btnx .button {
        width: 100%;
        max-width: 250px;
      }
    }
  </style>
</head>

<body>
  <!-- Cabeçalho -->
 
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

  <!-- Título -->
  <div class="corp-titlei">
    <h2 class="titlei">Turmas Cadastradas</h2>
  </div>

  <!-- Lista de turmas -->
  <div class="container">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="caixa">
        <div class="turma-caix">Turma: <?php echo htmlspecialchars($row['t']); ?></div>
        <form action="fichamentos-turma.php" method="post">
          <input type="hidden" name="turma_id" value="<?php echo $row['id']; ?>">
          <button type="submit" class="buttona">Acessar turma</button>
        </form>
      </div>
    <?php endwhile; ?>
  </div>


   <?php if ($_SESSION['tipo'] === 'professor'): ?>
    <div class="btnx">
    <a href="cadastro-turma.php"><button class="button">Cadastrar turma</button></a>
  </div>
<?php endif; ?>
    
  <!-- Botão fixo -->
  

  <footer>Projeto escolar de fichamentos - Todos os direitos reservados © 2025</footer>
</body>
</html>
