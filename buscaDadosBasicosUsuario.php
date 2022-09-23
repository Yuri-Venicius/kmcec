<?php
    include_once('conexao.php');

    function buscaDadosBasicosUsuario($conexao, $usuario) {

    $query = "select * from usuarios where usuario='{$usuario}'";
    $resultado = mysqli_query($conexao, $query);
    $dadosUsuario = mysqli_fetch_assoc($resultado);
    return $dadosUsuario;
    }
