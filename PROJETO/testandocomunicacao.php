<?php
session_start();
//print_r($_REQUEST);


if(isset($_POST['submit']) && !empty($_POST['livro']) && !empty($_POST['autor']))
{

include_once('config.php');

$email = $_POST['livro'];
$senha = $_POST['autor'];

/* print_r('email:'. $email);
print_r('senha' .$senha); */

/* $sql = "SELECT * FROM livro WHERE livro = '$livro' and autor = '$autor'"; */

$result = $conexao->query($sql);

/* print_r($result);
print_r($sql); */

if(mysqli_num_rows($result)<1){
    unset($_SESSION['livro']);
    unset($_SESSION['autor']);
  header('Location: login.php');  
}
else{
$_SESSION['livro'] = $livro;
$_SESSION['autor'] = $autor;
header('Location: testenovo.php');

}
}

?>