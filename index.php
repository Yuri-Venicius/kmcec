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

            <h2>Página Inicial</h2>

            <p>Acesse seus cursos disponíveis abaixo</p>
            <p></p>
            <h2>Seus Cursos Disponíveis</h2>
            <p></p>
            <div class="row">

                <?php
                if (
                    $verificaAdm['nivelAcesso'] == '1'
                ) : ?>
                <div class="col-md-12">
                    <h5>Cursos em andamento:
                </div>
                <?php endif; ?>

                <?php
                $codCurso = 3570;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Curso Pós edital Para o Concurso EBSERH – Enfermagem [Online]</h5>
                                <p class="card-text">Curso Pós edital Para o Concurso EBSERH – Enfermagem [Online].
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalEbserhEnfermagem.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 3574;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Curso Pós edital Para o Concurso EBSERH – Básico todos os cargos [Online]</h5>
                                <p class="card-text">Curso Pós edital Para o Concurso EBSERH – Básico todos os cargos [Online].
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalEbserhBasico.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 3575;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Curso para processo seletivo SEDUC/2023 – Professor da Educação Básica [Online]</h5>
                                <p class="card-text">Curso para processo seletivo SEDUC/2023 – Professor da Educação Básica [Online].
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalSeducProfessor.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 3444;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Preparatório Pré-edital para a SES-MT - Básico todos os cargos [Online]</h5>
                                <p class="card-text">Curso Preparatório Pré-edital para a SES-MT - Básico todos os cargos, com atualização
                                    para o PÓS-EDITAL.
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalSesMtComAtualizacaoBasicoTodosOsCargos.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 3448;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Preparatório Pré-edital para a SES-MT - Enfermagem/Téc. de Enfermagem [Online]</h5>
                                <p class="card-text">Curso Preparatório Pré-edital para a SES-MT - Enfermagem/Téc. de Enfermagem, com atualização
                                    para o PÓS-EDITAL.
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalSesMtComAtualizacaoEnfTecEnf.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 3449;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Preparatório Pré-edital para a SES-MT - Farmacêutico [Online]</h5>
                                <p class="card-text">Curso Preparatório Pré-edital para a SES-MT - Farmacêutico, com atualização
                                    para o PÓS-EDITAL.
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalSesMtComAtualizacaoFarmacia.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2834;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO SEFAZ-MT PREPARATÓRIO COMPLETO [Online]</h5>
                                <p class="card-text">Curso preparatório pós edital para a SEFAZ Mato Grosso, Fiscal de tributos estaduais, 
                                    100% on-line, com os melhores professores do Brasil!
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalPre-SEFAZ-2023.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 3527;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">[ENEM] Isoladas do KM – Curso Online de Matemática [Online]</h5>
                                <p class="card-text">Curso preparatório para ENEM, matéria de Matemática
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalIsoladasEnemMatematica2023.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 3528;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">[ENEM] Isoladas do KM – Curso Online de Física [Online]</h5>
                                <p class="card-text">Curso preparatório para ENEM, matéria de Física
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalIsoladasEnemFisica2023.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 3529;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">[ENEM] Isoladas do KM – Curso Online de Química [Online]</h5>
                                <p class="card-text">Curso preparatório para ENEM, matéria de Química
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalIsoladasEnemQuimica2023.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 3530;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">[ENEM] Isoladas do KM – Curso Online de Redação [Online]</h5>
                                <p class="card-text">Curso preparatório para ENEM, matéria de Redação
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalIsoladasEnemRedacao2023.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 3532;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">[ENEM] Isoladas do KM – Curso Online Completo [Online]</h5>
                                <p class="card-text">Curso preparatório para ENEM, matérias de Matemática, Física, Química e Redação.
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalIsoladasEnemCompleto2023.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                if (
                    $verificaAdm['nivelAcesso'] == '1'
                ) : ?>
                <div class="col-md-12">
                    <h5>Cursos ja finalizados:
                </div>
                <?php endif; ?>

                <?php
                $codCurso = 3247;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PARA O CONCURSO DA GUARDA MUNICIPAL DE LUCAS DO RIO VERDE [Online]</h5>
                                <p class="card-text">Curso preparatório para o concurso de Lucas do Rio Verde 2023.
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalLucasRioVerdeGM.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>
                
                <?php
                $codCurso = 603;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    // $_SESSION['usuario'] == 'rhuanvinicios@hotmail.com' || $_SESSION['usuario'] == 'rhuanvinicios@hotmail.com ' || $_SESSION['usuario'] == 'Rhuanvinicios@hotmail.com' || $_SESSION['usuario'] == 'Rhuanvinicios@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'amabili.c.s.fanticheli@gmail.com' || $_SESSION['usuario'] == 'joaovictornohama@gmail.com' || $_SESSION['usuario'] == 'rodrigogeologia22@gmail.com' || $_SESSION['usuario'] == 'glen.ewellin@gmail.com' || $_SESSION['usuario'] == 'loide1441@hotmail.com' || $_SESSION['usuario'] == 'julianocunha216@gmail.com' || $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'ferri77ed@gmail.com' || $_SESSION['usuario'] == 'rubiaglaucia@hotmail.com' || $_SESSION['usuario'] == 'filinto_brandao@hotmail.com' || $_SESSION['usuario'] == 'cleiderribeiro@hotmail.com' || 
                    $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LICITAÇÃO - Lei 8.166/93</h5>
                                <p class="card-text">Curso da Lei 8.166/93 de Licitação.
                                <p>
                                    Ministrado por Profª Cleide Regina.</p>
                                <a href="menuLicitacao.php" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 660;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso)
                ) : ?>
                    <div class="col-sm-6">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Direito Administrativo - Atos Administrativos</h5>
								<p class="card-text">Curso de Atos Administrativos para concursos em geral.
								</p>
								<p>Ministrado por Profª Cleide Regina.</p>
								<a href="menuDirAdmATOS.php" class="btn btn-primary">Acessar</a>
							</div>
						</div>
					</div>
                <?php endif; ?>

                <?php
                $codCurso = 642;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' ||
                    $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">PORTUGUÊS - Macetes e resolução de questões</h5>
                                <p class="card-text">Curso de Língua portuguesa voltado para concursos e com enfoque nos macetes e resoluções de questões.
                                <p>Ministrado por Prof. Luis Carlos Gouveia.
                                </p>
                                <a href="menuPortugues.php" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 714;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Curso de Redação para Concursos</h5>
                                <p class="card-text">Curso preparatório de redação para Concursos
                                </p>
                                <p>Ministrado pelo Profº Luís Carlos Gouveia.</p>
                                <a href="Redacao.php" class="btn btn-primary">Acessar</a>
                                <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 734;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Curso Infrações de Trânsito</h5>
                                <p class="card-text">Curso preparatório de para carreiras policiais e para auxilio nos exames do Detran.</p>
                                </p>
                                <p>Ministrado pelo Profº Alan de Oliveira.</p>
                                <a href="InfracaoTransito_Home.php" class="btn btn-primary">Acessar</a>
                                <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1wmrHKhwjSMsJ7mp90oTeZTHznXXiHVm9&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 797;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Curso de Arquivologia</h5>
                                <p class="card-text">Curso de Arquivologia e exercicios</p>
                                </p>
                                <p>Ministrado pelo Prof. Fernando Davoli</p>
                                <a href="Arquivologia.php" class="btn btn-primary">Acessar</a>
                                <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1LKc_y52WPIQr0l9CdsHoWZv-VDF3LSWT&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 1925;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PREPARATÓRIO PARA CONCURSO SES-MT [PRÉ EDITAL]</h5>
                                <p class="card-text"></p>
                                </p>
                                <a href="PrincipalSES-MT.php" class="btn btn-primary">Acessar Aulas</a>
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 1930;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PREPARATÓRIO PRÉ-EDITAL PARA O CONCURSO DA SEFAZ-MT</h5>
                                <p class="card-text"></p>
                                </p>
                                <a href="PrincipalPre-SEFAZ.php" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2224;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PREPARATÓRIO PARA O CONCURSO DA GUARDA MUNICIPAL DE VG</h5>
                                <p class="card-text"></p>
                                </p>
                                <a href="PrincipalGuardaVG.php" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2317;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PREPARATÓRIO PARA O CONCURSO DA LIMPURB CUIABÁ-MT</h5>
                                <p class="card-text">Curso preparatório para o concursos da Empresa Cuiabana de Limpeza Urbana</p>
                                </p>
                                <a href="PrincipalLimpUrb.php" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2327;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PREPARATÓRIO PARA O CONCURSO DA DPE-MT [BÁSICO TODOS CARGOS]</h5>
                                <p class="card-text">Curso preparatório básico para todos os cargos do concurso da Defensoria Pública do Estado</p>
                                </p>
                                <a href="PrincipalDPEBasico.php" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2329;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PREPARATÓRIO PARA O CONCURSO DA DPE-MT [TÉC. ADMINISTRATIVO]</h5>
                                <p class="card-text">Curso preparatório básico para todos o cargo de técnico Administrativo, nível médio, do concurso da Defensoria Pública do Estado</p>
                                </p>
                                <a href="PrincipalDPETecAdm.php" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2522;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO ISOLADAS PARA CONCURSOS</h5>
                                <p class="card-text">Curso de Isoladas do KM com blocos de RLM, PORTUGUÊS e INFORMÁTICA</p>
                                </p>
                                <p>Ministrado pelos Professores Hélio Taques, Elder Dencati, Igor Brasil, Silvio Bononi e João Cleber.</p>
                                <a href="PrincipalIsoladasKM.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2598;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">QUEBRANDO A BANCA DPE-MT</h5>
                                <p class="card-text">Curso da Turma avançada para o concurso da DPE-MT</p>
                                </p>
                                <a href="PrincipaDpeRetaFinal.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2632;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PARA SMS CUIABÁ-MT - BÁSICO TODOS OS CARGOS</h5>
                                <p class="card-text">Curso preparatório para Secretaria Municipal de Saúde de Cuiabá [Online]</p>
                                </p>
                                <p></p>
                                <a href="PrincipalSMS-CBA-Basico.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2648;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PARA SMS CUIABÁ-MT - TÉCNICO DE ENFERMAGEM</h5>
                                <p class="card-text">Curso preparatório para Secretaria Municipal de Saúde de Cuiabá [Online] - Técnico de Enfermagem</p>
                                </p>
                                <p></p>
                                <a href="PrincipalSMS-CBA-TecEnf.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2650;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PARA SMS CUIABÁ-MT - ENFERMAGEM</h5>
                                <p class="card-text">Curso ONLINE preparatório para a Secretaria Municipal Saúde de Cuiabá - MT para os cargos de Enfermagem</p>
                                </p>
                                <p></p>
                                <a href="PrincipalSMS-CBA-Enf.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2654;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PARA SMS CUIABÁ-MT - TÉCNICO ADMINISTRATIVO</h5>
                                <p class="card-text">Curso ONLINE preparatório para a Secretaria Municipal de Saúde de Cuiabá - MT, para os cargos de Técnico Administrativo.</p>
                                </p>
                                <p></p>
                                <a href="PrincipalSMS-CBA-TecAdm.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2658;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PREPARATÓRIO PARA O CONCURSO DA PC-GO [Online]</h5>
                                <p class="card-text">Curso ONLINE preparatório para o concurso da Polícia Civil de Goiás, curso para todos os cargos.</p>
                                </p>
                                <p></p>
                                <a href="PrincipalPC-GO.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2637;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PREPARATÓRIO PARA O CONCURSO DO INSS [Online]</h5>
                                <p class="card-text">Curso ONLINE preparatório para o concurso do INSS, cargo Técnico do Seguro Social do INSS.</p>
                                </p>
                                <p></p>
                                <a href="PrincipalINSS.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <P></P>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2738;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO') ||

                    $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PREPARATÓRIO AVANÇADO PRÉ-EDITAL PARA A SEFAZ-MT [Online]</h5>
                                <p class="card-text">Curso ONLINE avançado pré-edital preparatório para o concurso da SEFAZ-MT</p>
                                </p>
                                <p></p>
                                <a href="PrincipalPre-SEFAZ-Avancado.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2744;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO') ||

                    $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSOS REGULAR E AVANÇADO PRÉ-EDITAL PARA A SEFAZ-MT [Online]</h5>
                                <p class="card-text">Combo 2 em 1 com os cursos regular e avançado, ambos pré-edital para a SEFAZ-MT</p>
                                </p>
                                <p></p>
                                <a href="PrincipalPre-SEFAZ-2em1.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                

                <?php
                $codCurso = 2883;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PARA O BANCO DO BRASIL [Online]</h5>
                                <p class="card-text">Curso preparatório para o concurso do Banco do Brasil para Escriturário – Agente Comercial/Agente de Tecnologia 
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalBancoDoBrasil.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 2905;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PARA O CONCURSO DO TJ-MT PRÉ EDITAL [Online]</h5>
                                <p class="card-text">Curso preparatório para o concurso do Tribunal de Justiça de MT
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalTJ-MTPre.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 3032;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PARA O CONCURSO DA SES-MT PRÉ-EDITAL - BÁSICO TODOS OS CARGOS [Online]</h5>
                                <p class="card-text">Curso preparatório para o concurso da SES MT, BÁSICO PARA TODOS OS CARGOS pré-edital 2023.
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalSES-MT-Pre-Basicco.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 3037;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PARA O CONCURSO DA SES-MT PRÉ-EDITAL - ENFERMAGEM E TÉCNICO DE ENFERMAGEM [Online]</h5>
                                <p class="card-text">Curso preparatório para o concurso da SES MT, específico para ENFERMAGEM E TÉCNICO DE ENFERMAGEM pré-edital 2023.
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalSES-MT-Pre-Enf-TecEnf.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
                            </div>
                        </div>
                        <p></p>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 3041;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO PARA O CONCURSO DA SES-MT PRÉ-EDITAL - ESPECÍFICO MÉDICO [Online]</h5>
                                <p class="card-text">Curso preparatório para o concurso da SES MT, específico MÉDICO pré-edital 2023.
                                </p>
                                </p>
                                <p></p>
                                <a href="PrincipalSES-MT-Pre-Medico.php" class="btn btn-primary">Acessar</a>
                                <!-- <a style="margin-left: 30px;" href="" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> -->
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