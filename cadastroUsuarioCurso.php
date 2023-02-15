<?php
session_start();
include('conexao.php');
include('buscaDadosDoCurso.php');
include('enviaEmailPeloServer.php');

$cpfParaCurso = $_POST['cpfParaCurso'];
$cpfComoSenha = MD5($_POST['cpfParaCurso']);
$codCurso = $_POST['codCurso'];
$modalidadeAluno = $_POST['modalidadeAluno'];

$query_select = "SELECT * FROM usuarios WHERE cpf = '$cpfParaCurso' or senha = '$cpfComoSenha'";
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
            alert('Este usuário não esta matriculado!');
            window.location.href='novoUsuario.php';</script>";

    }else{
        

            $query_select1 = "SELECT * from acessousuariocurso WHERE idUsuario = '$idUsuario' and idCurso = '$codCurso'";
            $resultado = mysqli_query($conexao, $query_select1);
            $countRow = mysqli_num_rows($resultado);

            if($countRow < 1){
                $queryInsert = "INSERT INTO acessousuariocurso(
                            idUsuario,
                            idCurso,
                            dtCriacaoAcesso,
                            statusAcesso,
                            criadoPor,
                            modalidadeAluno
                        )
                        VALUES(
                            '$idUsuario',
                            '$codCurso',
                            NOW(), 
                            'ATIVO', 
                            '{$_SESSION['usuario']}', 
                            '$modalidadeAluno')";

                $insert = mysqli_query($conexao, $queryInsert);
                
                if($insert){
                    ($nomeUsuario == null) ? $var = $logarray : $var = $nomeUsuario;
                    ($array['email'] == null) ? enviaEmailPeloServer($conexao, $logarray, $codCurso) : enviaEmailPeloServer($conexao, $array['usuario'], $codCurso);
                    echo"<script language='javascript' type='text/javascript'>
                        alert('Usuário $var cadastrado em: {$nomeCurso['nomeCurso']} com sucesso!');
                        window.location.href='novoUsuario.php';</script>";
                }
            }
            
            if ($countRow >= 1){
                ($nomeUsuario == null) ? $var1 = $logarray : $var1 = $nomeUsuario;
                echo"<script language='javascript' type='text/javascript'>
                    alert('O Usuário $var1 ja esta cadastrado no curso: {$nomeCurso['nomeCurso']} ');
                    window.location.href='novoUsuario.php';</script>";
            }
    }
