<?php
include_once("conexao.php");

$query_select = 'SELECT	u.Id AS Cod,
                u.nome AS Nome, 
                u.usuario AS Usuario,
                a.dtCriacaoAcesso AS DataCadastro,
                a.statusAcesso AS StatusDoAcesso
                FROM usuarios as u 
                INNER JOIN acessousuariocurso as a 
                ON  u.id = a.idUsuario
                ORDER BY dtCriacaoAcesso DESC ';
$query = mysqli_query($conexao, $query_select);
$resultado_select = mysqli_fetch_array($query);

echo json_encode($resultado_select);

