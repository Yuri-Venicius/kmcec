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

            <h2>VÍDEO AULAS - CURSO PARA O CONCURSO DA EBSERH - ENFERMAGEM</h2>
            <p>Aqui ficam listadas suas vídeos aulas disponíveis, separadas por blocos de conteúdo.
                Para acessar uma aula basta clicar em "Aulas" no bloco do conteúdo referente.</p>

            <div class="row">

                <div class="col-sm-12">
                    <h3>Conteúdo Bônus: </h3>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CURSO PARA O CONCURSO DA SES-MT PRÉ-EDITAL - ENFERMAGEM E TÉCNICO DE ENFERMAGEM [Online]</h5>
                            <p class="card-text">Curso preparatório para o concurso da SES MT, específico para ENFERMAGEM E TÉCNICO DE ENFERMAGEM pré-edital 2023.
                            </p>
                            </p>
                            <p></p>
                            <a href="PrincipalSES-MT-Pre-Enf-TecEnf.php" class="btn btn-primary">Acessar</a>
                            <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                        </div>
                    </div>
                    <p></p>
                </div>

                <div class="col-md-12">
                    <h3>Conteúdo do curso: </h3>
                </div>

                <div class="col-sm-12">
                    <div class="alert alert-primary" role="alert">
                        Acesse clicando <a href="https://docs.google.com/spreadsheets/d/1hdOaF5E6dK-6J9C5jS3AZGp3da3VlM2_E_mXESHstTU/edit?usp=sharing" class="alert-link">aqui</a>, o cronograma de gravações deste curso!
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ESPECÍFICO ENFERMAGEM - GEOVANNE CASTILHO</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEnfGeovane" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1O53V9LA-ud2jVNWs5ZhaFSMg1irSrb1J?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </p>
                            <div class="collapse" id="collapseEnfGeovane">
                                <div class="card card-body">
                                    <a href="EBSERH_ENFERMAGEM_GEOVANNE_AULA01.php">AULA 01</a>
                                    <a href="EBSERH_ENFERMAGEM_GEOVANNE_AULA02.php">AULA 02</a>
                                    <a href="EBSERH_ENFERMAGEM_GEOVANNE_AULA03.php">AULA 03</a>
                                    <a href="EBSERH_ENFERMAGEM_GEOVANNE_AULA04.php">AULA 04</a>
                                    <a href="EBSERH_ENFERMAGEM_GEOVANNE_AULA05.php">AULA 05</a>
                                    <a href="EBSERH_ENFERMAGEM_GEOVANNE_AULA06.php">AULA 06</a>
                                    <a href="EBSERH_ENFERMAGEM_GEOVANNE_AULA07.php">AULA 07</a>
                                    <a href="EBSERH_ENFERMAGEM_GEOVANNE_AULA08.php">AULA 08</a>
                                    <a href="EBSERH_ENFERMAGEM_GEOVANNE_AULA09.php">AULA 09</a>
                                    <a href="EBSERH_ENFERMAGEM_GEOVANNE_AULA10.php">AULA 10</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">RACIOCÍNIO LÓGICO - IGOR BRASIL</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRlmIgor" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1-9CV--nHd5TX-xHWlhJ-SkwY4_A3uMm4?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </p>
                            <div class="collapse" id="collapseRlmIgor">
                                <div class="card card-body">
                                    <a href="EBSERH_RLM_IGOR_AULA01.php">AULA 01</a>
                                    <a href="EBSERH_RLM_IGOR_AULA02.php">AULA 02</a>
                                    <a href="EBSERH_RLM_IGOR_AULA03.php">AULA 03</a>
                                    <a href="EBSERH_RLM_IGOR_AULA04.php">AULA 04</a>
                                    <a href="EBSERH_RLM_IGOR_AULA05.php">AULA 05</a>
                                    <a href="EBSERH_RLM_IGOR_AULA06.php">AULA 06</a>
                                    <a href="EBSERH_RLM_IGOR_AULA07.php">AULA 07</a>
                                    <a href="EBSERH_RLM_IGOR_AULA08.php">AULA 08</a>
                                    <a href="EBSERH_RLM_IGOR_AULA09.php">AULA 09</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LEGISLAÇÃO DO SUS/EBSERH - FERNANDO DAVOLI</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegDavoli" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/11efe9dVOwIiLGdluiR8hDIR8FfuTGp6L?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </p>
                            <div class="collapse" id="collapseLegDavoli">
                                <div class="card card-body">
                                    <a href="EBSERH_LEG_DAVOLI_AULA01.php">AULA 01</a>
                                    <a href="EBSERH_LEG_DAVOLI_AULA02.php">AULA 02</a>
                                    <a href="EBSERH_LEG_DAVOLI_AULA03.php">AULA 03</a>
                                    <a href="EBSERH_LEG_DAVOLI_AULA04.php">AULA 04</a>
                                    <a href="EBSERH_LEG_DAVOLI_AULA05.php">AULA 05</a>
                                    <a href="EBSERH_LEG_DAVOLI_AULA06.php">AULA 06</a>
                                    <a href="EBSERH_LEG_DAVOLI_AULA07.php">AULA 07</a>
                                    <a href="EBSERH_LEG_DAVOLI_AULA08.php">AULA 08</a>
                                    <a href="EBSERH_LEG_DAVOLI_AULA09.php">AULA 09</a>
                                    <a href="EBSERH_LEG_DAVOLI_AULA10.php">AULA 10</a>
                                    <a href="EBSERH_LEG_DAVOLI_AULA11.php">AULA 11</a>
                                    <a href="EBSERH_LEG_DAVOLI_AULA12.php">AULA 12</a>
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
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1JwTygmMv0X9ro8y0YHRU06FZLzDoS4JL?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </p>
                            <div class="collapse" id="collapsePtHelio">
                                <div class="card card-body">
                                    <a href="EBSERH_PT_HELIO_AULA01.php">AULA 01</a>
                                    <a href="EBSERH_PT_HELIO_AULA02.php">AULA 02</a>
                                    <a href="EBSERH_PT_HELIO_AULA03.php">AULA 03</a>
                                    <a href="EBSERH_PT_HELIO_AULA04.php">AULA 04</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PORTUGUÊS - GOUVEIA</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePtGouveia" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1idTDdx8f88X0ii9eSHErsYp9YEhYc8BU?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </p>
                            <div class="collapse" id="collapsePtGouveia">
                                <div class="card card-body">
                                    <a href="EBSERH_PT_GOUVEIA_AULA01.php">AULA 01</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PORTUGUÊS - ELDER DENCATI</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePtElder" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1wjIv2pyCzAj2NiT-QuDhw9foToxzJM7a?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </p>
                            <div class="collapse" id="collapsePtElder">
                                <div class="card card-body">
                                    <a href="EBSERH_PT_ELDER_AULA01.php">AULA 01</a>
                                    <a href="EBSERH_PT_ELDER_AULA02.php">AULA 02</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">INTERPRETAÇÃO DE TEXTO - HÉLIO TAQUES</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInterHelio" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1Y7eMyrLY4bvL5Cy2gLp5R3a-wxvoxnCn?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </p>
                            <div class="collapse" id="collapseInterHelio">
                                <div class="card card-body">
                                    <a href="EBSERH_INTERPRETACAO_HELIO_AULA01.php">AULA 01</a>
                                    <a href="EBSERH_INTERPRETACAO_HELIO_AULA02.php">AULA 02</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">SIMULADOS</h5>
                            <p class="card-text">
                                <a href="https://drive.google.com/drive/folders/1o-prGt6R_rEWERIHDEGsuDBGq8nzB1xx?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Simulado</a>
                            </p>
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