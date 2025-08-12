<?php

$dbHost = '127.0.0.1:3306';
$dbUsername = 'root';
$dbPassword = 'senai.123';
$dbName = 'ptt';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);




/* if($conexao->connect_errno){
    echo("Erro");
}else{
    echo("Conexão realizada com sucesso");
}  */

?>