<?php
include_once("conexao.php");

// $codCurso = $_POST['codCurso'];

$query_select = "SELECT u.Id AS Cod,
                        u.nome AS Nome,
                        u.usuario AS Usuario,
                        a.dtCriacaoAcesso AS DataCadastro,
                        a.statusAcesso AS StatusDoAcesso
                FROM    usuarios AS u
                INNER JOIN acessousuariocurso AS a ON
                        u.id = a.idUsuario
                INNER JOIN curso as c ON 
                        c.idCurso = a.idCurso
                WHERE c.idCurso = '2650'
                        ORDER BY
                        dtCriacaoAcesso
                        DESC";
$query = mysqli_query($conexao, $query_select);
$dados = mysqli_fetch_array($query);
json_encode($dados);