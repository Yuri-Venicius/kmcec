<?php
include_once('conexao.php');
include_once('buscaDadosBasicosUsuario.php');
include_once('buscaDadosDoCurso.php');


// Aqui envia a mensagem 
function enviaEmailPeloServer($conexao, $usuario, $curso){
	$dadosUsuario = buscaDadosBasicosUsuario($conexao, $usuario);
	$cursoCadastrado = buscaDadosDoCurso($conexao, $curso);

	$to			= $dadosUsuario['email'];
	$subject	= 'KM C&C - SEU ACESSO AO CURSO: ' . $cursoCadastrado['nomeCurso'];
	$message	= 'Olá '. $dadosUsuario['nome'] . ', venho lhe dar as boas vindas ao Curso: '.$cursoCadastrado['nomeCurso'].'

	Seus acessos iniciais são:

	KM Online: https://kmconcursos.com.br/online/

	Login: ' . $dadosUsuario['usuario'] . '

	Senha: Seu CPF, sem traços, pontos ou espaços.

	Quaisquer dúvidas estamos a disposição no whatsapp:[https://api.whatsapp.com/send/?phone=556599585177]



	Este é um e-email AUTOMÁTICO, favor não responder';

	$headers	= 'From: no-reply@kmconcursos.com.br' . "\r\n" .
		'Reply-to: no-reply@kmconcursos.com.br';

	mail($to, $subject, $message, $headers);

	return ;
}
?>