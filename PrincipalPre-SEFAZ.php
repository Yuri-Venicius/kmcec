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
                            <h5 class="card-title">PORTUGUÊS - HÉLIO TAQUES</h5>
                            <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesHelio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1rS1dT8jKCo2UEsAHylZ4XgZ4Jz4IVQpk?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapsePortuguesHelio">
                                    <div class="card card-body"> 
                                        <a href="PRE-SEFAZ_PORTUGUES_HELIO_AULA01.php">AULA 01 - GRAVAÇÃO 29/07/2022</a><p></p> 
                                        <a href="PRE-SEFAZ_PORTUGUES_HELIO_AULA02.php">AULA 01 DISCURSIVAS - GRAVAÇÃO 22/07/2022</a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PORTUGUÊS - HENRIQUE CASTELO BRANCO</h5>
                            <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesHenrique" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1D1sGNH1S5i4FP97kUPtuShVCEiITNIEk?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapsePortuguesHenrique">
                                    <div class="card card-body"> 
                                        <a href="PRE-SEFAZ_PORTUGUES_HENRIQUE_AULA01.php">AULA 01 - GRAVAÇÃO 11/04/2022</a><p></p> 
                                        <a href="PRE-SEFAZ_PORTUGUES_HENRIQUE_AULA02.php">AULA 02 - GRAVAÇÃO 20/04/2022</a><p></p> 
                                        <a href="PRE-SEFAZ_PORTUGUES_HENRIQUE_AULA03.php">AULA 03 - GRAVAÇÃO 02/05/2022</a><p></p> 
                                        <a href="PRE-SEFAZ_PORTUGUES_HENRIQUE_AULA04.php">AULA 04 - GRAVAÇÃO 09/05/2022</a><p></p> 
                                        <a href="PRE-SEFAZ_PORTUGUES_HENRIQUE_AULA05.php">AULA 05 - GRAVAÇÃO 23/05/2022</a><p></p> 
                                        <a href="PRE-SEFAZ_PORTUGUES_HENRIQUE_AULA06.php">AULA 06 - GRAVAÇÃO 06/06/2022</a><p></p> 
                                        <a href="PRE-SEFAZ_PORTUGUES_HENRIQUE_AULA07.php">AULA 07 - GRAVAÇÃO 13/06/2022</a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>
                
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">MATEMÁTICA FINANCEIRA - IGOR BRASIL</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseMatematicaIgor" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1L_8XNRR821nHnz7YTQZR5zJ9T3seQ7SN?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseMatematicaIgor">
                                    <div class="card card-body"> 
                                        <a href="PRE-SEFAZ_MATEMATICA_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 06/04/2022 </a><p></p> 
                                        <a href="PRE-SEFAZ_MATEMATICA_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 12/04/2022 </a><p></p> 
                                        <a href="PRE-SEFAZ_MATEMATICA_IGOR_AULA03.php">AULA 03 - GRAVAÇÃO 26/04/2022 </a><p></p> 
                                        <a href="PRE-SEFAZ_MATEMATICA_IGOR_AULA04.php">AULA 04 - GRAVAÇÃO 03/05/2022 </a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">RACIOCÍNIO LÓGICO - IGOR BRASIL</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRLMIgor" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1f2gGEFRNfkhRMFYeojsryvM6F6RIW2fw?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseRLMIgor">
                                    <div class="card card-body"> 
                                        <a href="PRE-SEFAZ_RLM_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 10/05/2022 </a><p></p> 
                                        <a href="PRE-SEFAZ_RLM_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 24/05/2022 </a><p></p> 
                                        <a href="PRE-SEFAZ_RLM_IGOR_AULA03.php">AULA 03 - GRAVAÇÃO 31/05/2022 </a><p></p> 
                                        <a href="PRE-SEFAZ_RLM_IGOR_AULA04.php">AULA 04 - GRAVAÇÃO 07/06/2022 </a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">HISTÓRIA MT - CARLOS BIDU</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseHistoriaCarlao" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1dTL0K4FN2DWH0E5IZ-5_-80dKnoPl14k?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseHistoriaCarlao">
                                    <div class="card card-body"> 
                                        <a href="PRE-SEFAZ_HISTORIA_BIDU_AULA01.php">AULA 01 - GRAVAÇÃO 15/06/2022</a><p></p>
                                        <a href="PRE-SEFAZ_HISTORIA_BIDU_AULA02.php">AULA 02 - GRAVAÇÃO 26/07/2022</a><p></p>
                                        <a href="PRE-SEFAZ_HISTORIA_BIDU_AULA03.php">AULA 03 - GRAVAÇÃO 27/07/2022</a><p></p>
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/14xe9lGfsq4Cl5MyJgr-3cTCr03HHNwb4?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseGeografiaMarcelo">
                                    <div class="card card-body"> 
                                        <a href="PRE-SEFAZ_GEOGRAFIA_MARCELO_AULA01.php">AULA 01 - GRAVAÇÃO 11/05/2022</a><p></p> 
                                        <a href="PRE-SEFAZ_GEOGRAFIA_MARCELO_AULA02.php">AULA 02 - GRAVAÇÃO 15/07/2022</a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">INFORMÁTICA - JOÃO CLEBER</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInformaticaJoao" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/13bdxJ4Wy5NrCkXCwmFSRu3YvYogkV0Ru?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseInformaticaJoao">
                                        <div class="card card-body">
                                            <a href="PRE-SEFAZ_INFORMATICA_JOAO_AULA01.php">AULA 01 - GRAVAÇÃO 03/06/2022</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_JOAO_AULA02.php">AULA 02 - GRAVAÇÃO 09/06/2022</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_JOAO_AULA03.php">AULA 03 - GRAVAÇÃO 20/06/2022</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_JOAO_AULA04.php">AULA 04 - GRAVAÇÃO 23/06/2022</a><p></p>
                                        </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">INFORMÁTICA - SILVIO BONONI</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInformaticaSilvio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1ofUmMetWpe368MejV_qG34BwaNpnshb4?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseInformaticaSilvio">
                                        <div class="card card-body">
                                            <a href="PRE-SEFAZ_INFORMATICA_SILVIO_AULA01.php">AULA 01 - GRAVAÇÃO 19/04/2022</a><p></p>
                                        </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">TECNOLOGIA DA INFORMAÇÃO - GABRIEL PACHECO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInformaticaGabriel" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1Z91l_PlzkDQ95IVZoAdXNt0BtAJ_rvyP?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseInformaticaGabriel">
                                        <div class="card card-body">
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA01.php">AULA 01 - GRAVAÇÃO 27/06/2022</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA02.php">AULA 02 - GRAVAÇÃO 28/06/2022</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA03.php">AULA 03 - GRAVAÇÃO 29/06/2022</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA04.php">AULA 04 - GRAVAÇÃO 30/06/2022</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA05.php">AULA 05 - GRAVAÇÃO 01/07/2022</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA06.php">AULA 06 - GRAVAÇÃO 02/07/2022</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA07.php">AULA 07 - GRAVAÇÃO 02/07/2022</a><p></p>
                                        </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LTE - ANDRÉ FANTONI</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLteAndre" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1kk3RUgE5wsXkC6T5DwELcxAwW_vgBOrt?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseLteAndre">
                                        <div class="card card-body"> 
                                            <a href="PRE-SEFAZ_LTE_FANTONI_AULA01.php">AULA 01 - GRAVAÇÃO 16/05/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_LTE_FANTONI_AULA02.php">AULA 02 - GRAVAÇÃO 17/05/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_LTE_FANTONI_AULA03.php">AULA 03 - GRAVAÇÃO 21/06/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_LTE_FANTONI_AULA04.php">AULA 04 - GRAVAÇÃO 12/07/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_LTE_FANTONI_AULA05.php">AULA 05 - GRAVAÇÃO 20/07/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_LTE_FANTONI_AULA06.php">AULA 06 - GRAVAÇÃO 02/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_LTE_FANTONI_AULA07.php">AULA 07 - GRAVAÇÃO 05/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_LTE_FANTONI_AULA08.php">AULA 08 - GRAVAÇÃO 09/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_LTE_FANTONI_AULA09.php">AULA 09 - GRAVAÇÃO 12/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_LTE_FANTONI_AULA10.php">AULA 10 - GRAVAÇÃO 18/08/2022</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                        </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DIREITO TRIBUTÁRIO - LÍGIA DONINI</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegNeto" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1XJsTmgxwA_306QnzyTPdRl0U38j1Dlha?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseLegNeto">
                                        <div class="card card-body"> 
                                            <a href="PRE-SEFAZ_TRIBUTARIO_LIGIA_AULA01.php">AULA 01 - GRAVAÇÃO 07/04/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_TRIBUTARIO_LIGIA_AULA02.php">AULA 02 - GRAVAÇÃO 13/04/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_TRIBUTARIO_LIGIA_AULA03.php">AULA 03 - GRAVAÇÃO 27/04/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_TRIBUTARIO_LIGIA_AULA04.php">AULA 04 - GRAVAÇÃO 04/05/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_TRIBUTARIO_LIGIA_AULA05.php">AULA 05 - GRAVAÇÃO 12/05/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_TRIBUTARIO_LIGIA_AULA06.php">AULA 06 - GRAVAÇÃO 25/05/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_TRIBUTARIO_LIGIA_AULA07.php">AULA 07 - GRAVAÇÃO 13/07/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_TRIBUTARIO_LIGIA_AULA08.php">AULA 08 - GRAVAÇÃO 14/07/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_TRIBUTARIO_LIGIA_AULA09.php">AULA 09 - GRAVAÇÃO 10/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_TRIBUTARIO_LIGIA_AULA10.php">AULA 10 - GRAVAÇÃO 17/08/2022</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DIR. CONSTITUCIONAL - JOSÉ NETO</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseConstNeto" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1kf88ohYFZ8egW3Cpz7ByzGHZqm8LaxPv?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseConstNeto">
                                        <div class="card card-body"> 
                                            <a href="PRE-SEFAZ_CONSTITUCIONAL_NETO_AULA01.php">AULA 01 - GRAVAÇÃO 05/04/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_CONSTITUCIONAL_NETO_AULA02.php">AULA 02 - GRAVAÇÃO 14/04/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_CONSTITUCIONAL_NETO_AULA03.php">AULA 03 - GRAVAÇÃO 28/04/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_CONSTITUCIONAL_NETO_AULA04.php">AULA 04 - GRAVAÇÃO 05/05/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_CONSTITUCIONAL_NETO_AULA05.php">AULA 05 - GRAVAÇÃO 19/05/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_CONSTITUCIONAL_NETO_AULA06.php">AULA 06 - GRAVAÇÃO 27/05/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_CONSTITUCIONAL_NETO_AULA07.php">AULA 07 - GRAVAÇÃO 02/06/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_CONSTITUCIONAL_NETO_AULA08.php">AULA 08 - GRAVAÇÃO 07/07/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_CONSTITUCIONAL_NETO_AULA09.php">AULA 09 - GRAVAÇÃO 21/07/2022</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DIR. ADMINISTRATIVO - CLEIDE REGINA</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAdmCleide" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1_X-WZePUeqDgy5K6Ho1pPs17z7p3gVTM?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseAdmCleide">
                                        <div class="card card-body"> 
                                            <a href="PRE-SEFAZ_DIREITO_ADM_CLEIDE_AULA01.php">AULA 01 - GRAVAÇÃO 18-04-22</a><p></p> 
                                            <a href="PRE-SEFAZ_DIREITO_ADM_CLEIDE_AULA02.php">AULA 02 - GRAVAÇÃO 25-04-22</a><p></p> 
                                            <a href="PRE-SEFAZ_DIREITO_ADM_CLEIDE_AULA03.php">AULA 03 - GRAVAÇÃO 06-05-22</a><p></p> 
                                            <a href="PRE-SEFAZ_DIREITO_ADM_CLEIDE_AULA04.php">AULA 04 - GRAVAÇÃO 18-05-22</a><p></p> 
                                            <a href="PRE-SEFAZ_DIREITO_ADM_CLEIDE_AULA05.php">AULA 05 - GRAVAÇÃO 30-05-22</a><p></p> 
                                            <a href="PRE-SEFAZ_DIREITO_ADM_CLEIDE_AULA06.php">AULA 06 - GRAVAÇÃO 01-06-22</a><p></p> 
                                            <a href="PRE-SEFAZ_DIREITO_ADM_CLEIDE_AULA07.php">AULA 07 - GRAVAÇÃO 08-06-22</a><p></p> 
                                            <a href="PRE-SEFAZ_DIREITO_ADM_CLEIDE_AULA08.php">AULA 08 - GRAVAÇÃO 22-06-22</a><p></p> 
                                            <a href="PRE-SEFAZ_DIREITO_ADM_CLEIDE_AULA09.php">AULA 09 - GRAVAÇÃO 04-07-22</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DIREITO PENAL - EDUARDO ROBERTO</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePenalEduardo" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1OvGWXqnYhxPIrembPF9e9HfxR0YOSe_F?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapsePenalEduardo">
                                        <div class="card card-body"> 
                                            <a href="PRE-SEFAZ_PENAL_EDUARDO_AULA01.php">AULA 01 - GRAVAÇÃO 16/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_PENAL_EDUARDO_AULA02.php">AULA 02 - GRAVAÇÃO 19/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_PENAL_EDUARDO_AULA03.php">AULA 03 - GRAVAÇÃO 22/08/2022</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CONTABILIDADE GERAL - DANIEL MERRELES</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseContabilidadeDaniel" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1r_Ib62pQdokH33JMMVUMGcOJAlfIDBns?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseContabilidadeDaniel">
                                        <div class="card card-body"> 
                                            <a href="PRE-SEFAZ_CONTABILIDADE_DANIEL_AULA01.php">AULA 01 - GRAVAÇÃO 29/04/22</a><p></p> 
                                            <a href="PRE-SEFAZ_CONTABILIDADE_DANIEL_AULA02.php">AULA 02 - GRAVAÇÃO 13/05/22</a><p></p> 
                                            <a href="PRE-SEFAZ_CONTABILIDADE_DANIEL_AULA03.php">AULA 03 - GRAVAÇÃO 20/05/22</a><p></p> 
                                            <a href="PRE-SEFAZ_CONTABILIDADE_DANIEL_AULA04.php">AULA 04 - GRAVAÇÃO 26/05/22</a><p></p> 
                                            <a href="PRE-SEFAZ_CONTABILIDADE_DANIEL_AULA05.php">AULA 05 - GRAVAÇÃO 10/06/22</a><p></p> 
                                            <a href="PRE-SEFAZ_CONTABILIDADE_DANIEL_AULA06.php">AULA 06 - GRAVAÇÃO 24/06/22</a><p></p> 
                                            <a href="PRE-SEFAZ_CONTABILIDADE_DANIEL_AULA07.php">AULA 07 - GRAVAÇÃO 25/06/22</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AUDITORIA - TONIVAN CARVALHO</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAuditoriaAndre" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1NkJSUifPY_ZNfsPSUzXC4Ux59bEMVGHg?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseAuditoriaAndre">
                                        <div class="card card-body"> 
                                            <a href="PRE-SEFAZ_AUDITORIA_TONIVAN_AULA01.php">AULA 01 - GRAVAÇÃO 25/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_AUDITORIA_TONIVAN_AULA02.php">AULA 02 - GRAVAÇÃO 26/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_AUDITORIA_TONIVAN_AULA03.php">AULA 03 - GRAVAÇÃO 27/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_AUDITORIA_TONIVAN_AULA04.php">AULA 04 - GRAVAÇÃO 27/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_AUDITORIA_TONIVAN_AULA05.php">AULA 05 - GRAVAÇÃO 28/08/2022</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DIR. EMPRESARIAL - JOSÉ NETO</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEmpresJose" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/10Q5mwjQtYzsA1t_5d7DU36bNLVkT5Mpu?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseEmpresJose">
                                        <div class="card card-body"> 
                                            <a href="PRE-SEFAZ_EMPRESARIAL_NETO_AULA01.php">AULA 01 - GRAVAÇÃO 04/08/2022</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ESTATISTICA - IGOR BRASIL</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEstatisticaIgor" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1SIWePlggX10vJazSnazTWlyNYWoWVdxD?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseEstatisticaIgor">
                                        <div class="card card-body"> 
                                            <a href="PRE-SEFAZ_ESTATISTICA_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 14/06/22</a><p></p> 
                                            <a href="PRE-SEFAZ_ESTATISTICA_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 11/07/22</a><p></p> 
                                            <a href="PRE-SEFAZ_ESTATISTICA_IGOR_AULA03.php">AULA 03 - GRAVAÇÃO 18/07/22</a><p></p> 
                                            <a href="PRE-SEFAZ_ESTATISTICA_IGOR_AULA04.php">AULA 04 - GRAVAÇÃO 25/07/22</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CONTABILIDADE AVANÇADA  - ANDERSON FUMAUX</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCBLAnderson" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1b6Hj6sbqAkLfT0FwNKHMe1fltz27L7EM?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseCBLAnderson">
                                        <div class="card card-body"> 
                                            <a href="PRE-SEFAZ_CBL_FUMAUX_AULA01.php">AULA 01 - GRAVAÇÃO 08/07/22</a><p></p> 
                                            <a href="PRE-SEFAZ_CBL_FUMAUX_AULA02.php">AULA 02 - GRAVAÇÃO 09/07/22</a><p></p> 
                                            <a href="PRE-SEFAZ_CBL_FUMAUX_AULA03.php">AULA 03 - GRAVAÇÃO 09/07/22</a><p></p> 
                                            <a href="PRE-SEFAZ_CBL_FUMAUX_AULA04.php">AULA 04 - GRAVAÇÃO 10/07/22</a><p></p> 
                                            <a href="PRE-SEFAZ_CBL_FUMAUX_AULA05.php">AULA 05 - GRAVAÇÃO 23/07/22</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CUSTOS - DANIEL MERRELES</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCustosDaniel" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/11uYfdnYsUlEkThC6t5gE9gaZCtnHQQyw?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseCustosDaniel">
                                        <div class="card card-body"> 
                                            <a href="PRE-SEFAZ_CUSTOS_DANIEL_AULA01.php">AULA 01 - GRAVAÇÃO 28/07/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_CUSTOS_DANIEL_AULA02.php">AULA 02 - GRAVAÇÃO 11/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_CUSTOS_DANIEL_AULA03.php">AULA 03 - GRAVAÇÃO 15/08/2022</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ÉTICA E FILOSOFIA - DOUGLAS REMONATTO [CONTEÚDO BÔNUS]</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEticaDouglas" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1TxXHtVD_dv7u6ZuKPp5iO1HUDAkHruLe?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseEticaDouglas">
                                        <div class="card card-body"> 
                                            <a href="PRE-SEFAZ_ETICA_DOUGLAS_AULA01.php">AULA 01 - GRAVAÇÃO 03/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ_ETICA_DOUGLAS_AULA02.php">AULA 02 - GRAVAÇÃO 08/08/2022</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">SIMULADOS - PROVAS E GABARITOS</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSimulados" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/15WOlVEZmNqomUfF-mXSZekYySXtrMOBv?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Acessar</a> 
                                        </p>
                                        <div class="collapse" id="collapseSimulados">
                                        <div class="card card-body"> 
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