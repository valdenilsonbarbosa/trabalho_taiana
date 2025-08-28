<?php

session_start();

include_once('config.php');



$sql = "SELECT * FROM livro";

$result = $conexao->query($sql);



?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Koulen&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="stylesheet" href="CSS/livros.css" />
  <title>PROJETO LITERATURA</title>

  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      padding-bottom: 80px;
    }

    main {
      flex: 1;
    }

    .container {
      display: flex;
      gap: 30px;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      min-height: 75vh;
      padding: 20px;
    }

    .caixa {
      border: 1px solid #ddd;
      padding: 20px;
      width: 260px;
      height: 20rem;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      color: #333;
      text-align: center;
      line-height: 1.6;
      border-radius: 12px;
      background-color: #FFF;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .caixa:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .link_fichamento {
      color: #FF6347;
      font-weight: bold;
      text-decoration: none;
      font-size: 14px;
      padding: 8px 16px;
      border: 2px solid #FF6347;
      border-radius: 20px;
      display: inline-block;
      transition: all 0.3s ease;
      margin: 5px;
    }

    .link_fichamento:hover {
      background-color: #FF6347;
      color: white;
      text-decoration: none;
      transform: translateY(-1px);
    }

    .autor {
      font-size: 12px;
      color: #888;
      margin-bottom: 8px;
    }

    .nome_autor {
      font-size: 12px;
      color: #888;
      margin-bottom: 8px;
    }

    .botoes-livro {
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-top: auto;
    }

    footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #5a2d0c;
      color: #fff;
      text-align: center;
      padding: 15px;
      z-index: 10;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
    }
  </style>

  <script src="teste.js"></script>

</head>

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




  <!-- Menu Desktop -->
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
    <h2 class="title">Livros Cadastrados</h2>
  </div>

  <div class="container">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="caixa">
        <strong>
          <!-- <p>Livro:</p> -->


        </strong><?php echo htmlspecialchars($row['livro']); ?>

        <p class="autor">Autor:</p>

        <?php

        echo "<div class = nome_autor>";
        echo htmlspecialchars($row['autor']);
        echo "</div>";

        ?>

        <form action="adicionar-fichamento1.php" method="post" style="display:inline;">

          <input type="hidden" name="categoria_id" value="<?php echo $row['livro']; ?>">


        

          <div class="btn"><button type="submit" class="buttona">Adicionar Fichamento</button></div>
          

        </form>

        <form action="fichamentos-livro.php" method="post" style="display:inline;">

          <input type="hidden" name="categoria_id" value="<?php echo $row['livro']; ?>">

          <div class="btn"><button type="submit" class="button">Ver Fichamento</button></div>
          

        </form>

      </div>
    <?php endwhile; ?>

  </div>


  <div class="btnx">
    <a href="cadastro-livro.php"><button class="button" type="submit">Cadastrar livro</button>
    </a>
  </div>

  <footer>
    <p>
      Projeto escolar de fichamentos - Todos os direitos reservados © 2025
    </p>
  </footer>


</body>

</html>