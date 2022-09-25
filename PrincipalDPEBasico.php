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
                        <a href="listaAcessosUsuario.php"><i class="bi bi-grid-fill"></i></i> Gerir Acessos</a>
                    <?php endif ?>
                </li>
                <li>
                    <a href="videoaulas.php"><i class="fas fa-book"></i> Cursos</a>
                </li>
                <p></p>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
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
                                        <a href="MateriasBasicasBonusDPE.php">Acessar material Bônus</a><p></p> 
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
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRedacaoHelio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1AOWzLl8ag3-EfwSU5uNFY94qwBYfLGwD?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseRedacaoHelio">
                                    <div class="card card-body">
                                        <a href="DPE_MEDIO_PORTUGUES_HELIO_AULA01.php">AULA 01 - GRAVAÇÃO 25/07/2022</a><p></p> 
                                        <a href="DPE_MEDIO_PORTUGUES_HELIO_AULA02.php">AULA 02 - GRAVAÇÃO 28/07/2022</a><p></p> 
                                        <a href="DPE_MEDIO_PORTUGUES_HELIO_AULA03.php">AULA 03 - GRAVAÇÃO 16/08/2022</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1XhdoT-FIBGWazPhKxmPFbRjtxfUdy0Ul?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapsePortuguesGouveia">
                                    <div class="card card-body"> 
                                        <a href="DPE_MEDIO_PORTUGUES_GOUVEIA_AULA01.php">AULA 01 - GRAVAÇÃO 30/06/2022</a><p></p> 
                                        <a href="DPE_MEDIO_PORTUGUES_GOUVEIA_AULA02.php">AULA 02 - GRAVAÇÃO 11/07/2022</a><p></p> 
                                        <a href="DPE_MEDIO_PORTUGUES_GOUVEIA_AULA03.php">AULA 03 - GRAVAÇÃO 18/07/2022</a><p></p> 
                                        <a href="DPE_MEDIO_PORTUGUES_GOUVEIA_AULA04.php">AULA 04 - GRAVAÇÃO 23/08/2022</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1Se40Qzk0M4wh9dyzpfQzb24SiP586Ki-?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapsePortuguesElder">
                                    <div class="card card-body"> 
                                        <a href="DPE_MEDIO_PORTUGUES_ELDER_AULA01.php">AULA 01 - Gravação 20/06/22</a><p></p> 
                                        <a href="DPE_MEDIO_PORTUGUES_ELDER_AULA02.php">AULA 02 - GRAVAÇÃO 07/07/22</a><p></p> 
                                        <a href="DPE_MEDIO_PORTUGUES_ELDER_AULA03.php">AULA 03 - GRAVAÇÃO 21/07/22</a><p></p> 
                                        <a href="DPE_MEDIO_PORTUGUES_ELDER_AULA04.php">AULA 04 - GRAVAÇÃO 02/08/22</a><p></p> 
                                        <a href="DPE_MEDIO_PORTUGUES_ELDER_AULA05.php">AULA 05 - GRAVAÇÃO 11/08/22</a><p></p> 
                                        <a href="DPE_MEDIO_PORTUGUES_ELDER_AULA06.php">AULA 06 - GRAVAÇÃO 18/08/22</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1aKsvvfoZ6iuGk5lVlC1R6Fk28jpFlOsW?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseINFOSilvio">
                                    <div class="card card-body"> 
                                        <a href="DPE_MEDIO_SILVIO_INFO_AULA01.php">AULA 01 - GRAVAÇÃO 05/08/22 </a><p></p> 
                                        <a href="DPE_MEDIO_SILVIO_INFO_AULA02.php">AULA 02 - GRAVAÇÃO 12/08/22 </a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1WUGxS5my0VvTbJ81V5tDqrkegNmnOJk5?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseINFOJoao">
                                    <div class="card card-body"> 
                                        <a href="DPE_MEDIO_INFO_JOAO_AULA01.php">AULA 01 - GRAVAÇÃO 22/07/22 </a><p></p> 
                                        <a href="DPE_MEDIO_INFO_JOAO_AULA02.php">AULA 02 - GRAVAÇÃO 27/07/22 </a><p></p>
                                        <a href="DPE_MEDIO_INFO_JOAO_AULA03.php">AULA 03 - GRAVAÇÃO 25/08/22 </a><p></p> 
                                        <a href="DPE_MEDIO_INFO_JOAO_AULA04.php">AULA 04 - GRAVAÇÃO 26/08/22 </a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1PheIuge_7TiDpOneVEjod123Mroh2G1S?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseRLMIgor">
                                    <div class="card card-body"> 
                                        <a href="DPE_MEDIO_RLM_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 22/06/22 </a><p></p> 
                                        <a href="DPE_MEDIO_RLM_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 14/07/22 </a><p></p> 
                                        <a href="DPE_MEDIO_RLM_IGOR_AULA03.php">AULA 03 - GRAVAÇÃO 20/07/22 </a><p></p> 
                                        <a href="DPE_MEDIO_RLM_IGOR_AULA04.php">AULA 04 - GRAVAÇÃO 26/07/22 </a><p></p> 
                                        <a href="DPE_MEDIO_RLM_IGOR_AULA05.php">AULA 05 - GRAVAÇÃO 09/08/22 </a><p></p> 
                                        <a href="DPE_MEDIO_RLM_IGOR_AULA06.php">AULA 06 - GRAVAÇÃO 10/08/22 </a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1nBbHh--YrLQdqCmpBQAvbcqZ-Hotyoi4?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseHistoriaBidu">
                                    <div class="card card-body">
                                        <a href="DPE_MEDIO_HISTORIA_BIDU_AULA01.php">AULA 01 - GRAVAÇÃO 23/06/22 </a><p></p>
                                        <a href="DPE_MEDIO_HISTORIA_BIDU_AULA02.php">AULA 02 - GRAVAÇÃO 27/06/22 </a><p></p>
                                        <a href="DPE_MEDIO_HISTORIA_BIDU_AULA03.php">AULA 03 - GRAVAÇÃO 29/06/22 </a><p></p>
                                        <a href="DPE_MEDIO_HISTORIA_BIDU_AULA04.php">AULA 04 - GRAVAÇÃO 29/07/22 </a><p></p>
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1bKX8wztz1vnZBKWpHHQNvc173Ss6VThU?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseGeografiaMarcelo">
                                    <div class="card card-body"> 
                                        <a href="DPE_MEDIO_GEOGRAFIA_MARCELO_AULA01.php">AULA 01 - GRAVAÇÃO 04/07/2022</a><p></p> 
                                        <a href="DPE_MEDIO_GEOGRAFIA_MARCELO_AULA02.php">AULA 02 - GRAVAÇÃO 05/07/2022</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1sU8cToRAeypNeBa8EDwrwBGke3eYbWxA?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseEticaDouglas">
                                    <div class="card card-body"> 
                                        <a href="DPE_MEDIO_ETICA_DOUGLAS_AULA01.php">AULA 01 - GRAVAÇÃO 03/08/2022</a><p></p> 
                                        <a href="DPE_MEDIO_ETICA_DOUGLAS_AULA02.php">AULA 02 - GRAVAÇÃO 08/08/2022</a><p></p> 
                                        <p></p>
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ARTIGOS DA CONSTITUIÇÃO FEDERAL - JOSÉ NETO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDirConstNeto" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1nnVv-4-pQH7dqTTTQVKEL-SHf0c295FP?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseDirConstNeto">
                                    <div class="card card-body"> 
                                        <a href="DPE_MEDIO_DIR_CONST_NETO_AULA01.php">AULA 01 - GRAVAÇÃO 21/06/2022</a><p></p> 
                                        <a href="DPE_MEDIO_DIR_CONST_NETO_AULA02.php">AULA 02 - GRAVAÇÃO 12/07/2022</a><p></p> 
                                        <a href="DPE_MEDIO_DIR_CONST_NETO_AULA03.php">AULA 03 - GRAVAÇÃO 19/07/2022</a><p></p>
                                        <a href="DPE_MEDIO_DIR_CONST_NETO_AULA04.php">AULA 04 - GRAVAÇÃO 01/08/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LEGISLAÇÃO ESPECÍFICA DPE - CLEIDE REGINA</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDPECleide" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1sxUBandTuZZ3jW-OLsfRL9u8X-Qtb16X?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseDPECleide">
                                    <div class="card card-body"> 
                                        <a href="DPE_MEDIO_LEG_CLEIDE_AULA01.php">AULA 01 - GRAVAÇÃO 04/08/2022</a><p></p> 
                                        <a href="DPE_MEDIO_LEG_CLEIDE_AULA02.php">AULA 02 - GRAVAÇÃO 15/08/2022</a><p></p> 
                                        <a href="DPE_MEDIO_LEG_CLEIDE_AULA03.php">AULA 03 - GRAVAÇÃO 17/08/2022</a><p></p> 
                                        <a href="DPE_MEDIO_LEG_CLEIDE_AULA04.php">AULA 04 - GRAVAÇÃO 19/08/2022</a><p></p> 
                                        <a href="DPE_MEDIO_LEG_CLEIDE_AULA05.php">AULA 05 - GRAVAÇÃO 22/08/2022</a><p></p> 
                                        <a href="DPE_MEDIO_LEG_CLEIDE_AULA06.php">AULA 06 - GRAVAÇÃO 24/08/2022</a><p></p>
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1I52IhZpUOrblOsb0Pvfk3du5hgoSgUd1?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseDirAdmCleide">
                                    <div class="card card-body"> 
                                        <a href="DPE_MEDIO_DIR_CLEIDE_AULA01.php">AULA 01 - GRAVAÇÃO 24/06/2022</a><p></p> 
                                        <a href="DPE_MEDIO_DIR_CLEIDE_AULA02.php">AULA 02 - GRAVAÇÃO 01/07/2022</a><p></p> 
                                        <a href="DPE_MEDIO_DIR_CLEIDE_AULA03.php">AULA 03 - GRAVAÇÃO 08/07/2022</a><p></p> 
                                        <a href="DPE_MEDIO_DIR_CLEIDE_AULA04.php">AULA 04 - GRAVAÇÃO 13/07/2022</a><p></p> 
                                        <a href="DPE_MEDIO_DIR_CLEIDE_AULA05.php">AULA 05 - GRAVAÇÃO 15/07/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LEGISLAÇÃO ETNICO-RACIAIS - MICHELE DONEGÁ</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegDonega" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1EzqnFPHfePT9yAr4dfU8cn7G11iPV2Om?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseLegDonega">
                                    <div class="card card-body"> 
                                        <a href="DPE_MEDIO_LEG_DONEGA_AULA01.php">AULA 01 - GRAVAÇÃO 28/06/2022</a><p></p> 
                                        <a href="DPE_MEDIO_LEG_DONEGA_AULA02.php">AULA 02 - GRAVAÇÃO 06/07/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">SIMULADOS</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSimulados" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> ACESSAR
                                    </button>
                                    <!-- <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1cTY3DXdLIKkLKlmjngGchcvRCmmXH4lb?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                                    </p>
                                    <div class="collapse" id="collapseSimulados">
                                    <div class="card card-body"> 
                                        <a href="https://drive.google.com/drive/folders/1XK0ZuSAFWDaG8yTc4E-GlHCT_NTmYoBp?usp=sharing">SIMULADOS E GABARITOS</a><p></p> 
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