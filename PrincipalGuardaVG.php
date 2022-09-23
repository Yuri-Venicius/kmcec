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

                <p>Bem-Vindo, <?php echo $_SESSION['usuario']; ?></p>
                <li>
                    <a href="index.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="perfil.php"><i class="fas fa-user-alt"></i> Perfil</a>
                </li>
                <li>
                    <a href="videoaulas.php"><i class="fas fa-book"></i> Cursos</a>
                </li>
                <p></p>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
            </ul>
            </li>
            <p>&copy; 2020 | KM Cursos & Concursos<p>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>

                    </button>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            
            <h2>Vídeo Aulas</h2>
            <p>Aqui ficam listadas suas vídeos aulas disponíveis, separadas por blocos de conteúdo. 
                Para acessar uma aula basta clicar em "Aulas" no bloco do conteúdo referente, e para fazer o 
                download do material de apoio do bloco, basta clicar em "Materiais" que o Download irá começar.</p>

            
            <div class="row">

            <div class="col-sm-6">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CONTEÚDO BÔNUS - MATÉRIAS BÁSICAS PRÉ-EDITAL</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseMaterialBonus" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <!-- <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1MTR3cGwWBGF8yo2Oj6I39PSUUS70IEem?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                                    </p>
                                    <div class="collapse" id="collapseMaterialBonus">
                                    <div class="card card-body"> 
                                        <a href="MateriasBasicasBonus.php">Acessar material Bônus</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>
            
            <div class="col-sm-6">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">INTERPRETAÇÃO DE TEXTO - HÉLIO TAQUES</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRedacaoHelio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1aKzoivw322w11BJ9ZUHgY8P6O5ttj7qw?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseRedacaoHelio">
                                    <div class="card card-body">
                                        <a href="GUARDAVG_REDACAO_HELIO_AULA01.php">AULA 01 - GRAVAÇÃO 21/07/2022</a><p></p> 
                                        <a href="GUARDAVG_REDACAO_HELIO_AULA02.php">AULA 02 - GRAVAÇÃO 28/07/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>
                
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PORTUGUÊS - GOUVEIA </h5>
                            <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesGouveia" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1cakigkBnKDINzaEbP6ez8FIqDWkElW7u?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapsePortuguesGouveia">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_PORTUGUES_GOUVEIA_AULA01.php">AULA 01 - GRAVAÇÃO 09/06/2022</a><p></p> 
                                        <a href="GUARDAVG_PORTUGUES_GOUVEIA_AULA02.php">AULA 02 - GRAVAÇÃO 30/06/2022</a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                            <h5 class="card-title">PORTUGUÊS - ELDER DENCATI</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesElder" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1yix2lFJ1buHyynrByeojndXEXLHQT-oB?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapsePortuguesElder">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_PORTUGUES_ELDER_AULA01.php">AULA 01 - Gravação 06/06/22</a><p></p> 
                                        <a href="GUARDAVG_PORTUGUES_ELDER_AULA02.php">AULA 02 - Gravação 13/06/22</a><p></p> 
                                        <a href="GUARDAVG_PORTUGUES_ELDER_AULA03.php">AULA 03 - Gravação 22/06/22</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                            <h5 class="card-title">INFORMÁTICA - SILVIO BONONI</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseINFOSilvio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1HNA3tjpuQ4Rs3Zb_pkqhbAtz_fweNhmg?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseINFOSilvio">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_SILVIO_INFO_AULA01.php">AULA 01 - Gravação 26/07/22 </a><p></p> 
                                        <a href="GUARDAVG_SILVIO_INFO_AULA02.php">AULA 02 - Gravação 01/08/22 </a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                            <h5 class="card-title">INFORMÁTICA - JOÃO CLEBER</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseINFOJoao" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1KpSrAWsdTuM906ylHN2RkVk7Ml79nd6n?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseINFOJoao">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_INFO_JOAO_AULA01.php">AULA 01 - GRAVAÇÃO 24/06/22 </a><p></p> 
                                        <a href="GUARDAVG_INFO_JOAO_AULA02.php">AULA 02 - GRAVAÇÃO 07/07/22 </a><p></p> 
                                        <a href="GUARDAVG_INFO_JOAO_AULA03.php">AULA 03 - GRAVAÇÃO 08/07/22 </a><p></p> 
                                        <a href="GUARDAVG_INFO_JOAO_AULA04.php">AULA 04 - GRAVAÇÃO 14/07/22 </a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                            <h5 class="card-title">RLM - IGOR BRASIL</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRLMIgor" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1gis2ttEQPLOAOI_sAC5lhRjzW446MMVi?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseRLMIgor">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_RLM_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 08/06/22 </a><p></p> 
                                        <a href="GUARDAVG_RLM_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 15/06/22 </a><p></p> 
                                        <a href="GUARDAVG_RLM_IGOR_AULA03.php">AULA 03 - GRAVAÇÃO 21/06/22 </a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                            <h5 class="card-title">HISTÓRIA DE MT - CARLOS BIDU</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseHistoriaBidu" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1MfS8Z8kCu1YbInR803mOV5DkLDnD4BSS?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseHistoriaBidu">
                                    <div class="card card-body">
                                        <a href="GUARDAVG_HISTORIA_BIDU_AULA01.php">AULA 01 - GRAVAÇÃO 23/06/22 </a><p></p>
                                        <a href="GUARDAVG_HISTORIA_BIDU_AULA02.php">AULA 02 - GRAVAÇÃO 27/06/22 </a><p></p>
                                        <a href="GUARDAVG_HISTORIA_BIDU_AULA03.php">AULA 03 - GRAVAÇÃO 29/06/22 </a><p></p>
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">GEOGRAFIA DE MT - MARCELO ALONSO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseGeografiaMarcelo" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1zgRdMAWNhIw1ZlhfroMkD6bJlfcuEyuR?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseGeografiaMarcelo">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_GEOGRAFIA_MARCELO_AULA01.php">AULA 01 - GRAVAÇÃO 04/07/2022</a><p></p> 
                                        <a href="GUARDAVG_GEOGRAFIA_MARCELO_AULA02.php">AULA 02 - GRAVAÇÃO 05/07/2022</a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>
                
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PRINCÍPIOS DE ÉTICA E FILOSOFIA - DOUGLAS REMONATTO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEticaDouglas" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1TxXHtVD_dv7u6ZuKPp5iO1HUDAkHruLe?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseEticaDouglas">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_ETICA_DOUGLAS_AULA01.php">AULA 01 - GRAVAÇÃO 03/08/2022</a><p></p> 
                                        <a href="GUARDAVG_ETICA_DOUGLAS_AULA02.php">AULA 02 - GRAVAÇÃO 08/08/2022</a><p></p> 
                                        <p></p>
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DIREITO CONSTITUCIONAL - JOSÉ NETO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDirConstNeto" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/14565_6apfmJm4qG9IzLaoRIEiL2QpvRN?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseDirConstNeto">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_DIR_CONST_NETO_AULA01.php">AULA 01 - GRAVAÇÃO 30/06/2022</a><p></p> 
                                        <a href="GUARDAVG_DIR_CONST_NETO_AULA02.php">AULA 02 - GRAVAÇÃO 13/07/2022</a><p></p> 
                                        <a href="GUARDAVG_DIR_CONST_NETO_AULA03.php">AULA 03 - GRAVAÇÃO 29/07/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LEI ORGÂNICA DE VÁRZEA GRANDE - JOSÉ NETO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLeiOrgNeto" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1XjsMycK-gs6idbBulD7IDufKCiKhV8d7?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseLeiOrgNeto">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_LEI_NETO_AULA01.php">AULA 01 - GRAVAÇÃO 20/07/2022</a><p></p> 
                                        <a href="GUARDAVG_LEI_NETO_AULA02.php">AULA 02 - GRAVAÇÃO 27/07/2022</a><p></p> 
                                        <a href="GUARDAVG_LEI_NETO_AULA03.php">AULA 03 - GRAVAÇÃO 29/07/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ESTATUTO DO SERVIDOR DE VG - CLEIDE REGINA</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEstVgCleide" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1Y1EoD0ELd-10tPpk4FEHlMVOwB1MMvEr?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseEstVgCleide">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_EST_CLEIDE_AULA01.php">AULA 01 - GRAVAÇÃO 25/07/2022</a><p></p> 
                                        <a href="GUARDAVG_EST_CLEIDE_AULA02.php">AULA 02 - GRAVAÇÃO 02/08/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DIREITO ADMINISTRATIVO - CLEIDE REGINA</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDirAdmCleide" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1q2jjO_nbvYBOUfJNYDzIEPhA7N4cilbg?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseDirAdmCleide">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_DIR_CLEIDE_AULA01.php">AULA 01 - GRAVAÇÃO 07/06/2022</a><p></p> 
                                        <a href="GUARDAVG_DIR_CLEIDE_AULA02.php">AULA 02 - GRAVAÇÃO 14/06/2022</a><p></p> 
                                        <a href="GUARDAVG_DIR_CLEIDE_AULA03.php">AULA 03 - GRAVAÇÃO 20/06/2022</a><p></p> 
                                        <a href="GUARDAVG_DIR_CLEIDE_AULA04.php">AULA 04 - GRAVAÇÃO 06/07/2022</a><p></p> 
                                        <a href="GUARDAVG_DIR_CLEIDE_AULA05.php">AULA 05 - GRAVAÇÃO 11/07/2022</a><p></p> 
                                        <a href="GUARDAVG_DIR_CLEIDE_AULA06.php">AULA 06 - GRAVAÇÃO 25/07/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ESTATUTO DA GUARDA MUNICIPAL DE VG - JULIANO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEstGuardaJuliano" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1CIG4TYyaAVgx62jWcYMCffR4jgY6Jmit?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseEstGuardaJuliano">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_EST_JULIANO_AULA01.php">AULA 01 - GRAVAÇÃO 12/07/2022</a><p></p> 
                                        <a href="GUARDAVG_EST_JULIANO_AULA02.php">AULA 02 - GRAVAÇÃO 19/07/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CTB - ALAN DE OLIVEIRA</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCtbAlan" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1e9QF1WksVFYOT4enb8Ljm-797uczoEzg?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseCtbAlan">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_CTB_ALAN_AULA01.php">AULA 01 - GRAVAÇÃO 10/06/2022</a><p></p> 
                                        <a href="GUARDAVG_CTB_ALAN_AULA02.php">AULA 02 - GRAVAÇÃO 22/07/2022</a><p></p> 
                                        <a href="GUARDAVG_CTB_ALAN_AULA03.php">AULA 03 - GRAVAÇÃO 28/07/2022</a><p></p> 
                                        <a href="GUARDAVG_CTB_ALAN_AULA04.php">AULA 04 - GRAVAÇÃO 04/08/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CRIMES DE TRÂNSITO - EDUARDO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCrimesEduardo" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1DSuOLPjGiW8HSEGer-Dy7laNfpYA9-Fl?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseCrimesEduardo">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_CRIMES_EDUARDO_AULA01.php">AULA 01 - GRAVAÇÃO 15/07/2022</a><p></p> 
                                        <a href="GUARDAVG_CRIMES_EDUARDO_AULA02.php">AULA 02 - GRAVAÇÃO 18/07/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DIREITO PENAL - EDUARDO ROBERTO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDirPenalEduardo" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1MwnwMm6XptxrIpBI2TSfO7W1yf-sk8D5?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseDirPenalEduardo">
                                    <div class="card card-body"> 
                                        <a href="GUARDAVG_DIR_PENAL_EDUARDO_AULA01.php">AULA 01 - GRAVAÇÃO 19/07/2022</a><p></p> 
                                        <a href="GUARDAVG_DIR_PENAL_EDUARDO_AULA02.php">AULA 02 - GRAVAÇÃO 09/08/2022</a><p></p> 
                                        <a href="GUARDAVG_DIR_PENAL_EDUARDO_AULA03.php">AULA 03 - GRAVAÇÃO 10/08/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

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