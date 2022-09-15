<?php
session_start();
include('verifica_login.php');
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
                            <h5 class="card-title">CONTEÚDO BÔNUS - REDAÇÃO COM PROF. HÉLIO TAQUES</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRedacaoBonus" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1_RMTC-ys9hgE037vSZElkna9Bk6DpdVd" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseRedacaoBonus">
                                    <div class="card card-body"> 
                                        <a href="PMPJC_REDACAO_HELIO_AULA01.php">Aula 01</a><p></p> 
                                        <a href="PMPJC_REDACAO_HELIO_AULA02.php">Aula 02</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>
            
            
            <div class="col-sm-6">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PORTUGUÊS - HÉLIO TAQUES</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesHelio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1MTR3cGwWBGF8yo2Oj6I39PSUUS70IEem?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapsePortuguesHelio">
                                    <div class="card card-body"> 
                                        <a href="INDEA_SUP_PORTUGUES_HELIO_AULA01.php">AULA 01 - GRAVAÇÃO 18/05/2022</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1CD0qhPn9HhKuKLcUOSKnahmVs4KCkIzl?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapsePortuguesGouveia">
                                    <div class="card card-body"> 
                                        <a href="INDEA_SUP_PORTUGUES_GOUVEIA_AULA01.php">AULA 01 - GRAVAÇÃO 29/04/2022</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1yeRfAVR4iw_OBKNI-MBns015ta6SEU1N?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapsePortuguesElder">
                                    <div class="card card-body"> 
                                        <a href="INDEA_SUP_PORTUGUES_ELDER_AULA01.php">AULA 01 - Gravação 27/04/22</a><p></p> 
                                        <a href="INDEA_SUP_PORTUGUES_ELDER_AULA02.php">AULA 02 - Gravação 04/05/22</a><p></p> 
                                        <a href="INDEA_SUP_PORTUGUES_ELDER_AULA03.php">AULA 03 - Gravação 11/05/22</a><p></p> 
                                        <a href="INDEA_SUP_PORTUGUES_ELDER_AULA04.php">AULA 04 - Gravação 27/05/22</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1jf1AVXfsACs2VPF4LfSmM58Vn8ZhbsjD?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseINFOSilvio">
                                    <div class="card card-body"> 
                                        <a href="INDEA_SUP_SILVIO_INFO_AULA01.php">AULA 01 - Gravação 28/04/22 </a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1W3B1RJPjYXrhZ0m4gYGvvqGRj1f3Vzkf?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseINFOJoao">
                                    <div class="card card-body"> 
                                        <a href="INDEA_SUP_INFO_JOAO_AULA01.php">AULA 01 - GRAVAÇÃO 06/05/22 </a><p></p> 
                                        <a href="INDEA_SUP_INFO_JOAO_AULA02.php">AULA 02 - GRAVAÇÃO 12/05/22 </a><p></p> 
                                        <a href="INDEA_SUP_INFO_JOAO_AULA03.php">AULA 03 - GRAVAÇÃO 13/05/22 </a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1h7e9nYAFHeKKIkJbVee6rt93z7Q4JUgt?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseRLMIgor">
                                    <div class="card card-body"> 
                                        <a href="INDEA_SUP_RLM_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 17/05/22 </a><p></p> 
                                        <a href="INDEA_SUP_RLM_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 23/05/22 </a><p></p> 
                                        <a href="INDEA_SUP_RLM_IGOR_AULA03.php">AULA 03 - GRAVAÇÃO 25/05/22 </a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                            <h5 class="card-title">HISTÓRIA - CARLOS BIDU</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseHistoriaBidu" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/18O31GjX9PyqqLGnrtFgYITIbqdA4Zvcz?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseHistoriaBidu">
                                    <div class="card card-body">
                                        <a href="INDEA_SUP_HISTORIA_BIDU_AULA01.php">AULA 01 - GRAVAÇÃO 19/05/22 </a><p></p>
                                        <a href="INDEA_SUP_HISTORIA_BIDU_AULA02.php">AULA 02 - GRAVAÇÃO 20/05/22 </a><p></p>
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">GEOGRAFIA - MARCELO ALONSO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseGeografiaMarcelo" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1pjyqmdDlIPPLSUCrDqAEtEkdMsrlVYca?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseGeografiaMarcelo">
                                    <div class="card card-body"> 
                                        <a href="INDEA_SUP_GEOGRAFIA_MARCELO_AULA01.php">AULA 01 - GRAVAÇÃO 05/05/2022</a><p></p> 
                                        <a href="INDEA_SUP_GEOGRAFIA_MARCELO_AULA02.php">AULA 02 - GRAVAÇÃO 26/05/2022</a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>
                
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PRINCÍPIOS DE ÉTICA E FILOSOFIA - FERNANDO DAVOLI</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEticaDouglas" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1FFz1yBSfWBGh8wgHzwaJme1vbJtLwluh?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseEticaDouglas">
                                    <div class="card card-body"> 
                                        <a href="INDEA_SUP_ETICA_DAVOLI_AULA01.php">AULA 01 - GRAVAÇÃO 28/05/2022</a><p></p> 
                                        <p></p>
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LEGISLAÇÃO BÁSICA - JOSÉ NETO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDirConstNeto" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1g-3MKGJn8lYq3oSoQVZNQeTF6zAHmEsC?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseDirConstNeto">
                                    <div class="card card-body"> 
                                        <a href="INDEA_SUP_LEG_NETO_AULA01.php">AULA 01 - GRAVAÇÃO 02/05/2022</a><p></p> 
                                        <a href="INDEA_SUP_LEG_NETO_AULA02.php">AULA 02 - GRAVAÇÃO 09/05/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">NOÇÕES DE ADMINISTRAÇÃO PÚBLICA - CLEIDE REGINA</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDirAdmCleide" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1mrN92lVbYoIJXTzsAuKFGKpChECS54_L?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseDirAdmCleide">
                                    <div class="card card-body"> 
                                        <a href="INDEA-SUP_ADM_CLEIDE_AULA01.php">AULA 01 - GRAVAÇÃO 26/04/2022</a><p></p> 
                                        <a href="INDEA-SUP_ADM_CLEIDE_AULA02.php">AULA 02 - GRAVAÇÃO 03/04/2022</a><p></p> 
                                        <a href="INDEA-SUP_ADM_CLEIDE_AULA03.php">AULA 03 - GRAVAÇÃO 10/05/2022</a><p></p> 
                                        <a href="INDEA-SUP_ADM_CLEIDE_AULA04.php">AULA 04 - GRAVAÇÃO 16/05/2022</a><p></p> 
                                        <a href="INDEA-SUP_ADM_CLEIDE_AULA05.php">AULA 05 - GRAVAÇÃO 24/05/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CONHECIMENTO ESPECÍFICO [ENG. AGRÔNOMO]- DANNIEL LIMA</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseProcPenalBruno" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1GW3u8UNDZx3gGAOMRyJPPJq0R0AyaQZV?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseProcPenalBruno">
                                    <div class="card card-body"> 
                                        <a href="INDEA_SUP_ESPECIFICO_AGRO_DANIEL_AULA01.php">AULA 01 - GRAVAÇÃO 30/04/2022</a><p></p> 
                                        <a href="INDEA_SUP_ESPECIFICO_AGRO_DANIEL_AULA02.php">AULA 02 - GRAVAÇÃO 30/04/2022</a><p></p> 
                                        <a href="INDEA_SUP_ESPECIFICO_AGRO_DANIEL_AULA03.php">AULA 03 - GRAVAÇÃO 01/05/2022</a><p></p> 
                                        <a href="INDEA_SUP_ESPECIFICO_AGRO_DANIEL_AULA04.php">AULA 04 - GRAVAÇÃO 07/05/2022</a><p></p> 
                                        <a href="INDEA_SUP_ESPECIFICO_AGRO_DANIEL_AULA05.php">AULA 05 - GRAVAÇÃO 07/05/2022</a><p></p> 
                                        <a href="INDEA_SUP_ESPECIFICO_AGRO_DANIEL_AULA06.php">AULA 06 - GRAVAÇÃO 08/05/2022</a><p></p> 
                                        <a href="INDEA_SUP_ESPECIFICO_AGRO_DANIEL_AULA07.php">AULA 07 - GRAVAÇÃO 14/05/2022</a><p></p> 
                                        <a href="INDEA_SUP_ESPECIFICO_AGRO_DANIEL_AULA08.php">AULA 08 - GRAVAÇÃO 14/05/2022</a><p></p> 
                                        <a href="INDEA_SUP_ESPECIFICO_AGRO_DANIEL_AULA09.php">AULA 09 - GRAVAÇÃO 15/05/2022 - NAO DISPONÍVEL</a><p></p> 
                                        <a href="INDEA_SUP_ESPECIFICO_AGRO_DANIEL_AULA10.php">AULA 10 - GRAVAÇÃO 21/05/2022</a><p></p> 
                                        <a href="INDEA_SUP_ESPECIFICO_AGRO_DANIEL_AULA11.php">AULA 11 - GRAVAÇÃO 21/05/2022</a><p></p> 
                                        <a href="INDEA_SUP_ESPECIFICO_AGRO_DANIEL_AULA12.php">AULA 12 - GRAVAÇÃO 22/05/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CONHECIMENTO ESPECÍFICO [MEDICINA VETERINÁRIA] - DANIELLA SOARES</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCppMarciano" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1rYZOsYwojmmgDMhBH1aQsmGjue2IOEF-?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseCppMarciano">
                                    <div class="card card-body">
                                        <a href="INDEA_SUP_ESPECIFICO_VET_DANIELLA_AULA01.php">AULA 01 - GRAVAÇÃO 30/04/22</a><p></p>
                                        <a href="INDEA_SUP_ESPECIFICO_VET_DANIELLA_AULA02.php">AULA 02 - GRAVAÇÃO 30/04/22</a><p></p>
                                        <a href="INDEA_SUP_ESPECIFICO_VET_DANIELLA_AULA03.php">AULA 03 - GRAVAÇÃO 01/05/22</a><p></p>
                                        <a href="INDEA_SUP_ESPECIFICO_VET_DANIELLA_AULA04.php">AULA 04 - GRAVAÇÃO 07/05/22</a><p></p>
                                        <a href="INDEA_SUP_ESPECIFICO_VET_DANIELLA_AULA05.php">AULA 05 - GRAVAÇÃO 07/05/22</a><p></p>
                                        <a href="INDEA_SUP_ESPECIFICO_VET_DANIELLA_AULA06.php">AULA 06 - GRAVAÇÃO 08/05/22</a><p></p>
                                        <a href="INDEA_SUP_ESPECIFICO_VET_DANIELLA_AULA07.php">AULA 07 - GRAVAÇÃO 21/05/22</a><p></p>
                                        <a href="INDEA_SUP_ESPECIFICO_VET_DANIELLA_AULA08.php">AULA 08 - GRAVAÇÃO 21/05/22</a><p></p>
                                        <a href="INDEA_SUP_ESPECIFICO_VET_DANIELLA_AULA09.php">AULA 09 - GRAVAÇÃO 22/05/22</a><p></p>
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CONHECIMENTO ESPECÍFICO [MEDICINA VETERINÁRIA] - SERGIO LOBO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLobo" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1KNwqpOXwh97CIUaZFRTxC6BV0AelpiPF?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseLobo">
                                    <div class="card card-body">
                                        <a href="INDEA_SUP_ESPECIFICO_VET_LOBO_AULA01.php">AULA 01 - GRAVAÇÃO 14/05/22</a><p></p>
                                        <a href="INDEA_SUP_ESPECIFICO_VET_LOBO_AULA02.php">AULA 02 - GRAVAÇÃO 14/05/22</a><p></p>
                                        <a href="INDEA_SUP_ESPECIFICO_VET_LOBO_AULA03.php">AULA 03 - GRAVAÇÃO 15/05/22</a><p></p>
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