<?php
include("Email.php");

require __DIR__."/vendor/autoload.php";
require "Email.php";

$email = new Email();

$email->add(
    "TESTE",
    "<h1>Teste</h1>",
    "KM C&C",
    "no-reply@kmconcursos.com.br"
)->send();

if($email->error()){
    var_dump(true);
}else{
    echo $email->error()->getMessage();
}