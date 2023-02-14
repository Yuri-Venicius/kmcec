<?php
session_start();
include('conexao.php');
include('buscaDadosDoCurso.php');
include('enviaEmailPeloServer.php');

$cpfParaCurso = $_POST['cpfParaCurso'];
$cpfComoSenha = MD5($_POST['cpfParaCurso']);
$codCurso = $_POST['codCurso'];
$modalidadeAluno = $_POST['modalidadeAluno'];

$query_select = "SELECT id, usuario, nome FROM usuarios WHERE cpf = '$cpfParaCurso' or senha = '$cpfComoSenha'";
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
        if($logarray == $usuario){
            
            echo"<script language='javascript' type='text/javascript'>
            alert('Usuário $nomeUsuario ja está cadastrado, consulte sua situação!');
            window.location.href='novoUsuario.php';</script>";
            die();
        
        }else{
            $query = "INSERT INTO acessousuariocurso(
                        idUsuario,
                        idCurso,
                        dtCriacaoAcesso,
                        statusAcesso,
                        criadoPor,
                        modalidadeAluno
                    )
                    SELECT
                        '$idUsuario',
                        '$codCurso',
                        NOW(), 
                        'ATIVO', 
                        '{$_SESSION[' usuario ']}', 
                        '$modalidadeAluno'
                    FROM
                        acessousuariocurso
                    WHERE NOT
                        EXISTS(
                        SELECT
                            idUsuario,
                            idCurso
                        FROM
                            acessousuariocurso
                        WHERE
                            idUsuario = '$idUsuario' AND '$codCurso'
                    )
                    LIMIT 1";
            $insert = mysqli_query($conexao, $query);

            if($insert){
                ($nomeUsuario == null) ? $var = $logarray : $var = $nomeUsuario;
                ($array['email'] == null) ? enviaEmailPeloServer($conexao, $logarray, $codCurso) : enviaEmailPeloServer($conexao, $array['usuario'], $codCurso);
                echo"<script language='javascript' type='text/javascript'>
                    alert('Usuário $var cadastrado em: {$nomeCurso['nomeCurso']} com sucesso!');
                    </script>";
            }else{
                echo"<script language='javascript' type='text/javascript'>
                    alert('Não foi possível cadastrar esse usuário');
                    </script>";
            }
        }
    }
