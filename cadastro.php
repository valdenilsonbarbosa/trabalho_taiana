<?php

include_once('config.php');


if (isset($_POST['submit'])) {
  
   $email = $_POST['email'];
  $nome = $_POST['name'];
  $senha = $_POST['senha'];
  $id = $_POST['turma'];
  $result = mysqli_query($conexao, "INSERT INTO aluno(email,nome,senha,fk_turma) values ('$email','$nome','$senha','$id')");
   header('Location: login.php');
}


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
  <link rel="stylesheet" href="CSS/cadastro.css" />
  <title>PROJETO LITERATURA</title>
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
      <li>
        <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-house-fill" viewBox="0 0 16 16">
            <path
              d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
          </svg>Home</a>
      </li>
      <li>
        <a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
            <path fill-rule="evenodd"
              d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
          </svg>Voltar</a>
      </li>
    </ul>
  </div>

  <!-- Overlay (cobertura preta) -->
  <div class="menu-overlay"></div>

  <script src="JS/menu-moba.js"></script>

  <div class="menu-desktop">
    <nav>
      <ul>
        <li>
          <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
              class="bi bi-house-fill" viewBox="0 0 16 16">
              <path
                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
              <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
            </svg></a>
        </li>
        <!--HOME ICON-->

        <li>
          <a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
              class="bi bi-box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
              <path fill-rule="evenodd"
                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
            </svg></a>
        </li>
      </ul>
    </nav>
  </div>

  <div class="cadastro-fundo">

  <div class="cadastro-container">
    <div class="login-corp">
      <div class="cadastro-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
          class="bi bi-person-fill-lock" viewBox="0 0 16 16">
          <path
            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a2 2 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693Q8.844 9.002 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1" />
        </svg>
      </div>

      <div class="cadastro-text">
        <h2>Cadastro</h2>
      </div>
    </div>

    <form action="cadastro.php" method="POST">
      <div class="box">
        <div>
          <input type="email" placeholder="Insira um Email" class="inputs required" oninput="emailValidate()" name="email" id="email" />
        </div>

        <div>
          <span class="span-required">Digite um Email válido</span>
        </div>
      </div>

      <div class="box">
        <div>
          <input type="text" placeholder="Digite seu nome" class="inputs required" oninput="nameValidate()" name="name" id="nome" />
        </div>

        <div>
          <span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
        </div>
      </div>

      <div class="box">
        <div>
          <input type="password" placeholder="Insira uma Senha" class="inputs required" minlength="6"
            oninput="MainPasswordValidate()" name="senha" id="senha"  />
        </div>

        <div>
          <span class="span-required">Senha com no mínimo 6 caracteres</span>
        </div>
      </div>

      <div class="box">
        <div>
          <input type="password" placeholder="Confirme sua Senha" class="inputs required" oninput="comparePassword()" />
        </div>

        <div>
          <span class="span-required">Senhas não são compatíveis</span>
        </div>
      </div>


      <div class="selecionar">
        <div>

        <?php
      $sql = "SELECT id, t FROM turma  ORDER BY t ASC
     ";


      $resultado = $conexao->query($sql);

      if ($resultado === false) {
        die("Erro na consulta SQL: " . $conexao->error);
      }

      
      echo '<select name="turma" id="turma">';

      echo '<option value="">Selecione uma turma</option>';

      if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
      
          $id   = $row['id'];
          $nome = $row['t'];
          echo "<option value=\"{$id}\">{$nome}</option>";
        }
      } else {
        echo '<option value="">Cadastre uma turma</option>';
      }
      echo '</select>';
      
      ?>
        </div>
     
      </div>
     

      <div class="btn">
        <input type="submit" value="Cadastrar" name="submit">

      </div>


      <p class="link">
        Já tem uma conta? <a href="login.php">Faça login</a>
      </p>
    </form>
  </div>
  </div>
  

  <!--JS-->
  <script>
    const form = document.getElementById("form");
    const campos = document.querySelectorAll(".required");
    const spans = document.querySelectorAll(".span-required");
    const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

    form.addEventListener("submit", (event) => {
      event.preventDefault();
      emailValidate();
      nameValidate();
      MainPasswordValidate();
      comparePassword();
    });

    function setError(index) {
      campos[index].style.border = "2px solid #e63636";
      spans[index].style.display = "block";
    }

    function removeError(index) {
      campos[index].style.border = "2px solid #7fff00";
      spans[index].style.display = "none";
    }

    function emailValidate() {
      if (!emailRegex.test(campos[0].value)) {
        setError(0);
      } else {
        removeError(0);
      }
    }

    function nameValidate() {
      if (campos[1].value.length < 3) {
        setError(1);
      } else {
        removeError(1);
      }
    }

    function MainPasswordValidate() {
      if (campos[2].value.length < 6) {
        setError(2);
      } else {
        removeError(2);
        comparePassword();
      }
    }

    function comparePassword() {
      if (campos[2].value == campos[3].value && campos[3].value.length >= 6) {
        removeError(3);
      } else {
        setError(3);
      }
    }
  </script>
</body>

</html>