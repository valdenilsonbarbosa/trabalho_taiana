<?php
$query = "SELECT * FROM professor WHERE email = '$email' AND senha = '$senha'";
$result = mysqli_query($conexao, $query);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $_SESSION['tipo'] = 'professor'; // <- Aqui você define o tipo
    header("Location: dashboard.php");
    exit();
}
?>