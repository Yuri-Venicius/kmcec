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

            <h2>VÍDEO AULAS - SEFAZ PÓS-EDITAL</h2>
            <p>Aqui ficam listadas suas vídeos aulas disponíveis, separadas por blocos de conteúdo.
                Para acessar uma aula basta clicar em "Aulas" no bloco do conteúdo referente.</p>

            <?php
            $codCurso = 2834;
            $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
            if (
                $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso)
            ) : ?>

                <div class="row">
                    <div class="col-sm-12"><h3>Conteúdo Bônus: </h3></div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO REGULAR - SEFAZ-MT PRÉ EDITAL</h5>
                                <p class="card-text">
                                    <a style="margin-left: 30px;" href="PrincipalPre-SEFAZ.php" class="btn btn-primary"><i class="fas fa-book-open"></i> ACESSAR O CURSO</a>
                                </p>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO AVANÇADO - SEFAZ-MT PRÉ EDITAL</h5>
                                <p class="card-text">
                                    <a style="margin-left: 30px;" href="PrincipalPre-SEFAZ-Avancado.php" class="btn btn-primary"><i class="fas fa-book-open"></i> ACESSAR O CURSO</a>
                                </p>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-md-12">
                        <h3>Conteúdo do curso: </h3>
                    </div>

                    <div class="col-sm-12">
                        <div class="alert alert-primary" role="alert">
                            Acesse clicando  <a href="https://docs.google.com/spreadsheets/d/19A0u_qf12oMWpX2RzAUQl02Xj-NcNdiMAIT2_5hvcYE/edit?usp=sharing" class="alert-link">aqui</a>, o cronograma de gravações deste curso!
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LTE - ANDRÉ FANTONI</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLteFandoni" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/127lJ1W29MZe8dYGJAnvC4tpuTRm5YOiT?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseLteFandoni">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_LTE_FANTONI_AULA01.php">AULA 01 - GRAVAÇÃO 10/04/2023</a>
                                        <a href="SEFAZ_POS_LTE_FANTONI_AULA02.php">AULA 02 - GRAVAÇÃO 22/04/2023</a>
                                        <a href="SEFAZ_POS_LTE_FANTONI_AULA03.php">AULA 03 - GRAVAÇÃO 24/04/2023</a>
                                        <a href="SEFAZ_POS_LTE_FANTONI_AULA04.php">AULA 04 - GRAVAÇÃO 08/05/2023</a>
                                        <a href="SEFAZ_POS_LTE_FANTONI_AULA05.php">AULA 05 - GRAVAÇÃO 10/05/2023</a>
                                        <a href="SEFAZ_POS_LTE_FANTONI_AULA06.php">AULA 06 - GRAVAÇÃO 18/05/2023</a>
                                        <a href="SEFAZ_POS_LTE_FANTONI_AULA07.php">AULA 07 - GRAVAÇÃO 20/05/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ECONOMIA - ANDRÉ FANTONI</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEconoFandoni" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1KRvmIse9nVIAyfgyAe1DtTmjF_PF24eX?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseEconoFandoni">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_ECONOMIA_FANTONI_AULA01.php">AULA 01 - GRAVAÇÃO 06/04/2023</a>
                                        <a href="SEFAZ_POS_ECONOMIA_FANTONI_AULA02.php">AULA 02 - GRAVAÇÃO 12/04/2023</a>
                                        <a href="SEFAZ_POS_ECONOMIA_FANTONI_AULA03.php">AULA 03 - GRAVAÇÃO 12/05/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DISCURSIVAS - ANDRÉ FANTONI</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDiscursivasFandoni" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1TSPjxH8ET-rq5hU0OJQZ04fXf49JeEB4?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseDiscursivasFandoni">
                                    <div class="card card-body">
                                        <a>NÃO HÁ CONTEÚDO GRAVADO</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DISCURSIVAS - HÉLIO TAQUES</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDiscursivasHelio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1EKTCtPY9gOPLSJcRN3o6TrLUjp6KMQmV?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseDiscursivasHelio">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_DISCURSIVAS_HELIO_AULA01.php">AULA 01 - GRAVAÇÃO 29/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CONTABILIDADE - DANIEL MERRELES</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCblDaniel" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/11aJzeep4Ok_m50STOL4VSZHC2LvWsntX?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseCblDaniel">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_CONTABILIDADE_DANIEL_AULA01.php">AULA 01 - GRAVAÇÃO 16/03/2023</a>
                                        <a href="SEFAZ_POS_CONTABILIDADE_DANIEL_AULA02.php">AULA 02 - GRAVAÇÃO 23/03/2023</a>
                                        <a href="SEFAZ_POS_CONTABILIDADE_DANIEL_AULA03.php">AULA 03 - GRAVAÇÃO 24/03/2023</a>
                                        <a href="SEFAZ_POS_CONTABILIDADE_DANIEL_AULA04.php">AULA 04 - GRAVAÇÃO 31/03/2023</a>
                                        <a href="SEFAZ_POS_CONTABILIDADE_DANIEL_AULA05.php">AULA 05 - GRAVAÇÃO 04/04/2023</a>
                                        <a href="SEFAZ_POS_CONTABILIDADE_DANIEL_AULA06.php">AULA 06 - GRAVAÇÃO 05/04/2023</a>
                                        <a href="SEFAZ_POS_CONTABILIDADE_DANIEL_AULA07.php">AULA 07 - GRAVAÇÃO 14/04/2023</a>
                                        <a href="SEFAZ_POS_CONTABILIDADE_DANIEL_AULA08.php">AULA 08 - GRAVAÇÃO 29/04/2023</a>
                                        <a href="SEFAZ_POS_CONTABILIDADE_DANIEL_AULA09.php">AULA 09 - GRAVAÇÃO 30/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">T.I - JOÃO CLEBER</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTiJoao" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1qupf3mDWMcS24l9NJx9_Kzyk7-Gc6nqb?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseTiJoao">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_TI_JOAO_AULA01.php">AULA 01 - GRAVAÇÃO 17/04/2023</a>
                                        <a href="SEFAZ_POS_TI_JOAO_AULA02.php">AULA 02 - GRAVAÇÃO 20/04/2023</a>
                                        <a href="SEFAZ_POS_TI_JOAO_AULA03.php">AULA 03 - GRAVAÇÃO 21/04/2023</a>
                                        <a href="SEFAZ_POS_TI_JOAO_AULA04.php">AULA 04 - GRAVAÇÃO 21/04/2023</a>
                                        <a href="SEFAZ_POS_TI_JOAO_AULA05.php">AULA 05 - GRAVAÇÃO 22/04/2023</a>
                                        <a href="SEFAZ_POS_TI_JOAO_AULA06.php">AULA 06 - GRAVAÇÃO 23/04/2023</a>
                                        <a href="SEFAZ_POS_TI_JOAO_AULA07.php">AULA 07 - GRAVAÇÃO 26/04/2023</a>
                                        <a href="SEFAZ_POS_TI_JOAO_AULA08.php">AULA 08 - GRAVAÇÃO 27/04/2023</a>
                                        <a href="SEFAZ_POS_TI_JOAO_AULA09.php">AULA 09 - GRAVAÇÃO 13/05/2023</a>
                                        <a href="SEFAZ_POS_TI_JOAO_AULA10.php">AULA 10 - GRAVAÇÃO 20/05/2023</a>
                                        <a href="SEFAZ_POS_TI_JOAO_AULA11.php">AULA 11 - GRAVAÇÃO 21/05/2023</a>
                                        <a href="SEFAZ_POS_TI_JOAO_AULA12.php">AULA 12 - GRAVAÇÃO 21/05/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DIREITO TRIBUTÁRIO - LÍGIA DONINI</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDirLigia" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1OhRDblzYe4gjIMyqCyyqeiL-M9EizD1X?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseDirLigia">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_DIR_TRIBUTARIO_LIGIA_AULA01.php">AULA 01 - GRAVAÇÃO 30/03/2023</a>
                                        <a href="SEFAZ_POS_DIR_TRIBUTARIO_LIGIA_AULA02.php">AULA 02 - GRAVAÇÃO 03/04/2023</a>
                                        <a href="SEFAZ_POS_DIR_TRIBUTARIO_LIGIA_AULA03.php">AULA 03 - GRAVAÇÃO 13/04/2023</a>
                                        <a href="SEFAZ_POS_DIR_TRIBUTARIO_LIGIA_AULA04.php">AULA 04 - GRAVAÇÃO 11/05/2023</a>
                                        <a href="SEFAZ_POS_DIR_TRIBUTARIO_LIGIA_AULA05.php">AULA 05 - GRAVAÇÃO 15/05/2023</a>
                                        <a href="SEFAZ_POS_DIR_TRIBUTARIO_LIGIA_AULA06.php">AULA 06 - GRAVAÇÃO 17/05/2023</a>
                                        <a href="SEFAZ_POS_DIR_TRIBUTARIO_LIGIA_AULA07.php">AULA 07 - GRAVAÇÃO 19/05/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DIREITO PENAL - LUIZ HENRIQUE</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDirLuiz" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1tJg_1sfER6g4SfaEMTGlaoeeKX6OXGfA?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseDirLuiz">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_DIR_PENAL_LUIZ_AULA01.php">AULA 01 - GRAVAÇÃO 18/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DIREITO CONSTITUCIONAL - JOSÉ NETO</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDirJose" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1dkrt-wKF-xkFbcN6j-IDBFjHrHvkgeaa?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseDirJose">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_DIR_CONST_JOSE_AULA01.php">AULA 01 - GRAVAÇÃO 20/03/2023</a>
                                        <a href="SEFAZ_POS_DIR_CONST_JOSE_AULA02.php">AULA 02 - GRAVAÇÃO 21/03/2023</a>
                                        <a href="SEFAZ_POS_DIR_CONST_JOSE_AULA03.php">AULA 03 - GRAVAÇÃO 29/03/2023</a>
                                        <a href="SEFAZ_POS_DIR_CONST_JOSE_AULA04.php">AULA 04 - GRAVAÇÃO 02/05/2023</a>
                                        <a href="SEFAZ_POS_DIR_CONST_JOSE_AULA05.php">AULA 05 - GRAVAÇÃO 13/05/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DIREITO ADMINISTRATIVO - CLEIDE REGINA</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDirCleide" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1xl5OfB-2dzwfrPGQLae4bBVAHuykoAKh?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseDirCleide">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_DIR_ADM_CLEIDE_AULA01.php">AULA 01 - GRAVAÇÃO 15/03/2023</a>
                                        <a href="SEFAZ_POS_DIR_ADM_CLEIDE_AULA02.php">AULA 02 - GRAVAÇÃO 27/03/2023</a>
                                        <a href="SEFAZ_POS_DIR_ADM_CLEIDE_AULA03.php">AULA 03 - GRAVAÇÃO 08/04/2023</a>
                                        <a href="SEFAZ_POS_DIR_ADM_CLEIDE_AULA04.php">AULA 04 - GRAVAÇÃO 11/04/2023</a>
                                        <a href="SEFAZ_POS_DIR_ADM_CLEIDE_AULA05.php">AULA 05 - GRAVAÇÃO 15/04/2023</a>
                                        <a href="SEFAZ_POS_DIR_ADM_CLEIDE_AULA06.php">AULA 06 - GRAVAÇÃO 25/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DIREITO EMPRESARIAL - JOSÉ NETO</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDirEmpreJose" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1YmnpCM0i7jpNiM6lSNu6jXR5LOe7Typz?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseDirEmpreJose">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_DIR_EMPRESARIAL_JOSE_AULA01.php">AULA 01 - GRAVAÇÃO 16/05/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DIREITO CIVIL - STANLEY COSTA</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDirStanley" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1mbhm_pC5CmBsC5We541ts1otC3-1RrvQ?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseDirStanley">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_DIR_CIVIL_STANLEY_AULA01.php">AULA 01 - GRAVAÇÃO 18/03/2023</a>
                                        <a href="SEFAZ_POS_DIR_CIVIL_STANLEY_AULA02.php">AULA 02 - GRAVAÇÃO 25/03/2023</a>
                                        <a href="SEFAZ_POS_DIR_CIVIL_STANLEY_AULA03.php">AULA 03 - GRAVAÇÃO 01/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LÍNGUA PORTUGUESA - ELDER DENCATI</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortElder" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1rkAI4Rq1ckZZjPkyt8CCx6jBVvMVnRkT?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapsePortElder">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_PORTUGUES_ELDER_AULA01.php">AULA 01 - GRAVAÇÃO 18/03/2023</a>
                                        <a href="SEFAZ_POS_PORTUGUES_ELDER_AULA02.php">AULA 02 - GRAVAÇÃO 22/03/2023</a>
                                        <a href="SEFAZ_POS_PORTUGUES_ELDER_AULA03.php">AULA 03 - GRAVAÇÃO 28/03/2023</a>
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
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortHelio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1naB0-ggbeqHwlQ_4uiHZqs0vwiLNZz1G?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapsePortHelio">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_PORTUGUES_HELIO_AULA01.php">AULA 01 - GRAVAÇÃO 16/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CUSTOS - DANIEL MERRELES</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCustosDaniuel" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1o4jKMKik4-cyfI3KzpXkG3DpNfvDp24d?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseCustosDaniuel">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_CUSTOS_DANIEL_AULA01.php">AULA 01 - GRAVAÇÃO 28/04/2023</a>
                                        <a href="SEFAZ_POS_CUSTOS_DANIEL_AULA02.php">AULA 02 - GRAVAÇÃO 01/05/2023</a>
                                        <a href="SEFAZ_POS_CUSTOS_DANIEL_AULA03.php">AULA 03 - GRAVAÇÃO 09/05/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AUDITORIA - TONYVAN CARVALHO</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAuditoriaTonyvan" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1W3l2zRJ2jDRT-5fysOUnAkoxG_pYSHXK?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseAuditoriaTonyvan">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_AUDITORIA_TONYVAN_AULA01.php">AULA 01 - GRAVAÇÃO 04/05/2023</a>
                                        <a href="SEFAZ_POS_AUDITORIA_TONYVAN_AULA02.php">AULA 02 - GRAVAÇÃO 05/05/2023</a>
                                        <a href="SEFAZ_POS_AUDITORIA_TONYVAN_AULA03.php">AULA 03 - GRAVAÇÃO 06/05/2023</a>
                                        <a href="SEFAZ_POS_AUDITORIA_TONYVAN_AULA04.php">AULA 04 - GRAVAÇÃO 06/05/2023</a>
                                        <a href="SEFAZ_POS_AUDITORIA_TONYVAN_AULA05.php">AULA 05 - GRAVAÇÃO 07/05/2023</a>
                                        <a href="SEFAZ_POS_AUDITORIA_TONYVAN_AULA06.php">AULA EXTRA </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">RLM - IGOR BRASIL</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRlmIgor" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1B05r-V_foly6lUsU9T1GJYUw8DgSroN5?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseRlmIgor">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_RLM_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 17/03/2023</a>
                                        <a href="SEFAZ_POS_RLM_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 25/03/2023</a>
                                        <a href="SEFAZ_POS_RLM_IGOR_AULA03.php">AULA 03 - GRAVAÇÃO 26/03/2023</a>
                                        <a href="SEFAZ_POS_RLM_IGOR_AULA04.php">AULA 04 - GRAVAÇÃO 29/04/2023</a>
                                        <a href="SEFAZ_POS_RLM_IGOR_AULA05.php">AULA 05 - GRAVAÇÃO 13/05/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>


                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">MATEMÁTICA FINANCEIRA - IGOR BRASIL</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseMatematicaIgor" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1l7_w3-DFCvhM8-5HjnqfhSx_r_rHKiFR?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseMatematicaIgor">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_MATEMATICA_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 01/04/2023</a>
                                        <a href="SEFAZ_POS_MATEMATICA_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 02/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ESTATÍSTICA - IGOR BRASIL</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEstatisticaIgor" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1pa7LVo47DjzGVdM4nvGxLAWgtpTVH6EB?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseEstatisticaIgor">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_ESTATISTICA_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 08/04/2023</a>
                                        <a href="SEFAZ_POS_ESTATISTICA_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 09/04/2023</a>
                                        <a href="SEFAZ_POS_ESTATISTICA_IGOR_AULA03.php">AULA 03 - GRAVAÇÃO 15/04/2023</a>
                                        <a href="SEFAZ_POS_ESTATISTICA_IGOR_AULA04.php">AULA 04 - GRAVAÇÃO 15/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">HISTÓRIA - CARLOS BIDU</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseHistoriaBidu" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1fGOWVU2lt31F83MEh8TpCJ2NG4Hfw1HW?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseHistoriaBidu">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_HISTORIA_BIDU_AULA01.php">AULA 01 - GRAVAÇÃO 19/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">GEOGRAFIA - MARCELO ALONSO</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseGeografiaMarcelo" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1SO6CiktUH7dZmW1BSXdakRZ6uwH3NzxW?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseGeografiaMarcelo">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_GEO_MARCELO_AULA01.php">AULA 01 - GRAVAÇÃO 19/03/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ÉTICA E FILOSOFIA - DOUGLAS REMONATTO</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEticaDouglas" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1A180iQzGy65mt8evdi76-4056awIwj6C?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseEticaDouglas">
                                    <div class="card card-body">
                                        <a href="SEFAZ_POS_EXTRA_ETICA_DOUGLAS_AULA01.php">AULA 01</a>
                                        <a href="SEFAZ_POS_EXTRA_ETICA_DOUGLAS_AULA02.php">AULA 02</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>


                    

                <?php endif; ?>
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