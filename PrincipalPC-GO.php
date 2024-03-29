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

            <h2>POLÍCIA CIVIL DE GOIÁS - VÍDEOAULAS</h2>
            <p>Aqui ficam listadas suas vídeos aulas disponíveis, separadas por blocos de conteúdo.
                Para acessar uma aula basta clicar em "Aulas" no bloco do conteúdo referente, e para fazer o
                download do material de apoio do bloco, basta clicar em "Materiais" que o Download irá começar.</p>

            <?php
            $codCurso = 2658;
            $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
            if (
                $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso)
            ) : ?>
                <div class="row">

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CONTEÚDO BÔNUS - ISOLADAS</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseConteudoBonus" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS - CONTEÚDO BÔNUS - ISOLADAS
                                    </button>
                                    <!-- <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1KocBo-tifzB3NY_0qpOroBPaTtwaSBKo?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>  -->
                                </p>
                                <div class="collapse" id="collapseConteudoBonus">
                                    <div class="card card-body">
                                        <a href="PrincipalIsoladasKM.php">CONTEÚDO BÔNUS - ISOLADAS DO KM</a>
                                        <p></p>
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
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesHelio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1zqhF2kG3ofX0W0H-8lizNSyV6LVIVwhF?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapsePortuguesHelio">
                                    <div class="card card-body">
                                        <a href="PC-GO_PORTUGUES_HELIO_AULA01.php">AULA 01 - GRAVAÇÃO 21/10/2022</a>
                                        <p></p>
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
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesElder" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1ILkS2bADrBmKp4Rch6nfS3Z8M2gPaNI0?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapsePortuguesElder">
                                    <div class="card card-body">
                                        <a href="PC-GO_PORTUGUES_ELDER_AULA01.php">AULA 01 - GRAVAÇÃO 22/09/2022</a>
                                        <a href="PC-GO_PORTUGUES_ELDER_AULA02.php">AULA 02 - GRAVAÇÃO 26/09/2022</a>
                                        <a href="PC-GO_PORTUGUES_ELDER_AULA03.php">AULA 03 - GRAVAÇÃO 10/10/2022</a>
                                        <a href="PC-GO_PORTUGUES_ELDER_AULA04.php">AULA 04 - GRAVAÇÃO 07/11/2022</a>
                                        <a href="PC-GO_PORTUGUES_ELDER_AULA05.php">AULA 05 - GRAVAÇÃO 14/11/2022</a>
                                        <p></p>
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
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesGouveia" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1H4AnfuykdfqUCHzeVpzWwa9Ef7xbmAuF?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapsePortuguesGouveia">
                                    <div class="card card-body">
                                        <a href="PC-GO_PORTUGUES_GOUVEIA_AULA01.php">AULA 01 - GRAVAÇÃO 14/10/2022</a>
                                        <a href="PC-GO_PORTUGUES_GOUVEIA_AULA02.php">AULA 01 - GRAVAÇÃO 28/10/2022</a>
                                        <p></p>
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
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDireitoConstitucional" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1yR5B5mMcgTBI6ROZEnLGxTD7wyq-LueO?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseDireitoConstitucional">
                                    <div class="card card-body">
                                        <a href="PC-GO_DIR_CONST_NETO_AULA01.php">AULA 01 - GRAVAÇÃO 30/09/2022</a>
                                        <a href="PC-GO_DIR_CONST_NETO_AULA02.php">AULA 02 - GRAVAÇÃO 05/10/2022</a>
                                        <a href="PC-GO_DIR_CONST_NETO_AULA03.php">AULA 03 - GRAVAÇÃO 24/10/2022</a>
                                        <a href="PC-GO_DIR_CONST_NETO_AULA04.php">AULA 04 - GRAVAÇÃO 31/10/2022</a>
                                        <a href="PC-GO_DIR_CONST_NETO_AULA05.php">AULA 05 - GRAVAÇÃO 30/11/2022</a>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DIREITO PENAL - EDUARDO ROBERTO</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDireitoPenal" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1d7c8vVn6f4K8Z8DtjivXxmVgL0PWqJyB?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseDireitoPenal">
                                    <div class="card card-body">
                                        <a href="PC-GO_DIR_PENAL_EDUARDO_AULA01.php">AULA 01 - GRAVAÇÃO 29/09/2022</a>
                                        <a href="PC-GO_DIR_PENAL_EDUARDO_AULA02.php">AULA 02 - GRAVAÇÃO 06/10/2022</a>
                                        <a href="PC-GO_DIR_PENAL_EDUARDO_AULA03.php">AULA 03 - GRAVAÇÃO 13/10/2022</a>
                                        <a href="PC-GO_DIR_PENAL_EDUARDO_AULA04.php">AULA 04 - GRAVAÇÃO 20/10/2022</a>
                                        <a href="PC-GO_DIR_PENAL_EDUARDO_AULA05.php">AULA 05 - GRAVAÇÃO 27/10/2022</a>
                                        <a href="PC-GO_DIR_PENAL_EDUARDO_AULA06.php">AULA 06 - GRAVAÇÃO 11/11/2022</a>
                                        <a href="PC-GO_DIR_PENAL_EDUARDO_AULA07.php">AULA 07 - GRAVAÇÃO 18/11/2022</a>
                                        <a href="PC-GO_DIR_PENAL_EDUARDO_AULA08.php">AULA 08 - GRAVAÇÃO 02/12/2022</a>
                                        <a href="PC-GO_DIR_PENAL_EDUARDO_AULA09.php">AULA 09 - GRAVAÇÃO 02/12/2022</a>
                                        <p></p>
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
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRlm" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1HxUpQ6n8SF97mEXsr3Ydg7WxFCSk410D?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseRlm">
                                    <div class="card card-body">
                                        <a href="PC-GO_RLM_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 23/09/2022</a>
                                        <a href="PC-GO_RLM_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 26/09/2022</a>
                                        <a href="PC-GO_RLM_IGOR_AULA03.php">AULA 03 - GRAVAÇÃO 03/10/2022</a>
                                        <a href="PC-GO_RLM_IGOR_AULA04.php">AULA 04 - GRAVAÇÃO 04/11/2022</a>
                                        <a href="PC-GO_RLM_IGOR_AULA05.php">AULA 05 - GRAVAÇÃO 09/11/2022</a>
                                        <p></p>
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
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDirAdmCleide" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1V-Uu2g51XXqVtakFE3MrDCdo8LoyMJsl?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseDirAdmCleide">
                                    <div class="card card-body">
                                        <a href="PC-GO_DIR_ADM_CLEIDE_AULA01.php">AULA 01 - GRAVAÇÃO 20/09/22</a>
                                        <a href="PC-GO_DIR_ADM_CLEIDE_AULA02.php">AULA 02 - GRAVAÇÃO 21/09/22</a>
                                        <a href="PC-GO_DIR_ADM_CLEIDE_AULA03.php">AULA 03 - GRAVAÇÃO 17/10/22</a>
                                        <a href="PC-GO_DIR_ADM_CLEIDE_AULA04.php">AULA 04 - GRAVAÇÃO 26/10/22</a>
                                        <a href="PC-GO_DIR_ADM_CLEIDE_AULA05.php">AULA 05 - GRAVAÇÃO 16/11/22</a>
                                        <a href="PC-GO_DIR_ADM_CLEIDE_AULA06.php">AULA 06 - GRAVAÇÃO 21/11/22</a>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">PROCESSO PENAL - MARCIANO XAVIER</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCppMarciano" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/190NhH6Y9FUbjoDrjcvd-1cCFdQlmSzYj?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseCppMarciano">
                                    <div class="card card-body">
                                        <a href="PC-GO_PROCESSO_PENAL_MARCIANO_AULA01.php">AULA 01 - GRAVAÇÃO 04/10/2022</a>
                                        <a href="PC-GO_PROCESSO_PENAL_MARCIANO_AULA02.php">AULA 02 - GRAVAÇÃO 13/10/2022</a>
                                        <a href="PC-GO_PROCESSO_PENAL_MARCIANO_AULA03.php">AULA 03 - GRAVAÇÃO 03/11/2022</a>
                                        <a href="PC-GO_PROCESSO_PENAL_MARCIANO_AULA04.php">AULA 04 - GRAVAÇÃO 24/11/2022</a>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">HISTÓRIA E GEOGRAFIA DE GOIÁS - LEANDRO MORAIS</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseHistoriaGenesis" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1s_rBPJwXZTVGSTP8UiEuddEE5eGDIpAr?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseHistoriaGenesis">
                                    <div class="card card-body">
                                        <a href="PC-GO_HISTORIA_GO_LEANDRO_AULA01.php">AULA 01 </a><p></p>
                                        <a href="PC-GO_HISTORIA_GO_LEANDRO_AULA02.php">AULA 02 </a><p></p>
                                        <a href="PC-GO_HISTORIA_GO_LEANDRO_AULA03.php">AULA 03 </a><p></p>
                                        <a href="PC-GO_HISTORIA_GO_LEANDRO_AULA04.php">AULA 04 </a><p></p>
                                        <a href="PC-GO_HISTORIA_GO_LEANDRO_AULA05.php">AULA 05 </a><p></p>
                                        <a href="PC-GO_HISTORIA_GO_LEANDRO_AULA06.php">AULA 06 </a><p></p>
                                        <a href="PC-GO_HISTORIA_GO_LEANDRO_AULA07.php">AULA 07 </a><p></p>
                                        <a href="PC-GO_HISTORIA_GO_LEANDRO_AULA08.php">AULA 08 </a><p></p>
                                        <a href="PC-GO_HISTORIA_GO_LEANDRO_AULA09.php">AULA 09 </a><p></p>
                                        <a href="PC-GO_HISTORIA_GO_LEANDRO_AULA10.php">AULA 10 </a><p></p>
                                        <a href="PC-GO_HISTORIA_GO_LEANDRO_AULA11.php">AULA 11 </a><p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LEGISLAÇÃO PENAL ESPECIAL - MICHELE DONEGÁ</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLegEspMichele" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1irzxz8HdDY78xykbsymsciWn5dn3zws4?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseLegEspMichele">
                                    <div class="card card-body">
                                        <a href="PC-GO_LEG_ESP_MICHELE_AULA01.php">AULA 01 - GRAVAÇÃO 28/09/2022</a>
                                        <a href="PC-GO_LEG_ESP_MICHELE_AULA02.php">AULA 02 - GRAVAÇÃO 07/10/2022</a>
                                        <a href="PC-GO_LEG_ESP_MICHELE_AULA03.php">AULA 03 - GRAVAÇÃO 19/10/2022</a>
                                        <a href="PC-GO_LEG_ESP_MICHELE_AULA04.php">AULA 04 - GRAVAÇÃO 23/11/2022</a>
                                        <a href="PC-GO_LEG_ESP_MICHELE_AULA05.php">AULA 05 - GRAVAÇÃO 25/11/2022</a>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">NOÇÕES CRIMINALISTICAS - FERNANDO DAVOLI</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCrimDavoli" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1jzEsi5G2VFXkAX9nPXyBW4GzuGkF_S3X?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseCrimDavoli">
                                    <div class="card card-body">
                                        <a href="PC-GO_NOCOES_CRIM_DAVOLI_AULA01.php">AULA 01 - GRAVAÇÃO 18/10/2022</a>
                                        <a href="PC-GO_NOCOES_CRIM_DAVOLI_AULA02.php">AULA 02 - GRAVAÇÃO 25/10/2022</a>
                                        <a href="PC-GO_NOCOES_CRIM_DAVOLI_AULA03.php">AULA 03 - GRAVAÇÃO 01/11/2022</a>
                                        <a href="PC-GO_NOCOES_CRIM_DAVOLI_AULA04.php">AULA 04 - GRAVAÇÃO 08/11/2022</a>
                                        <p></p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CRIMES DE TRÂNSITO - ALAN DE OLIVEIRA </h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCrimAlan" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1OoNX3xDrRXJeOUZkVBplaEd3lo6eqVVD?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseCrimAlan">
                                    <div class="card card-body">
                                        <a href="PC-GO_CRIM_ALAN_AULA01.php">AULA 01 - GRAVAÇÃO 10/11/2022</a>
                                        <a href="PC-GO_CRIM_ALAN_AULA02.php">AULA 02 - GRAVAÇÃO 17/11/2022</a>
                                        <p></p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">NOÇÕES DE MEDICINA LEGAL - FERNANDO DAVOLI</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseMedicinaDavoli" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1y6hoEdBwymtDpsoOmSNOl4BokZP2iDyC?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseMedicinaDavoli">
                                    <div class="card card-body">
                                        <a href="PC-GO_MEDICINA_DAVOLI_AULA01.php">AULA 01 - GRAVAÇÃO 22/11/2022</a>
                                        <a href="PC-GO_MEDICINA_DAVOLI_AULA02.php">AULA 02 - GRAVAÇÃO 28/11/2022</a>
                                        <p></p>
                                        <p></p>
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