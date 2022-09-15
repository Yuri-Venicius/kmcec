<?php
define('HOST', '127.0.0.1:3306');
define('USUARIO', 'u617625350_kmadmin');
define('SENHA', 'KM@BD@Admin@2021');
define('DB', 'u617625350_km');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Erro de conexao com o Banco de Dados');


