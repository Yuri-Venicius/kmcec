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
    <link rel="icon" type="image/png" href="./assets/brand.png" />


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
                    </button>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a nav-link href="https://kmconcursos.com.br/index.php/shop/">
                                    <button type="button" class="btn btn-warning">Loja KM</button>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <h2>VÍDEO AULAS - CURSO PRÉ-EDITAL PARA O CONCURSO DA SEDUC 2024</h2>
            <p>Aqui ficam listadas suas vídeos aulas disponíveis, separadas por blocos de conteúdo.
                Para acessar uma aula basta clicar em "Aulas" no bloco do conteúdo referente.</p>

            <div class="row">

                <div class="col-sm-6">
                    <div class="alert alert-primary" role="alert">
                        Acesse clicando <a href="https://docs.google.com/spreadsheets/d/1hkYacYP-VPjdiZ7-gNrMbS93wxNydlp3Sn0V6mruUTE/edit#gid=0" class="alert-link">aqui</a>, o cronograma de gravações deste curso!
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="alert alert-warning" role="alert">
                        Acesse clicando <a href="https://meet.google.com/phs-gwas-mvb" class="alert-link">aqui</a>, o link para sala de aula ao vivo! (Transmissão segue o cronograma ao lado)
                    </div>
                </div>

                <div class="col-sm-12">
                    <h3>Conteúdo Bônus: </h3>
                </div>

                <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Conteúdo bônus do curso pré-edital para o concurso da SEDUC 2024 [Online]</h5>
                                <p class="card-text">Conteúdo bônus do curso pré-edital para o concurso da SEDUC 2024. [Online]
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalCursoProcessoSeletivoSeduc2023.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>

                <div class="col-md-12">
                    <h3>Conteúdo do curso: </h3>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LDB - OZANIL RONDON</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLdbOzanil" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1DorFPCObfIyj_poYTfoIrIjbBnKgFRBF?usp=drive_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </p>
                            <div class="collapse" id="collapseLdbOzanil">
                                <div class="card card-body">
                                    <a href="SEDUC_PRE_2024_LDB_OZANIL_AULA01.php">AULA 01</a>
                                    <a href="SEDUC_PRE_2024_LDB_OZANIL_AULA02.php">AULA 02</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PORTUGUÊS - HÉLIO TAQUES</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePtHelio" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/15sMuAzJHZPbIm5MFSVJSWq_kZ3sEva1t" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </p>
                            <div class="collapse" id="collapsePtHelio">
                                <div class="card card-body">
                                    <a>Ainda não há conteúdo gravado</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ESTATUTO DO SERVIDOR - CLEIDE REGINA</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCleideEstatuto" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1spFlk8xoQ1hwiaF_zEHocGGwSlMbtUXi?usp=drive_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </p>
                            <div class="collapse" id="collapseCleideEstatuto">
                                <div class="card card-body">
                                    <a href="SEDUC_PRE_2024_EST_CLEIDE_AULA01.php">AULA 01</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                </div>

                <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">GEOGRAFIA REGIONAL - MARCELO ALONSO</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseGeoRegMarcelo" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1npXSJ_1o4noV9HPD1qXWBoZYFama6LPW?usp=drive_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseGeoRegMarcelo">
                                    <div class="card card-body">
                                        <a href="SEDUC_PRE_2024_GEO_MARCELO_AULA01.php">AULA 01</a>
                                        <a href="SEDUC_PRE_2024_GEO_MARCELO_AULA02.php">AULA 02</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">INFORMÁTICA - JOÃO CLEBER</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInformaticaJoao" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1y6_GkwVkPh9YVp1X-aUYkvSUzhvGiNQK?usp=drive_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </p>
                            <div class="collapse" id="collapseInformaticaJoao">
                                <div class="card card-body">
                                    <a href="SEDUC_PRE_2024_INFORMATICA_JOAO_AULA01.php">AULA 01</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                </div>
            </div>


            <!-- jQuery CDN - Slim version (=without AJAX) -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <!-- Popper.JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
            <!-- Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
            <!-- jQuery Custom Scroller CDN -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $("#sidebar").mCustomScrollbar({
                        theme: "minimal"
                    });

                    $('#sidebarCollapse').on('click', function() {
                        $('#sidebar, #content').toggleClass('active');
                        $('.collapse.in').toggleClass('in');
                        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                    });
                });
            </script>
</body>

</html>