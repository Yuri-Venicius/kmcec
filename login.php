<?php
session_start();
// include('verifica_login.php');
// include('conexao.php');
include('conexaoPostgres.php');

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: login_Home.php');
    exit();
}

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

try {
    $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = md5(:senha)";
    $stmt = $conexaoPostgres->prepare($query);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    $row = $stmt->rowCount();

    if ($row == 1) {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['usuario_invalido'] = true;
        header('Location: login_home.php');
        exit();
    }
} catch (PDOException $e) {
    die("Erro na consulta ao PostgreSQL: " . $e->getMessage());
}
?>
