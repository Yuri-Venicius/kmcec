<?php
define('PG_HOST', '89.117.33.41');
define('PG_PORT', '5432');
define('PG_USER', 'yuri.oliveira');
define('PG_PASSWORD', 'yuri@123');
define('PG_DB', 'km-hml');

try {
    $conexaoPostgres = new PDO("pgsql:host=".PG_HOST.";port=".PG_PORT.";dbname=".PG_DB, PG_USER, PG_PASSWORD);
    $conexaoPostgres->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com PostgreSQL: " . $e->getMessage());
}
?>
