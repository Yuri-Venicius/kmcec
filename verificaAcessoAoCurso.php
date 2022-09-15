<?php

include_once('conexao.php');
include_once('buscaDadosBasicosUsuario.php');
include_once('buscaDadosDoCurso.php');

function verificaAcessoAoCurso($conexao, $idUsuario, $codCurso){

    $query = "SELECT * FROM acessousuariocurso where idUsuario = '{$idUsuario}' and idCurso = '{$codCurso}' ";
    $res = mysqli_query($conexao, $query);
    $acessoAoCurso = mysqli_fetch_assoc($res);
    
    return $acessoAoCurso;

}
