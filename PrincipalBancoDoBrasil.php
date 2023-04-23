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

            <h2>VÍDEO AULAS - CURSO BANCO DO BRASIL</h2>
            <p>Aqui ficam listadas suas vídeos aulas disponíveis, separadas por blocos de conteúdo.
                Para acessar uma aula basta clicar em "Aulas" no bloco do conteúdo referente.</p>

            <?php
            $codCurso = 2883;
            $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
            if (
                $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso)
            ) : ?>

                <div class="row">
                    <div class="col-sm-12">
                        <h3>Conteúdo Bônus: </h3>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO ISOLADAS DO KM</h5>
                                <p class="card-text">
                                    <a style="margin-left: 30px;" href="PrincipalIsoladasKM.php" class="btn btn-primary"><i class="fas fa-book-open"></i> ACESSAR O CURSO</a>
                                </p>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">BÔNUS: INFORMÁTICA - JOÃO CLEBER</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInformaticaJoao" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/13bdxJ4Wy5NrCkXCwmFSRu3YvYogkV0Ru?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseInformaticaJoao">
                                        <div class="card card-body">
                                            <a href="PRE-SEFAZ_INFORMATICA_JOAO_AULA01.php">AULA 01</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_JOAO_AULA02.php">AULA 02</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_JOAO_AULA03.php">AULA 03</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_JOAO_AULA04.php">AULA 04</a><p></p>
                                        </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">BÔNUS: TECNOLOGIA DA INFORMAÇÃO - GABRIEL PACHECO</h5>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInformaticaGabriel" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1Z91l_PlzkDQ95IVZoAdXNt0BtAJ_rvyP?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                    </p>
                                    <div class="collapse" id="collapseInformaticaGabriel">
                                        <div class="card card-body">
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA01.php">AULA 01</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA02.php">AULA 02</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA03.php">AULA 03</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA04.php">AULA 04</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA05.php">AULA 05</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA06.php">AULA 06</a><p></p>
                                            <a href="PRE-SEFAZ_INFORMATICA_PACHECO_AULA07.php">AULA 07</a><p></p>
                                        </div>
                                    </div>    
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">BÔNUS: CURSO DE REDAÇÃO - HÉLIO TAQUES</h5>
								<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRedacaoHelio" aria-expanded="false" aria-controls="collapseExample">
									<i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
								</button>
								<a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1PuN_yrINm9mAblGJh32GrfIgSa_NZRwX?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
								</p>
								<div class="collapse" id="collapseRedacaoHelio">
									<div class="card card-body">
										<a href="REDACAO_UFMT_HELIO_AULA01.php">AULA 01</a>
										<p></p>
										<a href="REDACAO_UFMT_HELIO_AULA02.php">AULA 02</a>
										<p></p>
										<a href="REDACAO_UFMT_HELIO_AULA03.php">AULA 03</a>
										<p></p>
										<a href="REDACAO_UFMT_HELIO_AULA04.php">AULA 04</a>
										<p></p>
										<!-- <a href="POS-DICAS_DAVOLI_AULA01.php">AULA ÚNICA - GRAVAÇÃO 13/02/2022</a>
										<p></p>
										<a href="POS-ATUALIDADES_MARCELO_AULA01.php">AULA COM PROF. MARCELO [ATUALIDADES] - GRAVAÇÃO 06/02/2022</a>
										<p></p>
										<a href="POS-DICAS_DONEGA_AULA01.php">AULA COM PROFª. MICHELE [ATUALIDADES] - GRAVAÇÃO 13/02/2022</a>
										<p></p> -->
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
                                <h5 class="card-title">Bônus: ESTATÍSTICA - IGOR BRASIL</h5>
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

                    <div class="col-md-12">
                        <h3>Conteúdo do curso: </h3>
                    </div>

                    <div class="col-sm-12">
                        <div class="alert alert-primary" role="alert">
                            Acesse clicando  <a href="https://docs.google.com/spreadsheets/d/1gCfhwrTy9BTESiI3G_g5q7xrVp9bX20Gk4kObqkSmFU/edit?usp=sharing" class="alert-link">aqui</a>, o cronograma de gravações deste curso!
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">PORTUGUÊS - ELDER DENCATI</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePortuguesElder" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1j57jQURz9-Y7Voa8KatcDMI65-mvceuJ?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapsePortuguesElder">
                                    <div class="card card-body">
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_ELDER_AULA01.php">AULA 01 - GRAVAÇÃO 30/01/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_ELDER_AULA02.php">AULA 02 - GRAVAÇÃO 08/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_ELDER_AULA03.php">AULA 03 - GRAVAÇÃO 09/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_ELDER_AULA04.php">AULA 04 - GRAVAÇÃO 16/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_ELDER_AULA05.php">AULA 05 - GRAVAÇÃO 04/04/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_ELDER_AULA06.php">AULA 06 - GRAVAÇÃO 19/04/2023</a>
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1REzK8NjFeFCGy5mv4wu7AScDlAJaGjH2?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapsePortuguesGouveia">
                                    <div class="card card-body">
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_GOUVEIA_AULA01.php">AULA 01 - GRAVAÇÃO 27/01/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_GOUVEIA_AULA02.php">AULA 02 - GRAVAÇÃO 15/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_GOUVEIA_AULA03.php">AULA 03 - GRAVAÇÃO 07/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_GOUVEIA_AULA04.php">AULA 04 - GRAVAÇÃO 14/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_GOUVEIA_AULA05.php">AULA 05 - GRAVAÇÃO 21/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_GOUVEIA_AULA06.php">AULA 06 - GRAVAÇÃO 30/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_GOUVEIA_AULA07.php">AULA 07 - GRAVAÇÃO 05/04/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_GOUVEIA_AULA08.php">AULA 08 - GRAVAÇÃO 18/04/2023</a>
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
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1lqgz3rQypx3LyfQy6EV3AZ4lBnLh9l47?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapsePortuguesHelio">
                                    <div class="card card-body">
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_HELIO_AULA01.php">AULA 01 - GRAVAÇÃO 25/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_HELIO_AULA02.php">AULA 02 - GRAVAÇÃO 06/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_PORTUGUES_HELIO_AULA03.php">AULA 03 - GRAVAÇÃO 20/03/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">REDAÇÃO - KELLEN</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRedacaoKellen" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1jhNDj7Ro8o26cuYZFj2N_khFVwJDcyK9?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseRedacaoKellen">
                                    <div class="card card-body">
                                        <a href="BANCO_DO_BRASIL_KELLEN_AULA01.php">AULA 01 - GRAVAÇÃO 13/04/2023</a>
                                        <a href="BANCO_DO_BRASIL_KELLEN_AULA02.php">AULA 02 - GRAVAÇÃO 14/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LÍNGUA INGLESA - JÚNIOR</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInglesJunior" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1ZDODekP9BNyOMwgeVA6k3xeDdjybaJD4?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseInglesJunior">
                                    <div class="card card-body">
                                        <a href="BANCO_DO_BRASIL_INGLES_JUNIOR_AULA01.php">AULA 01 - GRAVAÇÃO 02/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_INGLES_JUNIOR_AULA02.php">AULA 02 - GRAVAÇÃO 09/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_INGLES_JUNIOR_AULA03.php">AULA 03 - GRAVAÇÃO 16/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_INGLES_JUNIOR_AULA04.php">AULA 04 - GRAVAÇÃO 23/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_INGLES_JUNIOR_AULA05.php">AULA 05 - GRAVAÇÃO 02/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_INGLES_JUNIOR_AULA06.php">AULA 06 - GRAVAÇÃO 23/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_INGLES_JUNIOR_AULA07.php">AULA 07 - GRAVAÇÃO 20/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">MATEMÁTICA/ESTATÍSTICA - IGOR BRASIL</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseMatematicaIgor" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1H6-bnEtTRrgTON7COp-Wx1iE4tpu5CGK?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseMatematicaIgor">
                                    <div class="card card-body">
                                        <a href="BANCO_DO_BRASIL_MATEMATICA_IGOR_AULA01.php">AULA 01 - GRAVAÇÃO 23/01/2023</a>
                                        <a href="BANCO_DO_BRASIL_MATEMATICA_IGOR_AULA02.php">AULA 02 - GRAVAÇÃO 31/01/2023</a>
                                        <a href="BANCO_DO_BRASIL_MATEMATICA_IGOR_AULA03.php">AULA 03 - GRAVAÇÃO 01/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_MATEMATICA_IGOR_AULA04.php">AULA 04 - GRAVAÇÃO 06/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_MATEMATICA_IGOR_AULA05.php">AULA 05 - GRAVAÇÃO 14/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_MATEMATICA_IGOR_AULA06.php">AULA 06 - GRAVAÇÃO 27/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_MATEMATICA_IGOR_AULA07.php">AULA 07 - GRAVAÇÃO 28/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_MATEMATICA_IGOR_AULA08.php">AULA 08 - GRAVAÇÃO 24/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_MATEMATICA_IGOR_AULA09.php">AULA 09 - GRAVAÇÃO 28/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_MATEMATICA_IGOR_AULA10.php">AULA 10 - GRAVAÇÃO 08/04/2023</a>
                                        <a href="BANCO_DO_BRASIL_MATEMATICA_IGOR_AULA11.php">AULA 11 - GRAVAÇÃO 11/04/2023</a>
                                        <a href="BANCO_DO_BRASIL_MATEMATICA_IGOR_AULA12.php">AULA 12 - GRAVAÇÃO 21/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ATUALIDADES DO MERCADO FINANCEIRO - FERNANDO DAVOLI</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAtualidadesDavoli" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1VFG355LbLYE9PkkUPBsfnkGczxgUbJFc?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseAtualidadesDavoli">
                                    <div class="card card-body">
                                        <a href="BANCO_DO_BRASIL_ATUALIDADES_DAVOLI_AULA01.php">AULA 01 - GRAVAÇÃO 12/04/2023</a>
                                        <a href="BANCO_DO_BRASIL_ATUALIDADES_DAVOLI_AULA02.php">AULA 02 - GRAVAÇÃO 15/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">INFORMÁTICA - JOÃO CLEBER</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInfoJoao" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/14tG5ZZP-CEiPtcwVjQpXm5De47TQpOG5?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseInfoJoao">
                                    <div class="card card-body">
                                        <a href="BANCO_DO_BRASIL_INFORMATICA_JOAO_AULA01.php">AULA 01 - GRAVAÇÃO 24/01/2023</a>
                                        <a href="BANCO_DO_BRASIL_INFORMATICA_JOAO_AULA02.php">AULA 02 - GRAVAÇÃO 25/01/2023</a>
                                        <a href="BANCO_DO_BRASIL_INFORMATICA_JOAO_AULA03.php">AULA 03 - GRAVAÇÃO 07/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_INFORMATICA_JOAO_AULA04.php">AULA 04 - GRAVAÇÃO 13/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_INFORMATICA_JOAO_AULA05.php">AULA 05 - GRAVAÇÃO 01/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_INFORMATICA_JOAO_AULA06.php">AULA 06 - GRAVAÇÃO 13/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_INFORMATICA_JOAO_AULA07.php">AULA 07 - GRAVAÇÃO 21/04/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div> 

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">INFORMÁTICA - SILVIO BONONI</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInfoSilvio" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1I_8a2ig8iqK9xuOi-jC7adUvxhsFUYZF?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseInfoSilvio">
                                    <div class="card card-body">
                                        <a href="BANCO_DO_BRASIL_INFORMATICA_SILVIO_AULA01.php">AULA 01 - GRAVAÇÃO 31/03/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div> 

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CONHECIMENTOS BANCÁRIOS - FERNANDO DAVOLI</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseBasicosDavoli" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1qWsPIueaynXIQONCrYirBKDoOKXzlt65?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseBasicosDavoli">
                                    <div class="card card-body">
                                        <a href="BANCO_DO_BRASIL_BANCARIO_DAVOLI_AULA01.php">AULA 01 - GRAVAÇÃO 03/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_BANCARIO_DAVOLI_AULAEXTRA.php">AULA EXTRA - RESOLUÇÃO DE QUESTÕES - GRAVAÇÃO 04/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_BANCARIO_DAVOLI_AULA02.php">AULA 02 - GRAVAÇÃO 10/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_BANCARIO_DAVOLI_AULA03.php">AULA 03 - GRAVAÇÃO 17/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_BANCARIO_DAVOLI_AULA04.php">AULA 04 - GRAVAÇÃO 24/02/2023</a>
                                        <a href="BANCO_DO_BRASIL_BANCARIO_DAVOLI_AULA05.php">AULA 05 - GRAVAÇÃO 03/03/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DIREITO ADM/CONHECIMENTOS BANCÁRIOS - CLEIDE REGINA</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseBasicos" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/182rl24NGHUlDTQ7m2zjLZ7x14xG4lvC7?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseBasicos">
                                    <div class="card card-body">
                                        <a href="BANCO_DO_BRASIL_BANCARIO_CLEIDE_AULA01.php">AULA 01 - GRAVAÇÃO 26/01/2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">VENDAS E NEGOCIAÇÕES - FERNANDO DAVOLI</h5>
                                <p class="card-text">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseNegocios" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-play-circle"></i> AULAS DISPONÍVEIS
                                    </button>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1F-3v_D_yeIEvW0rVOPPq4w8vAMAbH38m?usp=share_link" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                                </p>
                                <div class="collapse" id="collapseNegocios">
                                    <div class="card card-body">
                                        <a href="BANCO_DO_BRASIL_VENDAS_DAVOLI_AULA01.php">AULA 01 - GRAVAÇÃO 04/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_VENDAS_DAVOLI_AULA02.php">AULA 02 - GRAVAÇÃO 10/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_VENDAS_DAVOLI_AULA03.php">AULA 03 - GRAVAÇÃO 11/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_VENDAS_DAVOLI_AULA04.php">AULA 04 - GRAVAÇÃO 17/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_VENDAS_DAVOLI_AULA05.php">AULA 05 - GRAVAÇÃO 18/03/2023</a>
                                        <a href="BANCO_DO_BRASIL_VENDAS_DAVOLI_AULA06.php">AULA 06 - GRAVAÇÃO 25/03/2023</a>
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