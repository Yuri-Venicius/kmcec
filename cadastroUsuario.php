<?php

include('conexao.php');
include('enviaEmailPeloServer.php');

$usuario = $_POST['usuario'];
$senha = MD5($_POST['senha']);
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$contato = $_POST['contato'];

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
        if($logarray == $usuario){
            
            echo"<script language='javascript' type='text/javascript'>
            alert('Usuário ja cadastrado, Consulte a situação do usuário!');
            window.location.href='novoUsuario.php';</script>";
            die();
        
        }else{
            $query = "INSERT INTO usuarios(usuario, senha, nome, cpf, email, contato, sobrenome) 
                        SELECT '$usuario','$senha', '$nome', '$cpf', '$email', '$contato', '$sobrenome'
                        FROM usuarios
                            WHERE NOT EXISTS(
                                SELECT usuario
                                FROM usuarios
                                WHERE usuario = '$usuario')
                        LIMIT 1";
            $insert = mysqli_query($conexao, $query);

            if($insert){
                echo"<script language='javascript' type='text/javascript'>
                    alert('Usuário cadastrado com sucesso!');
                    window.location.href='novoUsuario.php';</script>";
            }else{
                echo"<script language='javascript' type='text/javascript'>
                    alert('Não foi possível cadastrar esse usuário, verifique os dados inseridos, é possível que este usuário ja tenha cadastro');
                    window.location.href='novoUsuario.php';</script>";
            }
        }
    }

?>