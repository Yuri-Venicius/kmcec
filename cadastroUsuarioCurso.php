<?php
session_start();
include('conexao.php');
include('buscaDadosDoCurso.php');
include('enviaEmailPeloServer.php');

$cpfParaCurso = $_POST['cpfParaCurso'];
$cpfComoSenha = MD5($_POST['cpfParaCurso']);
$codCurso = $_POST['codCurso'];

$query_select = "SELECT id, usuario, nome FROM usuarios WHERE cpf = '$cpfParaCurso' or senha = '$cpfComoCurso'";
$select = mysqli_query($conexao, $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['usuario'];
$idUsuario = $array['id'];
$nomeUsuario = $array['nome'];
$nomeCurso = buscaDadosDoCurso($conexao, $codCurso);
$nomeUsuario = strtoupper($nomeUsuario);
$nomeCurso['nomeCurso'] = strtoupper($nomeCurso['nomeCurso']);
$emailUsuario = $array['email'];


    if($logarray == "" || $logarray == null){
        echo"<script language='javascript' type='text/javascript'>
            alert('O Campo curso precisa ser preenchido');
            window.location.href='novoUsuario.php';</script>";

    }else{
        if($logarray == $usuario){
            
            echo"<script language='javascript' type='text/javascript'>
            alert('Usuário $nomeUsuario ja está cadastrado, consulte sua situação!');
            window.location.href='novoUsuario.php';</script>";
            die();
        
        }else{
            $query = "INSERT INTO acessousuariocurso(idUsuario, idCurso, dtCriacaoAcesso, criadoPor) VALUES ('$idUsuario', '$codCurso', now(), '{$_SESSION['usuario']}')";
            $insert = mysqli_query($conexao, $query);

            if($insert){
                enviaEmailPeloServer($conexao, $array['usuario'], $codCurso);
                echo"<script language='javascript' type='text/javascript'>
                    alert('Usuário $nomeUsuario cadastrado em: {$nomeCurso['nomeCurso']} com sucesso!');
                    window.location.href='novoUsuario.php'</script>";
            }else{
                echo"<script language='javascript' type='text/javascript'>
                    alert('Não foi possível cadastrar esse usuário');
                    window.location.href='novoUsuario.php'</script>";
            }
        }
    }
