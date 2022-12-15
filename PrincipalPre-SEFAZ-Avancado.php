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

            <h2>VÍDEO AULAS - SEFAZ PRÉ-EDITAL AVANÇADO</h2>
            <p>Aqui ficam listadas suas vídeos aulas disponíveis, separadas por blocos de conteúdo.
                Para acessar uma aula basta clicar em "Aulas" no bloco do conteúdo referente, e para fazer o
                download do material de apoio do bloco, basta clicar em "Materiais" que o Download irá começar.</p>

            <?php
            $codCurso = 2738;
            $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
            if (
                $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso)
            ) : ?>

                <div class="row">

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">PORTUGUÊS - HÉLIO TAQUES</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesHelio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/18LV4cAkStXPuS-aSLlod1lcrtmfl_5e7?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapsePortuguesHelio">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_PORTUGUES_HELIO_AULA01.php">AULA 01 - GRAVAÇÃO 24/11/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_PORTUGUES_HELIO_AULA02.php">AULA 02 - GRAVAÇÃO 13/12/2022</a><p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - PORTUGUÊS - HENRIQUE CASTELO BRANCO</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesHenrique" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1ieLE33kx00UIaLJcmPjGMLUVdA99FY5w?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapsePortuguesHenrique">
                                    <div class="card card-body">
                                        <!-- <a href="PRE-SEFAZ-AVANCADO_PORTUGUES_HENRIQUE_AULA01.php">AULA 01 - GRAVAÇÃO 11/04/2022</a><p></p>  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - MATEMÁTICA FINANCEIRA - IGOR BRASIL</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseMatematicaIgor" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1ynpm8oRIzQdCItCZz7j9E2rx7LTMzQ3E?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseMatematicaIgor">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_MATEMATICA_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 18/10/2022 </a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_MATEMATICA_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 01/11/2022 </a><p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - RACIOCÍNIO LÓGICO - IGOR BRASIL</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRLMIgor" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1K22PvJMzZyOiKnTUmg93t5i5I4Wm1Q2q?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseRLMIgor">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_RLM_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 18/10/2022 </a><p></p> 
                                        <a href="PRE-SEFAZ-AVANCADO_RLM_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 12/12/2022 </a><p></p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - HISTÓRIA MT - CARLOS BIDU</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseHistoriaCarlao" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1tPLpSF_xx9ud3gh5bnkdblXRRiC721kj?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseHistoriaCarlao">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_HISTORIA_BIDU_AULA01.php">AULA 01 - GRAVAÇÃO 20/10/2022</a><p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - GEOGRAFIA - FANAIA</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseGeografiaMarcelo" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1pDSYqKYkLIfjiGgC8yUJm1JKigdy7fZF?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseGeografiaMarcelo">
                                    <div class="card card-body">
                                        <!-- <a href="PRE-SEFAZ-AVANCADO_GEOGRAFIA_MARCELO_AULA01.php">AULA 01 - GRAVAÇÃO 11/05/2022</a><p></p>  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - INFORMÁTICA - JOÃO CLEBER</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInformaticaJoao" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1vzS2i_3G3CKIYRpvmHasCTkmBEvciKEm?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseInformaticaJoao">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_INFORMATICA_JOAO_AULA01.php">AULA 01 - GRAVAÇÃO 24/10/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_INFORMATICA_JOAO_AULA02.php">AULA 02 - GRAVAÇÃO 25/10/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_INFORMATICA_JOAO_AULA03.php">AULA 03 - GRAVAÇÃO 31/10/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_INFORMATICA_JOAO_AULA04.php">AULA 04 - GRAVAÇÃO 11/11/2022</a><p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - INFORMÁTICA - SILVIO BONONI</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInformaticaSilvio" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1qAMg96RLR0FlPzBBNf1qSeBssJYquda5?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseInformaticaSilvio">
                                    <div class="card card-body">
                                        <!-- <a href="PRE-SEFAZ-AVANCADO_INFORMATICA_SILVIO_AULA01.php">AULA 01 - GRAVAÇÃO 19/04/2022</a><p></p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <!-- <div class="col-sm-6">
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
                                            <a href="PRE-SEFAZ-AVANCADO_INFORMATICA_PACHECO_AULA01.php">AULA 01 - GRAVAÇÃO 27/06/2022</a><p></p>
                                        </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div> -->

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - LTE - ANDRÉ FANTONI</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLteAndre" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1S8MF7NVs3lyS0xOCE_5tstjEn2gs6RVv?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseLteAndre">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_LTE_FANTONI_AULA01.php">AULA 01 - GRAVAÇÃO 09/11/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_LTE_FANTONI_AULA02.php">AULA 02 - GRAVAÇÃO 14/11/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_LTE_FANTONI_AULA03.php">AULA 03 - GRAVAÇÃO 22/11/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_LTE_FANTONI_AULA04.php">AULA 04 - GRAVAÇÃO 29/11/2022</a><p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - DIREITO TRIBUTÁRIO - LÍGIA DONINI</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTribLigia" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1Eg5yzUhPIEcr2ZcOYGfG2JnH4uea6ptl?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseTribLigia">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_TRIBUTARIO_LIGIA_AULA01.php">AULA 01 - GRAVAÇÃO 26/10/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_TRIBUTARIO_LIGIA_AULA02.php">AULA 02 - GRAVAÇÃO 16/11/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_TRIBUTARIO_LIGIA_AULA03.php">AULA 03 - GRAVAÇÃO 23/11/2022</a><p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - DIR. CONSTITUCIONAL - JOSÉ NETO</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseConstNeto" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1iWOVkkJRjpG9lbaV6QJTf-D_iUor9VxL?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseConstNeto">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_CONSTITUCIONAL_NETO_AULA01.php">AULA 01 - GRAVAÇÃO 21/10/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_CONSTITUCIONAL_NETO_AULA02.php">AULA 02 - GRAVAÇÃO 01/12/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_CONSTITUCIONAL_NETO_AULA03.php">AULA 03 - GRAVAÇÃO 21/10/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_CONSTITUCIONAL_NETO_AULA04.php">AULA 04 - GRAVAÇÃO 08/12/2022</a><p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - DIR. ADMINISTRATIVO - CLEIDE REGINA</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAdmCleide" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1HUQkKdxcVToungFFNkdWUmNByzhccuE6?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseAdmCleide">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_DIREITO_ADM_CLEIDE_AULA01.php">AULA 01 - GRAVAÇÃO 27/10/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_DIREITO_ADM_CLEIDE_AULA02.php">AULA 02 - GRAVAÇÃO 17/11/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_DIREITO_ADM_CLEIDE_AULA03.php">AULA 03 - GRAVAÇÃO 28/11/2022</a><p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - DIREITO PENAL - EDUARDO ROBERTO</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePenalEduardo" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/15pRQkUsyAAkTZXgJ2v8c8gSgaOfhjA--?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapsePenalEduardo">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_PENAL_EDUARDO_AULA01.php">AULA 01 - GRAVAÇÃO 28/10/2022</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_PENAL_EDUARDO_AULA02.php">AULA 02 - GRAVAÇÃO 10/11/2022</a><p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - CONTABILIDADE GERAL - DANIEL MERRELES</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseContabilidadeDaniel" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1r8MWfrD5tfQMjcvoJiytT6R5toP0Fwb8?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseContabilidadeDaniel">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_CONTABILIDADE_DANIEL_AULA01.php">AULA 01 - GRAVAÇÃO 17/10/22</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_CONTABILIDADE_DANIEL_AULA02.php">AULA 02 - GRAVAÇÃO 19/10/22</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_CONTABILIDADE_DANIEL_AULA03.php">AULA 03 - GRAVAÇÃO 04/11/22</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_CONTABILIDADE_DANIEL_AULA04.php">AULA 04 - GRAVAÇÃO 08/11/22</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_CONTABILIDADE_DANIEL_AULA05.php">AULA 05 - GRAVAÇÃO 21/11/22</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_CONTABILIDADE_DANIEL_AULA06.php">AULA 06 - GRAVAÇÃO 26/11/22</a><p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - AUDITORIA - TONIVAN CARVALHO - ONLINE</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAuditoriaAndre" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1fTkByaAI3WdA4DkO3ZTMvhXu8JyGAW-a?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseAuditoriaAndre">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_AUDITORIA_TONIVAN_AULA01.php">AULA 01</a><p></p> 
                                        <a href="PRE-SEFAZ-AVANCADO_AUDITORIA_TONIVAN_AULA02.php">AULA 02</a><p></p> 
                                        <a href="PRE-SEFAZ-AVANCADO_AUDITORIA_TONIVAN_AULA03.php">AULA 03</a><p></p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - DIR. EMPRESARIAL - JOSÉ NETO</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEmpresJose" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1rEjliBa7BoEoBwWZCOfBo82LY588N2yY?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseEmpresJose">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_EMPRESARIAL_NETO_AULA01.php">AULA 01 - GRAVAÇÃO 08/12/2022</a><p></p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - ESTATISTICA - IGOR BRASIL</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEstatisticaIgor" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1PWuPjfpoShHlGx7ZLjJVUgOgFpo6lxnA?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseEstatisticaIgor">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_ESTATISTICA_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 07/11/2022</a><p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>
                    
                    <!-- <div class="col-sm-6">
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
                                            <a href="PRE-SEFAZ-AVANCADO_CBL_FUMAUX_AULA01.php">AULA 01 - GRAVAÇÃO 08/07/22</a><p></p> 
                                            <a href="PRE-SEFAZ-AVANCADO_CBL_FUMAUX_AULA02.php">AULA 02 - GRAVAÇÃO 09/07/22</a><p></p> 
                                            <a href="PRE-SEFAZ-AVANCADO_CBL_FUMAUX_AULA03.php">AULA 03 - GRAVAÇÃO 09/07/22</a><p></p> 
                                            <a href="PRE-SEFAZ-AVANCADO_CBL_FUMAUX_AULA04.php">AULA 04 - GRAVAÇÃO 10/07/22</a><p></p> 
                                            <a href="PRE-SEFAZ-AVANCADO_CBL_FUMAUX_AULA05.php">AULA 05 - GRAVAÇÃO 23/07/22</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div> -->

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AVANÇADO - CUSTOS - DANIEL MERRELES</h5>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCustosDaniel" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                </button>
                                <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1VwurLNEUKC9gjR42jaB2OPkJIoiMlsFo?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseCustosDaniel">
                                    <div class="card card-body">
                                        <a href="PRE-SEFAZ-AVANCADO_CONTABILIDADE_CUSTOS_DANIEL_AULA01.php">AULA 01 - GRAVAÇÃO 06/12/22</a><p></p>
                                        <a href="PRE-SEFAZ-AVANCADO_CONTABILIDADE_CUSTOS_DANIEL_AULA02.php">AULA 02 - GRAVAÇÃO 07/12/22</a><p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <!-- <div class="col-sm-6">
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
                                            <a href="PRE-SEFAZ-AVANCADO_ETICA_DOUGLAS_AULA01.php">AULA 01 - GRAVAÇÃO 03/08/2022</a><p></p> 
                                            <a href="PRE-SEFAZ-AVANCADO_ETICA_DOUGLAS_AULA02.php">AULA 02 - GRAVAÇÃO 08/08/2022</a><p></p> 
                                        </div>
                                        </div>
                            </div>
                    </div><p></p>
                </div> -->

                    <!-- <div class="col-sm-6">
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
                </div> -->

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