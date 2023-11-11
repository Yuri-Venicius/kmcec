<?php
define('PG_HOST', '89.117.33.41');
define('PG_PORT', '5432');
define('PG_USER', 'yuri.oliveira');
define('PG_PASSWORD', 'yuri@123');
define('PG_DB', 'km-hml');

// Estabelece a conexão
$conexaoPostgres = pg_connect("host=" . PG_HOST . " port=" . PG_PORT . " dbname=" . PG_DB . " user=" . PG_USER . " password=" . PG_PASSWORD);

// Verifica a conexão
if (!$conexaoPostgres) {
    die("Falha na conexão com o PostgreSQL: " . pg_last_error());
}

echo "Conexão com PostgreSQL bem-sucedida";

// ... faça suas consultas aqui ...

// Fecha a conexão

?>
