

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
  <link rel="stylesheet" href="CSS/login.css" />
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
        <a href="index.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-house-fill" viewBox="0 0 16 16">
            <path
              d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
          </svg>Home</a>
      </li>
      <li>
        <a href="index.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
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
          <a href="index.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
              class="bi bi-house-fill" viewBox="0 0 16 16">
              <path
                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
              <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
            </svg></a>
        </li>
        <!--HOME ICON-->

        <li>
          <a href="index.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
              class="bi bi-box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
              <path fill-rule="evenodd"
                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
            </svg></a>
        </li>
        <!--ARROW ICON-->
      </ul>
    </nav>
  </div>

  <!--LOGIN-->
  <div class="login-container">
    <div class="login-corp">
      <div class="login-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
          class="bi bi-person-fill-lock" viewBox="0 0 16 16">
          <path
            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a2 2 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693Q8.844 9.002 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1" />
        </svg>
      </div>

      <div class="login-text">
        <h2>Login</h2>
      </div>
    </div>

    <form action="teste.php" method="post" id="form">
      <div class="box">
        <div>
          <input type="email" placeholder="  Insira seu Email" class="inputs required" name = "email" />
        </div>

        <div>
          <span class="span-required">Digite um Email Válido</span>
        </div>
      </div>

      <div class="box">
        <div>
          <input type="password" placeholder="  Insira sua Senha" class="inputs required" name="senha"/>
        </div>

        <div>
          <span class="span-required">Senha Inválida</span>
        </div>
      </div>

      <div class="btn">
        <input type="submit" name="submit" value="ENTRAR"   />
      </div>

      <p class="link">
        Não tem uma conta? <a href="cadastro.php">Cadastre-se</a>
      </p>
    </form>
  </div>

  <script src="validacao-login.js"></script>
</body>

</html>