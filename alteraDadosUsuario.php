<?php

include('conexao.php');

$usuario = $_POST['usuario'];
$senha = MD5($_POST['senha']);

$query_select = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
$select = mysqli_query($conexao, $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['usuario'];
$nomeUser = $array['nome'];

    if($usuario == "" || $usuario == null){
        echo"<script language='javascript' type='text/javascript'>
            alert('O Campo usuario precisa ser preenchido');
            window.location.href='novoUsuario.php';</script>";

    }else{
            $query = "UPDATE usuarios SET usuario = '$usuario', senha = '$senha' WHERE usuario = '$usuario'";
            $update = mysqli_query($conexao, $query);

            if($update){
                echo"<script language='javascript' type='text/javascript'>
                    alert('Dados de '$nomeUser' Alterados com sucesso!');
                    window.location.href='index.php'</script>";
            }else{
                echo"<script language='javascript' type='text/javascript'>
                    alert('Não foi possível Alterar os dados desse usuário');
                    window.location.href='novoUsuario.php'</script>";
            }
    }
