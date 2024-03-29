<?php
session_start();
include('verifica_login.php');
include('buscaDadosBasicosUsuario.php');
include('buscaDadosDoCurso.php');
include('verificaAcessoAoCurso.php');

$usuarioLogado = buscaDadosBasicosUsuario($conexao, $_SESSION['usuario']);
$verificaAdm = buscaDadosBasicosUsuario($conexao, $_SESSION['usuario']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>KM Online</title>
    <link rel="icon" type="image/png" href="./assets/brand.png"/>


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">

                <a href="index.php"><img src="./assets/LogoBRANCA KM Cursos & Concursos.png" width="151" height="121"></a>
            </div>

            <ul class="list-unstyled components">

                <p><?php
                    if ($usuarioLogado['nome'] == '' || $usuarioLogado['nome'] == 'NULL') {
                        print("Olá, " . $usuarioLogado['usuario']);
                    } else {
                        print("Olá, " . $usuarioLogado['nome']);
                    }
                    ?></p>
                <li>
                    <a href="index.php"><i class="bi bi-house-fill"></i> Home</a>
                </li>
                <li>
                    <a href="perfil.php"><i class="bi bi-person-circle"></i> Perfil</a>
                </li>
                <li>
                    <?php if ($verificaAdm['nivelAcesso'] == '1') : ?>
                        <a href="novoUsuario.php"><i class="bi bi-person-plus-fill"></i> Cadastros</a>
                    <?php endif ?>
                </li>
                <li>
                    <?php if ($verificaAdm['nivelAcesso'] == '1') : ?>
                        <!-- <a href="listaAcessosUsuario.php"><i class="bi bi-grid-fill"></i></i> Gerir Acessos</a> -->
                    <?php endif ?>
                </li>
 <p></p>
                <li><a href="logout.php"><i class="bi bi-box-arrow-right"></i> Sair</a></li>
            </ul>
            </li>
            <p>
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> KM Cursos & Concursos
            </p>
        </nav>


        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>

                    </button>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">KM Online</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <h2>Curso Português para Concursos - Macetes e Questões</h2><p></p>
            <a href="PT_Aula01_Crase.php">
               
                <img src="./assets/Thumbnails/Thumbnail Aula 01 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula02_Crase.php">
        
                <img src="./assets/Thumbnails/Thumbnail Aula 02 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula03_Vozes.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 03 PT_CONC.png" width="320" height="200">
                <p></p>

            </a>
            <a href="PT_Aula04_Se.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 04 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula05_Lhe.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 05 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula06_Que.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 06 PT_CONC.png" width="320" height="200">
            </a>
            <p></p>

            <a href="PT_Aula07_OrCo.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 07 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula08_OrCo.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 08 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula09_OrSu.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 09 PT_CONC.png" width="320" height="200">
            </a><p></p>

            <a href="PT_Aula10_ExConj.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 10 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula11_ExConj.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 11 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula12_TermInt.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 12 PT_CONC.png" width="320" height="200">
            </a><p></p>

            <a href="PT_Aula13_TermInt.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 13 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula14_TermInt.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 14 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula15_TermInt.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 15 PT_CONC.png" width="320" height="200">
            </a><p></p>

            <a href="PT_Aula16_Verbos">
                <img src="./assets/Thumbnails/Thumbnail Aula 16 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula17_Verbos.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 17 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula18_Verbos.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 18 PT_CONC.png" width="320" height="200">
            </a><p></p>

            <a href="PT_Aula19_Verbos.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 19 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula20_Verbos.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 20 PT_CONC.png" width="320" height="200">
            </a>
            <a href="PT_Aula21_Pronomes.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 21 PT_CONC.png" width="320" height="200">
            </a>
            <p></p>
            <a href="PT_Aula22_Pronomes.php">
                <img src="./assets/Thumbnails/Thumbnail Aula 22 PT_CONC.png" width="320" height="200">
            </a>

        </div>

        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
            integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
            crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
            integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
            crossorigin="anonymous"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar, #content').toggleClass('active');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
        </script>
</body>

</html>