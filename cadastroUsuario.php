<?php

include('conexao.php');

$usuario = $_POST['usuario'];
$senha = MD5($_POST['senha']);

$query_select = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
$select = mysqli_query($conexao, $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['usuario'];

    if($usuario == "" || $usuario == null){
        echo"<script language='javascript' type='text/javascript'>
            alert('O Campo usuario precisa ser preenchido');
            window.location.href='cadastroUsuario.html';</script>";

    }else{
        if($logarray == $usuario){
            
            echo"<script language='javascript' type='text/javascript'>
            alert('Esse login já existe');window.location.href='
            cadastroUsuario.html';</script>";
            die();
        
        }else{
            $query = "INSERT INTO usuarios(usuario, senha) VALUES ('$usuario','$senha')";
            $insert = mysqli_query($conexao, $query);

            if($insert){
                echo"<script language='javascript' type='text/javascript'>
                    alert('Usuário cadastrado com sucesso!');window.location.
                    href='index.php'</script>";
            }else{
                echo"<script language='javascript' type='text/javascript'>
                    alert('Não foi possível cadastrar esse usuário');window.location
                    .href='cadastroUsuario.html'</script>";
            }
        }
    }

?>