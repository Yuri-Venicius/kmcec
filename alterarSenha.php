<?php
session_start();
include_once("conexao.php");
include_once("buscaDadosBasicosUsuario.php");
include_once("enviaEmailDeSenhaAlteradaPeloServer.php");

$usuarioAtual = buscaDadosBasicosUsuario($conexao, $_SESSION['usuario']);

$novaSenha = MD5($_POST['novaSenha']);
$senhaAtual = MD5($_POST['senhaAtual']);

$query_select = "SELECT * FROM usuarios WHERE usuario = {$_SESSION['usuario']}";
$select = mysqli_query($conexao, $query_select);
$result = mysqli_fetch_array($select);

if($senhaAtual != $result['senha']){
    echo"<script language='javascript' type='text/javascript'>
        alert('A sua SENHA ATUAL esta incorreta, digite-a novamente!');
        window.location.href='perfil.php';</script>";

}else{
        $query = "UPDATE usuarios SET senha = '$novaSenha' WHERE usuario='{$_SESSION['usuario']}' and $usuario = '{$usuarioAtual['usuario']}'";
        $insert = mysqli_query($conexao, $query);

        if($insert){
            enviaEmailDeSenhaAlteradaPeloServer($conexao, $usuarioAtual['usuario']);
            echo"<script language='javascript' type='text/javascript'>
                alert({$usuarioAtual['nome']}, Sua SENHA foi cadastrada com SUCESSO!');
                window.location.href='index.php'</script>";
        }else{
            echo"<script language='javascript' type='text/javascript'>
                alert('Não foi possível alterar sua senha, favor contactar o suporte!');
                window.location.href='index.php'</script>";
        }
}