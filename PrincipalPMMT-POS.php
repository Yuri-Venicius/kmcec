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
                <li>
                    <a href="videoaulas.php"><i class="bi bi-file-play-fill"></i> Videoaulas</a>
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
            
            <h2>Vídeo Aulas</h2>
            <p>Aqui ficam listadas suas vídeos aulas disponíveis, separadas por blocos de conteúdo. 
                Para acessar uma aula basta clicar em "Aulas" no bloco do conteúdo referente, e para fazer o 
                download do material de apoio do bloco, basta clicar em "Materiais" que o Download irá começar.</p>

            
            <div class="row">

            <div class="col-sm-6">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PORTUGUÊS [INTERPRETAÇÃO DE TEXTO] - HÉLIO TAQUES</h5>
                            <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesHelio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1TflxMDtQbhyIZ4IgEXJGlfuAUmCkwn2V?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapsePortuguesHelio">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_PORTUGUES_HELIO_AULA01.php">AULA 01 - GRAVAÇÃO 27/01/2022</a><p></p> 
                                        <a href="POS-PM_PORTUGUES_HELIO_AULA02.php">AULA 02 - GRAVAÇÃO 15/02/2022</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1xd3IppyHanH0LbI1WT-wLasRUwF-aBYo?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapsePortuguesGouveia">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_PORTUGUES_GOUVEIA_AULA01.php">AULA 01 - GRAVAÇÃO 08/01/2022</a><p></p> 
                                        <a href="POS-PM_PORTUGUES_GOUVEIA_AULA02.php">AULA 02 - GRAVAÇÃO 04/02/2022</a><p></p> 
                                        <a href="POS-PM_PORTUGUES_GOUVEIA_AULA03.php">AULA 03 - GRAVAÇÃO 10/02/2022</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1TqkC2nmz4bwgkP4cn1l6mSGq5-p26z_4?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapsePortuguesElder">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_PORTUGUES_ELDER_AULA01.php">AULA 01 - GRAVAÇÃO 08/01/2022</a><p></p> 
                                        <a href="POS-PM_PORTUGUES_ELDER_AULA02.php">AULA 02 - GRAVAÇÃO 15/01/2022</a><p></p> 
                                        <a href="POS-PM_PORTUGUES_ELDER_AULA03.php">AULA 03 - GRAVAÇÃO 22/01/2022</a><p></p> 
                                        <a href="POS-PM_PORTUGUES_ELDER_AULA04.php">AULA 04 - GRAVAÇÃO 29/01/2022</a><p></p> 
                                        <a href="POS-PM_PORTUGUES_ELDER_AULA05.php">AULA 05 - GRAVAÇÃO 05/02/2022</a><p></p> 
                                        <a href="POS-PM_PORTUGUES_ELDER_AULA06.php">AULA 06 - GRAVAÇÃO 11/02/2022</a><p></p> 
                                        <a href="POS-PM_PORTUGUES_ELDER_AULA07.php">AULA 07 - GRAVAÇÃO 03/02/2022</a><p></p> 
                                        <a href="POS-PM_PORTUGUES_ELDER_AULA08.php">AULA 08 - GRAVAÇÃO 12/02/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">MATEMÁTICA - IGOR BRASIL</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseMatematicaIgor" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1buaRFY6HFyYn67kTuF9NQuEmGEWLy6k0?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseMatematicaIgor">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_MATEMATICA_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO </a><p></p> 
                                        <a href="POS-PM_MATEMATICA_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 15/01/2022</a><p></p> 
                                        <a href="POS-PM_MATEMATICA_IGOR_AULA03.php">AULA 03 - GRAVAÇÃO 31/01/2022</a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">FÍSICA - ANDERSON AUGUSTO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseFisicaAnderson" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1HmZwHA4J4TBtlmY_fcXnGTVH1oqsUjk6?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseFisicaAnderson">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_FISICA_ANDERSON_AULA01.php">AULA 01 - GRAVAÇÃO 08/01/2022</a><p></p> 
                                        <a href="POS-PM_FISICA_ANDERSON_AULA02.php">AULA 02 - GRAVAÇÃO 10/01/2022</a><p></p> 
                                        <a href="POS-PM_FISICA_ANDERSON_AULA03.php">AULA 03 - GRAVAÇÃO 17/01/2022</a><p></p> 
                                        <a href="POS-PM_FISICA_ANDERSON_AULA04.php">AULA 04 - GRAVAÇÃO 29/01/2022</a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">QUÍMICA - DOUGLAS</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseQuimicaDouglas" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1zmvE5WVEJ9yZp3-1zH4eNUE8CjeYhVqe?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseQuimicaDouglas">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_QUIMICA_DOUGLAS_AULA01.php">AULA 01 - GRAVAÇÃO 14/01/2022</a><p></p> 
                                        <a href="POS-PM_QUIMICA_DOUGLAS_AULA02.php">AULA 02 - GRAVAÇÃO 16/01/2022</a><p></p> 
                                        <a href="POS-PM_QUIMICA_DOUGLAS_AULA03.php">AULA 03 - GRAVAÇÃO 20/01/2022</a><p></p> 
                                        <p></p>
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">HISTÓRIA - GÊNESIS BARBARÁ</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseHistoriaGenesis" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1f5zYe4gF2bzurF7SITldsGraqXWHAm-W?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseHistoriaGenesis">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_HISTORIA_GENESIS_AULA01.php">AULA 01 - GRAVAÇÃO 08/01/2022</a><p></p>
                                        <p></p>
                                        <a href="POS-PM_HISTORIA_GENESIS_AULA02.php">AULA 02 - GRAVAÇÃO 09/01/2022</a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">HISTÓRIA - CARLÃO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseHistoriaCarlao" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1exPsA6vam_AWI4CKD4uTugp4mc00EfAh?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseHistoriaCarlao">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_HISTORIA_CARLAO_AULA01.php">AULA 01 - GRAVAÇÃO 26/01/2022</a><p></p>
                                        <a href="POS-PM_HISTORIA_CARLAO_AULA02.php">AULA 02 - GRAVAÇÃO 28/01/2022</a><p></p>
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1Gm7mHK71JuLzKQBxKatjMZpcgeB7Rcwo?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseGeografiaMarcelo">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_GEOGRAFIA_MARCELO_AULA01.php">AULA 01 - GRAVAÇÃO 22/01/2022</a><p></p> 
                                        <a href="POS-PM_GEOGRAFIA_MARCELO_AULA02.php">AULA 02 - GRAVAÇÃO 23/01/2022</a><p></p> 
                                        <a href="POS-PM_GEOGRAFIA_MARCELO_AULA03.php">AULA 03 - GRAVAÇÃO 02/02/2022</a><p></p> 
                                        <a href="POS-PM_GEOGRAFIA_MARCELO_AULA04.php">AULA 04 - GRAVAÇÃO 07/02/2022</a><p></p> 
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/17PbP0pggsatt6KxJ1X8gakwE5NxtDGna?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseInformaticaSilvio">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_NFORMATICA_SILVIO_AULA01.php">AULA 01 - GRAVAÇÃO 08/01/2022</a><p></p> 
                                        <a href="POS-PM_NFORMATICA_SILVIO_AULA02.php">AULA 02 - GRAVAÇÃO 15/01/2022</a><p></p> 
                                        <a href="POS-PM_NFORMATICA_SILVIO_AULA03.php">AULA 03 - GRAVAÇÃO 22/01/2022</a><p></p> 
                                        <a href="POS-PM_NFORMATICA_SILVIO_AULA04.php">AULA 04 - GRAVAÇÃO 29/01/2022</a><p></p> 
                                        <a href="POS-PM_NFORMATICA_SILVIO_AULA05.php">AULA 05 - GRAVAÇÃO 05/02/2022</a><p></p> 
                                        <a href="POS-PM_NFORMATICA_SILVIO_AULA06.php">AULA 06 - GRAVAÇÃO 09/02/2022</a><p></p> 
                                        <a href="POS-PM_NFORMATICA_SILVIO_AULA07.php">AULA 07 - GRAVAÇÃO 12/02/2022</a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">INFORMÁTICA - JOÃO CLEBER [MATÉRIA BÔNUS]</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInformaticaJoao" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1itC2tCFqg7ZqaqJpnS5ZHVrv0afPQ7Kx?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseInformaticaJoao">
                                        <div class="card card-body">
                                            <a href="POS-PJC_INFORMATICA_JOAO_AULA01.php">AULA 01 - GRAVAÇÃO 18/01/2022</a><p></p>
                                            <a href="POS-PJC_INFORMATICA_JOAO_AULA02.php">AULA 02 - GRAVAÇÃO 02/02/2022</a><p></p>
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1ap1BCzSubxje6Boa5m9KHZVW7dLG0XWI?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseEticaDouglas">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_ETICA_DOUGLAS_AULA01.php">AULA 01 - GRAVAÇÃO 22/01/2022</a><p></p> 
                                        <a href="POS-PM_ETICA_DOUGLAS_AULA02.php">AULA 02 - GRAVAÇÃO 13/02/2022</a><p></p> 
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
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRelDavoli" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1pDZgoT9R2Pe99CMYclGOq2IWONvSnusW?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseRelDavoli">
                                        <div class="card card-body"> 
                                            <a href="POS-PM_RELACOES_DAVOLI_AULA01.php">AULA 01 - GRAVAÇÃO 24/01/22</a><p></p> 
                                            <a href="POS-PM_RELACOES_DAVOLI_AULA02.php">AULA 02 - GRAVAÇÃO 13/02/22</a><p></p> 
                                            <a href="POS-PM_RELACOES_DAVOLI_AULA03.php">AULA 03 - GRAVAÇÃO 16/02/22</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                        </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LEGISLAÇÃO BÁSICA - BRUNO FRANÇA [PROCESSO PENAL]</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegBruno" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1xJtDhco5Cy0DtM8R6BTOi9LkP8Fmj3gm?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseLegBruno">
                                        <div class="card card-body"> 
                                            <a href="POS-PM_LEGISLACAO_BRUNO_AULA01.php">AULA 01 - GRAVAÇÃO 12-01-22</a><p></p> 
                                            <a href="POS-PM_LEGISLACAO_BRUNO_AULA02.php">AULA 02 - GRAVAÇÃO 18-01-22</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                        </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LEGISLAÇÃO BÁSICA - KLEBER PINHO [DIREITO PENAL]</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegKleber" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1riTo4WGIWmM5B0HtW77BCtCqNc_NQbdj?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseLegKleber">
                                        <div class="card card-body"> 
                                            <a href="POS-PM_LEGISLACAO_KLEBER_AULA01.php">AULA 01 - GRAVAÇÃO 13/01/22</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                        </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LEGISLAÇÃO BÁSICA - CLEIDE REGINA [DIREITO ADMINISTRATIVO]</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegCleide" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1eWxKs-Vi1EcWIvYvv2VhCGrPKeoFAnTp?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseLegCleide">
                                        <div class="card card-body"> 
                                            <a href="POS-PM_LEGISLACAO_CLEIDE_AULA01.php">AULA 01 - GRAVAÇÃO 19/01/22</a><p></p> 
                                            <a href="POS-PM_LEGISLACAO_CLEIDE_AULA02.php">AULA 02 - GRAVAÇÃO 03/02/22</a><p></p> 
                                            <a href="POS-PM_LEGISLACAO_CLEIDE_AULA03.php">AULA 03 - GRAVAÇÃO 05/02/22</a><p></p> 
                                            <a href="POS-PM_LEGISLACAO_CLEIDE_AULA04.php">AULA 04 - GRAVAÇÃO 12/02/22</a><p></p> 
                                            <a href="POS-PM_LEGISLACAO_CLEIDE_AULA05.php">AULA 05 - GRAVAÇÃO 17/02/22</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                        </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LEGISLAÇÃO BÁSICA - JOSÉ NETO [DIREITO CONSTITUCIONAL]</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegNeto" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1NrigMoiGfhFT5INX-CyYJbN8qxlHQzLi?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseLegNeto">
                                        <div class="card card-body"> 
                                            <a href="POS-PM_LEGISLACAO_NETO_AULA01.php">AULA 01 - GRAVAÇÃO 25-01-22</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LEGISLAÇÃO BÁSICA - MICHELE DONEGÁ [LEGISLAÇÃO ESPECIAL]</h5>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegMichele" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                        </button>
                                        <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1E7DAlRVoOUyYFzN2EBiQ3dTUfR9LIAQ6?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                        </p>
                                        <div class="collapse" id="collapseLegMichele">
                                        <div class="card card-body"> 
                                            <a href="POS-PM_LEGISLACAO_MICHELE_AULA01.php">AULA 01 - GRAVAÇÃO 13/02/22</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">LEGISLAÇÃO BÁSICA -TEN. CEL. MARCEL - Lei de Promoçãop Soldado PM/BM</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegMarcel" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1IFtpQbVLkIt0TYS4XNt9A6bcPUlyAFmK?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseLegMarcel">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_LEGISLACAO_MARCEL_AULA01.php">AULA 01 - Lei de Promoção PM/BM</a><p></p> 
                                    </div>
                                    </div>
                            </div>
                        </div><p></p>
                </div>

                <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">LEGISLAÇÃO DE INTERESSE BM - TEN. CEL. BM Heitor</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegHeitor1" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1I7lKhwp1MWelCLgSJo1B6qvbv0kapyOr?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseLegHeitor1">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_LEGISLACAO1_HEITOR_AULA01.php">AULA 1 - Legislação de interesse BM</a><p></p> 
                                        <a href="POS-PM_LEGISLACAO1_HEITOR_AULA02.php">RETIFICAÇÃO SLIDES AULA 1</a><p></p> 
                                    </div>
                                    </div>
                            </div>
                        </div><p></p>
                </div>

                <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                    <h5 class="card-title">LEGISLAÇÃO BÁSICA - TEN. CEL. BOMBEIRO HEITOR [DIREITO PENAL MILITAR]</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegHeitor" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1Pboe_0DETq53Cb9iGovMzTeOAZCwSO_x?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseLegHeitor">
                                    <div class="card card-body"> 
                                        <a href="POS-PM_LEGISLACAO_HEITOR_AULA01.php">AULA 01 - GRAVAÇÃO 21-01-22</a><p></p> 
                                        <a href="POS-PM_LEGISLACAO_HEITOR_AULA02.php">AULA 02 - GRAVAÇÃO 01-02-22</a><p></p> 
                                        <a href="POS-PM_LEGISLACAO_HEITOR_AULA03.php">AULA 03 - GRAVAÇÃO 08-02-22</a><p></p> 
                                    </div>
                                    </div>
                            </div>
                        </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                            <h5 class="card-title">[BÔNUS BIOEXATAS] FÍSICA - ELIZEU</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseFisicaElizeu" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1dccIXF2xzR_M0g7OjL8260buBVXi_glm?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseFisicaElizeu">
                                    <div class="card card-body"> 
                                        <a href="BIOEXATAS_FISICA_ELIZEU_AULA01.php">AULA 01 - GRAVAÇÃO 23/01/2022</a><p></p> 
                                        <a href="BIOEXATAS_FISICA_ELIZEU_AULA02.php">AULA 02 - GRAVAÇÃO 30/01/2022</a><p></p> 
                                        <a href="BIOEXATAS_FISICA_ELIZEU_AULA03.php">AULA 03 - GRAVAÇÃO 06/02/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                            <h5 class="card-title">[BÔNUS BIOEXATAS] MATEMÁTICA - IGOR BRASIL</h5>
                            <p class="card-text">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseMatematicaIgor" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/19vmqZQ0qMRNdhd08Q1WMQnJk5kHyVApy?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseMatematicaIgor">
                                    <div class="card card-body"> 
                                        <a href="BIOEXATAS_MATEMATICA_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 23/01/2022</a><p></p> 
                                        <a href="BIOEXATAS_MATEMATICA_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 30/01/2022</a><p></p> 
                                        <a href="BIOEXATAS_MATEMATICA_IGOR_AULA03.php">AULA 03 - GRAVAÇÃO 06/02/2022</a><p></p> 
                                        <a href="BIOEXATAS_MATEMATICA_IGOR_AULA04.php">AULA 04 - GRAVAÇÃO 13/02/2022</a><p></p> 
                                    </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                            <h5 class="card-title">[BÔNUS BIOEXATAS] QUÍMICA - DOUGLAS [CONTEÚDO BÔNUS]</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseQuimicaDouglas" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1qrwmvyg7iC_gZ1idM8J4-qsINcZYTeQF?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseQuimicaDouglas">
                                    <div class="card card-body">
                                        <a href="BIOEXATAS_QUIMICA_DOUGLAS_AULA01.php">AULA 01 - GRAVAÇÃO 23/01/2022</a><p></p>
                                        <a href="BIOEXATAS_QUIMICA_DOUGLAS_AULA02.php">AULA 02 - GRAVAÇÃO 30/01/2022</a><p></p>
                                        <a href="BIOEXATAS_QUIMICA_DOUGLAS_AULA03.php">AULA 03 - GRAVAÇÃO 06/02/2022</a><p></p>
                                        <a href="BIOEXATAS_QUIMICA_DOUGLAS_AULA04.php">AULA 04 - GRAVAÇÃO 12/02/2022</a><p></p>
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ATUALIDADES - MARCELO ALONSO [CONTEÚDO BÔNUS]</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAtualidadeMarcelo" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1uPDsORoAsrgamMIHGXW2sKjy2HuJoquM?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseAtualidadeMarcelo">
                                    <div class="card card-body"> 
                                        <a href="POS-ATUALIDADES_MARCELO_AULA01.php">AULA 01 - GRAVAÇÃO 06/02/2022</a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PRINCÍPIOS DE ÉTICA, FILOSOFIA E DICAS PARA GABARITAR A UFMT - PROF. DAVOLI [CONTEÚDO BÔNUS]</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDicasDavoli" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1uYthHuxtBVjDjgaIAYMZUbtIkTmPZn6J&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                                    </p>
                                    <div class="collapse" id="collapseDicasDavoli">
                                    <div class="card card-body"> 
                                        <a href="POS-DICAS_DAVOLI_AULA01.php">AULA ÚNICA - GRAVAÇÃO 13/02/2022</a><p></p> 
                                    </div>
                                    </div>
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">SIMULADO PM/BM-MT [06/02/2022]</h5>
								<p class="card-text">ARQUIVO DO SIMULADO E GABARITO DA PROVA REALIZADA</p>
								</p>
								<a href="https://drive.google.com/drive/folders/1olfsJUv_rbuTRDNtfdJ32zqPQK6M0aFe?usp=sharing" class="btn btn-primary">Acessar</a>
							</div>
						</div>
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