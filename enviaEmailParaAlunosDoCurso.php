<?php
include_once("conexao.php");
include_once("buscaDadosBasicosUsuario.php");
include_once("buscaDadosDoCurso.php");

function enviaEmailParaAlunosDoCurso($conexao, $usuario, $curso, $conteudoNovo){

    $dadosDoUsuario = buscaDadosBasicosUsuario($conexao, $usuario);
    $dadosDoCurso = buscaDadosDoCurso($conexao, $curso);
    $dadosDoCurso1 = strtoupper($dadosDoCurso['nomeCurso']);
    $dadosDoUsuario1 = strtoupper($dadosDoUsuario['nome']);

	($dadosDoUsuario['email'] == null) ? $varEmail = $usuario : $varEmail = $dadosDoUsuario['email']; 

    $to = $varEmail;
    $subject = 'OLÁ ' . $dadosDoUsuario1 . ', NOVA AULA POSTADA NA PLATAFORMA PARA O CURSO: '. $dadosDoCurso1;
    $message = $conteudoNovo;

    $headers = 'From: no-reply@kmconcursos.com.br' . "\r\n" .
    'Reply-to: no-reply@kmconcursos.com.br';

    mail($to, $subject, $message, $headers);

}