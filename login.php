<?php
session_start();
// include('verifica_login.php');
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: login_Home.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from usuarios where usuario = '{$usuario}' and senha = md5('{$senha}')";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

$prod = $_SESSION['nome'];
echo $prod;
if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: index.php');
    exit();
}else{
    $_SESSION['usuario_invalido'] = true;
    header ('Location: login_home.php');    
    exit();
}
