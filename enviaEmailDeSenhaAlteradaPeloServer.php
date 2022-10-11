<?php
include_once('conexao.php');
include_once('buscaDadosBasicosUsuario.php');



// Aqui envia a mensagem 
function enviaEmailDeSenhaAlteradaPeloServer($conexao, $usuario){
	$dts = new DateTime(); //this returns the current date time
    
    $dadosUsuario = buscaDadosBasicosUsuario($conexao, $usuario);

	$to			= $dadosUsuario['email'];
	$subject	= 'KM C&C - ALTERAÇÃO DE SENHA DE ACESSO';
	$message	= 'Olá '. $dadosUsuario['nome'] . '

    Sua senha de acesso foi alterada com sucesso!!
    Data da alteração: '.$dts.'

    Att,
    Equipe KM C&C.


    [Caso não tenha sido você, favor entrar em contato com nosso suporte!]

	Este é um e-email AUTOMÁTICO, favor não responder';

	$headers	= 'From: no-reply@kmconcursos.com.br' . "\r\n" .
		'Reply-to: no-reply@kmconcursos.com.br';

	mail($to, $subject, $message, $headers);

	return ;
}
?>