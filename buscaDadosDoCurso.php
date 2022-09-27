<?php
    include_once('conexao.php');

    function buscaDadosDoCurso($conexao, $codCurso) {

    $query = "select * from curso where idCurso='{$codCurso}'";
    $resultado = mysqli_query($conexao, $query);
    $dadosCurso = mysqli_fetch_assoc($resultado);
    return $dadosCurso;

    }