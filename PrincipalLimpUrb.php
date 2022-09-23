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
                            <h5 class="card-title">INTERPRETAÇÃO DE TEXTO - HÉLIO TAQUES</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRedacaoHelio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/17dnM_dqiIR9IgC5c9N1NY6NI6JTBKocJ?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseRedacaoHelio">
                                    <div class="card card-body">
                                        <a href="LIMPURB_PORTUGUES_HELIO_AULA01.php">AULA 01 </a><p></p> 
                                        <a href="LIMPURB_PORTUGUES_HELIO_AULA02.php">AULA 02 </a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1-iFViHixU_a3Jd5HHYFMyFfPRUeE2PSI?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapsePortuguesGouveia">
                                    <div class="card card-body"> 
                                        <a href="LIMPURB_PORTUGUES_GOUVEIA_AULA01.php">AULA 01</a><p></p> 
                                        <a href="LIMPURB_PORTUGUES_GOUVEIA_AULA02.php">AULA 02</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1zgTqBaIp3F3w-Syz0GGLzn4nnyZc0BuS?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapsePortuguesElder">
                                    <div class="card card-body"> 
                                        <a href="LIMPURB_PORTUGUES_ELDER_AULA01.php">AULA 01 </a><p></p> 
                                        <a href="LIMPURB_PORTUGUES_ELDER_AULA02.php">AULA 02 </a><p></p> 
                                        <a href="LIMPURB_PORTUGUES_ELDER_AULA03.php">AULA 03 </a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1xSGbg0d4kGoxorjfNu4c5vGnxgClfBzA?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseINFOSilvio">
                                    <div class="card card-body"> 
                                        <a href="LIMPURB_SILVIO_INFO_AULA01.php">AULA 01 </a><p></p> 
                                        <a href="LIMPURB_SILVIO_INFO_AULA02.php">AULA 02 </a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/10yrQII2v4QXt0B9q6CzI2FFSN_pvN9-e?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseINFOJoao">
                                    <div class="card card-body"> 
                                        <a href="LIMPURB_INFO_JOAO_AULA01.php">AULA 01 </a><p></p> 
                                        <a href="LIMPURB_INFO_JOAO_AULA02.php">AULA 02 </a><p></p> 
                                        <a href="LIMPURB_INFO_JOAO_AULA03.php">AULA 03 </a><p></p> 
                                        <a href="LIMPURB_INFO_JOAO_AULA04.php">AULA 04 </a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1Ca_OyKWKGHFnNRn-DxwcqUx2ExvWraV9?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseRLMIgor">
                                    <div class="card card-body"> 
                                        <a href="LIMPURB_RLM_IGOR_AULA01.php">AULA 01</a><p></p> 
                                        <a href="LIMPURB_RLM_IGOR_AULA02.php">AULA 02</a><p></p> 
                                        <a href="LIMPURB_RLM_IGOR_AULA03.php">AULA 03</a><p></p> 
                                        <a href="LIMPURB_RLM_IGOR_AULA04.php">AULA 04</a><p></p> 
                                        <a href="LIMPURB_RLM_IGOR_AULA05.php">AULA 05</a><p></p> 
                                        <a href="LIMPURB_RLM_IGOR_AULA06.php">AULA 06</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1mnEB8B9rbIzKT4xOUHI7g30q_o9ojQ5p?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseHistoriaBidu">
                                    <div class="card card-body">
                                        <a href="LIMPURB_HISTORIA_BIDU_AULA01.php">AULA 01 </a><p></p>
                                        <a href="LIMPURB_HISTORIA_BIDU_AULA02.php">AULA 02 </a><p></p>
                                        <a href="LIMPURB_HISTORIA_BIDU_AULA03.php">AULA 03 </a><p></p>
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1_xAeEgEfl8Dt6-vlaY41YJIvPT5Qc2F8?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseGeografiaMarcelo">
                                    <div class="card card-body"> 
                                        <a href="LIMPURB_GEOGRAFIA_MARCELO_AULA01.php">AULA 01 </a><p></p> 
                                        <a href="LIMPURB_GEOGRAFIA_MARCELO_AULA02.php">AULA 02 </a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1u6-IZ-Am0W_im4F1dgoBhkNnn7Lt1pnR?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseEticaDouglas">
                                    <div class="card card-body"> 
                                        <a href="LIMPURB_ETICA_DOUGLAS_AULA01.php">AULA 01 </a><p></p> 
                                        <a href="LIMPURB_ETICA_DOUGLAS_AULA02.php">AULA 02 </a><p></p> 
                                        <p></p>
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">RELAÇÕES INTERPESSOAIS - FERNANDO DAVOLI</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRelacoesDavoli" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1GfX1drQJYiuE7OVH62W9XdmEmolS102R?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseRelacoesDavoli">
                                    <div class="card card-body"> 
                                        <a href="LIMPURB_REL_DAVOLI_AULA01.php">AULA 01 </a><p></p> 
                                        <p></p>
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">NOÇÕES DE ADMINSTRAÇÃO PÚBLICA - FERNANDO DAVOLI</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAdmDavoli" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1tAoyD_u2uPoBAOdgIck6S0kUplUW6Xp7?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseAdmDavoli">
                                    <div class="card card-body"> 
                                        <a href="LIMPURB_ADM_DAVOLI_AULA01.php">AULA 01 </a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1r_ZBx-r7dRZ9rfpPXdSDxz7WwngB6oHp?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseDirConstNeto">
                                    <div class="card card-body"> 
                                        <a href="LIMPURB_DIR_CONST_NETO_AULA01.php">AULA 01 </a><p></p> 
                                        <a href="LIMPURB_DIR_CONST_NETO_AULA02.php">AULA 02 </a><p></p> 
                                        <a href="LIMPURB_DIR_CONST_NETO_AULA03.php">AULA 03 </a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LEI ORGÂNICA DE CUIABÁ - JOSÉ NETO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLeiOrgNeto" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1A7lAUPfgZLO1WUZ_7qzEolUCsHOU9D2m?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseLeiOrgNeto">
                                    <div class="card card-body"> 
                                        <a href="LIMPURB_LEI_NETO_AULA01.php">AULA 01 </a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1G3phdzOyAyznIiOp4SjbeRyhd2jSkH6i?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseDirAdmCleide">
                                    <div class="card card-body"> 
                                        <a href="LIMPURB_DIR_CLEIDE_AULA01.php">AULA 01 </a><p></p> 
                                        <a href="LIMPURB_DIR_CLEIDE_AULA02.php">AULA 02 </a><p></p> 
                                        <a href="LIMPURB_DIR_CLEIDE_AULA03.php">AULA 03 </a><p></p> 
                                        <a href="LIMPURB_DIR_CLEIDE_AULA04.php">AULA 04 </a><p></p> 
                                        <a href="LIMPURB_DIR_CLEIDE_AULA05.php">AULA 05 </a><p></p> 
                                        <a href="LIMPURB_DIR_CLEIDE_AULA06.php">AULA 06 </a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LRF - DANIEL OLIVEIRA</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCtbAlan" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1wdesGDuGl8Ab2LqhpSjfHBpBtdq2YREO?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseCtbAlan">
                                    <div class="card card-body"> 
                                        <a href="LIMPURB_LRF_DANIEL_AULA01.php">AULA 01 - GRAVAÇÃO 02/08/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
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