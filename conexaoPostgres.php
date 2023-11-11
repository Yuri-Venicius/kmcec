<?php
define('PG_HOST', '89.117.33.41');
define('PG_PORT', '5780');
define('PG_USER', 'postgres');
define('PG_PASSWORD', 'prodKM@@agente$%=');
define('PG_DB', 'km-prod');

try {
    $conexaoPostgres = new PDO("pgsql:host=".PG_HOST.";port=".PG_PORT.";dbname=".PG_DB, PG_USER, PG_PASSWORD);
    $conexaoPostgres->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com PostgreSQL: " . $e->getMessage());
}
?>
