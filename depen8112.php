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

            <h2>Curso da Lei 8.112/90</h2>
            <a href="DEPENaula01.php">
               
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 01 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula02.php">
        
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 02 Lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula03.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 03 lei 8112.png" width="300" height="200">
                <p></p>
            </a>
            <a href="DEPENaula04.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 04 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula05.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 05 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula06.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 06 lei 8112.png" width="300" height="200">
            </a>
            <p></p>
            <a href="DEPENaula07.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 07 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula08.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 08 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula09.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 09 lei 8112.png" width="300" height="200">
            </a>
            <p></p>
            <a href="DEPENaula10.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 10 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula11.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 11 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula12.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 12 lei 8112.png" width="300" height="200">
            </a>
            <p></p>
            <a href="DEPENaula13.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 13 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula14.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 14 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula15.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 15 lei 8112.png" width="300" height="200">
            </a>
            <p></p>
            <a href="DEPENaula16.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 16 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula17.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 17 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula18.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 18 lei 8112.png" width="300" height="200">
            </a>
            <p></p>
            <a href="DEPENaula19.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 19 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula20.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 20 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula21.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 21 lei 8112.png" width="300" height="200">
            </a>
            <p></p>
            <a href="DEPENaula22.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 22 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula23.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 23 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula24.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 24 lei 8112.png" width="300" height="200">
            </a><p></p>
            <a href="DEPENaula25.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 25 lei 8112.png" width="300" height="200">
            </a>
            <a href="DEPENaula26.php">
                <img src="./assets/Thumbnails/Thumbnail DEPEN Aula 26 lei 8112.png" width="300" height="200">
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