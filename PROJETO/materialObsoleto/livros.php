<?php

session_start();

include_once('config.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  // header('Location: login.php');
}

$logado = $_SESSION['email'];


$sql = "SELECT * FROM livro";

$result = $conexao->query($sql);




/* if (isset($_POST['submit'])) {

$livro = $_POST['livro'];
$autor = $_POST['autor'];



 header('Location: testandocomunicacao.php');
print_r($row("livro")); 

   $email = $_POST['email'];
  $nome = $_POST['name'];
  $senha = $_POST['senha'];
  $id = $_POST['turma'];




  include_once('config.php');

  
  $result = mysqli_query($conexao, "INSERT INTO aluno(email,nome,senha,fk_turma) values ('$email','$nome','$senha','$id')");
 header('Location: login.php'); 
} */


//  print_r($result);
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
  <link rel="stylesheet" href="CSS/fichamentos.css" />

    <style>
   
        .container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            

        }
        .caixa {
            border: 1px solid #ccc;
            padding: 20px;
            width: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #666;
            text-align: center;
            line-height: 1.5rem;
            margin-left: 2rem;
            margin-top: 2rem;
            border-radius: 8px;
            background-color: #FFF;


        }
    </style>


  <script src="teste.js"></script>




  <title>PROJETO LITERATURA</title>


</head>

<body>
  <!-- Cabeçalho do site -->
  <header>
    <div class="logo">
      <div class="p1">
        <h1>LITERA</h1>
      </div>

      <div class="p2">
        <h1>TURE-SE</h1>
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
      <li><a href="livros.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-book-half" viewBox="0 0 16 16">
            <path
              d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
          </svg> Livros</a></li>

      <li><a href="turmas.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-person-workspace" viewBox="0 0 16 16">
            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
            <path
              d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
          </svg>Turmas</a>
      </li>


      <li><a href="desafios.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-journal-check" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0" />
            <path
              d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
            <path
              d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 10-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
          </svg>Desafios</a></li>

      <li><a href="login.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
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
        <a href="livros.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-book-half" viewBox="0 0 16 16">
            <path
              d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
          </svg></a>
      </li>
      <!--LIVROS ICON-->
      <li>
        <a href="turmas.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-person-workspace" viewBox="0 0 16 16">
            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
            <path
              d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
          </svg></a>
      </li>
      <!--TURMAS ICON-->
      <li>
        <a href="desafios.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-journal-check" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0" />
            <path
              d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
            <path
              d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 10-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
          </svg></a>
      </li>
      <!--DESAFIOS ICON-->
      <li>
        <a href="login.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
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
  <?php while($row = $result->fetch_assoc()): ?>
    <div  class="caixa">
      <strong><p>Livro:</p></strong><?php echo htmlspecialchars($row['livro']); ?>
      <strong><p>Autor:</p></strong><?php echo htmlspecialchars($row['autor']); ?><br>
      <form action="adicionar-fichamento1.php" method="post" style="display:inline;">
        <input type="hidden" name="categoria_id" value="<?php echo $row['livro'];?>">
        <button type="submit" class="button">Adicionar Fichamento</button>
        <
      </form>
      
    </div>
  <?php endwhile; ?>

  </div>





  <!--   <div class="sectionclass">
    <section class="livros-lista">

      <div class="livro-item">
        <h3>Dom Casmurro</h3>
        <p class="nome-autor">Autor: Machado de Assis</p>
        <a class="ver-fichamentos" href="fichamentos-livro.html">Ver fichamentos</a>
        <a href="adicionar-fichamento.html">
          <div class="btnZ">
            <button class="button" type="submit">Adicionar fichamento</button>
          </div>
        </a>

        <form action="adicionar-fichamento.php" method="post">

          <p name="teste">vamos testar</p>
          <input type="submit" value="enviar" name="submit">

        </form>
      </div>
      <div class="livro-item">
        <h3>Capitães da Areia</h3>
        <p class="nome-autor">Autor: Jorge Amado</p>
        <a class="ver-fichamentos" href="fichamentos-livro.html">Ver fichamentos</a>

        <a href="adicionar-fichamento.html">
          <div class="btnZ">
            <button class="button" type="submit">Adicionar fichamento</button>
          </div>
        </a>
      </div>

      <div class="livro-item">
        <h3>Grande Sertão: Veredas</h3>
        <p class="nome-autor">Autor: João Guimarães Rosa</p>
        <a class="ver-fichamentos" href="fichamentos-livro.html">Ver fichamentos</a>

        <a href="adicionar-fichamento.html">
          <div class="btnZ">
            <button class="button" type="submit">Adicionar fichamento</button>
          </div>
        </a>
      </div>

    </section>
  </div> -->


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