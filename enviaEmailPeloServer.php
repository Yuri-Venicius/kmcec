<?php

require "Email.php";
require __DIR__."/vendor/autoload.php";

$email = new Email();

$email->add(
    "TESTS",
    "Blank Document, just for tests",
    "KM C&C",
    "yvenicios@gmail.com"
)->send();

if($email->error()){
    var_dump(true);
}else{
    echo $email->error()->getMessage();
}