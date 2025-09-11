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
    ($logado === 'taianamenezes@docente.com' && $senha === 'amomeusalunos123') 
) {
    $_SESSION['tipo'] = 'professor';
} else {
    $_SESSION['tipo'] = 'aluno';
}


}


?>

<!DOCTYPE html>
<html lang="pt-br">

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
    <link rel="stylesheet" href="CSS/home.css">


    <title>PROJETO LITERATURA</title>

    <style>

    </style>

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

    <section id="tranding">
        <div class="container-title">
            <div class="corp-title">
                <h2 class="title">Explore a Literatura Brasileira</h1>
            </div>
        </div>

        <div class="container">
            <div class="swiper tranding-slider">
                <div class="swiper-wrapper">
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="https://dn721608.ca.archive.org/0/items/domCasmurroMachado/domCasmurro.pdf" target="_blank"
                                rel="noopener noreferrer"><img class="book-image" src="IMG/dom-casmurro.jpg"
                                    alt="Loading"></a>
                        </div>


                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    DOM CASMURRO
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->

                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="https://escoladedebate.cnpc.cultura.gov.br/wp-content/uploads/sites/24/2017/05/capitaes-da-areia.pdf"
                                target="_blank" rel="noopener noreferrer"><img class="book-image"
                                    src="IMG/capitaes-de-areia.jpg" alt="Loading"></a>
                        </div>


                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    CAPITÃES DE AREIA
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->

                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="https://dn721600.ca.archive.org/0/items/joao-guimaraes-rosa-ficcao-com-joao-guimaraes-rosa/Grande%20Sertao_%20Veredas%20-%20Joao%20Guimaraes%20Rosa.pdf"
                                target="_blank" rel="noopener noreferrer"><img src="IMG/grande-sertao.jpg"
                                    alt="Loading"></a>
                        </div>


                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    GRANDE SERTÃO: VEREDAS
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->

                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="https://ia801703.us.archive.org/11/items/memoriasPostumasBrasCubas/memoriasBras.pdf"
                                target="_blank" rel="noopener noreferrer"><img src="IMG/memorias-postumas.jpg"
                                    alt="Loading"></a>
                        </div>


                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    MEMÓRIAS PÓSTURAS DE BRAS CUBAS
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->

                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="https://livrariapublica.com.br/listas/5-livros-de-cecilia-meireles-para-baixar-em-pdf/"
                                target="_blank" rel="noopener noreferrer"> <img src="IMG/canticos.jpg" alt="Loading">
                            </a>

                        </div>


                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">

                                <h2 class="book-name">
                                    CÂNTICOS
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->

                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="https://emakbakea.wordpress.com/wp-content/uploads/2020/05/a-hora-da-estrela.pdf"
                                target="_blank" rel="noopener noreferrer"><img src="IMG/a-hora-da-estrela.jpg"
                                    alt="Tranding"></a>
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    A HORA DA ESTRELA
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="https://iedamagri.wordpress.com/wp-content/uploads/2020/02/vidas-secas-graciliano-ramos.pdf"
                                target="_blank" rel="noopener noreferrer"><img src="IMG/vidas_secas.png"
                                    alt="Tranding"></a>
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    VIDAS SECAS
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="http://www.dominiopublico.gov.br/download/texto/ua00021a.pdf" target="_blank"
                                rel="noopener noreferrer"><img src="IMG/o-cortico.jpg" alt="Tranding"></a>
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    O CORTIÇO
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="http://www.dominiopublico.gov.br/download/texto/bv000297.pdf" target="_blank"
                                rel="noopener noreferrer"><img src="IMG/o_ateneu.jpg" alt="Tranding"></a>
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    O ATENEU
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="http://www.dominiopublico.gov.br/download/texto/bn000014.pdf" target="_blank"
                                rel="noopener noreferrer"><img src="IMG/iracema.jpg" alt="Tranding"></a>
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    IRACEMA
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="https://fliphtml5.com/uwvpx/fjss/A_Moreninha_-_Joaquim_Manoel_de_Macedo/82/"
                                target="_blank" rel="noopener noreferrer"><img src="IMG/a_moreninha.png"
                                    alt="Tranding"></a>
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    A MORENINHA
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="https://lf.edu.br/linguagenscodigos/wp-content/uploads/2015/05/Erico-Verissimo-Olhai-os-Lirios-do-Campo.pdf"
                                target="_blank" rel="noopener noreferrer"><img src="IMG/olhai_os_lirios_do_campo.jpg"
                                    alt="Tranding"></a>
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    OLHAI OS LÍRIOS DO CAMPOS
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="https://archivepublicdomain.com/files/2025/03/Macunaima.pdf" target="_blank"
                                rel="noopener noreferrer"><img src="IMG/macunaima.png" alt="Tranding"></a>
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    MACUNAÍMA
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->



                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="https://arquivo.pandabooks.com.br/classicos/lt_quincas.pdf" target="_blank"
                                rel="noopener noreferrer"><img src="IMG/quincas_borbas.png" alt="Tranding"></a>
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    QUINCAS BORBAS
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->

                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="http://www.dominiopublico.gov.br/download/texto/ua000235.pdf" target="_blank"
                                rel="noopener noreferrer"><img src="IMG/memorias_de_um_sargento_milicias.png"
                                    alt="Tranding"></a>
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    MEMÓRIAS DE UM SARGENTO DE MILÍCIAS
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->

                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="https://camara-gov-br.usrfiles.com/ugd/5ca0e9_ebda356b2f4742f3bf3325afd9e44363.pdf"
                                target="_blank" rel="noopener noreferrer"><img
                                    src="IMG/triste_fim_de_policarpo_quaresama.png" alt="Tranding"></a>
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    TRISTE FIM DE POLICARPO QUARESMA
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->


                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="http://www.dominiopublico.gov.br/download/texto/bn000027.pdf" target="_blank"
                                rel="noopener noreferrer"><img src="IMG/a_mao_e_a_luva.png" alt="Tranding"></a>
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    A MÃO E A LUVA
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->

                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <a href="http://www.dominiopublico.gov.br/download/texto/ua000205.pdf" target="_blank"
                                rel="noopener noreferrer"><img src="IMG/iaia-garcia-7.jpg" alt="Tranding"></a>
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="book-name">
                                    IAIÁ GARCIA
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-end -->
                </div>

                <div class="tranding-slider-control">
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </div>
    </section>

    <div class="texto-container">

        <div class="texto-introducao">

            <p class="texto">
                Este site nasceu a partir de uma atividade somatória das turmas de 2ª série do ensino médio do
                CETAF-Estância
                (Senai) proposta na disciplina de Língua Portuguesa, ministrada pela Profª Ma. Taiana Menezes de Jesus.
                Na
                sua
                primeira edição, realizada em 2025, participaram ativamente os estudantes dos cursos de Desenvolvimento de
                Sistemas e Eletromecânica do período da manhã. A professora, idealizadora do projeto, buscou não apenas cumprir um
                objetivo
                avaliativo, mas criar uma oportunidade para que os alunos se envolvessem de forma criativa e prática com
                a
                leitura e a interpretação de textos literários. <br> <br>


                Os pareceres e fichamentos aqui publicados são fruto do trabalho de leitura das obras indicadas em sala
                de
                aula,
                constituindo o registro de interpretações individuais e percepções únicas. Mostrar esses resultados
                neste
                espaço
                representa uma conquista significativa: estimular adolescentes a lerem clássicos da literatura, ainda
                que
                inicialmente por obrigação escolar. Os textos refletem o envolvimento, a sensibilidade e a forma
                particular
                como
                cada aluno recebeu e sentiu cada obra, transformando o ato da leitura em um exercício de expressão
                pessoal e
                de
                valorização cultural. <br> <br>

                
                O desenvolvimento deste site só foi possível graças à colaboração, dedicação e competência dos
                estudantes
                voluntários da turma de Desenvolvimento de Sistemas, que transformaram uma ideia em um produto
                final
                funcional e visualmente atrativo. O grupo enfrentou desafios técnicos, tomou decisões de design e
                estruturou
                o
                conteúdo de forma a tornar a experiência do visitante
                agradável e enriquecedora. Esse processo colaborativo não só resultou em um trabalho de qualidade, como
                também
                reforçou o valor da união entre conhecimentos técnicos e habilidades linguísticas. <br>
            </p>

        </div>

    </div>

    <div class="container-livros-pdf">

        <main>
            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/a_mao_e_a_luva.png" alt="A Mão e a Luva">
                </div>

                <div class="card-content">
                    <h2>A Mão e a Luva</h2>
                    <p>Machado de Assis - Romance sobre amor e convenções sociais.</p>
                    <a href="http://www.dominiopublico.gov.br/download/texto/bn000027.pdf" target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/Machado_de_Assis" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/a_moreninha.png" alt="A Moreninha">
                </div>

                <div class="card-content">
                    <h2>A Moreninha</h2>
                    <p>Joaquim Manuel de Macedo - Primeira obra da ficção romântica brasileira.</p>
                    <a href="https://fliphtml5.com/uwvpx/fjss/A_Moreninha_-_Joaquim_Manoel_de_Macedo/82/"
                        target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/Joaquim_Manuel_de_Macedo" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/a-hora-da-estrela.jpg" alt="A Hora da Estrela">
                </div>

                <div class="card-content">
                    <h2>A Hora da Estrela</h2>
                    <p>Clarice Lispector - Narrativa comovente sobre Macabéa.</p>
                    <a href="https://emakbakea.wordpress.com/wp-content/uploads/2020/05/a-hora-da-estrela.pdf"
                        target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/Clarice_Lispector" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/canticos.jpg" alt="Cânticos">
                </div>

                <div class="card-content">
                    <h2>Cânticos</h2>
                    <p>Cecília Meireles - Poesia lírica e profunda.</p>
                    <a href="https://livrariapublica.com.br/listas/5-livros-de-cecilia-meireles-para-baixar-em-pdf/"
                        target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/Cec%C3%ADlia_Meireles" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/capitaes-de-areia.jpg" alt="Capitães da Areia">
                </div>

                <div class="card-content">
                    <h2>Capitães da Areia</h2>
                    <p>Jorge Amado - Retrato de meninos de rua em Salvador.</p>
                    <a href="https://escoladedebate.cnpc.cultura.gov.br/wp-content/uploads/sites/24/2017/05/capitaes-da-areia.pdf"
                        target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/Jorge_Amado" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/dom-casmurro.jpg" alt="Dom Casmurro">
                </div>

                <div class="card-content">
                    <h2>Dom Casmurro</h2>
                    <p>Machado de Assis - Um dos maiores clássicos da literatura brasileira.</p>
                    <a href="https://dn721608.ca.archive.org/0/items/domCasmurroMachado/domCasmurro.pdf" target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/Machado_de_Assis" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/iaia-garcia-7.jpg" alt="Iaiá Garcia">
                </div>

                <div class="card-content">
                    <h2>Iaiá Garcia</h2>
                    <p>Machado de Assis – Romance sobre amor, orgulho e dilemas sociais no século XIX.</p>
                    <a href="http://www.dominiopublico.gov.br/download/texto/ua000205.pdf" target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/Machado_de_Assis" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/iracema.jpg" alt="Iracema">
                </div>

                <div class="card-content">
                    <h2>Iracema</h2>
                    <p>José de Alencar – Lenda romântica que retrata o encontro entre índios e colonizadores.</p>
                    <a href="http://www.dominiopublico.gov.br/download/texto/bn000014.pdf" target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/Jos%C3%A9_de_Alencar" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/macunaima.png" alt="Macunaimá">
                </div>

                <div class="card-content">
                    <h2>Macunaimá</h2>
                    <p>Mário de Andrade – Modernista que mistura lendas e crítica social em tom irreverente.</p>
                    <a href="https://archivepublicdomain.com/files/2025/03/Macunaima.pdf" target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/M%C3%A1rio_de_Andrade" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/memorias_de_um_sargento_milicias.png" alt="Memórias de Um Sargento de Milícias">
                </div>

                <div class="card-content">
                    <h2>Memórias de Um Sargento de Milícias</h2>
                    <p>Manuel Antônio de Almeida – Narrativa picaresca do Brasil urbano do século XIX.</p>
                    <a href="https://ia801703.us.archive.org/11/items/memoriasPostumasBrasCubas/memoriasBras.pdf" target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/Manuel_Ant%C3%B4nio_de_Almeida" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/memorias-postumas.jpg" alt="Memórias Póstumas de Brás Cubas">
                </div>

                <div class="card-content">
                    <h2>Memórias Póstumas de Brás Cubas</h2>
                    <p>Machado de Assis – Obra inovadora com humor ácido e reflexões sobre a vida e a morte.</p>
                    <a href="https://site-antigo-2025.uffs.edu.br/institucional/reitoria/editora-uffs/repositorio-de-e-books/memorias-postuma-de-bras-cubas-pdf"
                        target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/Machado_de_Assis" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/o_ateneu.jpg" alt="O Ateneu">
                </div>

                <div class="card-content">
                    <h2>O Ateneu</h2>
                    <p>Raul Pompeia – Romance psicológico sobre a vida escolar e a formação moral de um jovem.</p>
                    <a href="http://www.dominiopublico.gov.br/download/texto/bv000297.pdf" target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/Raul_Pompeia" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/o-cortico.jpg" alt="O Cortiço">
                </div>

                <div class="card-content">
                    <h2>O Cortiço</h2>
                    <p>Aluísio Azevedo – Retrato realista e crítico da vida em um cortiço no Rio de Janeiro.</p>
                    <a href="http://www.dominiopublico.gov.br/download/texto/ua00021a.pdf" target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/Alu%C3%ADsio_Azevedo" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/olhai_os_lirios_do_campo.jpg" alt="Olhai Os Lírios Do Campo">
                </div>

                <div class="card-content">
                    <h2>Olhai Os Lírios Do Campo</h2>
                    <p>Érico Veríssimo – História de amor e dilemas éticos em meio à realidade social brasileira.</p>
                    <a href="https://lf.edu.br/linguagenscodigos/wp-content/uploads/2015/05/Erico-Verissimo-Olhai-os-Lirios-do-Campo.pdf"
                        target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/%C3%89rico_Ver%C3%ADssimo" target="_blank">Biografia</a>
                </div>
            </div>

            <div class="card">
                <div class="livro-img-pdf">
                    <img src="IMG/quincas_borbas.png" alt="Quincas Borba">
                </div>

                <div class="card-content">
                    <h2>Quincas Borba</h2>
                    <p>Machado de Assis – Continuação temática de Brás Cubas, com ironia e crítica filosófica.</p>
                    <a href="https://arquivo.pandabooks.com.br/classicos/lt_quincas.pdf" target="_blank">Ler livro</a>
                    <a href="https://pt.wikipedia.org/wiki/Machado_de_Assis" target="_blank">Biografia</a>
                </div>
            </div>

        </main>

    </div>

    <div class="btni">
        <a href="equipe.php"><button class="button" type="submit">Sobre Equipe</button>
        </a>
    </div>



    <!-- Rodapé -->
    <footer>
        <p>
            Projeto escolar de fichamentos - Todos os direitos reservados © 2025
        </p>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="JS/home.js"></script>
    <script src="JS/menu-moba.js"></script>


</body>

</html>