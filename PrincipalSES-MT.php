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
                            <h5 class="card-title">PORTUGUÊS - HÉLIO TAQUES</h5>
                            <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesHelio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1KocBo-tifzB3NY_0qpOroBPaTtwaSBKo?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapsePortuguesHelio">
                                    <div class="card card-body"> 
                                        <a href="PRE-SES_PORTUGUES_HELIO_AULA01.php">AULA 01 - GRAVAÇÃO 16/03/2022</a><p></p> 
                                        <a href="PRE-SES_PORTUGUES_HELIO_AULA02.php">AULA 02 - GRAVAÇÃO 23/03/2022</a><p></p> 
                                        <a href="PRE-SES_PORTUGUES_HELIO_AULA03.php">AULA 03 - GRAVAÇÃO 06/05/2022</a><p></p> 
                                        <a href="PRE-SES_PORTUGUES_HELIO_AULA04.php">AULA 04 - GRAVAÇÃO 12/05/2022</a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>
                
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PORTUGUÊS - GOUVEIA</h5>
                            <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesGouveia" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1cR7BR27dUpVIWdnfLlppP4ANnSZ8g3s5?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapsePortuguesGouveia">
                                    <div class="card card-body"> 
                                        <a href="PRE-SES_PORTUGUES_GOUVEIA_AULA01.php">AULA 01 - GRAVAÇÃO 01/04/2022</a><p></p> 
                                        <a href="PRE-SES_PORTUGUES_GOUVEIA_AULA02.php">AULA 02 - GRAVAÇÃO 12/04/2022</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1QHStAEMyPHm0oIvzaokYu9b2CLhPAU24?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapsePortuguesElder">
                                    <div class="card card-body"> 
                                        <a href="PRE_SES_PORTUGUES_ELDER_AULA01.php">AULA 01 - GRAVAÇÃO 21/03/2022</a><p></p> 
                                        <a href="PRE_SES_PORTUGUES_ELDER_AULA02.php">AULA 02 - GRAVAÇÃO 28/03/2022</a><p></p> 
                                        <a href="PRE_SES_PORTUGUES_ELDER_AULA03.php">AULA 03 - GRAVAÇÃO 04/04/2022</a><p></p> 
                                        <a href="PRE_SES_PORTUGUES_ELDER_AULA04.php">AULA 04 - GRAVAÇÃO 18/04/2022</a><p></p> 
                                        <a href="PRE_SES_PORTUGUES_ELDER_AULA05.php">AULA 05 - GRAVAÇÃO 02/05/2022</a><p></p> 
                                        <a href="PRE_SES_PORTUGUES_ELDER_AULA06.php">AULA 06 - GRAVAÇÃO 09/05/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">RACIOCÍNIO LÓGICO - IGOR BRASIL</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRaciocinioIgor" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/19VbGbKB4kF-rkgw9zZRKRU8B7VfshUNS?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseRaciocinioIgor">
                                    <div class="card card-body"> 
                                        <a href="PRE-SES_RACIOCINIO_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 15/03/2022 </a><p></p> 
                                        <a href="PRE-SES_RACIOCINIO_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 22/03/2022 </a><p></p> 
                                        <a href="PRE-SES_RACIOCINIO_IGOR_AULA03.php">AULA 03 - GRAVAÇÃO 11/05/2022 </a><p></p> 
                                        <a href="PRE-SES_RACIOCINIO_IGOR_AULA04.php">AULA 04 - GRAVAÇÃO 16/05/2022 </a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">HISTÓRIA MT - PROF. BIDU</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseHistBidu" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1Ze4RpnywFw7GLc5Wg_Z5sxnBsr3kdJjy?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseHistBidu">
                                    <div class="card card-body"> 
                                        <a href="PRE-SES_HISTORIA_BIDU_AULA01.php">AULA 01 - GRAVAÇÃO 29/03/2022</a><p></p>
                                        <a href="PRE-SES_HISTORIA_BIDU_AULA02.php">AULA 02 - GRAVAÇÃO 26/04/2022</a><p></p>
                                        <a href="PRE-SES_HISTORIA_BIDU_AULA03.php">AULA 03 - GRAVAÇÃO 04/05/2022</a><p></p>
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1zG14kWR6crn7aTD3u7L6rbtecg1vFGTR?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseGeografiaMarcelo">
                                    <div class="card card-body"> 
                                        <a href="PRE-SES_GEOGRAFIA_MARCELO_AULA01.php">AULA 01 - GRAVAÇÃO 06/04/2022</a><p></p> 
                                        <a href="PRE-SES_GEOGRAFIA_MARCELO_AULA02.php">AULA 02 - GRAVAÇÃO 28/04/2022</a><p></p> 
                                        <a href="PRE-SES_GEOGRAFIA_MARCELO_AULA03.php">AULA 03 - GRAVAÇÃO 23/05/2022</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1JtkirVII4mdprc4Cowh-kIPSr9nFl-Bb?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseInformaticaJoao">
                                        <div class="card card-body">
                                            <a href="PRE-SES_INFORMATICA_JOAO_AULA01.php">AULA 01 - GRAVAÇÃO 25/03/2022</a><p></p>
                                            <a href="PRE-SES_INFORMATICA_JOAO_AULA02.php">AULA 02 - GRAVAÇÃO 05/04/2022</a><p></p>
                                            <a href="PRE-SES_INFORMATICA_JOAO_AULA03.php">AULA 03 - GRAVAÇÃO 08/04/2022</a><p></p>
                                            <a href="PRE-SES_INFORMATICA_JOAO_AULA04.php">AULA 04 - GRAVAÇÃO 03/05/2022</a><p></p>
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1rzX6BZO-D8E39r_SoMHVeTfSu_Qsx3q-?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseInformaticaSilvio">
                                        <div class="card card-body">
                                            <a href="PRE-SES_INFORMATICA_SILVIO_AULA01.php">AULA 01 - GRAVAÇÃO 20/04/2022</a><p></p>
                                            <a href="PRE-SES_INFORMATICA_SILVIO_AULA02.php">AULA 02 - GRAVAÇÃO 25/04/2022</a><p></p>
                                        </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ÉTICA - DOUGLAS REMONATTO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEticaDouglas" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1XOKWjoBF7L5EiLQ06TKUrNgzRLrGL56v?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseEticaDouglas">
                                    <div class="card card-body"> 
                                        <a href="PRE-SES_ETICA_DOUGLAS_AULA01.php">AULA 01 - GRAVAÇÃO 17/05/2022</a><p></p> 
                                        <p></p>
                                    </div>
                                    </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LEGISLAÇÃO DO SUS - FERNANDO DAVOLI</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRelDavoli" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1USqLz3z-wml4PgdXR6Xbj3VEyriPmd4A?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseRelDavoli">
                                        <div class="card card-body"> 
                                            <a href="PRE-SES_RELACOES_DAVOLI_AULA01.php">AULA 01 - GRAVAÇÃO 30/03/2022</a><p></p> 
                                            <a href="PRE-SES_RELACOES_DAVOLI_AULA02.php">AULA 02 - GRAVAÇÃO 07/04/2022</a><p></p> 
                                            <a href="PRE-SES_RELACOES_DAVOLI_AULA03.php">AULA 03 - GRAVAÇÃO 13/04/2022</a><p></p> 
                                            <a href="PRE-SES_RELACOES_DAVOLI_AULA04.php">AULA 04 - GRAVAÇÃO 07/05/2022</a><p></p> 
                                            <a href="PRE-SES_RELACOES_DAVOLI_AULA05.php">AULA 05 - GRAVAÇÃO 14/05/2022</a><p></p> 
                                            <a href="PRE-SES_RELACOES_DAVOLI_AULA06.php">AULA 06 - GRAVAÇÃO 21/05/2022</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                        </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">NOÇÕES DE GESTÃO PÚBLICA - CLEIDE REGINA</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegCleide" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/10htz7zmI6gIrhK2pmoaNArDOj8yfDFup?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseLegCleide">
                                        <div class="card card-body"> 
                                            <a href="PRE-SES_GESTAO_CLEIDE_AULA01.php">AULA 01 - GRAVAÇÃO 18/03/2022</a><p></p> 
                                            <a href="PRE-SES_GESTAO_CLEIDE_AULA02.php">AULA 02 - GRAVAÇÃO 14/04/2022</a><p></p> 
                                            <a href="PRE-SES_GESTAO_CLEIDE_AULA03.php">AULA 03 - GRAVAÇÃO 19/04/2022</a><p></p> 
                                            <a href="PRE-SES_GESTAO_CLEIDE_AULA04.php">AULA 04 - GRAVAÇÃO 27/04/2022</a><p></p> 
                                            <a href="PRE-SES_GESTAO_CLEIDE_AULA05.php">AULA 05 - GRAVAÇÃO 05/05/2022</a><p></p> 
                                            <a href="PRE-SES_GESTAO_CLEIDE_AULA06.php">AULA 06 - GRAVAÇÃO 19/05/2022</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                        </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">NOÇÕES DE GESTÃO PÚBLICA - JOSÉ NETO</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegNeto" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/14A7zbkHBn3gJ1sKO6ipR9_DBBlhsp6Tq?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseLegNeto">
                                        <div class="card card-body"> 
                                            <a href="PRE-SES_LEGISLACAO_NETO_AULA01.php">AULA 01 - GRAVAÇÃO 31-03-22</a><p></p> 
                                            <a href="PRE-SES_LEGISLACAO_NETO_AULA02.php">AULA 02 - GRAVAÇÃO 29-04-22</a><p></p> 
                                            <a href="PRE-SES_LEGISLACAO_NETO_AULA03.php">AULA 03 - GRAVAÇÃO 20-05-22</a><p></p> 
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