<?php
session_start();

// Se o usuário confirmar o logout
if (isset($_POST['confirmar'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

// Se o usuário cancelar
if (isset($_POST['cancelar'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Logout</title>

<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Koulen&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
  rel="stylesheet" />

<link rel="stylesheet" href="CSS/style.css" />

<style>
body {
    font-family: "Playfair Display", serif;
    background: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
.caixa {
    max-width: 500px;
    padding: 30px;
    background: #fff7e6;
    border: 3px solid #8b0000;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0,0,0,0.2);
    text-align: center;
}
.caixa h2 {
    color: #5a2d0c;
    margin-bottom: 20px;
}
button {
    margin: 10px;
    padding: 12px 24px;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}
.btn-sair { background: #8b0000; color: white; }
.btn-cancelar { background: #5a2d0c; color: white; }
button:hover { transform: scale(1.05); opacity: 0.9; }
</style>
</head>
<body>

<div class="caixa">
    <h2>Deseja realmente deslogar?</h2>
    <form method="POST">
        <button type="submit" name="confirmar" class="btn-sair">🚪 Sim, quero sair</button>
        <button type="submit" name="cancelar" class="btn-cancelar">❌ Não, voltar</button>
    </form>
</div>

</body>
</html>
