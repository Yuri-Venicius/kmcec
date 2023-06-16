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

                <div>
                    <h2>CURSOS JA FINALIZADOS:
                </div>

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
                    // $_SESSION['usuario'] == 'advandresampaio@gmail.com' || $_SESSION['usuario'] == 'advandresampaio@gmail.com' || $_SESSION['usuario'] == 'Advandresampaio@gmail.com ' || $_SESSION['usuario'] == 'Advandresampaio@gmail.com ' ||
                    // $_SESSION['usuario'] == 'edcleise_augusta@hotmail.com' || $_SESSION['usuario'] == 'edcleise_augusta@hotmail.com ' || $_SESSION['usuario'] == 'Edcleise_augusta@hotmail.com' || $_SESSION['usuario'] == 'Edcleise_augusta@hotmail.com ' || 
                    // $_SESSION['usuario'] == 'brunoendic@gmail.com' || $_SESSION['usuario'] == 'brunoendic@gmail.com ' || $_SESSION['usuario'] == 'Brunoendic@gmail.com' || $_SESSION['usuario'] == 'Brunoendic@gmail.com ' || 
                    // $_SESSION['usuario'] == 'carolinelauren22@gmail.com' || $_SESSION['usuario'] == 'carolinelauren22@gmail.com ' || $_SESSION['usuario'] == 'Carolinelauren22@gmail.com' || $_SESSION['usuario'] == 'Carolinelauren22@gmail.com ' || 
                    // $_SESSION['usuario'] == 'cristgasilva27@gmail.com' || $_SESSION['usuario'] == 'cristgasilva27@gmail.com ' || 
                    // $_SESSION['usuario'] == 'vitor.paulo.tec@gmail.com' || $_SESSION['usuario'] == 'bianca_monezi@outlook.com' || $_SESSION['usuario'] == 'cleitondireitopm@gmail.com' || 
                    // $_SESSION['usuario'] == 'joseaparecidoibvc@hotmail.com' || $_SESSION['usuario'] == 'durvafjunior@gmail.com' || $_SESSION['usuario'] == 'leonardofga@bol.com' || 
                    // $_SESSION['usuario'] == 'wily.fla1@gmail.com' || $_SESSION['usuario'] == 'edelsonselva.mt@hotmail.com' ||
                    // $_SESSION['usuario'] == 'vivianeconceicaopaula@gmail.com' || $_SESSION['usuario'] == 'vanessa_amorimagro@hotmail.com' || 
                    // $_SESSION['usuario'] == 'bruno.fully@hotmail.com' || $_SESSION['usuario'] == 'jucicleyinacio@hotmail.com' || 
                    // $_SESSION['usuario'] == 'xavier.eduardofernando@gmail.com' || $_SESSION['usuario'] == 'andressa.balzak@hotmail.com' || $_SESSION['usuario'] == 'polyana.bmedeiros@gmail.com' | $_SESSION['usuario'] == 'matheus.andriu7@gmail.com' || $_SESSION['usuario'] == 'gabrielgomeshonorato@gmail.com' || $_SESSION['usuario'] == 'williandavgmt@gmail.com' || $_SESSION['usuario'] == 'guegaribeiro@hotmail.com' || $_SESSION['usuario'] == 'advandresampaio@gmail.com' || $_SESSION['usuario'] == 'leonardofga@bol.com.br' || 
                    // $_SESSION['usuario'] == 'jurandir_rodrigues@hotmail.com' || $_SESSION['usuario'] == 'simonecampanham@yahoo.com.br' || $_SESSION['usuario'] == 'simonecampanham@yahoo.com.br ' || 
                    // $_SESSION['usuario'] == 'camilabezbs@hotmail.com' || $_SESSION['usuario'] == 'mario.binny@hotmail.com' || $_SESSION['usuario'] == 'emvwanderson@gmail.com' || $_SESSION['usuario'] == 'mandinha.brito16@hotmail.com' || $_SESSION['usuario'] == 'juliomoraes161@gmail.com' || $_SESSION['usuario'] == 'jhony_tody@hotmail.com' || $_SESSION['usuario'] == 'li_benta@hotmail.com' || $_SESSION['usuario'] == 'isadora.nunes2@hotmail.com' || $_SESSION['usuario'] == 'marcio_2011@hotmail.com' ||
                    // $_SESSION['usuario'] == 'glacioneide.nascimento@gmail.com' || $_SESSION['usuario'] == 'rayane01_santo@hotmail.com' ||
                    // $_SESSION['usuario'] == 'jormagalhaes@hotmail.com' || $_SESSION['usuario'] == 'wesleydu@gmail.com' ||
                    // $_SESSION['usuario'] == 'keylacj@hotmail.com' || $_SESSION['usuario'] == 'concurseiro.alfacba@gmail.com' ||
                    // $_SESSION['usuario'] == 'estilarmoveis@bol.com.br' || $_SESSION['usuario'] == 'valzinhaba@gmail.com' ||
                    // $_SESSION['usuario'] == 'eduardopc1703@gmail.com' || $_SESSION['usuario'] == 'valdecirr.maurilio@gmail.com' ||
                    // $_SESSION['usuario'] == 'alexalexanderneves@gmail.com' || $_SESSION['usuario'] == 'primave.7@gmail.com' ||
                    // $_SESSION['usuario'] == 'grunwaldluciana9@gmail.com' || $_SESSION['usuario'] == 'jlt1carvalho@gmail.com' ||
                    // $_SESSION['usuario'] == 'concurseira25112017@gmail.com' || $_SESSION['usuario'] == 'shirleybatista65@hotmail.com' ||
                    // $_SESSION['usuario'] == 'jvmcarmo@hotmail.com' || $_SESSION['usuario'] == 'mari100686@gmail.com' ||
                    // $_SESSION['usuario'] == 'ericaquintino86@hotmail.com' || $_SESSION['usuario'] == 'juninhu_branco@hotmail.com' ||
                    // $_SESSION['usuario'] == 'cecymiranda20@hotmail.com' || $_SESSION['usuario'] == 'euvanefs@gmail.com' || $_SESSION['usuario'] == 'euvanefs@gmail.com ' || $_SESSION['usuario'] == 'Euvanefs@gmail.com' || 
                    // $_SESSION['usuario'] == 'abnbribeiro@gmail.com' || $_SESSION['usuario'] == 'alexsandre13cibm@gmail.com' ||
                    // $_SESSION['usuario'] == 'dilian.hitnan@gmail.com' || $_SESSION['usuario'] == 'karoldipietro@gmail.com' ||
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

                    // $_SESSION['usuario'] == 'diego_cardoso19@hotmail.com' || $_SESSION['usuario'] == 'diego_cardoso19@hotmail.com ' || $_SESSION['usuario'] == 'Diego_cardoso19@hotmail.com' || $_SESSION['usuario'] == 'Diego_cardoso19@hotmail.com ' || 
                    // $_SESSION['usuario'] == 'vivianfrodrigues@gmail.com' || $_SESSION['usuario'] == 'vivianfrodrigues@gmail.com ' || $_SESSION['usuario'] == 'Vivianfrodrigues@gmail.com' || $_SESSION['usuario'] == 'Vivianfrodrigues@gmail.com ' || 
                    // $_SESSION['usuario'] == 'oodnan@live.com' || $_SESSION['usuario'] == 'oodnan@live.com ' || $_SESSION['usuario'] == 'Oodnan@live.com ' || $_SESSION['usuario'] == 'Oodnan@live.com' || 
                    // $_SESSION['usuario'] == 'bianca_monezi@outlook.com' || $_SESSION['usuario'] == 'cristgasilva27@gmail.com' || $_SESSION['usuario'] == 'cristgasilva27@gmail.com ' || 
                    // $_SESSION['usuario'] == 'franklynfranca@hotmail.com' || $_SESSION['usuario'] == 'andressah_23costa@hotmail.com' || $_SESSION['usuario'] == 'crislenne@hotmail.com' || 
                    // $_SESSION['usuario'] == 'edisoulofgold@gmail.com' || $_SESSION['usuario'] == 'keylacj@hotmail.com' || 
                    // $_SESSION['usuario'] == 'juliomoraes161@gmail.com' || $_SESSION['usuario'] == 'jhony_tody@hotmail.com' || $_SESSION['usuario'] == 'alexsandre13cibm@gmail.com' || 
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

                    // $_SESSION['usuario'] == 'wily.fla1@gmail.com' || $_SESSION['usuario'] == 'wily.fla1@gmail.com' || $_SESSION['usuario'] == 'Wily.fla1@gmail.com' || $_SESSION['usuario'] == 'Wily.fla1@gmail.com ' ||
                    // $_SESSION['usuario'] == 'juliomoraes161@gmail.com' || $_SESSION['usuario'] == 'jhony_tody@hotmail.com' || $_SESSION['usuario'] == 'alandeoliveirasgt@hotmail.com' ||
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

                    // $_SESSION['usuario'] == 'rhuanvinicios@hotmail.com' || $_SESSION['usuario'] == 'rhuanvinicios@hotmail.com ' || $_SESSION['usuario'] == 'Rhuanvinicios@hotmail.com' || $_SESSION['usuario'] == 'Rhuanvinicios@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'helderlucaslourenso@gmail.com' || $_SESSION['usuario'] == 'marcio_2011@hotmail.com' || $_SESSION['usuario'] == 'yvenicios@gmail.com' || 
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

                    // $_SESSION['usuario'] == 'viniciusdaniel.s@hotmail.com' || $_SESSION['usuario'] == 'viniciusdaniel.s@hotmail.com ' || $_SESSION['usuario'] == 'Viniciusdaniel.s@hotmail.com' || $_SESSION['usuario'] == 'Viniciusdaniel.s@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'jessica-amorim912@hotmail.com' || $_SESSION['usuario'] == 'jessica-amorim912@hotmail.com ' || $_SESSION['usuario'] == 'Jessica-amorim912@hotmail.com' || $_SESSION['usuario'] == 'Jessica-amorim912@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'amanda_infinito@hotmail.com' || $_SESSION['usuario'] == 'amanda_infinito@hotmail.com ' || $_SESSION['usuario'] == 'Amanda_infinito@hotmail.com' || $_SESSION['usuario'] == 'Amanda_infinito@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'renato.adama@gmail.com' || $_SESSION['usuario'] == 'renato.adama@gmail.com ' || $_SESSION['usuario'] == 'Renato.adama@gmail.com' || $_SESSION['usuario'] == 'Renato.adama@gmail.com ' ||
                    // $_SESSION['usuario'] == 'juniormjrr@hotmail.com' || $_SESSION['usuario'] == 'juniormjrr@hotmail.com ' || $_SESSION['usuario'] == 'Juniormjrr@hotmail.com' || $_SESSION['usuario'] == 'Juniormjrr@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'jessicaborges.bastos@gmail.com' || $_SESSION['usuario'] == 'jessicaborges.bastos@gmail.com ' || $_SESSION['usuario'] == 'Jessicaborges.bastos@gmail.com' || $_SESSION['usuario'] == 'Jessicaborges.bastos@gmail.com ' ||
                    // $_SESSION['usuario'] == 'leonel.passos@hotmail.com' || $_SESSION['usuario'] == 'leonel.passos@hotmail.com ' || $_SESSION['usuario'] == 'Leonel.passos@hotmail.com' || $_SESSION['usuario'] == 'Leonel.passos@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'santos.gf18@gmail.com' || $_SESSION['usuario'] == 'santos.gf18@gmail.com ' || $_SESSION['usuario'] == 'Santos.gf18@gmail.com' || $_SESSION['usuario'] == 'Santos.gf18@gmail.com ' ||
                    // $_SESSION['usuario'] == 'nanda_rdf@hotmail.com' || $_SESSION['usuario'] == 'nanda_rdf@hotmail.com ' || $_SESSION['usuario'] == 'Nanda_rdf@hotmail.com' || $_SESSION['usuario'] == 'Nanda_rdf@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'apms21@bol.com.br' || $_SESSION['usuario'] == 'apms21@bol.com.br ' || $_SESSION['usuario'] == 'Apms21@bol.com.br' || $_SESSION['usuario'] == 'Apms21@bol.com.br ' ||
                    // $_SESSION['usuario'] == 'anapedra902011@gmail.com' || $_SESSION['usuario'] == 'anapedra902011@gmail.com ' || $_SESSION['usuario'] == 'Anapedra902011@gmail.com' || $_SESSION['usuario'] == 'Anapedra902011@gmail.com ' ||
                    // $_SESSION['usuario'] == 'hugo_blecha@hotmail.com' || $_SESSION['usuario'] == 'hugo_blecha@hotmail.com ' || $_SESSION['usuario'] == 'Hugo_blecha@hotmail.com' || $_SESSION['usuario'] == 'Hugo_blecha@hotmail.com ' 
                    // $_SESSION['usuario'] == 'diegoss_efl@hotmail.com' || $_SESSION['usuario'] == 'diegoss_efl@hotmail.com ' || $_SESSION['usuario'] == 'Diegoss_efl@hotmail.com' || $_SESSION['usuario'] == 'Diegoss_efl@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'farmaceuticamt@gmail.com' || $_SESSION['usuario'] == 'farmaceuticamt@gmail.com ' || $_SESSION['usuario'] == 'Farmaceuticamt@gmail.com' || $_SESSION['usuario'] == 'Farmaceuticamt@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'josiane.cw@hotmail.com' || $_SESSION['usuario'] == 'josiane.cw@hotmail.com ' || $_SESSION['usuario'] == 'Josiane.cw@hotmail.com' || $_SESSION['usuario'] == 'Josiane.cw@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'sibele.1972@hotmail.com' || $_SESSION['usuario'] == 'sibele.1972@hotmail.com ' || $_SESSION['usuario'] == 'Sibele.1972@hotmail.com' || $_SESSION['usuario'] == 'Sibele.1972@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'alerdemoraes@yahoo.com.br' || $_SESSION['usuario'] == 'alerdemoraes@yahoo.com.br ' || $_SESSION['usuario'] == 'Alerdemoraes@yahoo.com.br' || $_SESSION['usuario'] == 'Alerdemoraes@yahoo.com.br ' ||
                    // $_SESSION['usuario'] == 'thaysmorais92@hotmail.com' || $_SESSION['usuario'] == 'thaysmorais92@hotmail.com ' || $_SESSION['usuario'] == 'Thaysmorais92@hotmail.com' || $_SESSION['usuario'] == 'Thaysmorais92@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'mateusfelipeamaral2009@hotmail.com' || $_SESSION['usuario'] == 'mateusfelipeamaral2009@hotmail.com ' || $_SESSION['usuario'] == 'Mateusfelipeamaral2009@hotmail.com' || $_SESSION['usuario'] == 'Mateusfelipeamaral2009@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'archavarelli@gmail.com' || $_SESSION['usuario'] == 'archavarelli@gmail.com ' || $_SESSION['usuario'] == 'Archavarelli@gmail.com' || $_SESSION['usuario'] == 'Archavarelli@gmail.com ' ||
                    // $_SESSION['usuario'] == 'alanwaldir@hotmail.com' || $_SESSION['usuario'] == 'alanwaldir@hotmail.com ' || $_SESSION['usuario'] == 'Alanwaldir@hotmail.com' || $_SESSION['usuario'] == 'Alanwaldir@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'biancamartinscosta@hotmail.com' || $_SESSION['usuario'] == 'biancamartinscosta@hotmail.com ' || $_SESSION['usuario'] == 'Biancamartinscosta@hotmail.com' || $_SESSION['usuario'] == 'Biancamartinscosta@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'hellennayanne@hotmail.com' || $_SESSION['usuario'] == 'hellennayanne@hotmail.com ' || $_SESSION['usuario'] == 'Hellennayanne@hotmail.com' || $_SESSION['usuario'] == 'Hellennayanne@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'fcristina.fisio@gmail.com' || $_SESSION['usuario'] == 'fcristina.fisio@gmail.com ' || $_SESSION['usuario'] == 'Fcristina.fisio@gmail.com' || $_SESSION['usuario'] == 'Fcristina.fisio@gmail.com ' ||
                    // $_SESSION['usuario'] == 'juyabio08@gmail.com' || $_SESSION['usuario'] == 'juyabio08@gmail.com ' || $_SESSION['usuario'] == 'Juyabio08@gmail.com' || $_SESSION['usuario'] == 'Juyabio08@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rodriguesvelozoadriana@gmail.com' || $_SESSION['usuario'] == 'rodriguesvelozoadriana@gmail.com ' || $_SESSION['usuario'] == 'Rodriguesvelozoadriana@gmail.com' || $_SESSION['usuario'] == 'Rodriguesvelozoadriana@gmail.com ' ||
                    // $_SESSION['usuario'] == 'marcos.vick11@hotmail.com' || $_SESSION['usuario'] == 'marcos.vick11@hotmail.com ' || $_SESSION['usuario'] == 'Marcos.vick11@hotmail.com' || $_SESSION['usuario'] == 'Marcos.vick11@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'jozielymendes@hotmail.com' || $_SESSION['usuario'] == 'jozielymendes@hotmail.com ' || $_SESSION['usuario'] == 'Jozielymendes@hotmail.com' || $_SESSION['usuario'] == 'Jozielymendes@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'dorileo.marcia@gmail.com' || $_SESSION['usuario'] == 'dorileo.marcia@gmail.com ' || $_SESSION['usuario'] == 'Dorileo.marcia@gmail.com' || $_SESSION['usuario'] == 'Dorileo.marcia@gmail.com ' ||
                    // $_SESSION['usuario'] == 'leticiadallbello@hotmail.com' || $_SESSION['usuario'] == 'leticiadallbello@hotmail.com ' || $_SESSION['usuario'] == 'Leticiadallbello@hotmail.com' || $_SESSION['usuario'] == 'Leticiadallbello@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'monicapaularibeirosilva@gmail.com' || $_SESSION['usuario'] == 'monicapaularibeirosilva@gmail.com ' || $_SESSION['usuario'] == 'Monicapaularibeirosilva@gmail.com' || $_SESSION['usuario'] == 'Monicapaularibeirosilva@gmail.com ' ||
                    // $_SESSION['usuario'] == 'talitaqvaz@gmail.com' || $_SESSION['usuario'] == 'talitaqvaz@gmail.com ' || $_SESSION['usuario'] == 'Talitaqvaz@gmail.com' || $_SESSION['usuario'] == 'Talitaqvaz@gmail.com ' ||
                    // $_SESSION['usuario'] == 'davipintopai@hotmail.com' || $_SESSION['usuario'] == 'davipintopai@hotmail.com ' || $_SESSION['usuario'] == 'Davipintopai@hotmail.com' || $_SESSION['usuario'] == 'Davipintopai@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'arrudacamposfilho@gmail.com' || $_SESSION['usuario'] == 'arrudacamposfilho@gmail.com ' || $_SESSION['usuario'] == 'Arrudacamposfilho@gmail.com' || $_SESSION['usuario'] == 'Arrudacamposfilho@gmail.com ' ||
                    // $_SESSION['usuario'] == 'carlosafcampos2@gmail.com' || $_SESSION['usuario'] == 'carlosafcampos2@gmail.com ' || $_SESSION['usuario'] == 'Carlosafcampos2@gmail.com' || $_SESSION['usuario'] == 'Carlosafcampos2@gmail.com ' ||
                    // $_SESSION['usuario'] == 'weltonmari@hotmail.com' || $_SESSION['usuario'] == 'weltonmari@hotmail.com ' || $_SESSION['usuario'] == 'Weltonmari@hotmail.com' || $_SESSION['usuario'] == 'Weltonmari@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'nathaliaot19@gmail.com' || $_SESSION['usuario'] == 'nathaliaot19@gmail.com ' || $_SESSION['usuario'] == 'Nathaliaot19@gmail.com' || $_SESSION['usuario'] == 'Nathaliaot19@gmail.com ' ||
                    // $_SESSION['usuario'] == 'quevllin10@gmail.com' || $_SESSION['usuario'] == 'quevllin10@gmail.com ' || $_SESSION['usuario'] == 'Quevllin10@gmail.com' || $_SESSION['usuario'] == 'Quevllin10@gmail.com ' ||
                    // $_SESSION['usuario'] == 'lucasgoncalvessilva72@gmail.com' || $_SESSION['usuario'] == 'lucasgoncalvessilva72@gmail.com ' || $_SESSION['usuario'] == 'Lucasgoncalvessilva72@gmail.com' || $_SESSION['usuario'] == 'Lucasgoncalvessilva72@gmail.com ' ||
                    // $_SESSION['usuario'] == 'nana_cristinaa@hotmail.com' || $_SESSION['usuario'] == 'nana_cristinaa@hotmail.com ' || $_SESSION['usuario'] == 'Nana_cristinaa@hotmail.com' || $_SESSION['usuario'] == 'Nana_cristinaa@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'marcosantos505@outlook.com' || $_SESSION['usuario'] == 'marcosantos505@outlook.com ' || $_SESSION['usuario'] == 'Marcosantos505@outlook.com' || $_SESSION['usuario'] == 'Marcosantos505@outlook.com ' ||
                    // $_SESSION['usuario'] == 'polylemes@hotmail.com' || $_SESSION['usuario'] == 'polylemes@hotmail.com ' || $_SESSION['usuario'] == 'Polylemes@hotmail.com' || $_SESSION['usuario'] == 'Polylemes@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'miguelsq1993@gmail.com' || $_SESSION['usuario'] == 'miguelsq1993@gmail.com ' || $_SESSION['usuario'] == 'Miguelsq1993@gmail.com' || $_SESSION['usuario'] == 'Miguelsq1993@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jordanajam@hotmail.com' || $_SESSION['usuario'] == 'jordanajam@hotmail.com ' || $_SESSION['usuario'] == 'Jordanajam@hotmail.com' || $_SESSION['usuario'] == 'Jordanajam@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'kedyma_aguiar@hotmail.com' || $_SESSION['usuario'] == 'kedyma_aguiar@hotmail.com ' || $_SESSION['usuario'] == 'Kedyma_aguiar@hotmail.com' || $_SESSION['usuario'] == 'Kedyma_aguiar@hotmail.com ' ||
                    // // $_SESSION['usuario'] == 'luilyan14@gmail.com' || $_SESSION['usuario'] == 'luilyan14@gmail.com ' || $_SESSION['usuario'] == 'Luilyan14@gmail.com' || $_SESSION['usuario'] == 'Luilyan14@gmail.com ' || 
                    // $_SESSION['usuario'] == 'Kelltrycamila@gmail.com' || $_SESSION['usuario'] == 'Kelltrycamila@gmail.com ' || $_SESSION['usuario'] == 'kelltrycamila@gmail.com' || $_SESSION['usuario'] == 'kelltrycamila@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'waleria.cunha@hotmail.com' || $_SESSION['usuario'] == 'waleria.cunha@hotmail.com ' || $_SESSION['usuario'] == 'Waleria.cunha@hotmail.com' || $_SESSION['usuario'] == 'Waleria.cunha@hotmail.com ' || 
                    // // $_SESSION['usuario'] == 'wanymaga@gmail.com' || $_SESSION['usuario'] == 'wanymaga@gmail.com ' || $_SESSION['usuario'] == 'Wanymaga@gmail.com' || $_SESSION['usuario'] == 'Wanymaga@gmail.com ' || 
                    // $_SESSION['usuario'] == 'Adarleniassis@gmail.com' || $_SESSION['usuario'] == 'Adarleniassis@gmail.com ' || $_SESSION['usuario'] == 'adarleniassis@gmail.com' || $_SESSION['usuario'] == 'adarleniassis@gmail.com ' ||
                    // $_SESSION['usuario'] == 'admsaguiar@gmail.com' || $_SESSION['usuario'] == 'admsaguiar@gmail.com ' || $_SESSION['usuario'] == 'Admsaguiar@gmail.com' || $_SESSION['usuario'] == 'Admsaguiar@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'Marcelliborges64@gmail.com' || $_SESSION['usuario'] == 'Marcelliborges64@gmail.com ' || $_SESSION['usuario'] == 'marcelliborges64@gmail.com' || $_SESSION['usuario'] == 'marcelliborges64@gmail.com ' || 
                    // $_SESSION['usuario'] == 'silviapops24@outlook.com' ||  $_SESSION['usuario'] == 'silviapops24@outlook.com ' ||  $_SESSION['usuario'] == 'Silviapops24@outlook.com' ||  $_SESSION['usuario'] == 'Silviapops24@outlook.com ' ||
                    // // $_SESSION['usuario'] == 'adarleniassis@gmail.com' ||  $_SESSION['usuario'] == 'adarleniassis@gmail.com ' ||  $_SESSION['usuario'] == 'Adarleniassis@gmail.com' ||  $_SESSION['usuario'] == 'Adarleniassis@gmail.com ' || 	
                    // $_SESSION['usuario'] == 'thaisdelimajimenez@gmail.com' ||  $_SESSION['usuario'] == 'thaisdelimajimenez@gmail.com ' ||  $_SESSION['usuario'] == 'Thaisdelimajimenez@gmail.com' ||  $_SESSION['usuario'] == 'Thaisdelimajimenez@gmail.com ' ||
                    // $_SESSION['usuario'] == 'Helinhotaques@gmail.com' || $_SESSION['usuario'] == 'Helinhotaques@gmail.com ' || $_SESSION['usuario'] == 'helinhotaques@gmail.com' || $_SESSION['usuario'] == 'helinhotaques@gmail.com ' ||
                    // $_SESSION['usuario'] == 'larigomes012@gmail.com' || $_SESSION['usuario'] == 'larigomes012@gmail.com ' || $_SESSION['usuario'] == 'Larigomes012@gmail.com' || $_SESSION['usuario'] == 'Larigomes012@gmail.com ' ||
                    // $_SESSION['usuario'] == 'edmello.901977@gmail.com' || $_SESSION['usuario'] == 'edmello.901977@gmail.com ' || $_SESSION['usuario'] == 'Edmello.901977@gmail.com' || $_SESSION['usuario'] == 'Edmello.901977@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jayna.nunes@gmail.com' || $_SESSION['usuario'] == 'jayna.nunes@gmail.com ' || $_SESSION['usuario'] == 'Jayna.nunes@gmail.com' || $_SESSION['usuario'] == 'Jayna.nunes@gmail.com ' ||
                    // $_SESSION['usuario'] == 'geize.siqueira@hotmail.com' || $_SESSION['usuario'] == 'geize.siqueira@hotmail.com ' || $_SESSION['usuario'] == 'Geize.siqueira@hotmail.com' || $_SESSION['usuario'] == 'Geize.siqueira@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'arasaniger@hotmail.com' || $_SESSION['usuario'] == 'arasaniger@hotmail.com ' || $_SESSION['usuario'] == 'Arasaniger@hotmail.com' || $_SESSION['usuario'] == 'Arasaniger@hotmail.com ' ||
                    // // $_SESSION['usuario'] == 'rosepires1@outlook.com' || $_SESSION['usuario'] == 'rosepires1@outlook.com ' || $_SESSION['usuario'] == 'Rosepires1@outlook.com' || $_SESSION['usuario'] == 'Rosepires1@outlook.com ' || 
                    // // $_SESSION['usuario'] == 'wanymaga@gmail.com' || $_SESSION['usuario'] == 'wanymaga@gmail.com ' || $_SESSION['usuario'] == 'Wanymaga@gmail.com' || $_SESSION['usuario'] == 'Wanymaga@gmail.com ' || 
                    // // $_SESSION['usuario'] == 'admsaguiar@gmail.com' || $_SESSION['usuario'] == 'admsaguiar@gmail.com ' || $_SESSION['usuario'] == 'Admsaguiar@gmail.com ' || $_SESSION['usuario'] == 'Admsaguiar@gmail.com' || 
                    // $_SESSION['usuario'] == 'Marlialexandrina@hotmail.com ' || $_SESSION['usuario'] == 'Marlialexandrina@hotmail.com  ' || $_SESSION['usuario'] == 'marlialexandrina@hotmail.com ' || $_SESSION['usuario'] == 'marlialexandrina@hotmail.com  ' ||
                    // $_SESSION['usuario'] == 'lindineymds@gmail.com' || $_SESSION['usuario'] == 'lindineymds@gmail.com ' || $_SESSION['usuario'] == 'Lindineymds@gmail.com' || $_SESSION['usuario'] == 'Lindineymds@gmail.com ' ||
                    // $_SESSION['usuario'] == 'roselystraficantti@gmail.com' || $_SESSION['usuario'] == 'roselystraficantti@gmail.com ' || $_SESSION['usuario'] == 'Roselystraficantti@gmail.com' || $_SESSION['usuario'] == 'Roselystraficantti@gmail.com ' ||
                    // $_SESSION['usuario'] == 'fabiana.letras@hotmail.com' || $_SESSION['usuario'] == 'fabiana.letras@hotmail.com ' || $_SESSION['usuario'] == 'Fabiana.letras@hotmail.com' || $_SESSION['usuario'] == 'Fabiana.letras@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'josiane193@hotmail.com' || $_SESSION['usuario'] == 'josiane193@hotmail.com ' || $_SESSION['usuario'] == 'Josiane193@hotmail.com' || $_SESSION['usuario'] == 'Josiane193@hotmail.com ' ||
                    // // $_SESSION['usuario'] == 'laresari15@hotmail.com' || $_SESSION['usuario'] == 'laresari15@hotmail.com ' || $_SESSION['usuario'] == 'Laresari15@hotmail.com' || $_SESSION['usuario'] == 'Laresari15@hotmail.com ' || 
                    // // $_SESSION['usuario'] == 'marcelliborges65@gmail.com' || $_SESSION['usuario'] == 'marcelliborges65@gmail.com ' || $_SESSION['usuario'] == 'Marcelliborges65@gmail.com' || $_SESSION['usuario'] == 'Marcelliborges65@gmail.com ' || 
                    // $_SESSION['usuario'] == 'rosepires1@outlook.com' || $_SESSION['usuario'] == 'rosepires1@outlook.com ' || $_SESSION['usuario'] == 'Rosepires1@outlook.com' || $_SESSION['usuario'] == 'Rosepires1@outlook.com ' ||
                    // // $_SESSION['usuario'] == 'thainam18@hotmail.com' || $_SESSION['usuario'] == 'thainam18@hotmail.com ' || $_SESSION['usuario'] == 'Thainam18@hotmail.com' || $_SESSION['usuario'] == 'Thainam18@hotmail.com ' || 
                    // $_SESSION['usuario'] == 'cecymiranda20@hotmail.com' || $_SESSION['usuario'] == 'cecymiranda20@hotmail.com ' || $_SESSION['usuario'] == 'Cecymiranda20@hotmail.com' || $_SESSION['usuario'] == 'Cecymiranda20@hotmail.com ' ||
                    // // $_SESSION['usuario'] == 'elemary@terra.com.br' || $_SESSION['usuario'] == 'elemary@terra.com.br ' || $_SESSION['usuario'] == 'Elemary@terra.com.br' || $_SESSION['usuario'] == 'Elemary@terra.com.br ' || 
                    // $_SESSION['usuario'] == 'rosanamoreiracc@hotmail.com' || $_SESSION['usuario'] == 'rosanamoreiracc@hotmail.com ' || $_SESSION['usuario'] == 'Rosanamoreiracc@hotmail.com' || $_SESSION['usuario'] == 'Rosanamoreiracc@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'monica.figueiredo23@hotmail.com' || $_SESSION['usuario'] == 'monica.figueiredo23@hotmail.com' || $_SESSION['usuario'] == 'Monica.figueiredo23@hotmail.com' || $_SESSION['usuario'] == 'Monica.figueiredo23@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'candido.kezia@gmail.com' || $_SESSION['usuario'] == 'candido.kezia@gmail.com ' || $_SESSION['usuario'] == 'Candido.kezia@gmail.com' || $_SESSION['usuario'] == 'Candido.kezia@gmail.com ' ||
                    // $_SESSION['usuario'] == 'valzinhaba@gmail.com' || $_SESSION['usuario'] == 'valzinhaba@gmail.com ' || $_SESSION['usuario'] == 'Valzinhaba@gmail.com' ||
                    // $_SESSION['usuario'] == 'aury_rodrigues@hotmail.com' || $_SESSION['usuario'] == 'aury_rodrigues@hotmail.com ' || $_SESSION['usuario'] == 'Aury_rodrigues@hotmail.com' ||
                    // $_SESSION['usuario'] == 'nusabr8@yahoo.com.br' || $_SESSION['usuario'] == 'nusabr8@yahoo.com.br ' || $_SESSION['usuario'] == 'Nusabr8@yahoo.com.br' ||
                    // $_SESSION['usuario'] == 'lusantana_1@hotmail.com' || $_SESSION['usuario'] == 'lusantana_1@hotmail.com ' || $_SESSION['usuario'] == 'Lusantana_1@hotmail.com' ||
                    // // $_SESSION['usuario'] == 'kelltrycamila@gmail.com' || $_SESSION['usuario'] == 'kelltrycamila@gmail.com ' || $_SESSION['usuario'] == 'Kelltrycamila@gmail.com' || 
                    // $_SESSION['usuario'] == '1edson.esa@gmail.com' || $_SESSION['usuario'] == '1edson.esa@gmail.com ' || $_SESSION['usuario'] == 'edson.esa@gmail.com' ||
                    // $_SESSION['usuario'] == 'geomazzer@hotmail.com' || $_SESSION['usuario'] == 'geomazzer@hotmail.com ' || $_SESSION['usuario'] == 'Geomazzer@hotmail.com' ||
                    // $_SESSION['usuario'] == 'gorete.fo@gmail.com' || $_SESSION['usuario'] == 'gorete.fo@gmail.com ' || $_SESSION['usuario'] == 'Gorete.fo@gmail.com' ||
                    // $_SESSION['usuario'] == 'silvia.mayumi@live.com' || $_SESSION['usuario'] == 'silvia.mayumi@live.com ' || $_SESSION['usuario'] == 'Silvia.mayumi@live.com' ||
                    // $_SESSION['usuario'] == 'adailtonpireli@gmail.com' || $_SESSION['usuario'] == 'adailtonpireli@gmail.com ' || $_SESSION['usuario'] == 'Adailtonpireli@gmail.com' ||
                    // $_SESSION['usuario'] == 'danielcesar77@hotmail.com' || $_SESSION['usuario'] == 'danielcesar77@hotmail.com ' || $_SESSION['usuario'] == 'Danielcesar77@hotmail.com' ||
                    // $_SESSION['usuario'] == 'tatianavendascba@gmail.com' || $_SESSION['usuario'] == 'tatianavendascba@gmail.com ' || $_SESSION['usuario'] == 'Tatianavendascba@gmail.com' ||
                    // $_SESSION['usuario'] == 'carolina.parussolo.arq@gmail.com' || $_SESSION['usuario'] == 'carolina.parussolo.arq@gmail.com ' || $_SESSION['usuario'] == 'Carolina.parussolo.arq@gmail.com' ||
                    // $_SESSION['usuario'] == 'milenatam21@gmail.com' || $_SESSION['usuario'] == 'milenatam21@gmail.com ' || $_SESSION['usuario'] == 'Milenatam21@gmail.com' ||
                    // $_SESSION['usuario'] == 'rosemeireerayssa@hotmail.com' || $_SESSION['usuario'] == 'rosemeireerayssa@hotmail.com ' || $_SESSION['usuario'] == 'Rosemeireerayssa@hotmail.com' ||
                    // $_SESSION['usuario'] == 'ludy.fonseca@hotmail.com' || $_SESSION['usuario'] == 'ludy.fonseca@hotmail.com ' || $_SESSION['usuario'] == 'Ludy.fonseca@hotmail.com' ||
                    // $_SESSION['usuario'] == 'walnelucia-m-d@hotmail.com' || $_SESSION['usuario'] == 'walnelucia-m-d@hotmail.com ' || $_SESSION['usuario'] == 'Walnelucia-m-d@hotmail.com' ||
                    // // $_SESSION['usuario'] == 'elwys_dyego@hotmail.com' || $_SESSION['usuario'] == 'elwys_dyego@hotmail.com ' || $_SESSION['usuario'] == 'Elwys_dyego@hotmail.com' || 
                    // // $_SESSION['usuario'] == 'jeenifer.am@gmail.com' || $_SESSION['usuario'] == 'jeenifer.am@gmail.com ' || $_SESSION['usuario'] == 'Jeenifer.am@gmail.com' || 
                    // // $_SESSION['usuario'] == 'josimara_c@yahoo.com.br' || $_SESSION['usuario'] == 'josimara_c@yahoo.com.br ' || $_SESSION['usuario'] == 'Josimara_c@yahoo.com.br' || 
                    // // $_SESSION['usuario'] == 'silvia.rubiana@outlook.com' || $_SESSION['usuario'] == 'silvia.rubiana@outlook.com ' || $_SESSION['usuario'] == 'Silvia.rubiana@outlook.com' || 
                    // // $_SESSION['usuario'] == 'veniciushenrique@hotmail.com' || $_SESSION['usuario'] == 'veniciushenrique@hotmail.com ' || $_SESSION['usuario'] == 'Veniciushenrique@hotmail.com' || 
                    // // $_SESSION['usuario'] == 'lumen_10@hotmail.com' || $_SESSION['usuario'] == 'lumen_10@hotmail.com ' || $_SESSION['usuario'] == 'Lumen_10@hotmail.com' || 
                    // // $_SESSION['usuario'] == 'brendamendes_10@hotmail.com' || $_SESSION['usuario'] == 'brendamendes_10@hotmail.com ' || $_SESSION['usuario'] == 'Brendamendes_10@hotmail.com' || 
                    // // $_SESSION['usuario'] == 'crisconq@hotmail.com' || $_SESSION['usuario'] == 'crisconq@hotmail.com ' || $_SESSION['usuario'] == 'Crisconq@hotmail.com' || 
                    // // $_SESSION['usuario'] == 'isabelafinger@hotmail.com' || $_SESSION['usuario'] == 'isabelafinger@hotmail.com ' || $_SESSION['usuario'] == 'Isabelafinger@hotmail.com' || 
                    // // $_SESSION['usuario'] == 'nathifernandes@gmail.com' || $_SESSION['usuario'] == 'nathifernandes@gmail.com ' || $_SESSION['usuario'] == 'Nathifernandes@gmail.com' || 
                    // // $_SESSION['usuario'] == 'robson.alexandre@hotmail.com' || $_SESSION['usuario'] == 'robson.alexandre@hotmail.com ' || $_SESSION['usuario'] == 'Robson.alexandre@hotmail.com' || 
                    // // $_SESSION['usuario'] == 'antonioaccioly@hotmail.com' || $_SESSION['usuario'] == 'antonioaccioly@hotmail.com ' || $_SESSION['usuario'] == 'Antonioaccioly@hotmail.com' || 
                    // // $_SESSION['usuario'] == 'mariadelourdelleo@hotmail.com' || $_SESSION['usuario'] == 'mariadelourdelleo@hotmail.com ' || $_SESSION['usuario'] == 'Mariadelourdelleo@hotmail.com' || 
                    // // $_SESSION['usuario'] == 'adryellecandido98@gmail.com' || $_SESSION['usuario'] == 'adryellecandido98@gmail.com ' || $_SESSION['usuario'] == 'Adryellecandido98@gmail.com' || 
                    // // $_SESSION['usuario'] == 'tiago-enf@hotmail.com' || $_SESSION['usuario'] == 'tiago-enf@hotmail.com ' || $_SESSION['usuario'] == 'Tiago-enf@hotmail.com' || 
                    // // $_SESSION['usuario'] == 'ceciliamartinhasilva@gmail.com' || $_SESSION['usuario'] == 'ceciliamartinhasilva@gmail.com ' || $_SESSION['usuario'] == 'Ceciliamartinhasilva@gmail.com' || 
                    // // $_SESSION['usuario'] == 'adrianelucaa@gmail.com' || $_SESSION['usuario'] == 'adrianelucaa@gmail.com ' || $_SESSION['usuario'] == 'Adrianelucaa@gmail.com' || 
                    // // $_SESSION['usuario'] == 'josiane.cw@hotmail.com' || $_SESSION['usuario'] == 'josiane.cw@hotmail.com ' || $_SESSION['usuario'] == 'Josiane.cw@hotmail.com' || 
                    // // $_SESSION['usuario'] == 'anap_rondon@hotmail.com' || $_SESSION['usuario'] == 'anap_rondon@hotmail.com ' || $_SESSION['usuario'] == 'Anap_rondon@hotmail.com' || 
                    // // $_SESSION['usuario'] == 'nubiaangelster@gmail.com' || $_SESSION['usuario'] == 'nubiaangelster@gmail.com ' || $_SESSION['usuario'] == 'Nubiaangelster@gmail.com' || 
                    // // $_SESSION['usuario'] == 'marcylenepinheiro1@gmail.com' || $_SESSION['usuario'] == 'marcylenepinheiro1@gmail.com ' || $_SESSION['usuario'] == 'Marcylenepinheiro1@gmail.com' || 
                    // // $_SESSION['usuario'] == 'ligiabeatriz.araujo@gmail.com' || $_SESSION['usuario'] == 'ligiabeatriz.araujo@gmail.com ' || $_SESSION['usuario'] == 'Ligiabeatriz.araujo@gmail.com' || 
                    // // $_SESSION['usuario'] == 'vieiralessandra23@gmail.com' || $_SESSION['usuario'] == 'vieiralessandra23@gmail.com ' || $_SESSION['usuario'] == 'Vieiralessandra23@gmail.com' || 
                    // $_SESSION['usuario'] == 'cristgasilva27@gmail.com' || $_SESSION['usuario'] == 'cristgasilva27@gmail.com ' || $_SESSION['usuario'] == 'Cristgasilva27@gmail.com' ||
                    // $_SESSION['usuario'] == 'vitor.mateuscampos762@gmail.com' || $_SESSION['usuario'] == 'vitor.mateuscampos762@gmail.com ' || $_SESSION['usuario'] == 'Vitor.mateuscampos762@gmail.com' ||
                    // $_SESSION['usuario'] == 'andrielimoreiragregorio21@gmail.com' || $_SESSION['usuario'] == 'andrielimoreiragregorio21@gmail.com ' || $_SESSION['usuario'] == 'Andrielimoreiragregorio21@gmail.com' ||
                    // $_SESSION['usuario'] == 'eduardopc1703@gmail.com' || $_SESSION['usuario'] == 'eduardopc1703@gmail.com ' || $_SESSION['usuario'] == 'Eduardopc1703@gmail.com' ||
                    // $_SESSION['usuario'] == 'elizangela_amar@hotmail.com' || $_SESSION['usuario'] == 'elizangela_amar@hotmail.com ' || $_SESSION['usuario'] == 'Elizangela_amar@hotmail.com' ||
                    // $_SESSION['usuario'] == 'rosat2673@gmail.com' || $_SESSION['usuario'] == 'rosat2673@gmail.com ' || $_SESSION['usuario'] == 'Rosat2673@gmail.com' ||
                    // $_SESSION['usuario'] == 'lindineymds@hotmail.com' || $_SESSION['usuario'] == 'lindineymds@hotmail.com ' || $_SESSION['usuario'] == 'Lindineymds@hotmail.com' ||
                    // $_SESSION['usuario'] == 'franciellerodrigues.ses@gmail.com' || $_SESSION['usuario'] == 'franciellerodrigues.ses@gmail.com ' || $_SESSION['usuario'] == 'Franciellerodrigues.ses@gmail.com' ||
                    // $_SESSION['usuario'] == 'natalia.evelyn@hotmail.com' || $_SESSION['usuario'] == 'natalia.evelyn@hotmail.com ' || $_SESSION['usuario'] == 'Natalia.evelyn@hotmail.com' ||
                    // $_SESSION['usuario'] == 'helyenadias@hotmail.com' || $_SESSION['usuario'] == 'helyenadias@hotmail.com ' || $_SESSION['usuario'] == 'Helyenadias@hotmail.com' ||
                    // $_SESSION['usuario'] == 'katherine.mt@hotmail.com' || $_SESSION['usuario'] == 'katherine.mt@hotmail.com ' || $_SESSION['usuario'] == 'Katherine.mt@hotmail.com' ||
                    // $_SESSION['usuario'] == 'katiall2005@gmail.com' || $_SESSION['usuario'] == 'katiall2005@gmail.com ' || $_SESSION['usuario'] == 'Katiall2005@gmail.com' ||
                    // $_SESSION['usuario'] == 'lidi.pardo@gmail.com' || $_SESSION['usuario'] == 'lidi.pardo@gmail.com ' || $_SESSION['usuario'] == 'Lidi.pardo@gmail.com' ||
                    // $_SESSION['usuario'] == 'laurafarmaunic@gmail.com' || $_SESSION['usuario'] == 'laurafarmaunic@gmail.com ' || $_SESSION['usuario'] == 'Laurafarmaunic@gmail.com' ||
                    // $_SESSION['usuario'] == 'vandafreitas2011@gmail.com' || $_SESSION['usuario'] == 'vandafreitas2011@gmail.com ' || $_SESSION['usuario'] == 'Vandafreitas2011@gmail.com' || $_SESSION['usuario'] == 'Vandafreitas2011@gmail.com ' ||
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

                    $_SESSION['usuario'] == 'france_alves@hotmail.com' || $_SESSION['usuario'] == 'france_alves@hotmail.com ' || $_SESSION['usuario'] == 'France_alves@hotmail.com' || $_SESSION['usuario'] == 'France_alves@hotmail.com ' ||
                    $_SESSION['usuario'] == 'philippe_figueiredo1@hotmail.com' || $_SESSION['usuario'] == 'philippe_figueiredo1@hotmail.com ' || $_SESSION['usuario'] == 'Philippe_figueiredo1@hotmail.com' || $_SESSION['usuario'] == 'Philippe_figueiredo1@hotmail.com ' ||
                    $_SESSION['usuario'] == 'vitor09ams@gmail.com' || $_SESSION['usuario'] == 'vitor09ams@gmail.com ' || $_SESSION['usuario'] == 'Vitor09ams@gmail.com' || $_SESSION['usuario'] == 'Vitor09ams@gmail.com ' ||
                    $_SESSION['usuario'] == 'djavan19@hotmail.com' || $_SESSION['usuario'] == 'djavan19@hotmail.com ' || $_SESSION['usuario'] == 'Djavan19@hotmail.com' || $_SESSION['usuario'] == 'Djavan19@hotmail.com ' ||
                    $_SESSION['usuario'] == 'leonardo-vini@hotmail.com' || $_SESSION['usuario'] == 'leonardo-vini@hotmail.com ' || $_SESSION['usuario'] == 'Leonardo-vini@hotmail.com' || $_SESSION['usuario'] == 'Leonardo-vini@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'miguelfbezerra@hotmail.com' || $_SESSION['usuario'] == 'miguelfbezerra@hotmail.com ' || $_SESSION['usuario'] == 'Miguelfbezerra@hotmail.com' || $_SESSION['usuario'] == 'Miguelfbezerra@hotmail.com ' || 
                    $_SESSION['usuario'] == 'coutoevilelaeng@gmail.com' || $_SESSION['usuario'] == 'coutoevilelaeng@gmail.com ' || $_SESSION['usuario'] == 'Coutoevilelaeng@gmail.com' || $_SESSION['usuario'] == 'Coutoevilelaeng@gmail.com ' ||
                    $_SESSION['usuario'] == 'alineqfreitass@gmail.com' || $_SESSION['usuario'] == 'alineqfreitass@gmail.com ' || $_SESSION['usuario'] == 'Alineqfreitass@gmail.com' || $_SESSION['usuario'] == 'Alineqfreitass@gmail.com ' ||
                    $_SESSION['usuario'] == 'magnorodrigues2578@gmail.com' || $_SESSION['usuario'] == 'magnorodrigues2578@gmail.com ' || $_SESSION['usuario'] == 'Magnorodrigues2578@gmail.com' || $_SESSION['usuario'] == 'Magnorodrigues2578@gmail.com ' ||
                    $_SESSION['usuario'] == 'gabi.borges.barbosa@gmail.com' || $_SESSION['usuario'] == 'gabi.borges.barbosa@gmail.com ' || $_SESSION['usuario'] == 'Gabi.borges.barbosa@gmail.com' || $_SESSION['usuario'] == 'Gabi.borges.barbosa@gmail.com ' ||
                    $_SESSION['usuario'] == 'edu_rlopes@hotmail.com' || $_SESSION['usuario'] == 'edu_rlopes@hotmail.com ' || $_SESSION['usuario'] == 'Edu_rlopes@hotmail.com' || $_SESSION['usuario'] == 'Edu_rlopes@hotmail.com ' ||
                    $_SESSION['usuario'] == 'hilcaberty@hotmail.com' || $_SESSION['usuario'] == 'hilcaberty@hotmail.com ' || $_SESSION['usuario'] == 'Hilcaberty@hotmail.com' || $_SESSION['usuario'] == 'Hilcaberty@hotmail.com ' ||
                    $_SESSION['usuario'] == 'Ivoooliveira123@gmail.com' || $_SESSION['usuario'] == 'Ivoooliveira123@gmail.com ' || $_SESSION['usuario'] == 'ivoooliveira123@gmail.com' || $_SESSION['usuario'] == 'ivoooliveira123@gmail.com ' ||
                    $_SESSION['usuario'] == 'eng.karinasantos@outlook.com' || $_SESSION['usuario'] == 'eng.karinasantos@outlook.com ' || $_SESSION['usuario'] == 'Eng.karinasantos@outlook.com' || $_SESSION['usuario'] == 'Eng.karinasantos@outlook.com ' ||
                    $_SESSION['usuario'] == 'fernandodavoli@gmail.com.br' || $_SESSION['usuario'] == 'fernandodavoli@gmail.com.br ' || $_SESSION['usuario'] == 'Fernandodavoli@gmail.com.br' || $_SESSION['usuario'] == 'Fernandodavoli@gmail.com.br ' ||
                    $_SESSION['usuario'] == 'admnielli@gmail.com' || $_SESSION['usuario'] == 'admnielli@gmail.com ' || $_SESSION['usuario'] == 'Admnielli@gmail.com' || $_SESSION['usuario'] == 'Admnielli@gmail.com ' ||
                    $_SESSION['usuario'] == 'larissamorais.ctb@outlook.com' || $_SESSION['usuario'] == 'larissamorais.ctb@outlook.com ' || $_SESSION['usuario'] == 'Larissamorais.ctb@outlook.com' || $_SESSION['usuario'] == 'Larissamorais.ctb@outlook.com ' ||
                    $_SESSION['usuario'] == 'anabeatriz.amorim@hotmail.com' || $_SESSION['usuario'] == 'anabeatriz.amorim@hotmail.com ' || $_SESSION['usuario'] == 'Anabeatriz.amorim@hotmail.com' || $_SESSION['usuario'] == 'Anabeatriz.amorim@hotmail.com ' ||
                    $_SESSION['usuario'] == 'marta_irias@hotmail.com' || $_SESSION['usuario'] == 'marta_irias@hotmail.com ' || $_SESSION['usuario'] == 'Marta_irias@hotmail.com' || $_SESSION['usuario'] == 'Marta_irias@hotmail.com ' ||
                    $_SESSION['usuario'] == 'kamyllaqueiroz@live.com' || $_SESSION['usuario'] == 'kamyllaqueiroz@live.com ' || $_SESSION['usuario'] == 'Kamyllaqueiroz@live.com' || $_SESSION['usuario'] == 'Kamyllaqueiroz@live.com ' ||
                    $_SESSION['usuario'] == 'leilianaazevedo26@gmail.com' || $_SESSION['usuario'] == 'leilianaazevedo26@gmail.com ' || $_SESSION['usuario'] == 'Leilianaazevedo26@gmail.com' || $_SESSION['usuario'] == 'Leilianaazevedo26@gmail.com ' ||
                    $_SESSION['usuario'] == 'ronei.marins@gmail.com' || $_SESSION['usuario'] == 'ronei.marins@gmail.com ' || $_SESSION['usuario'] == 'Ronei.marins@gmail.com' || $_SESSION['usuario'] == 'Ronei.marins@gmail.com ' ||
                    $_SESSION['usuario'] == 'michelyvechi@hotmail.com' || $_SESSION['usuario'] == 'michelyvechi@hotmail.com ' || $_SESSION['usuario'] == 'Michelyvechi@hotmail.com' || $_SESSION['usuario'] == 'Michelyvechi@hotmail.com ' ||
                    $_SESSION['usuario'] == 'plpj2002@hotmail.com' || $_SESSION['usuario'] == 'plpj2002@hotmail.com ' || $_SESSION['usuario'] == 'Plpj2002@hotmail.com' || $_SESSION['usuario'] == 'Plpj2002@hotmail.com ' ||
                    $_SESSION['usuario'] == 'jane_witch@hotmail.com' || $_SESSION['usuario'] == 'jane_witch@hotmail.com ' || $_SESSION['usuario'] == 'Jane_witch@hotmail.com' || $_SESSION['usuario'] == 'Jane_witch@hotmail.com ' ||
                    $_SESSION['usuario'] == 'deboraaparruda@hotmail.com' || $_SESSION['usuario'] == 'deboraaparruda@hotmail.com ' || $_SESSION['usuario'] == 'Deboraaparruda@hotmail.com' || $_SESSION['usuario'] == 'Deboraaparruda@hotmail.com' ||
                    $_SESSION['usuario'] == 'soaresunic@gmail.com' || $_SESSION['usuario'] == 'soaresunic@gmail.com ' || $_SESSION['usuario'] == 'Soaresunic@gmail.com' || $_SESSION['usuario'] == 'Soaresunic@gmail.com ' ||
                    $_SESSION['usuario'] == 'lauravtr@hotmail.com' || $_SESSION['usuario'] == 'lauravtr@hotmail.com ' || $_SESSION['usuario'] == 'Lauravtr@hotmail.com' || $_SESSION['usuario'] == 'Lauravtr@hotmail.com ' ||
                    $_SESSION['usuario'] == 'luizmaguilar@gmail.com' || $_SESSION['usuario'] == 'luizmaguilar@gmail.com ' || $_SESSION['usuario'] == 'Luizmaguilar@gmail.com' || $_SESSION['usuario'] == 'Luizmaguilar@gmail.com ' ||
                    $_SESSION['usuario'] == 'radelgomt@yahoo.com.br' || $_SESSION['usuario'] == 'radelgomt@yahoo.com.br ' || $_SESSION['usuario'] == 'Radelgomt@yahoo.com.br' || $_SESSION['usuario'] == 'Radelgomt@yahoo.com.br ' ||
                    $_SESSION['usuario'] == 'kelvi.kls@hotmail.com' || $_SESSION['usuario'] == 'kelvi.kls@hotmail.com ' || $_SESSION['usuario'] == 'Kelvi.kls@hotmail.com' || $_SESSION['usuario'] == 'Kelvi.kls@hotmail.com ' ||
                    $_SESSION['usuario'] == 'contatoandremauri@gmail.com' || $_SESSION['usuario'] == 'contatoandremauri@gmail.com ' || $_SESSION['usuario'] == 'Contatoandremauri@gmail.com' || $_SESSION['usuario'] == 'Contatoandremauri@gmail.com ' ||
                    $_SESSION['usuario'] == 'gabriela.p.souza@hotmail.com' || $_SESSION['usuario'] == 'gabriela.p.souza@hotmail.com ' || $_SESSION['usuario'] == 'Gabriela.p.souza@hotmail.com' || $_SESSION['usuario'] == 'Gabriela.p.souza@hotmail.com ' ||
                    $_SESSION['usuario'] == 'mirrair.adm@gmail.com' || $_SESSION['usuario'] == 'mirrair.adm@gmail.com ' || $_SESSION['usuario'] == 'Mirrair.adm@gmail.com' || $_SESSION['usuario'] == 'Mirrair.adm@gmail.com ' ||
                    $_SESSION['usuario'] == 'Helinhotaques@gmail.com' || $_SESSION['usuario'] == 'Helinhotaques@gmail.com ' || $_SESSION['usuario'] == 'helinhotaques@gmail.com' || $_SESSION['usuario'] == 'helinhotaques@gmail.com ' ||
                    $_SESSION['usuario'] == 'concursosefazmt2022@gmail.com' || $_SESSION['usuario'] == 'concursosefazmt2022@gmail.com ' || $_SESSION['usuario'] == 'Concursosefazmt2022@gmail.com' || $_SESSION['usuario'] == 'Concursosefazmt2022@gmail.com ' ||
                    $_SESSION['usuario'] == 'patricia.basso.g1@gmail.com' || $_SESSION['usuario'] == 'patricia.basso.g1@gmail.com ' || $_SESSION['usuario'] == 'Patricia.basso.g1@gmail.com' || $_SESSION['usuario'] == 'Patricia.basso.g1@gmail.com ' ||
                    $_SESSION['usuario'] == 'andressa_macedo2@hotmail.com' || $_SESSION['usuario'] == 'andressa_macedo2@hotmail.com ' || $_SESSION['usuario'] == 'Andressa_macedo2@hotmail.com' || $_SESSION['usuario'] == 'Andressa_macedo2@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'adonabruna@gmail.com' || $_SESSION['usuario'] == 'adonabruna@gmail.com ' || $_SESSION['usuario'] == 'Adonabruna@gmail.com' || $_SESSION['usuario'] == 'Adonabruna@gmail.com ' || 
                    $_SESSION['usuario'] == 'julietamarinho43@gmail.com' || $_SESSION['usuario'] == 'julietamarinho43@gmail.com ' || $_SESSION['usuario'] == 'Julietamarinho43@gmail.com' || $_SESSION['usuario'] == 'Julietamarinho43@gmail.com ' ||
                    $_SESSION['usuario'] == 'cbhanefa@gmail.com' || $_SESSION['usuario'] == 'cbhanefa@gmail.com ' || $_SESSION['usuario'] == 'Cbhanefa@gmail.com' || $_SESSION['usuario'] == 'Cbhanefa@gmail.com ' ||
                    $_SESSION['usuario'] == 'olgagabi31@gmail.com' || $_SESSION['usuario'] == 'olgagabi31@gmail.com ' || $_SESSION['usuario'] == 'Olgagabi31@gmail.com' || $_SESSION['usuario'] == 'Olgagabi31@gmail.com ' ||
                    $_SESSION['usuario'] == 'lucianasampaiocd@hotmail.com' || $_SESSION['usuario'] == 'lucianasampaiocd@hotmail.com ' || $_SESSION['usuario'] == 'Lucianasampaiocd@hotmail.com' || $_SESSION['usuario'] == 'Lucianasampaiocd@hotmail.com ' ||
                    $_SESSION['usuario'] == 'aaghidetti@gmail.com' || $_SESSION['usuario'] == 'aaghidetti@gmail.com ' || $_SESSION['usuario'] == 'Aaghidetti@gmail.com' || $_SESSION['usuario'] == 'Aaghidetti@gmail.com ' ||
                    $_SESSION['usuario'] == 'professorfantoni@yahoo.com.br' || $_SESSION['usuario'] == 'professorfantoni@yahoo.com.br ' || $_SESSION['usuario'] == 'Professorfantoni@yahoo.com.br' || $_SESSION['usuario'] == 'Professorfantoni@yahoo.com.br ' ||
                    $_SESSION['usuario'] == 'arthur_grauz@hotmail.com' || $_SESSION['usuario'] == 'arthur_grauz@hotmail.com ' || $_SESSION['usuario'] == 'Arthur_grauz@hotmail.com' || $_SESSION['usuario'] == 'Arthur_grauz@hotmail.com ' ||
                    $_SESSION['usuario'] == 'eletronicafiolux@gmail.com' || $_SESSION['usuario'] == 'eletronicafiolux@gmail.com ' || $_SESSION['usuario'] == 'Eletronicafiolux@gmail.com' || $_SESSION['usuario'] == 'Eletronicafiolux@gmail.com ' ||
                    $_SESSION['usuario'] == 'dayanesaboia02@gmail.com' || $_SESSION['usuario'] == 'dayanesaboia02@gmail.com ' || $_SESSION['usuario'] == 'Dayanesaboia02@gmail.com' || $_SESSION['usuario'] == 'Dayanesaboia02@gmail.com ' ||
                    $_SESSION['usuario'] == 'leninhanavarros@hotmail.com' || $_SESSION['usuario'] == 'leninhanavarros@hotmail.com ' || $_SESSION['usuario'] == 'Leninhanavarros@hotmail.com' || $_SESSION['usuario'] == 'Leninhanavarros@hotmail.com ' ||
                    $_SESSION['usuario'] == 'daiane.mouraa@hotmail.com' || $_SESSION['usuario'] == 'daiane.mouraa@hotmail.com ' || $_SESSION['usuario'] == 'Daiane.mouraa@hotmail.com' || $_SESSION['usuario'] == 'Daiane.mouraa@hotmail.com ' ||
                    $_SESSION['usuario'] == 'alexandre.manini@gmail.com' || $_SESSION['usuario'] == 'alexandre.manini@gmail.com ' || $_SESSION['usuario'] == 'Alexandre.manini@gmail.com' || $_SESSION['usuario'] == 'Alexandre.manini@gmail.com ' ||
                    $_SESSION['usuario'] == 'domingosribeiro.adv@gmail.com' || $_SESSION['usuario'] == 'domingosribeiro.adv@gmail.com ' || $_SESSION['usuario'] == 'Domingosribeiro.adv@gmail.com' || $_SESSION['usuario'] == 'Domingosribeiro.adv@gmail.com ' ||
                    $_SESSION['usuario'] == 'assissantiagokarina@gmail.com' || $_SESSION['usuario'] == 'assissantiagokarina@gmail.com ' || $_SESSION['usuario'] == 'Assissantiagokarina@gmail.com' || $_SESSION['usuario'] == 'Assissantiagokarina@gmail.com ' ||
                    $_SESSION['usuario'] == 'alessa8117@gmail.com' || $_SESSION['usuario'] == 'alessa8117@gmail.com ' || $_SESSION['usuario'] == 'Alessa8117@gmail.com' || $_SESSION['usuario'] == 'Alessa8117@gmail.com ' ||
                    // $_SESSION['usuario'] == 'cicerodf@yahoo.com' || $_SESSION['usuario'] == 'cicerodf@yahoo.com ' || $_SESSION['usuario'] == 'Cicerodf@yahoo.com' || $_SESSION['usuario'] == 'Cicerodf@yahoo.com ' || 
                    $_SESSION['usuario'] == 'suzeteskn@hotmail.com' || $_SESSION['usuario'] == 'suzeteskn@hotmail.com ' || $_SESSION['usuario'] == 'Suzeteskn@hotmail.com' || $_SESSION['usuario'] == 'Suzeteskn@hotmail.com ' ||
                    $_SESSION['usuario'] == 'jeanne.sthefany@gmail.com' || $_SESSION['usuario'] == 'jeanne.sthefany@gmail.com ' || $_SESSION['usuario'] == 'Jeanne.sthefany@gmail.com' || $_SESSION['usuario'] == 'Rodrigohumberto78@gmail.com ' ||
                    $_SESSION['usuario'] == 'edivanaadv@gmail.com' || $_SESSION['usuario'] == 'edivanaadv@gmail.com ' || $_SESSION['usuario'] == 'Edivanaadv@gmail.com' || $_SESSION['usuario'] == 'Edivanaadv@gmail.com ' ||
                    $_SESSION['usuario'] == 'rodrigoscara34@gmail.com' || $_SESSION['usuario'] == 'rodrigoscara34@gmail.com ' || $_SESSION['usuario'] == 'Rodrigoscara34@gmail.com' || $_SESSION['usuario'] == 'Rodrigoscara34@gmail.com ' ||
                    $_SESSION['usuario'] == 'professorfantoni@yahoo.com.br' || $_SESSION['usuario'] == 'professorfantoni@yahoo.com.br ' || $_SESSION['usuario'] == 'Professorfantoni@yahoo.com.br' || $_SESSION['usuario'] == 'Professorfantoni@yahoo.com.br ' ||
                    $_SESSION['usuario'] == 'paixao_ek@yahoo.com.br' || $_SESSION['usuario'] == 'paixao_ek@yahoo.com.br ' || $_SESSION['usuario'] == 'Paixao_ek@yahoo.com.br' || $_SESSION['usuario'] == 'Paixao_ek@yahoo.com.br ' ||
                    $_SESSION['usuario'] == 'almeidaneicir@gmail.com' || $_SESSION['usuario'] == 'almeidaneicir@gmail.com ' || $_SESSION['usuario'] == 'Almeidaneicir@gmail.com' || $_SESSION['usuario'] == 'Almeidaneicir@gmail.com ' ||
                    $_SESSION['usuario'] == 'sauiri@hotmail.com' || $_SESSION['usuario'] == 'sauiri@hotmail.com ' || $_SESSION['usuario'] == 'Sauiri@hotmail.com' || $_SESSION['usuario'] == 'Sauiri@hotmail.com ' ||
                    $_SESSION['usuario'] == 'daianymamore@gmail.com' || $_SESSION['usuario'] == 'daianymamore@gmail.com ' || $_SESSION['usuario'] == 'Daianymamore@gmail.com' || $_SESSION['usuario'] == 'Daianymamore@gmail.com ' ||
                    $_SESSION['usuario'] == 'estela23isa@gmail.com' || $_SESSION['usuario'] == 'estela23isa@gmail.com ' || $_SESSION['usuario'] == 'Estela23isa@gmail.com' || $_SESSION['usuario'] == 'Estela23isa@gmail.com ' ||
                    $_SESSION['usuario'] == 'joseribamar.pj@hotmail.com' || $_SESSION['usuario'] == 'joseribamar.pj@hotmail.com ' || $_SESSION['usuario'] == 'Joseribamar.pj@hotmail.com' || $_SESSION['usuario'] == 'Joseribamar.pj@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'paulobarthpaulobarth@gmail.com' || $_SESSION['usuario'] == 'paulobarthpaulobarth@gmail.com ' || $_SESSION['usuario'] == 'Paulobarthpaulobarth@gmail.com' || $_SESSION['usuario'] == 'Paulobarthpaulobarth@gmail.com ' ||
                    // $_SESSION['usuario'] == 'kellycosta26@gmail.com' || $_SESSION['usuario'] == 'kellycosta26@gmail.com ' || $_SESSION['usuario'] == 'Kellycosta26@gmail.com' || $_SESSION['usuario'] == 'Kellycosta26@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jmbarros051@gmail.com' || $_SESSION['usuario'] == 'jmbarros051@gmail.com ' || $_SESSION['usuario'] == 'Jmbarros051@gmail.com' || $_SESSION['usuario'] == 'Jmbarros051@gmail.com ' ||
                    // $_SESSION['usuario'] == 'janaina.taila@hotmail.com' || $_SESSION['usuario'] == 'janaina.taila@hotmail.com ' || $_SESSION['usuario'] == 'Janaina.taila@hotmail.com' || $_SESSION['usuario'] == 'Janaina.taila@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'wandersondamata@hotmail.com' || $_SESSION['usuario'] == 'wandersondamata@hotmail.com ' || $_SESSION['usuario'] == 'Wandersondamata@hotmail.com' || $_SESSION['usuario'] == 'Wandersondamata@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'joseribamar.pj@hotmail.com' || $_SESSION['usuario'] == 'joseribamar.pj@hotmail.com ' || $_SESSION['usuario'] == 'Joseribamar.pj@hotmail.com' || $_SESSION['usuario'] == 'Joseribamar.pj@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'weneakaline@hotmail.com' || $_SESSION['usuario'] == 'weneakaline@hotmail.com ' || $_SESSION['usuario'] == 'Weneakaline@hotmail.com' || $_SESSION['usuario'] == 'Weneakaline@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'flaviadamata@bol.com.br' || $_SESSION['usuario'] == 'flaviadamata@bol.com.br ' || $_SESSION['usuario'] == 'Flaviadamata@bol.com.br' || $_SESSION['usuario'] == 'Flaviadamata@bol.com.br ' ||
                    // $_SESSION['usuario'] == 'aline.fsabino47@gmail.com' || $_SESSION['usuario'] == 'Aline.fsabino47@gmail.com ' || $_SESSION['usuario'] == 'aline.fsabino47@gmail.com ' || $_SESSION['usuario'] == 'Aline.fsabino47@gmail.com' ||
                    // $_SESSION['usuario'] == 'daiane.mourao@hotmail.com' || $_SESSION['usuario'] == 'daiane.mourao@hotmail.com ' || $_SESSION['usuario'] == 'Daiane.mourao@hotmail.com' || $_SESSION['usuario'] == 'Daiane.mourao@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'elisangelamborges@hotmail.com' || $_SESSION['usuario'] == 'elisangelamborges@hotmail.com ' || $_SESSION['usuario'] == 'Elisangelamborges@hotmail.com' || $_SESSION['usuario'] == 'Elisangelamborges@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'rodolfomurilo13@gmail.com' || $_SESSION['usuario'] == 'rodolfomurilo13@gmail.com ' || $_SESSION['usuario'] == 'Rodolfomurilo13@gmail.com' || $_SESSION['usuario'] == 'Rodolfomurilo13@gmail.com ' ||
                    // $_SESSION['usuario'] == 'daianilima@hotmail.com' || $_SESSION['usuario'] == 'daianilima@hotmail.com ' || $_SESSION['usuario'] == 'Daianilima@hotmail.com' || $_SESSION['usuario'] == 'Daianilima@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'adv.andrefortini@gmail.com' || $_SESSION['usuario'] == 'adv.andrefortini@gmail.com ' || $_SESSION['usuario'] == 'Adv.andrefortini@gmail.com' || $_SESSION['usuario'] == 'Adv.andrefortini@gmail.com ' ||
                    // $_SESSION['usuario'] == 'suzetekn@hotmail.com' || $_SESSION['usuario'] == 'suzetekn@hotmail.com ' || $_SESSION['usuario'] == 'Suzetekn@hotmail.com' || $_SESSION['usuario'] == 'Suzetekn@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'biamrmc@gmail.com' || $_SESSION['usuario'] == 'biamrmc@gmail.com ' || $_SESSION['usuario'] == 'Biamrmc@gmail.com' || $_SESSION['usuario'] == 'Biamrmc@gmail.com ' ||
                    // $_SESSION['usuario'] == 'iarastudyenglish@gmail.com' || $_SESSION['usuario'] == 'iarastudyenglish@gmail.com ' || $_SESSION['usuario'] == 'Iarastudyenglish@gmail.com' || $_SESSION['usuario'] == 'Iarastudyenglish@gmail.com ' ||
                    // $_SESSION['usuario'] == 'juniior.alves@hotmail.com' || $_SESSION['usuario'] == 'juniior.alves@hotmail.com ' || $_SESSION['usuario'] == 'Juniior.alves@hotmail.com' || $_SESSION['usuario'] == 'Juniior.alves@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'adv.deborapalmeida@gmail.com' || $_SESSION['usuario'] == 'adv.deborapalmeida@gmail.com ' || $_SESSION['usuario'] == 'Adv.deborapalmeida@gmail.com' || $_SESSION['usuario'] == 'Adv.deborapalmeida@gmail.com ' ||
                    // $_SESSION['usuario'] == 'karolinepailo@gmail.com' || $_SESSION['usuario'] == 'karolinepailo@gmail.com ' || $_SESSION['usuario'] == 'Karolinepailo@gmail.com' || $_SESSION['usuario'] == 'Karolinepailo@gmail.com ' ||
                    // $_SESSION['usuario'] == 'allynne.souza18@hotmail.com' || $_SESSION['usuario'] == 'allynne.souza18@hotmail.com ' || $_SESSION['usuario'] == 'Allynne.souza18@hotmail.com' || $_SESSION['usuario'] == 'Allynne.souza18@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'regiane_rass.alves@hotmail.com' || $_SESSION['usuario'] == 'regiane_rass.alves@hotmail.com ' || $_SESSION['usuario'] == 'Regiane_rass.alves@hotmail.com' || $_SESSION['usuario'] == 'Regiane_rass.alves@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'nayaraleal_adm@hotmail.com' || $_SESSION['usuario'] == 'nayaraleal_adm@hotmail.com ' || $_SESSION['usuario'] == 'Nayaraleal_adm@hotmail.com' || $_SESSION['usuario'] == 'Nayaraleal_adm@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'jose.figueiredo1903@gmail.com' || $_SESSION['usuario'] == 'jose.figueiredo1903@gmail.com ' || $_SESSION['usuario'] == 'Jose.figueiredo1903@gmail.com' || $_SESSION['usuario'] == 'Jose.figueiredo1903@gmail.com ' ||
                    // $_SESSION['usuario'] == 'greicigorgonha@hotmail.com' || $_SESSION['usuario'] == 'greicigorgonha@hotmail.com ' || $_SESSION['usuario'] == 'Greicigorgonha@hotmail.com' || $_SESSION['usuario'] == 'Greicigorgonha@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'ivana@fiscan.com.br' || $_SESSION['usuario'] == 'ivana@fiscan.com.br ' || $_SESSION['usuario'] == 'Ivana@fiscan.com.br' || $_SESSION['usuario'] == 'Ivana@fiscan.com.br ' ||
                    // $_SESSION['usuario'] == 'ieza0502@gmail.com' || $_SESSION['usuario'] == 'ieza0502@gmail.com ' || $_SESSION['usuario'] == 'Ieza0502@gmail.com' || $_SESSION['usuario'] == 'Ieza0502@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rodrigoscara34@hotmal.com' || $_SESSION['usuario'] == 'rodrigoscara34@hotmal.com ' || $_SESSION['usuario'] == 'Rodrigoscara34@hotmal.com' || $_SESSION['usuario'] == 'Rodrigoscara34@hotmal.com ' ||
                    // $_SESSION['usuario'] == 'marcos.anicesio@gmail.com' || $_SESSION['usuario'] == 'marcos.anicesio@gmail.com ' || $_SESSION['usuario'] == 'Marcos.anicesio@gmail.com' || $_SESSION['usuario'] == 'Marcos.anicesio@gmail.com ' ||
                    // $_SESSION['usuario'] == 'phor6@hotmail.com' || $_SESSION['usuario'] == 'phor6@hotmail.com ' || $_SESSION['usuario'] == 'Phor6@hotmail.com' || $_SESSION['usuario'] == 'Phor6@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'elemary@terra.com.br' || $_SESSION['usuario'] == 'elemary@terra.com.br' || $_SESSION['usuario'] == 'Elemary@terra.com.br ' || $_SESSION['usuario'] == 'Elemary@terra.com.br ' ||
                    // $_SESSION['usuario'] == 'nobres.ana@gmail.com' || $_SESSION['usuario'] == 'nobres.ana@gmail.com ' || $_SESSION['usuario'] == 'Nobres.ana@gmail.com' || $_SESSION['usuario'] == 'Nobres.ana@gmail.com ' ||
                    // $_SESSION['usuario'] == 'belakthomann@gmail.com' || $_SESSION['usuario'] == 'belakthomann@gmail.com ' || $_SESSION['usuario'] == 'Belakthomann@gmail.com' || $_SESSION['usuario'] == 'Belakthomann@gmail.com ' ||
                    // $_SESSION['usuario'] == 'paixao_ek@yahoo.com.br' || $_SESSION['usuario'] == 'paixao_ek@yahoo.com.br ' || $_SESSION['usuario'] == 'Paixao_ek@yahoo.com.br' || $_SESSION['usuario'] == 'Paixao_ek@yahoo.com.br ' ||
                    // $_SESSION['usuario'] == 'kasteline@hotmail.com' || $_SESSION['usuario'] == 'kasteline@hotmail.com ' || $_SESSION['usuario'] == 'Kasteline@hotmail.com' || $_SESSION['usuario'] == 'Kasteline@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'heitorfernandezneto8@gmail.com' || $_SESSION['usuario'] == 'heitorfernandezneto8@gmail.com ' || $_SESSION['usuario'] == 'Heitorfernandezneto8@gmail.com' || $_SESSION['usuario'] == 'Heitorfernandezneto8@gmail.com ' ||
                    // $_SESSION['usuario'] == 'carloslisboamt@gmail.com' || $_SESSION['usuario'] == 'carloslisboamt@gmail.com ' || $_SESSION['usuario'] == 'Carloslisboamt@gmail.com' || $_SESSION['usuario'] == 'Carloslisboamt@gmail.com ' ||
                    // $_SESSION['usuario'] == 'carolinealencas@gmail.com' || $_SESSION['usuario'] == 'carolinealencas@gmail.com ' || $_SESSION['usuario'] == 'Carolinealencas@gmail.com' || $_SESSION['usuario'] == 'Carolinealencas@gmail.com ' ||
                    // $_SESSION['usuario'] == 'leticia-leite@hotmail.com' || $_SESSION['usuario'] == 'leticia-leite@hotmail.com ' || $_SESSION['usuario'] == 'Leticia-leite@hotmail.com' || $_SESSION['usuario'] == 'Leticia-leite@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'bleite.jessica@gmail.com' || $_SESSION['usuario'] == 'bleite.jessica@gmail.com ' || $_SESSION['usuario'] == 'Bleite.jessica@gmail.com' || $_SESSION['usuario'] == 'Bleite.jessica@gmail.com ' ||
                    // $_SESSION['usuario'] == 'iolandassilva2013@gmail.com' || $_SESSION['usuario'] == 'iolandassilva2013@gmail.com ' || $_SESSION['usuario'] == 'Iolandassilva2013@gmail.com' || $_SESSION['usuario'] == 'Iolandassilva2013@gmail.com ' ||
                    // $_SESSION['usuario'] == 'lisiannyd@hotmail.com' || $_SESSION['usuario'] == 'lisiannyd@hotmail.com ' || $_SESSION['usuario'] == 'Lisiannyd@hotmail.com' || $_SESSION['usuario'] == 'Lisiannyd@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'marvingodric@gmail.com' || $_SESSION['usuario'] == 'marvingodric@gmail.com ' || $_SESSION['usuario'] == 'Marvingodric@gmail.com' || $_SESSION['usuario'] == 'Marvingodric@gmail.com ' ||
                    // $_SESSION['usuario'] == 'catia.fernanda16@hotmail.com' || $_SESSION['usuario'] == 'catia.fernanda16@hotmail.com ' || $_SESSION['usuario'] == 'Catia.fernanda16@hotmail.com' || $_SESSION['usuario'] == 'Catia.fernanda16@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'rafaculdade@hotmail.com' || $_SESSION['usuario'] == 'rafaculdade@hotmail.com ' || $_SESSION['usuario'] == 'Rafaculdade@hotmail.com' || $_SESSION['usuario'] == 'Rafaculdade@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'francislenegcunha@hotmail.com' || $_SESSION['usuario'] == 'francislenegcunha@hotmail.com ' || $_SESSION['usuario'] == 'Francislenegcunha@hotmail.com' || $_SESSION['usuario'] == 'Francislenegcunha@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'alcimara.lima@hotmail.com' || $_SESSION['usuario'] == 'alcimara.lima@hotmail.com ' || $_SESSION['usuario'] == 'Alcimara.lima@hotmail.com' || $_SESSION['usuario'] == 'Alcimara.lima@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'elianagcunha27@hotmail.com' || $_SESSION['usuario'] == 'elianagcunha27@hotmail.com ' || $_SESSION['usuario'] == 'Elianagcunha27@hotmail.com' || $_SESSION['usuario'] == 'Elianagcunha27@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'farm.tiagosobral@gmail.com' || $_SESSION['usuario'] == 'farm.tiagosobral@gmail.com ' || $_SESSION['usuario'] == 'Farm.tiagosobral@gmail.com' || $_SESSION['usuario'] == 'Farm.tiagosobral@gmail.com ' ||
                    // $_SESSION['usuario'] == 'allynne.souza18@hotmail.com' || $_SESSION['usuario'] == 'allynne.souza18@hotmail.com ' || $_SESSION['usuario'] == 'Allynne.souza18@hotmail.com' || $_SESSION['usuario'] == 'Allynne.souza18@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'natyrutsmiranda@gmail.com' || $_SESSION['usuario'] == 'natyrutsmiranda@gmail.com ' || $_SESSION['usuario'] == 'Natyrutsmiranda@gmail.com' || $_SESSION['usuario'] == 'Natyrutsmiranda@gmail.com ' ||
                    // $_SESSION['usuario'] == 'alexandrepereira1222@gmail.com' || $_SESSION['usuario'] == 'alexandrepereira1222@gmail.com ' || $_SESSION['usuario'] == 'Alexandrepereira1222@gmail.com' || $_SESSION['usuario'] == 'Alexandrepereira1222@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jsvilela72@hotmail.com' || $_SESSION['usuario'] == 'jsvilela72@hotmail.com ' || $_SESSION['usuario'] == 'Jsvilela72@hotmail.com' || $_SESSION['usuario'] == 'Jsvilela72@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'janaina.taila@hotmail.com' || $_SESSION['usuario'] == 'janaina.taila@hotmail.com ' || $_SESSION['usuario'] == 'Janaina.taila@hotmail.com' || $_SESSION['usuario'] == 'Janaina.taila@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'kassiarnl@gmail.com' || $_SESSION['usuario'] == 'kassiarnl@gmail.com ' || $_SESSION['usuario'] == 'Kassiarnl@gmail.com' || $_SESSION['usuario'] == 'Kassiarnl@gmail.com ' ||
                    // $_SESSION['usuario'] == 'mt.morena@gmail.com' || $_SESSION['usuario'] == 'mt.morena@gmail.com ' || $_SESSION['usuario'] == 'Mt.morena@gmail.com' || $_SESSION['usuario'] == 'Mt.morena@gmail.com ' ||
                    // $_SESSION['usuario'] == 'wandersondamata@hotmail.com' || $_SESSION['usuario'] == 'wandersondamata@hotmail.com ' || $_SESSION['usuario'] == 'Wandersondamata@hotmail.com' || $_SESSION['usuario'] == 'Wandersondamata@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'loicycunha@gmail.com' || $_SESSION['usuario'] == 'loicycunha@gmail.com ' || $_SESSION['usuario'] == 'Loicycunha@gmail.com' || $_SESSION['usuario'] == 'Loicycunha@gmail.com ' ||
                    // $_SESSION['usuario'] == 'bertholdo1020@gmail.com' || $_SESSION['usuario'] == 'bertholdo1020@gmail.com ' || $_SESSION['usuario'] == 'Bertholdo1020@gmail.com' || $_SESSION['usuario'] == 'Bertholdo1020@gmail.com ' ||
                    // $_SESSION['usuario'] == 'carolinni.barros@gmail.com' || $_SESSION['usuario'] == 'carolinni.barros@gmail.com ' || $_SESSION['usuario'] == 'Carolinni.barros@gmail.com' || $_SESSION['usuario'] == 'Carolinni.barros@gmail.com' ||
                    // $_SESSION['usuario'] == 'pgwatanabe@hotmail.com' || $_SESSION['usuario'] == 'pgwatanabe@hotmail.com ' || $_SESSION['usuario'] == 'Pgwatanabe@hotmail.com' || $_SESSION['usuario'] == 'Pgwatanabe@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'viviane_fig@hotmail.com' || $_SESSION['usuario'] == 'viviane_fig@hotmail.com ' || $_SESSION['usuario'] == 'Viviane_fig@hotmail.com' || $_SESSION['usuario'] == '' ||
                    // $_SESSION['usuario'] == 'vanltx@gmail.com' || $_SESSION['usuario'] == 'vanltx@gmail.com' || $_SESSION['usuario'] == 'Vanltx@gmail.com' || $_SESSION['usuario'] == 'Vanltx@gmail.com ' ||
                    // $_SESSION['usuario'] == 'natachabalin@gmail.com' || $_SESSION['usuario'] == 'natachabalin@gmail.com ' || $_SESSION['usuario'] == 'Natachabalin@gmail.com' || $_SESSION['usuario'] == 'Natachabalin@gmail.com ' ||
                    // $_SESSION['usuario'] == 'nubiellydeoliveira@gmail.com' || $_SESSION['usuario'] == 'nubiellydeoliveira@gmail.com ' || $_SESSION['usuario'] == 'Nubiellydeoliveira@gmail.com' || $_SESSION['usuario'] == 'Nubiellydeoliveira@gmail.com ' ||
                    // $_SESSION['usuario'] == 'perita.contadora.viana@gmail.com' || $_SESSION['usuario'] == 'perita.contadora.viana@gmail.com ' || $_SESSION['usuario'] == 'Perita.contadora.viana@gmail.com' || $_SESSION['usuario'] == 'Perita.contadora.viana@gmail.com ' ||
                    // $_SESSION['usuario'] == 'fer_giangarelli@hotmail.com' || $_SESSION['usuario'] == 'fer_giangarelli@hotmail.com ' || $_SESSION['usuario'] == 'Fer_giangarelli@hotmail.com' || $_SESSION['usuario'] == 'Fer_giangarelli@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'priscillatiago@yahoo.com.br' || $_SESSION['usuario'] == 'priscillatiago@yahoo.com.br ' || $_SESSION['usuario'] == 'Priscillatiago@yahoo.com.br' || $_SESSION['usuario'] == 'Priscillatiago@yahoo.com.br ' ||
                    // $_SESSION['usuario'] == 'elainesilva78345@gmail.com' || $_SESSION['usuario'] == 'elainesilva78345@gmail.com ' || $_SESSION['usuario'] == 'Elainesilva78345@gmail.com' || $_SESSION['usuario'] == 'Elainesilva78345@gmail.com ' ||
                    $_SESSION['usuario'] == 'rodrigohumberto78@gmail.com' || $_SESSION['usuario'] == 'rodrigohumberto78@gmail.com ' || $_SESSION['usuario'] == 'Rodrigohumberto78@gmail.com' || $_SESSION['usuario'] == 'Rodrigohumberto78@gmail.com ' ||
                    $_SESSION['usuario'] == 'ademilton.fisica@gmail.com' || $_SESSION['usuario'] == 'Ademilton.fisica@gmail.com' || $_SESSION['usuario'] == 'Ademilton.fisica@gmail.com ' || $_SESSION['usuario'] == 'ademilton.fisica@gmail.com ' ||
                    $_SESSION['usuario'] == 'eduardoogiwara@hotmail.com' || $_SESSION['usuario'] == 'eduardoogiwara@hotmail.com ' || $_SESSION['usuario'] == 'Eduardoogiwara@hotmail.com' || $_SESSION['usuario'] == 'Eduardoogiwara@hotmail.com ' ||
                    $_SESSION['usuario'] == 'djalma.barroscavalheiro@gmail.com' || $_SESSION['usuario'] == 'djalma.barroscavalheiro@gmail.com ' || $_SESSION['usuario'] == 'Djalma.barroscavalheiro@gmail.com' || $_SESSION['usuario'] == 'Djalma.barroscavalheiro@gmail.com ' ||
                    $_SESSION['usuario'] == 'gimenesb.victor@gmail.com' || $_SESSION['usuario'] == 'gimenesb.victor@gmail.com ' || $_SESSION['usuario'] == 'Gimenesb.victor@gmail.com' || $_SESSION['usuario'] == 'Gimenesb.victor@gmail.com ' ||
                    $_SESSION['usuario'] == 'tiburciocorrea@outlook.com' || $_SESSION['usuario'] == 'tiburciocorrea@outlook.com ' || $_SESSION['usuario'] == 'Tiburciocorrea@outlook.com' || $_SESSION['usuario'] == 'Tiburciocorrea@outlook.com ' ||
                    $_SESSION['usuario'] == 'danikcoal19@hotmail.com' || $_SESSION['usuario'] == 'danikcoal19@hotmail.com ' || $_SESSION['usuario'] == 'Danikcoal19@hotmail.com' || $_SESSION['usuario'] == 'Danikcoal19@hotmail.com ' ||
                    $_SESSION['usuario'] == 'uziel.silva@gmail.com' || $_SESSION['usuario'] == 'uziel.silva@gmail.com ' || $_SESSION['usuario'] == 'Uziel.silva@gmail.com' || $_SESSION['usuario'] == 'Uziel.silva@gmail.com ' ||
                    $_SESSION['usuario'] == 'izabellabritoac@hotmail.com' || $_SESSION['usuario'] == 'izabellabritoac@hotmail.com ' || $_SESSION['usuario'] == 'Izabellabritoac@hotmail.com' || $_SESSION['usuario'] == 'Izabellabritoac@hotmail.com ' ||
                    $_SESSION['usuario'] == 'dihenriques@gmail.com' || $_SESSION['usuario'] == 'dihenriques@gmail.com ' || $_SESSION['usuario'] == 'Dihenriques@gmail.com' || $_SESSION['usuario'] == 'Dihenriques@gmail.com ' ||
                    $_SESSION['usuario'] == 'aureacmelo@hotmail.com' || $_SESSION['usuario'] == 'aureacmelo@hotmail.com ' || $_SESSION['usuario'] == 'Aureacmelo@hotmail.com' || $_SESSION['usuario'] == 'Aureacmelo@hotmail.com ' ||
                    $_SESSION['usuario'] == 'flavia_ponce@hotmail.com' || $_SESSION['usuario'] == 'flavia_ponce@hotmail.com ' || $_SESSION['usuario'] == 'Flavia_ponce@hotmail.com' || $_SESSION['usuario'] == 'Flavia_ponce@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'vividiaslimacba@gmail.com' || $_SESSION['usuario'] == 'vividiaslimacba@gmail.com ' || $_SESSION['usuario'] == 'Vividiaslimacba@gmail.com' || $_SESSION['usuario'] == 'Vividiaslimacba@gmail.com ' ||
                    // $_SESSION['usuario'] == 'adv.medeiros@me.com' || $_SESSION['usuario'] == 'adv.medeiros@me.com ' || $_SESSION['usuario'] == 'Adv.medeiros@me.com' || $_SESSION['usuario'] == 'Adv.medeiros@me.com ' ||
                    // $_SESSION['usuario'] == 'raphaela_pairague@hotmail.com' || $_SESSION['usuario'] == 'raphaela_pairague@hotmail.com ' || $_SESSION['usuario'] == 'Raphaela_pairague@hotmail.com' || $_SESSION['usuario'] == 'Raphaela_pairague@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'luiscesarm@terra.com.br' || $_SESSION['usuario'] == 'luiscesarm@terra.com.br ' || $_SESSION['usuario'] == 'Luiscesarm@terra.com.br' || $_SESSION['usuario'] == 'Luiscesarm@terra.com.br ' ||
                    // $_SESSION['usuario'] == 'volzanakaroline@gmail.com' || $_SESSION['usuario'] == 'volzanakaroline@gmail.com ' || $_SESSION['usuario'] == 'Volzanakaroline@gmail.com' || $_SESSION['usuario'] == 'Volzanakaroline@gmail.com ' ||
                    // $_SESSION['usuario'] == 'laizecamilos@gmail.com' || $_SESSION['usuario'] == 'laizecamilos@gmail.com ' || $_SESSION['usuario'] == 'Laizecamilos@gmail.com' || $_SESSION['usuario'] == 'Laizecamilos@gmail.com ' ||
                    // $_SESSION['usuario'] == 'lilianrossa@gmail.com' || $_SESSION['usuario'] == 'lilianrossa@gmail.com ' || $_SESSION['usuario'] == 'Lilianrossa@gmail.com' || $_SESSION['usuario'] == 'Lilianrossa@gmail.com ' ||
                    // $_SESSION['usuario'] == 'aluisioasramalho@gmail.com' || $_SESSION['usuario'] == 'aluisioasramalho@gmail.com ' || $_SESSION['usuario'] == 'Aluisioasramalho@gmail.com' || $_SESSION['usuario'] == 'Aluisioasramalho@gmail.com ' ||
                    // $_SESSION['usuario'] == 'srs_tanganeli@hotmail.com' || $_SESSION['usuario'] == 'srs_tanganeli@hotmail.com ' || $_SESSION['usuario'] == 'Srs_tanganeli@hotmail.com' || $_SESSION['usuario'] == 'Srs_tanganeli@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'hsleao@gmail.com' || $_SESSION['usuario'] == 'hsleao@gmail.com ' || $_SESSION['usuario'] == 'Hsleao@gmail.com' || $_SESSION['usuario'] == 'Hsleao@gmail.com ' ||
                    // $_SESSION['usuario'] == 'uescarlos47@gmail.com' || $_SESSION['usuario'] == 'uescarlos47@gmail.com ' || $_SESSION['usuario'] == 'Uescarlos47@gmail.com' || $_SESSION['usuario'] == 'Uescarlos47@gmail.com ' ||
                    // $_SESSION['usuario'] == 'leinhadarcy@gmail.com' || $_SESSION['usuario'] == 'leinhadarcy@gmail.com ' || $_SESSION['usuario'] == 'Leinhadarcy@gmail.com' || $_SESSION['usuario'] == 'Leinhadarcy@gmail.com ' ||
                    // $_SESSION['usuario'] == 'thereza.pinheiro@hotmail.com' || $_SESSION['usuario'] == 'thereza.pinheiro@hotmail.com ' || $_SESSION['usuario'] == 'Thereza.pinheiro@hotmail.com' || $_SESSION['usuario'] == 'Thereza.pinheiro@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'wirmabio@hotmail.com' || $_SESSION['usuario'] == 'wirmabio@hotmail.com ' || $_SESSION['usuario'] == 'Wirmabio@hotmail.com' || $_SESSION['usuario'] == 'Wirmabio@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'phn_grarccj@hotmail.com' || $_SESSION['usuario'] == 'phn_grarccj@hotmail.com ' || $_SESSION['usuario'] == 'Phn_grarccj@hotmail.com' || $_SESSION['usuario'] == 'Phn_grarccj@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'llidiapsilva@gmail.com' || $_SESSION['usuario'] == 'llidiapsilva@gmail.com ' || $_SESSION['usuario'] == 'Llidiapsilva@gmail.com' || $_SESSION['usuario'] == 'Llidiapsilva@gmail.com ' ||
                    // $_SESSION['usuario'] == 'danny.pedroso@hotmail.com' || $_SESSION['usuario'] == 'danny.pedroso@hotmail.com ' || $_SESSION['usuario'] == 'Danny.pedroso@hotmail.com' || $_SESSION['usuario'] == 'Danny.pedroso@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'carlos.moraes@live.fr' || $_SESSION['usuario'] == 'carlos.moraes@live.fr ' || $_SESSION['usuario'] == 'Carlos.moraes@live.fr' || $_SESSION['usuario'] == 'Carlos.moraes@live.fr ' ||
                    // $_SESSION['usuario'] == 'mychelly-barreto@hotmail.com' || $_SESSION['usuario'] == 'mychelly-barreto@hotmail.com ' || $_SESSION['usuario'] == 'Mychelly-barreto@hotmail.com' || $_SESSION['usuario'] == 'Mychelly-barreto@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'cantoas03@gmail.com' || $_SESSION['usuario'] == 'cantoas03@gmail.com ' || $_SESSION['usuario'] == 'Cantoas03@gmail.com' || $_SESSION['usuario'] == 'Cantoas03@gmail.com ' ||
                    // $_SESSION['usuario'] == 'm_graca07@hotmail.com' || $_SESSION['usuario'] == 'm_graca07@hotmail.com ' || $_SESSION['usuario'] == 'M_graca07@hotmail.com' || $_SESSION['usuario'] == 'M_graca07@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'danielfrmorais@gmail.com' || $_SESSION['usuario'] == 'danielfrmorais@gmail.com ' || $_SESSION['usuario'] == 'Danielfrmorais@gmail.com' || $_SESSION['usuario'] == 'Danielfrmorais@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jamore122@gmail.com' || $_SESSION['usuario'] == 'jamore122@gmail.com ' || $_SESSION['usuario'] == 'Jamore122@gmail.com' || $_SESSION['usuario'] == 'Jamore122@gmail.com ' ||
                    // $_SESSION['usuario'] == 'amandamenezes551@gmail.com' || $_SESSION['usuario'] == 'amandamenezes551@gmail.com ' || $_SESSION['usuario'] == 'Amandamenezes551@gmail.com' || $_SESSION['usuario'] == 'Amandamenezes551@gmail.com ' ||
                    // $_SESSION['usuario'] == 'douglaslescano@gmail.com' || $_SESSION['usuario'] == 'douglaslescano@gmail.com ' || $_SESSION['usuario'] == 'Douglaslescano@gmail.com' || $_SESSION['usuario'] == 'Douglaslescano@gmail.com ' ||
                    // $_SESSION['usuario'] == 'laura.balbino.ramos@gmail.com' || $_SESSION['usuario'] == 'laura.balbino.ramos@gmail.com ' || $_SESSION['usuario'] == 'Laura.balbino.ramos@gmail.com' || $_SESSION['usuario'] == 'Laura.balbino.ramos@gmail.com ' ||
                    // $_SESSION['usuario'] == 'ligyacandido@gmail.com' || $_SESSION['usuario'] == 'ligyacandido@gmail.com ' || $_SESSION['usuario'] == 'Ligyacandido@gmail.com' || $_SESSION['usuario'] == 'Leinhadarcy@gmail.com  ' ||
                    // $_SESSION['usuario'] == 'naryancristina84@gmail.com' || $_SESSION['usuario'] == 'naryancristina84@gmail.com ' || $_SESSION['usuario'] == 'Naryancristina84@gmail.com' || $_SESSION['usuario'] == 'Naryancristina84@gmail.com ' ||
                    // $_SESSION['usuario'] == 'sadinara_cnp@hotmail.com' || $_SESSION['usuario'] == 'sadinara_cnp@hotmail.com ' || $_SESSION['usuario'] == 'Sadinara_cnp@hotmail.com' || $_SESSION['usuario'] == 'Sadinara_cnp@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'dani_sonsin@hotmail.com' || $_SESSION['usuario'] == 'dani_sonsin@hotmail.com ' || $_SESSION['usuario'] == 'Dani_sonsin@hotmail.com' || $_SESSION['usuario'] == 'Dani_sonsin@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'cassiocirqueira@bol.com.br' || $_SESSION['usuario'] == 'cassiocirqueira@bol.com.br ' || $_SESSION['usuario'] == 'Cassiocirqueira@bol.com.br' || $_SESSION['usuario'] == 'Cassiocirqueira@bol.com.br ' ||
                    // $_SESSION['usuario'] == 'melinhaferrer@hotmail.com' || $_SESSION['usuario'] == 'melinhaferrer@hotmail.com ' || $_SESSION['usuario'] == 'Melinhaferrer@hotmail.com' || $_SESSION['usuario'] == 'Melinhaferrer@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'gidias195@gmail.com' || $_SESSION['usuario'] == 'gidias195@gmail.com ' || $_SESSION['usuario'] == 'Gidias195@gmail.com' || $_SESSION['usuario'] == 'Gidias195@gmail.com ' ||
                    // $_SESSION['usuario'] == 'mmfgomes@hotmail.com' || $_SESSION['usuario'] == 'mmfgomes@hotmail.com ' || $_SESSION['usuario'] == 'Mmfgomes@hotmail.com' || $_SESSION['usuario'] == 'Mmfgomes@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'katielly_braga08@hotmail.com' || $_SESSION['usuario'] == 'katielly_braga08@hotmail.com' || $_SESSION['usuario'] == 'Katielly_braga08@hotmail.com' || $_SESSION['usuario'] == 'Katielly_braga08@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'patriciabeatrizleite@gmail.com' || $_SESSION['usuario'] == 'patriciabeatrizleite@gmail.com ' || $_SESSION['usuario'] == 'Patriciabeatrizleite@gmail.com' || $_SESSION['usuario'] == 'Patriciabeatrizleite@gmail.com ' ||
                    // $_SESSION['usuario'] == 'yarafariaa@gmail.com' || $_SESSION['usuario'] == 'yarafariaa@gmail.com ' || $_SESSION['usuario'] == 'Yarafariaa@gmail.com' || $_SESSION['usuario'] == 'Yarafariaa@gmail.com ' ||
                    // $_SESSION['usuario'] == 'drebaptista@hotmail.com' || $_SESSION['usuario'] == 'drebaptista@hotmail.com ' || $_SESSION['usuario'] == 'Drebaptista@hotmail.com' || $_SESSION['usuario'] == 'Drebaptista@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'seilasouza@hotmail.com' || $_SESSION['usuario'] == 'seilasouza@hotmail.com ' || $_SESSION['usuario'] == 'Seilasouza@hotmail.com' || $_SESSION['usuario'] == 'Seilasouza@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'wilkercosta57@gmail.com' || $_SESSION['usuario'] == 'wilkercosta57@gmail.com ' || $_SESSION['usuario'] == 'Wilkercosta57@gmail.com' || $_SESSION['usuario'] == 'Wilkercosta57@gmail.com ' ||
                    // $_SESSION['usuario'] == 'hugomalhado@hotmail.com' || $_SESSION['usuario'] == 'hugomalhado@hotmail.com ' || $_SESSION['usuario'] == 'Hugomalhado@hotmail.com' || $_SESSION['usuario'] == 'Hugomalhado@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'milacarilli@gmail.com' || $_SESSION['usuario'] == 'milacarilli@gmail.com ' || $_SESSION['usuario'] == 'Milacarilli@gmail.com' || $_SESSION['usuario'] == 'Milacarilli@gmail.com ' ||
                    // $_SESSION['usuario'] == 'shyrleymbo@hotmail.com' || $_SESSION['usuario'] == 'shyrleymbo@hotmail.com ' || $_SESSION['usuario'] == 'Shyrleymbo@hotmail.com' || $_SESSION['usuario'] == 'Shyrleymbo@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'taborelli.bsb@gmail.com' || $_SESSION['usuario'] == 'taborelli.bsb@gmail.com ' || $_SESSION['usuario'] == 'Taborelli.bsb@gmail.com' || $_SESSION['usuario'] == 'Taborelli.bsb@gmail.com ' ||
                    // $_SESSION['usuario'] == 'katherlucy@hotmail.com' || $_SESSION['usuario'] == 'katherlucy@hotmail.com ' || $_SESSION['usuario'] == 'Katherlucy@hotmail.com' || $_SESSION['usuario'] == 'Katherlucy@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'qui85@hotmail.com' || $_SESSION['usuario'] == 'qui85@hotmail.com ' || $_SESSION['usuario'] == 'Qui85@hotmail.com' || $_SESSION['usuario'] == 'Qui85@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'rogeriavnunes@gmail.com' || $_SESSION['usuario'] == 'rogeriavnunes@gmail.com ' || $_SESSION['usuario'] == 'Rogeriavnunes@gmail.com' || $_SESSION['usuario'] == 'Rogeriavnunes@gmail.com ' ||
                    // $_SESSION['usuario'] == 'alexfrankgo@gmail.com' || $_SESSION['usuario'] == 'alexfrankgo@gmail.com ' || $_SESSION['usuario'] == 'Alexfrankgo@gmail.com' || $_SESSION['usuario'] == 'Alexfrankgo@gmail.com ' ||
                    // $_SESSION['usuario'] == 'leopsan@hotmail.com' || $_SESSION['usuario'] == 'leopsan@hotmail.com' || $_SESSION['usuario'] == 'Leopsan@hotmail.com' || $_SESSION['usuario'] == 'Leopsan@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'andreanobrega@msn.com' || $_SESSION['usuario'] == 'andreanobrega@msn.com ' || $_SESSION['usuario'] == 'Andreanobrega@msn.com' || $_SESSION['usuario'] == 'Andreanobrega@msn.com ' ||
                    // $_SESSION['usuario'] == 'paulacoelho1@hotmail.com' || $_SESSION['usuario'] == 'paulacoelho1@hotmail.com ' || $_SESSION['usuario'] == 'Paulacoelho1@hotmail.com' || $_SESSION['usuario'] == 'Paulacoelho1@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'samufrcl@gmail.com' || $_SESSION['usuario'] == 'samufrcl@gmail.com ' || $_SESSION['usuario'] == 'Samufrcl@gmail.com' || $_SESSION['usuario'] == 'Samufrcl@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jujusgomes1@gmail.com' || $_SESSION['usuario'] == 'jujusgomes1@gmail.com ' || $_SESSION['usuario'] == 'Jujusgomes1@gmail.com' || $_SESSION['usuario'] == 'Jujusgomes1@gmail.com ' ||
                    // $_SESSION['usuario'] == 'fm.calheiros@gmail.com' || $_SESSION['usuario'] == 'fm.calheiros@gmail.com ' || $_SESSION['usuario'] == 'Fm.calheiros@gmail.com' || $_SESSION['usuario'] == 'Fm.calheiros@gmail.com ' ||
                    // $_SESSION['usuario'] == 'juli-fabiola@hotmail.com' || $_SESSION['usuario'] == 'juli-fabiola@hotmail.com ' || $_SESSION['usuario'] == 'Juli-fabiola@hotmail.com' || $_SESSION['usuario'] == 'Juli-fabiola@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'ricardo.jasf@gmail.com' || $_SESSION['usuario'] == 'ricardo.jasf@gmail.com ' || $_SESSION['usuario'] == 'Ricardo.jasf@gmail.com' || $_SESSION['usuario'] == 'Ricardo.jasf@gmail.com ' ||
                    // $_SESSION['usuario'] == 'flvcamargo24@gmail.com' || $_SESSION['usuario'] == 'flvcamargo24@gmail.com ' || $_SESSION['usuario'] == 'Flvcamargo24@gmail.com' || $_SESSION['usuario'] == 'Flvcamargo24@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rocfreitas@hotmail.com' || $_SESSION['usuario'] == 'rocfreitas@hotmail.com ' || $_SESSION['usuario'] == 'Rocfreitas@hotmail.com' || $_SESSION['usuario'] == 'Rocfreitas@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'elietetaques@hotmail.com' || $_SESSION['usuario'] == 'elietetaques@hotmail.com ' || $_SESSION['usuario'] == 'Elietetaques@hotmail.com' || $_SESSION['usuario'] == 'Elietetaques@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'marcelomdmalta@gmail.com' || $_SESSION['usuario'] == 'marcelomdmalta@gmail.com ' || $_SESSION['usuario'] == 'Marcelomdmalta@gmail.com' || $_SESSION['usuario'] == 'Marcelomdmalta@gmail.com ' ||
                    // $_SESSION['usuario'] == 'cynthya.mbovieira@gmail.com' || $_SESSION['usuario'] == 'cynthya.mbovieira@gmail.com ' || $_SESSION['usuario'] == 'Cynthya.mbovieira@gmail.com' || $_SESSION['usuario'] == 'Cynthya.mbovieira@gmail.com ' ||
                    // $_SESSION['usuario'] == 'anjocba@gmail.com' || $_SESSION['usuario'] == 'anjocba@gmail.com ' || $_SESSION['usuario'] == 'Anjocba@gmail.com' || $_SESSION['usuario'] == 'Anjocba@gmail.com ' ||
                    // $_SESSION['usuario'] == 'karinnecristine17@gmail.com' || $_SESSION['usuario'] == 'karinnecristine17@gmail.com ' || $_SESSION['usuario'] == 'Karinnecristine17@gmail.com' || $_SESSION['usuario'] == 'Karinnecristine17@gmail.com ' ||
                    // $_SESSION['usuario'] == 'pamelachristoni@gmail.com' || $_SESSION['usuario'] == 'pamelachristoni@gmail.com ' || $_SESSION['usuario'] == 'Pamelachristoni@gmail.com' || $_SESSION['usuario'] == 'Pamelachristoni@gmail.com ' ||
                    // $_SESSION['usuario'] == 'manoelrufinoadv@hotmail.com' || $_SESSION['usuario'] == 'manoelrufinoadv@hotmail.com ' || $_SESSION['usuario'] == 'Manoelrufinoadv@hotmail.com' || $_SESSION['usuario'] == 'Manoelrufinoadv@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'antoniofacetto@gmail.com' || $_SESSION['usuario'] == 'antoniofacetto@gmail.com ' || $_SESSION['usuario'] == 'Antoniofacetto@gmail.com' || $_SESSION['usuario'] == 'Antoniofacetto@gmail.com ' ||
                    // $_SESSION['usuario'] == 'flasolon@gmail.com' || $_SESSION['usuario'] == 'flasolon@gmail.com ' || $_SESSION['usuario'] == 'Flasolon@gmail.com' || $_SESSION['usuario'] == 'Flasolon@gmail.com ' ||
                    // $_SESSION['usuario'] == 'fbns1510@gmail.com' || $_SESSION['usuario'] == 'fbns1510@gmail.com ' || $_SESSION['usuario'] == 'Fbns1510@gmail.com' || $_SESSION['usuario'] == 'Fbns1510@gmail.com ' ||
                    // $_SESSION['usuario'] == 'albuespri3@gmail.com' || $_SESSION['usuario'] == 'albuespri3@gmail.com ' || $_SESSION['usuario'] == 'Albuespri3@gmail.com' || $_SESSION['usuario'] == 'Albuespri3@gmail.com ' ||
                    // $_SESSION['usuario'] == 'mary_schutz@hotmail.com' || $_SESSION['usuario'] == 'mary_schutz@hotmail.com ' || $_SESSION['usuario'] == 'Mary_schutz@hotmail.com' || $_SESSION['usuario'] == 'Mary_schutz@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'doni_nunes@hotmail.com' || $_SESSION['usuario'] == 'doni_nunes@hotmail.com ' || $_SESSION['usuario'] == 'Doni_nunes@hotmail.com' || $_SESSION['usuario'] == 'Doni_nunes@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'josineyja@gmail.com' || $_SESSION['usuario'] == 'josineyja@gmail.com ' || $_SESSION['usuario'] == 'Josineyja@gmail.com' || $_SESSION['usuario'] == 'Josineyja@gmail.com ' ||
                    // $_SESSION['usuario'] == 'lucieneabz@yahoo.com.br' || $_SESSION['usuario'] == 'lucieneabz@yahoo.com.br ' || $_SESSION['usuario'] == 'Lucieneabz@yahoo.com.br' || $_SESSION['usuario'] == 'Lucieneabz@yahoo.com.br ' ||
                    // $_SESSION['usuario'] == 'fernandopvai2@hotmail.com' || $_SESSION['usuario'] == 'fernandopvai2@hotmail.com ' || $_SESSION['usuario'] == 'Fernandopvai2@hotmail.com' || $_SESSION['usuario'] == 'Fernandopvai2@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'bettinha1@hotmail.com' || $_SESSION['usuario'] == 'bettinha1@hotmail.com ' || $_SESSION['usuario'] == 'Bettinha1@hotmail.com' || $_SESSION['usuario'] == 'Bettinha1@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'anayraproencaadv@gmail.com' || $_SESSION['usuario'] == 'anayraproencaadv@gmail.com ' || $_SESSION['usuario'] == 'Anayraproencaadv@gmail.com' || $_SESSION['usuario'] == 'Anayraproencaadv@gmail.com ' ||
                    // $_SESSION['usuario'] == 'anajuliatrv@gmail.com' || $_SESSION['usuario'] == 'anajuliatrv@gmail.com ' || $_SESSION['usuario'] == 'Anajuliatrv@gmail.com' || $_SESSION['usuario'] == 'Anajuliatrv@gmail.com ' ||
                    // $_SESSION['usuario'] == 'camila.contabeismt@gmail.com' || $_SESSION['usuario'] == 'camila.contabeismt@gmail.com ' || $_SESSION['usuario'] == 'Camila.contabeismt@gmail.com' || $_SESSION['usuario'] == 'Camila.contabeismt@gmail.com ' ||
                    // $_SESSION['usuario'] == 'fernandabrito.adv@hotmail.com' || $_SESSION['usuario'] == 'fernandabrito.adv@hotmail.com ' || $_SESSION['usuario'] == 'Fernandabrito.adv@hotmail.com' || $_SESSION['usuario'] == 'Fernandabrito.adv@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'vitor09ams@gmail.com' || $_SESSION['usuario'] == 'vitor09ams@gmail.com ' || $_SESSION['usuario'] == 'Vitor09ams@gmail.com' || $_SESSION['usuario'] == 'Vitor09ams@gmail.com ' ||
                    // $_SESSION['usuario'] == 'marsolsc88@gmail.com' || $_SESSION['usuario'] == 'marsolsc88@gmail.com ' || $_SESSION['usuario'] == 'Marsolsc88@gmail.com' || $_SESSION['usuario'] == 'Marsolsc88@gmail.com ' ||
                    // $_SESSION['usuario'] == 'estudadeiro@gmail.com' || $_SESSION['usuario'] == 'estudadeiro@gmail.com ' || $_SESSION['usuario'] == 'Estudadeiro@gmail.com' || $_SESSION['usuario'] == 'Estudadeiro@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rodrigo_teles_wronski@hotmail.com' || $_SESSION['usuario'] == 'rodrigo_teles_wronski@hotmail.com ' || $_SESSION['usuario'] == 'Rodrigo_teles_wronski@hotmail.com' || $_SESSION['usuario'] == 'Rodrigo_teles_wronski@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'elisandratriches@gmail.com' || $_SESSION['usuario'] == 'elisandratriches@gmail.com ' || $_SESSION['usuario'] == 'Elisandratriches@gmail.com ' || $_SESSION['usuario'] == 'Elisandratriches@gmail.com ' ||
                    // $_SESSION['usuario'] == 'asa-sp@hotmail.com' || $_SESSION['usuario'] == 'asa-sp@hotmail.com ' || $_SESSION['usuario'] == 'Asa-sp@hotmail.com' || $_SESSION['usuario'] == 'Asa-sp@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'amenoneto@hotmail.com' || $_SESSION['usuario'] == 'amenoneto@hotmail.com ' || $_SESSION['usuario'] == 'Amenoneto@hotmail.com' || $_SESSION['usuario'] == 'Amenoneto@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'henriquerfap@gmail.com' || $_SESSION['usuario'] == 'henriquerfap@gmail.com ' || $_SESSION['usuario'] == 'Henriquerfap@gmail.com' || $_SESSION['usuario'] == 'Henriquerfap@gmail.com ' ||
                    // $_SESSION['usuario'] == 'natachabalin@gmail.com' || $_SESSION['usuario'] == 'natachabalin@gmail.com ' || $_SESSION['usuario'] == 'Natachabalin@gmail.com' || $_SESSION['usuario'] == 'Natachabalin@gmail.com ' ||
                    // $_SESSION['usuario'] == 'daianastursa@gmail.com' || $_SESSION['usuario'] == 'daianastursa@gmail.com ' || $_SESSION['usuario'] == 'Daianastursa@gmail.com' || $_SESSION['usuario'] == 'Daianastursa@gmail.com ' ||
                    // $_SESSION['usuario'] == 'teodoroalvarenga@yahoo.com.br' || $_SESSION['usuario'] == 'teodoroalvarenga@yahoo.com.br ' || $_SESSION['usuario'] == 'Teodoroalvarenga@yahoo.com.br' || $_SESSION['usuario'] == 'Teodoroalvarenga@yahoo.com.br ' ||
                    // $_SESSION['usuario'] == 'helenasantanaribeiroo@gmail.com' || $_SESSION['usuario'] == 'helenasantanaribeiroo@gmail.com ' || $_SESSION['usuario'] == 'Helenasantanaribeiroo@gmail.com' || $_SESSION['usuario'] == 'Helenasantanaribeiroo@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rogeriavnunes@gmail.com' || $_SESSION['usuario'] == 'rogeriavnunes@gmail.com ' || $_SESSION['usuario'] == 'Rogeriavnunes@gmail.com' || $_SESSION['usuario'] == 'Rogeriavnunes@gmail.com ' ||
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

                    // $_SESSION['usuario'] == 'michellyribeiro82981@gmail.com' || $_SESSION['usuario'] == 'michellyribeiro82981@gmail.com ' || $_SESSION['usuario'] == 'Michellyribeiro82981@gmail.com' || $_SESSION['usuario'] == 'Michellyribeiro82981@gmail.com ' ||
                    // $_SESSION['usuario'] == 'gilsoncoelho110788@gmail.com' || $_SESSION['usuario'] == 'gilsoncoelho110788@gmail.com ' || $_SESSION['usuario'] == 'Gilsoncoelho110788@gmail.com' || $_SESSION['usuario'] == 'Gilsoncoelho110788@gmail.com ' ||
                    // $_SESSION['usuario'] == 'ednoro.apoitia@gmail.com' || $_SESSION['usuario'] == 'ednoro.apoitia@gmail.com ' || $_SESSION['usuario'] == 'Ednoro.apoitia@gmail.com' || $_SESSION['usuario'] == 'Ednoro.apoitia@gmail.com ' ||
                    // $_SESSION['usuario'] == 'edu_rlopes@hotmail.com' || $_SESSION['usuario'] == 'edu_rlopes@hotmail.com ' || $_SESSION['usuario'] == 'Edu_rlopes@hotmail.com' || $_SESSION['usuario'] == 'Edu_rlopes@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'omegageovanasantos@gmail.com' || $_SESSION['usuario'] == 'omegageovanasantos@gmail.com ' || $_SESSION['usuario'] == 'Omegageovanasantos@gmail.com' || $_SESSION['usuario'] == 'Omegageovanasantos@gmail.com ' ||
                    // $_SESSION['usuario'] == 'alexandrecharles022@gmail.com' || $_SESSION['usuario'] == 'alexandrecharles022@gmail.com ' || $_SESSION['usuario'] == 'Alexandrecharles022@gmail.com' || $_SESSION['usuario'] == 'Alexandrecharles022@gmail.com ' ||
                    // $_SESSION['usuario'] == 'michelgugu013@gmail.com' || $_SESSION['usuario'] == 'michelgugu013@gmail.com ' || $_SESSION['usuario'] == 'Michelgugu013@gmail.com' || $_SESSION['usuario'] == 'Michelgugu013@gmail.com ' ||
                    // $_SESSION['usuario'] == 'thiagoruchell5@gmail.com' || $_SESSION['usuario'] == 'thiagoruchell5@gmail.com ' || $_SESSION['usuario'] == 'Thiagoruchell5@gmail.com' || $_SESSION['usuario'] == 'Thiagoruchell5@gmail.com ' ||
                    // $_SESSION['usuario'] == 'wily.fla1@gmail.com' || $_SESSION['usuario'] == 'wily.fla1@gmail.com ' || $_SESSION['usuario'] == 'Wily.fla1@gmail.com' || $_SESSION['usuario'] == 'Wily.fla1@gmail.com ' ||
                    // $_SESSION['usuario'] == 'eunicegaldino578@gmail.com' || $_SESSION['usuario'] == 'eunicegaldino578@gmail.com ' || $_SESSION['usuario'] == 'Eunicegaldino578@gmail.com' || $_SESSION['usuario'] == 'Eunicegaldino578@gmail.com ' ||
                    // $_SESSION['usuario'] == 'wenderoliveira.ferreira16@gmail.com' || $_SESSION['usuario'] == 'wenderoliveira.ferreira16@gmail.com ' || $_SESSION['usuario'] == 'Wenderoliveira.ferreira16@gmail.com' || $_SESSION['usuario'] == 'Wenderoliveira.ferreira16@gmail.com ' ||
                    // $_SESSION['usuario'] == 'wendellvieira1@hotmail.com' || $_SESSION['usuario'] == 'wendellvieira1@hotmail.com ' || $_SESSION['usuario'] == 'Wendellvieira1@hotmail.com' || $_SESSION['usuario'] == 'Wendellvieira1@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'andrenatalino07@gmail.com' || $_SESSION['usuario'] == 'andrenatalino07@gmail.com ' || $_SESSION['usuario'] == 'Andrenatalino07@gmail.com' || $_SESSION['usuario'] == 'Andrenatalino07@gmail.com ' ||
                    // $_SESSION['usuario'] == 'italoferreirafds@hotmail.com' || $_SESSION['usuario'] == 'italoferreirafds@hotmail.com ' || $_SESSION['usuario'] == 'Italoferreirafds@hotmail.com' || $_SESSION['usuario'] == 'Italoferreirafds@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'anderson_silva_bass@hotmail.com' || $_SESSION['usuario'] == 'anderson_silva_bass@hotmail.com ' || $_SESSION['usuario'] == 'Anderson_silva_bass@hotmail.com' || $_SESSION['usuario'] == 'Anderson_silva_bass@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'elisainecarvalho1995@gmail.com' || $_SESSION['usuario'] == 'elisainecarvalho1995@gmail.com ' || $_SESSION['usuario'] == 'Elisainecarvalho1995@gmail.com' || $_SESSION['usuario'] == 'Elisainecarvalho1995@gmail.com ' ||
                    // $_SESSION['usuario'] == 'yankavaleri4@gmail.com' || $_SESSION['usuario'] == 'yankavaleri4@gmail.com ' || $_SESSION['usuario'] == 'Yankavaleri4@gmail.com' || $_SESSION['usuario'] == 'Yankavaleri4@gmail.com ' ||
                    // $_SESSION['usuario'] == 'carlos950henrique@gmail.com' || $_SESSION['usuario'] == 'carlos950henrique@gmail.com ' || $_SESSION['usuario'] == 'Carlos950henrique@gmail.com' || $_SESSION['usuario'] == 'Carlos950henrique@gmail.com ' ||
                    // //PRESENCIAL INICIO
                    // $_SESSION['usuario'] == 'victoramorimm9@gmail.com' || $_SESSION['usuario'] == 'victoramorimm9@gmail.com ' || $_SESSION['usuario'] == 'Victoramorimm9@gmail.com' || $_SESSION['usuario'] == 'Victoramorimm9@gmail.com ' ||
                    // $_SESSION['usuario'] == 'gabi2821viana@hotmail.com' || $_SESSION['usuario'] == 'gabi2821viana@hotmail.com ' || $_SESSION['usuario'] == 'Gabi2821viana@hotmail.com' || $_SESSION['usuario'] == 'Gabi2821viana@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'wendellvieira1@hotmail.com' || $_SESSION['usuario'] == 'wendellvieira1@hotmail.com ' || $_SESSION['usuario'] == 'Wendellvieira1@hotmail.com' || $_SESSION['usuario'] == 'Wendellvieira1@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'helengabrielareis@gmail.com' || $_SESSION['usuario'] == 'helengabrielareis@gmail.com ' || $_SESSION['usuario'] == 'Helengabrielareis@gmail.com' || $_SESSION['usuario'] == 'Helengabrielareis@gmail.com ' ||
                    // $_SESSION['usuario'] == 'fabiosenavasconcelos@hotmail.com' || $_SESSION['usuario'] == 'fabiosenavasconcelos@hotmail.com ' || $_SESSION['usuario'] == 'Fabiosenavasconcelos@hotmail.com' || $_SESSION['usuario'] == 'Fabiosenavasconcelos@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'juniorortiz2112@gmail.com' || $_SESSION['usuario'] == 'juniorortiz2112@gmail.com ' || $_SESSION['usuario'] == 'Juniorortiz2112@gmail.com' || $_SESSION['usuario'] == 'Juniorortiz2112@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jennifersydele86@gmail.com' || $_SESSION['usuario'] == 'jennifersydele86@gmail.com ' || $_SESSION['usuario'] == 'Jennifersydele86@gmail.com' || $_SESSION['usuario'] == 'Jennifersydele86@gmail.com ' ||
                    // $_SESSION['usuario'] == 'ssgiselesouza@gmail.com' || $_SESSION['usuario'] == 'ssgiselesouza@gmail.com ' || $_SESSION['usuario'] == 'Ssgiselesouza@gmail.com' || $_SESSION['usuario'] == 'Ssgiselesouza@gmail.com ' ||
                    // $_SESSION['usuario'] == 'alissonpalmeiras19@gmail.com' || $_SESSION['usuario'] == 'alissonpalmeiras19@gmail.com ' || $_SESSION['usuario'] == 'Alissonpalmeiras19@gmail.com' || $_SESSION['usuario'] == 'Alissonpalmeiras19@gmail.com ' ||
                    // $_SESSION['usuario'] == 'paulovitorsantos23@gmail.com' || $_SESSION['usuario'] == 'paulovitorsantos23@gmail.com ' || $_SESSION['usuario'] == 'Paulovitorsantos23@gmail.com' || $_SESSION['usuario'] == 'Paulovitorsantos23@gmail.com ' ||
                    // $_SESSION['usuario'] == 'juvenalbruno.oliveira@gmail.com' || $_SESSION['usuario'] == 'juvenalbruno.oliveira@gmail.com ' || $_SESSION['usuario'] == 'Juvenalbruno.oliveira@gmail.com' || $_SESSION['usuario'] == 'Juvenalbruno.oliveira@gmail.com ' ||
                    // $_SESSION['usuario'] == 'f.lesco19@hotmail.com' || $_SESSION['usuario'] == 'f.lesco19@hotmail.com ' || $_SESSION['usuario'] == 'F.lesco19@hotmail.com' || $_SESSION['usuario'] == 'F.lesco19@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'henrique.mdo22@gmail.com' || $_SESSION['usuario'] == 'henrique.mdo22@gmail.com ' || $_SESSION['usuario'] == 'Henrique.mdo22@gmail.com' || $_SESSION['usuario'] == 'Henrique.mdo22@gmail.com ' ||
                    // $_SESSION['usuario'] == 'matheus.felipejesus@hotmail.com' || $_SESSION['usuario'] == 'matheus.felipejesus@hotmail.com ' || $_SESSION['usuario'] == 'Matheus.felipejesus@hotmail.com' || $_SESSION['usuario'] == 'Matheus.felipejesus@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'donedopascoal@hotmail.com' || $_SESSION['usuario'] == 'donedopascoal@hotmail.com ' || $_SESSION['usuario'] == 'Donedopascoal@hotmail.com' || $_SESSION['usuario'] == 'Donedopascoal@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'elizaniax@gmail.com' || $_SESSION['usuario'] == 'elizaniax@gmail.com ' || $_SESSION['usuario'] == 'Elizaniax@gmail.com' || $_SESSION['usuario'] == 'Elizaniax@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jkcristina_19@hotmail.com' || $_SESSION['usuario'] == 'jkcristina_19@hotmail.com ' || $_SESSION['usuario'] == 'Jkcristina_19@hotmail.com' || $_SESSION['usuario'] == 'Jkcristina_19@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'dariocamposloiola@gmail.com' || $_SESSION['usuario'] == 'dariocamposloiola@gmail.com ' || $_SESSION['usuario'] == 'Dariocamposloiola@gmail.com' || $_SESSION['usuario'] == 'Dariocamposloiola@gmail.com ' ||
                    // $_SESSION['usuario'] == 'sanfelicebruna96@outlook.com' || $_SESSION['usuario'] == 'sanfelicebruna96@outlook.com ' || $_SESSION['usuario'] == 'Sanfelicebruna96@outlook.com' || $_SESSION['usuario'] == 'Sanfelicebruna96@outlook.com ' ||
                    // $_SESSION['usuario'] == 'jose_ildefonso1997@hotmail.com' || $_SESSION['usuario'] == 'jose_ildefonso1997@hotmail.com ' || $_SESSION['usuario'] == 'Jose_ildefonso1997@hotmail.com' || $_SESSION['usuario'] == 'Jose_ildefonso1997@hotmail.com ' ||
                    // //PRESENCIAL FIM
                    // $_SESSION['usuario'] == 's.joicyrodrigues@gmail.com' || $_SESSION['usuario'] == 's.joicyrodrigues@gmail.com ' || $_SESSION['usuario'] == 'S.joicyrodrigues@gmail.com' || $_SESSION['usuario'] == 'S.joicyrodrigues@gmail.com ' ||
                    // $_SESSION['usuario'] == 'antoniogoncalvesmatos@gmail.com' || $_SESSION['usuario'] == 'antoniogoncalvesmatos@gmail.com ' || $_SESSION['usuario'] == 'Antoniogoncalvesmatos@gmail.com' || $_SESSION['usuario'] == 'Antoniogoncalvesmatos@gmail.com ' ||
                    // $_SESSION['usuario'] == 'mayconn.x@hotmail.com' || $_SESSION['usuario'] == 'mayconn.x@hotmail.com ' || $_SESSION['usuario'] == 'Mayconn.x@hotmail.com' || $_SESSION['usuario'] == 'Mayconn.x@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'manoel.asb@hotmail.com' || $_SESSION['usuario'] == 'manoel.asb@hotmail.com ' || $_SESSION['usuario'] == 'Manoel.asb@hotmail.com' || $_SESSION['usuario'] == 'Manoel.asb@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'pauloedafyne@gmail.com' || $_SESSION['usuario'] == 'pauloedafyne@gmail.com ' || $_SESSION['usuario'] == 'Pauloedafyne@gmail.com' || $_SESSION['usuario'] == 'Pauloedafyne@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rosanamorais165@gmail.com' || $_SESSION['usuario'] == 'rosanamorais165@gmail.com ' || $_SESSION['usuario'] == 'Rosanamorais165@gmail.com' || $_SESSION['usuario'] == 'Rosanamorais165@gmail.com ' ||
                    // $_SESSION['usuario'] == 'genifersl@hotmail.com' || $_SESSION['usuario'] == 'genifersl@hotmail.com ' || $_SESSION['usuario'] == 'Genifersl@hotmail.com' || $_SESSION['usuario'] == 'Genifersl@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'naianeluz@gmail.com' || $_SESSION['usuario'] == 'naianeluz@gmail.com ' || $_SESSION['usuario'] == 'Naianeluz@gmail.com' || $_SESSION['usuario'] == 'Naianeluz@gmail.com ' ||
                    // $_SESSION['usuario'] == 'maykonfaquetti.com@gmail.com' || $_SESSION['usuario'] == 'maykonfaquetti.com@gmail.com ' || $_SESSION['usuario'] == 'Maykonfaquetti.com@gmail.com' || $_SESSION['usuario'] == 'Maykonfaquetti.com@gmail.com ' ||
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

                    // $_SESSION['usuario'] == 'jackyelisbeth@gmail.com' || $_SESSION['usuario'] == 'jackyelisbeth@gmail.com ' || $_SESSION['usuario'] == 'Jackyelisbeth@gmail.com' || $_SESSION['usuario'] == 'Jackyelisbeth@gmail.com ' ||
                    // $_SESSION['usuario'] == 'brunoendic@gmail.com' || $_SESSION['usuario'] == 'brunoendic@gmail.com ' || $_SESSION['usuario'] == 'Brunoendic@gmail.com' || $_SESSION['usuario'] == 'Brunoendic@gmail.com ' ||
                    // $_SESSION['usuario'] == 'hriqueeduardo@gmail.com' || $_SESSION['usuario'] == 'hriqueeduardo@gmail.com ' || $_SESSION['usuario'] == 'Hriqueeduardo@gmail.com' || $_SESSION['usuario'] == 'Hriqueeduardo@gmail.com ' ||
                    // $_SESSION['usuario'] == 'winnye.lara@gmail.com' || $_SESSION['usuario'] == 'winnye.lara@gmail.com ' || $_SESSION['usuario'] == 'Winnye.lara@gmail.com' || $_SESSION['usuario'] == 'Winnye.lara@gmail.com ' ||
                    // $_SESSION['usuario'] == 'cnandocosta@gmail.com' || $_SESSION['usuario'] == 'cnandocosta@gmail.com ' || $_SESSION['usuario'] == 'Cnandocosta@gmail.com' || $_SESSION['usuario'] == 'Cnandocosta@gmail.com ' ||
                    // $_SESSION['usuario'] == 'Michelleduartemonteiro@hotmail.com' || $_SESSION['usuario'] == 'Michelleduartemonteiro@hotmail.com ' || $_SESSION['usuario'] == 'michelleduartemonteiro@hotmail.com' || $_SESSION['usuario'] == 'michelleduartemonteiro@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'andressafribeiro88@gmail.com' || $_SESSION['usuario'] == 'andressafribeiro88@gmail.com ' || $_SESSION['usuario'] == 'Andressafribeiro88@gmail.com' || $_SESSION['usuario'] == 'Andressafribeiro88@gmail.com ' ||
                    // $_SESSION['usuario'] == 'luzirenefn88@gmail.com' || $_SESSION['usuario'] == 'luzirenefn88@gmail.com ' || $_SESSION['usuario'] == 'Luzirenefn88@gmail.com' || $_SESSION['usuario'] == 'Luzirenefn88@gmail.com ' ||
                    // $_SESSION['usuario'] == 'adrianobelon-@outlook.com' || $_SESSION['usuario'] == 'adrianobelon-@outlook.com ' || $_SESSION['usuario'] == 'Adrianobelon-@outlook.com' || $_SESSION['usuario'] == 'Adrianobelon-@outlook.com ' ||
                    // $_SESSION['usuario'] == 'carolinecarvalhovg@gmail.com' || $_SESSION['usuario'] == 'carolinecarvalhovg@gmail.com ' || $_SESSION['usuario'] == 'Carolinecarvalhovg@gmail.com' || $_SESSION['usuario'] == 'Carolinecarvalhovg@gmail.com ' ||
                    // $_SESSION['usuario'] == 'thaliamartins323@gmail.com' || $_SESSION['usuario'] == 'thaliamartins323@gmail.com ' || $_SESSION['usuario'] == 'Thaliamartins323@gmail.com' || $_SESSION['usuario'] == 'Thaliamartins323@gmail.com ' ||
                    // $_SESSION['usuario'] == 'silvatambem20@gmail.com' || $_SESSION['usuario'] == 'silvatambem20@gmail.com ' || $_SESSION['usuario'] == 'Silvatambem20@gmail.com' || $_SESSION['usuario'] == 'Silvatambem20@gmail.com ' ||
                    // $_SESSION['usuario'] == 'glaucia.vanuccia07@gmail.com' || $_SESSION['usuario'] == 'glaucia.vanuccia07@gmail.com ' || $_SESSION['usuario'] == 'Glaucia.vanuccia07@gmail.com' || $_SESSION['usuario'] == 'Glaucia.vanuccia07@gmail.com ' ||
                    // $_SESSION['usuario'] == 'clarakarolinad@gmail.com' || $_SESSION['usuario'] == 'clarakarolinad@gmail.com ' || $_SESSION['usuario'] == 'Clarakarolinad@gmail.com' || $_SESSION['usuario'] == 'Clarakarolinad@gmail.com ' ||
                    // $_SESSION['usuario'] == 'yna_nini_5@hotmail.com' || $_SESSION['usuario'] == 'yna_nini_5@hotmail.com ' || $_SESSION['usuario'] == 'Yna_nini_5@hotmail.com' || $_SESSION['usuario'] == 'Yna_nini_5@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'adrianno.sousa@gmail.com' || $_SESSION['usuario'] == 'adrianno.sousa@gmail.com ' || $_SESSION['usuario'] == 'Adrianno.sousa@gmail.com' || $_SESSION['usuario'] == 'Adrianno.sousa@gmail.com ' ||
                    // $_SESSION['usuario'] == 'murillo_bellato@hotmail.com' || $_SESSION['usuario'] == 'murillo_bellato@hotmail.com ' || $_SESSION['usuario'] == 'Murillo_bellato@hotmail.com' || $_SESSION['usuario'] == 'Murillo_bellato@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'mii.guimaraes@yahoo.com.br' || $_SESSION['usuario'] == 'mii.guimaraes@yahoo.com.br ' || $_SESSION['usuario'] == 'Mii.guimaraes@yahoo.com.br' || $_SESSION['usuario'] == 'Mii.guimaraes@yahoo.com.br ' ||
                    // $_SESSION['usuario'] == 'williamfagundes1991@hotmail.com' || $_SESSION['usuario'] == 'williamfagundes1991@hotmail.com ' || $_SESSION['usuario'] == 'Williamfagundes1991@hotmail.com' || $_SESSION['usuario'] == 'Williamfagundes1991@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'vitorcairo5@gmail.com' || $_SESSION['usuario'] == 'vitorcairo5@gmail.com ' || $_SESSION['usuario'] == 'Vitorcairo5@gmail.com' || $_SESSION['usuario'] == 'Vitorcairo5@gmail.com ' ||
                    // $_SESSION['usuario'] == 'alescstro@gmail.com' || $_SESSION['usuario'] == 'alescstro@gmail.com ' || $_SESSION['usuario'] == 'Alescstro@gmail.com' || $_SESSION['usuario'] == 'Alescstro@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'jaynne_samara@hotmail.com' || $_SESSION['usuario'] == 'jaynne_samara@hotmail.com ' || $_SESSION['usuario'] == 'Jaynne_samara@hotmail.com' || $_SESSION['usuario'] == 'Jaynne_samara@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'andeson.sararekis@gmail.com' || $_SESSION['usuario'] == 'andeson.sararekis@gmail.com ' || $_SESSION['usuario'] == 'Andeson.sararekis@gmail.com' || $_SESSION['usuario'] == 'Andeson.sararekis@gmail.com ' ||
                    // $_SESSION['usuario'] == 'alexsandros_santos@hotmail.com' || $_SESSION['usuario'] == 'alexsandros_santos@hotmail.com ' || $_SESSION['usuario'] == 'Alexsandros_santos@hotmail.com' || $_SESSION['usuario'] == 'Alexsandros_santos@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'crislaynesouza00@gmail.com' || $_SESSION['usuario'] == 'crislaynesouza00@gmail.com ' || $_SESSION['usuario'] == 'Crislaynesouza00@gmail.com' || $_SESSION['usuario'] == 'Crislaynesouza00@gmail.com ' ||
                    // $_SESSION['usuario'] == 'linorodrigues.lr1@gmail.com' || $_SESSION['usuario'] == 'linorodrigues.lr1@gmail.com ' || $_SESSION['usuario'] == 'Linorodrigues.lr1@gmail.com' || $_SESSION['usuario'] == 'Linorodrigues.lr1@gmail.com ' ||
                    // $_SESSION['usuario'] == 'claudison.am@gmail.com' || $_SESSION['usuario'] == 'claudison.am@gmail.com ' || $_SESSION['usuario'] == 'Claudison.am@gmail.com' || $_SESSION['usuario'] == 'Claudison.am@gmail.com ' ||
                    // $_SESSION['usuario'] == 'nathaliagabrielle1997@hotmail.com' || $_SESSION['usuario'] == 'nathaliagabrielle1997@hotmail.com ' || $_SESSION['usuario'] == 'Nathaliagabrielle1997@hotmail.com' || $_SESSION['usuario'] == 'Nathaliagabrielle1997@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'sammycrr@hotmail.com' || $_SESSION['usuario'] == 'sammycrr@hotmail.com ' || $_SESSION['usuario'] == 'Sammycrr@hotmail.com' || $_SESSION['usuario'] == 'Sammycrr@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'rayanacampos93@gmail.com' || $_SESSION['usuario'] == 'rayanacampos93@gmail.com ' || $_SESSION['usuario'] == 'Rayanacampos93@gmail.com' || $_SESSION['usuario'] == 'Rayanacampos93@gmail.com ' ||
                    // $_SESSION['usuario'] == 'renato.lemes33@gmail.com' || $_SESSION['usuario'] == 'renato.lemes33@gmail.com ' || $_SESSION['usuario'] == 'Renato.lemes33@gmail.com' || $_SESSION['usuario'] == 'Renato.lemes33@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jessyca.andradebu@hotmail.com' || $_SESSION['usuario'] == 'jessyca.andradebu@hotmail.com ' || $_SESSION['usuario'] == 'Jessyca.andradebu@hotmail.com' || $_SESSION['usuario'] == 'Jessyca.andradebu@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'myllennabatistadasilva8@gmail.com' || $_SESSION['usuario'] == 'myllennabatistadasilva8@gmail.com ' || $_SESSION['usuario'] == 'Myllennabatistadasilva8@gmail.com' || $_SESSION['usuario'] == 'Myllennabatistadasilva8@gmail.com ' ||
                    // $_SESSION['usuario'] == 'helder.cba@hotmail.com' || $_SESSION['usuario'] == 'helder.cba@hotmail.com ' || $_SESSION['usuario'] == 'Helder.cba@hotmail.com' || $_SESSION['usuario'] == 'Helder.cba@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'adrieleamorim.dri08@gmail.com' || $_SESSION['usuario'] == 'adrieleamorim.dri08@gmail.com ' || $_SESSION['usuario'] == 'Adrieleamorim.dri08@gmail.com' || $_SESSION['usuario'] == 'Adrieleamorim.dri08@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jonil.marques@hotmail.com' || $_SESSION['usuario'] == 'jonil.marques@hotmail.com ' || $_SESSION['usuario'] == 'Jonil.marques@hotmail.com' || $_SESSION['usuario'] == 'Jonil.marques@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'mauraapdesene@gmail.com' || $_SESSION['usuario'] == 'mauraapdesene@gmail.com ' || $_SESSION['usuario'] == 'Mauraapdesene@gmail.com' || $_SESSION['usuario'] == 'Mauraapdesene@gmail.com ' ||
                    // $_SESSION['usuario'] == 'lepriples@gmail.com' || $_SESSION['usuario'] == 'lepriples@gmail.com ' || $_SESSION['usuario'] == 'Lepriples@gmail.com' || $_SESSION['usuario'] == 'Lepriples@gmail.com ' ||
                    // $_SESSION['usuario'] == 'andressasbf@gmail.com' || $_SESSION['usuario'] == 'andressasbf@gmail.com ' || $_SESSION['usuario'] == 'Andressasbf@gmail.com' || $_SESSION['usuario'] == 'Andressasbf@gmail.com ' ||
                    // $_SESSION['usuario'] == 'makelybabora@hotmail.com' || $_SESSION['usuario'] == 'makelybabora@hotmail.com ' || $_SESSION['usuario'] == 'Makelybabora@hotmail.com' || $_SESSION['usuario'] == 'Makelybabora@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'viniciusgui37@hotmail.com' || $_SESSION['usuario'] == 'viniciusgui37@hotmail.com ' || $_SESSION['usuario'] == 'Viniciusgui37@hotmail.com' || $_SESSION['usuario'] == 'Viniciusgui37@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'alanwaldir@hotmail.com' || $_SESSION['usuario'] == 'alanwaldir@hotmail.com ' || $_SESSION['usuario'] == 'Alanwaldir@hotmail.com' || $_SESSION['usuario'] == 'Alanwaldir@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'leticiafanalli@gmail.com' || $_SESSION['usuario'] == 'leticiafanalli@gmail.com ' || $_SESSION['usuario'] == 'Leticiafanalli@gmail.com' || $_SESSION['usuario'] == 'Leticiafanalli@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rosisouza0611@gmail.com' || $_SESSION['usuario'] == 'rosisouza0611@gmail.com ' || $_SESSION['usuario'] == 'Rosisouza0611@gmail.com' || $_SESSION['usuario'] == 'Rosisouza0611@gmail.com ' ||
                    // $_SESSION['usuario'] == 'erika.lhods@hotmail.com' || $_SESSION['usuario'] == 'erika.lhods@hotmail.com ' || $_SESSION['usuario'] == 'Erika.lhods@hotmail.com' || $_SESSION['usuario'] == 'Erika.lhods@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'monica.figueiredo23@hotmail.com' || $_SESSION['usuario'] == 'monica.figueiredo23@hotmail.com ' || $_SESSION['usuario'] == 'Monica.figueiredo23@hotmail.com' || $_SESSION['usuario'] == 'Monica.figueiredo23@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'emanuelasiqueiradacosta@gmail.com' || $_SESSION['usuario'] == 'emanuelasiqueiradacosta@gmail.com ' || $_SESSION['usuario'] == 'Emanuelasiqueiradacosta@gmail.com' || $_SESSION['usuario'] == 'Emanuelasiqueiradacosta@gmail.com ' ||
                    // $_SESSION['usuario'] == 'deizi_kettermann@hotmail.com' || $_SESSION['usuario'] == 'deizi_kettermann@hotmail.com ' || $_SESSION['usuario'] == 'Deizi_kettermann@hotmail.com' || $_SESSION['usuario'] == 'Deizi_kettermann@hotmail.com ' ||
                    // // $_SESSION['usuario'] == 'camila.vitoria.amanda@hotmail.com' || $_SESSION['usuario'] == 'camila.vitoria.amanda@hotmail.com ' || $_SESSION['usuario'] == 'Camila.vitoria.amanda@hotmail.com' || $_SESSION['usuario'] == 'Camila.vitoria.amanda@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'rosivaldo.albres@gmail.com' || $_SESSION['usuario'] == 'rosivaldo.albres@gmail.com ' || $_SESSION['usuario'] == 'Rosivaldo.albres@gmail.com' || $_SESSION['usuario'] == 'Rosivaldo.albres@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'mel-com-mel@hotmail.com.br' || $_SESSION['usuario'] == 'mel-com-mel@hotmail.com.br ' || $_SESSION['usuario'] == 'Mel-com-mel@hotmail.com.br' || $_SESSION['usuario'] == 'Mel-com-mel@hotmail.com.br ' ||
                    // $_SESSION['usuario'] == 'danielagarxia15@gmail.com' || $_SESSION['usuario'] == 'danielagarxia15@gmail.com ' || $_SESSION['usuario'] == 'Danielagarxia15@gmail.com' || $_SESSION['usuario'] == 'Danielagarxia15@gmail.com ' ||
                    // $_SESSION['usuario'] == 'kamylatorreyra@gmail.com' || $_SESSION['usuario'] == 'kamylatorreyra@gmail.com ' || $_SESSION['usuario'] == 'Kamylatorreyra@gmail.com' || $_SESSION['usuario'] == 'Kamylatorreyra@gmail.com ' ||
                    // $_SESSION['usuario'] == 'goes.vivi@gmail.com' || $_SESSION['usuario'] == 'goes.vivi@gmail.com ' || $_SESSION['usuario'] == 'Goes.vivi@gmail.com' || $_SESSION['usuario'] == 'Goes.vivi@gmail.com ' ||
                    // $_SESSION['usuario'] == 'progeo.amb@gmail.com' || $_SESSION['usuario'] == 'progeo.amb@gmail.com ' || $_SESSION['usuario'] == 'Progeo.amb@gmail.com' || $_SESSION['usuario'] == 'Progeo.amb@gmail.com ' ||
                    // $_SESSION['usuario'] == 'vandafreitas2011@gmail.com' || $_SESSION['usuario'] == 'vandafreitas2011@gmail.com ' || $_SESSION['usuario'] == 'Vandafreitas2011@gmail.com' || $_SESSION['usuario'] == 'Vandafreitas2011@gmail.com ' ||
                    // $_SESSION['usuario'] == 'miltoneto4395@gmail.com' || $_SESSION['usuario'] == 'miltoneto4395@gmail.com ' || $_SESSION['usuario'] == 'Miltoneto4395@gmail.com' || $_SESSION['usuario'] == 'Miltoneto4395@gmail.com ' ||
                    // $_SESSION['usuario'] == 'kamiladltavares@outlook.com' || $_SESSION['usuario'] == 'kamiladltavares@outlook.com ' || $_SESSION['usuario'] == 'Kamiladltavares@outlook.com' || $_SESSION['usuario'] == 'Kamiladltavares@outlook.com ' ||
                    // $_SESSION['usuario'] == 'wcunha2014@outlook.com' || $_SESSION['usuario'] == 'wcunha2014@outlook.com ' || $_SESSION['usuario'] == 'Wcunha2014@outlook.com' || $_SESSION['usuario'] == 'Wcunha2014@outlook.com ' ||
                    // $_SESSION['usuario'] == 'fraiany14@gmail.com' || $_SESSION['usuario'] == 'fraiany14@gmail.com ' || $_SESSION['usuario'] == 'Fraiany14@gmail.com' || $_SESSION['usuario'] == 'Fraiany14@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jayneferrari@hotmail.com' || $_SESSION['usuario'] == 'jayneferrari@hotmail.com ' || $_SESSION['usuario'] == 'Jayneferrari@hotmail.com' || $_SESSION['usuario'] == 'Jayneferrari@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'nataliamello.v@gmail.com' || $_SESSION['usuario'] == 'nataliamello.v@gmail.com ' || $_SESSION['usuario'] == 'Nataliamello.v@gmail.com' || $_SESSION['usuario'] == 'Nataliamello.v@gmail.com ' ||
                    // $_SESSION['usuario'] == 'maymgcprado@gmail.com' || $_SESSION['usuario'] == 'maymgcprado@gmail.com ' || $_SESSION['usuario'] == 'Maymgcprado@gmail.com' || $_SESSION['usuario'] == 'Maymgcprado@gmail.com ' ||
                    // $_SESSION['usuario'] == 'dindoroca@hotmail.com' || $_SESSION['usuario'] == 'dindoroca@hotmail.com ' || $_SESSION['usuario'] == 'Dindoroca@hotmail.com' || $_SESSION['usuario'] == 'Dindoroca@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'andredpersonal@gmail.com' || $_SESSION['usuario'] == 'andredpersonal@gmail.com ' || $_SESSION['usuario'] == 'Andredpersonal@gmail.com' || $_SESSION['usuario'] == 'Andredpersonal@gmail.com ' ||
                    // $_SESSION['usuario'] == 'daniccar@gmail.com' || $_SESSION['usuario'] == 'daniccar@gmail.com ' || $_SESSION['usuario'] == 'Daniccar@gmail.com' || $_SESSION['usuario'] == 'Daniccar@gmail.com ' ||
                    // $_SESSION['usuario'] == 'ingridsilva.21@hotmail.com' || $_SESSION['usuario'] == 'ingridsilva.21@hotmail.com ' || $_SESSION['usuario'] == 'Ingridsilva.21@hotmail.com' || $_SESSION['usuario'] == 'Ingridsilva.21@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'lilirscosta@gmail.com' || $_SESSION['usuario'] == 'lilirscosta@gmail.com ' || $_SESSION['usuario'] == 'Lilirscosta@gmail.com' || $_SESSION['usuario'] == 'Lilirscosta@gmail.com ' ||
                    // $_SESSION['usuario'] == 'luizavbrun@hotmail.com' || $_SESSION['usuario'] == 'luizavbrun@hotmail.com ' || $_SESSION['usuario'] == 'Luizavbrun@hotmail.com' || $_SESSION['usuario'] == 'Luizavbrun@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'arielearruda238@gmail.com' || $_SESSION['usuario'] == 'arielearruda238@gmail.com ' || $_SESSION['usuario'] == 'Arielearruda238@gmail.com' || $_SESSION['usuario'] == 'Arielearruda238@gmail.com ' ||
                    // $_SESSION['usuario'] == 'pam.lazzeri@gmail.com' || $_SESSION['usuario'] == 'pam.lazzeri@gmail.com ' || $_SESSION['usuario'] == 'Pam.lazzeri@gmail.com' || $_SESSION['usuario'] == 'Pam.lazzeri@gmail.com ' ||
                    // $_SESSION['usuario'] == 'marcio.amorim.gregorio@hotmail.com' || $_SESSION['usuario'] == 'marcio.amorim.gregorio@hotmail.com ' || $_SESSION['usuario'] == 'Marcio.amorim.gregorio@hotmail.com' || $_SESSION['usuario'] == 'Marcio.amorim.gregorio@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'matheusc_a@outlook.com' || $_SESSION['usuario'] == 'matheusc_a@outlook.com ' || $_SESSION['usuario'] == 'Matheusc_a@outlook.com' || $_SESSION['usuario'] == 'Matheusc_a@outlook.com ' ||
                    // $_SESSION['usuario'] == 'rossana.mb@outlook.com' || $_SESSION['usuario'] == 'rossana.mb@outlook.com ' || $_SESSION['usuario'] == 'Rossana.mb@outlook.com' || $_SESSION['usuario'] == 'Rossana.mb@outlook.com ' ||
                    // $_SESSION['usuario'] == 'lo.mattos17@gmail.com' || $_SESSION['usuario'] == 'lo.mattos17@gmail.com ' || $_SESSION['usuario'] == 'Lo.mattos17@gmail.com' || $_SESSION['usuario'] == 'Lo.mattos17@gmail.com ' ||
                    // $_SESSION['usuario'] == 'simone_angell@hotmail.com' || $_SESSION['usuario'] == 'simone_angell@hotmail.com ' || $_SESSION['usuario'] == 'Simone_angell@hotmail.com' || $_SESSION['usuario'] == 'Simone_angell@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'danubia_jappa@hotmail.com' || $_SESSION['usuario'] == 'danubia_jappa@hotmail.com ' || $_SESSION['usuario'] == 'Danubia_jappa@hotmail.com' || $_SESSION['usuario'] == 'Danubia_jappa@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'vitorh46@hotmail.com' || $_SESSION['usuario'] == 'vitorh46@hotmail.com ' || $_SESSION['usuario'] == 'Vitorh46@hotmail.com' || $_SESSION['usuario'] == 'Vitorh46@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'eve_nascar20@hotmail.com' || $_SESSION['usuario'] == 'eve_nascar20@hotmail.com ' || $_SESSION['usuario'] == 'Eve_nascar20@hotmail.com' || $_SESSION['usuario'] == 'Eve_nascar20@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'nanaauves@gmail.com' || $_SESSION['usuario'] == 'nanaauves@gmail.com ' || $_SESSION['usuario'] == 'Nanaauves@gmail.com' || $_SESSION['usuario'] == 'Nanaauves@gmail.com ' ||
                    // $_SESSION['usuario'] == 'aline_hs_2007@outlook.com' || $_SESSION['usuario'] == 'aline_hs_2007@outlook.com ' || $_SESSION['usuario'] == 'Aline_hs_2007@outlook.com' || $_SESSION['usuario'] == 'Aline_hs_2007@outlook.com ' ||
                    // $_SESSION['usuario'] == 'katia.r.s.moreno@gmail.com' || $_SESSION['usuario'] == 'katia.r.s.moreno@gmail.com ' || $_SESSION['usuario'] == 'Katia.r.s.moreno@gmail.com' || $_SESSION['usuario'] == 'Katia.r.s.moreno@gmail.com ' ||
                    // $_SESSION['usuario'] == 'vanyoliveira40@gmail.com' || $_SESSION['usuario'] == 'vanyoliveira40@gmail.com ' || $_SESSION['usuario'] == 'Vanyoliveira40@gmail.com' || $_SESSION['usuario'] == 'Vanyoliveira40@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jalysson_201@outlook.com' || $_SESSION['usuario'] == 'jalysson_201@outlook.com ' || $_SESSION['usuario'] == 'Jalysson_201@outlook.com' || $_SESSION['usuario'] == 'Jalysson_201@outlook.com ' ||
                    // $_SESSION['usuario'] == 'oliveira.jeniffer7@gmail.com' || $_SESSION['usuario'] == 'oliveira.jeniffer7@gmail.com ' || $_SESSION['usuario'] == 'Oliveira.jeniffer7@gmail.com' || $_SESSION['usuario'] == 'Oliveira.jeniffer7@gmail.com ' ||
                    // $_SESSION['usuario'] == 'zilmapardimdigital@gmail.com' || $_SESSION['usuario'] == 'zilmapardimdigital@gmail.com ' || $_SESSION['usuario'] == 'Zilmapardimdigital@gmail.com' || $_SESSION['usuario'] == 'Zilmapardimdigital@gmail.com ' ||
                    // $_SESSION['usuario'] == 'katherine.mt@hotmail.com' || $_SESSION['usuario'] == 'katherine.mt@hotmail.com ' || $_SESSION['usuario'] == 'Katherine.mt@hotmail.com' || $_SESSION['usuario'] == 'Katherine.mt@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'rosana_nana799@hotmail.com' || $_SESSION['usuario'] == 'rosana_nana799@hotmail.com ' || $_SESSION['usuario'] == 'Rosana_nana799@hotmail.com' || $_SESSION['usuario'] == 'Rosana_nana799@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'sandraelisnete@hotmail.com' || $_SESSION['usuario'] == 'sandraelisnete@hotmail.com ' || $_SESSION['usuario'] == 'Sandraelisnete@hotmail.com' || $_SESSION['usuario'] == 'Sandraelisnete@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'josianemachado53@gmail.com' || $_SESSION['usuario'] == 'josianemachado53@gmail.com ' || $_SESSION['usuario'] == 'Josianemachado53@gmail.com' || $_SESSION['usuario'] == 'Josianemachado53@gmail.com ' ||
                    // $_SESSION['usuario'] == 'thiago_castro_85@hotmail.com' || $_SESSION['usuario'] == 'thiago_castro_85@hotmail.com ' || $_SESSION['usuario'] == 'Thiago_castro_85@hotmail.com' || $_SESSION['usuario'] == 'Thiago_castro_85@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'carolmesquita.24@gmail.com' || $_SESSION['usuario'] == 'carolmesquita.24@gmail.com ' || $_SESSION['usuario'] == 'Carolmesquita.24@gmail.com' || $_SESSION['usuario'] == 'Carolmesquita.24@gmail.com ' ||
                    // $_SESSION['usuario'] == 'emacedo.antunes@gmail.com' || $_SESSION['usuario'] == 'emacedo.antunes@gmail.com ' || $_SESSION['usuario'] == 'Emacedo.antunes@gmail.com' || $_SESSION['usuario'] == 'Emacedo.antunes@gmail.com ' ||
                    // $_SESSION['usuario'] == 'mayra.barros@hotmail.com' || $_SESSION['usuario'] == 'mayra.barros@hotmail.com ' || $_SESSION['usuario'] == 'Mayra.barros@hotmail.com' || $_SESSION['usuario'] == 'Mayra.barros@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'juliomoschini@hotmail.com' || $_SESSION['usuario'] == 'juliomoschini@hotmail.com ' || $_SESSION['usuario'] == 'Juliomoschini@hotmail.com' || $_SESSION['usuario'] == 'Juliomoschini@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'gabrieleferreiracunha@gmail.com' || $_SESSION['usuario'] == 'gabrieleferreiracunha@gmail.com ' || $_SESSION['usuario'] == 'Gabrieleferreiracunha@gmail.com' || $_SESSION['usuario'] == 'Gabrieleferreiracunha@gmail.com ' ||
                    // $_SESSION['usuario'] == 'adrianamoura190@gmail.com' || $_SESSION['usuario'] == 'adrianamoura190@gmail.com ' || $_SESSION['usuario'] == 'Adrianamoura190@gmail.com' || $_SESSION['usuario'] == 'Adrianamoura190@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jakelinemoraes2010@gmail.com' || $_SESSION['usuario'] == 'jakelinemoraes2010@gmail.com ' || $_SESSION['usuario'] == 'Jakelinemoraes2010@gmail.com' || $_SESSION['usuario'] == 'Jakelinemoraes2010@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jakelinesilvaa77@gmail.com' || $_SESSION['usuario'] == 'jakelinesilvaa77@gmail.com ' || $_SESSION['usuario'] == 'Jakelinesilvaa77@gmail.com' || $_SESSION['usuario'] == 'Jakelinesilvaa77@gmail.com ' ||
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

                    // $_SESSION['usuario'] == 'adarleniassis@gmail.com' || $_SESSION['usuario'] == 'adarleniassis@gmail.com ' || $_SESSION['usuario'] == 'Adarleniassis@gmail.com' || $_SESSION['usuario'] == 'Adarleniassis@gmail.com ' ||
                    // $_SESSION['usuario'] == 'cristianeoliveirases@gmail.com' || $_SESSION['usuario'] == 'cristianeoliveirases@gmail.com ' || $_SESSION['usuario'] == 'Cristianeoliveirases@gmail.com' || $_SESSION['usuario'] == 'Cristianeoliveirases@gmail.com ' ||
                    // $_SESSION['usuario'] == 'brunohenriquegomes034@gmail.com' || $_SESSION['usuario'] == 'brunohenriquegomes034@gmail.com ' || $_SESSION['usuario'] == 'Brunohenriquegomes034@gmail.com' || $_SESSION['usuario'] == 'Brunohenriquegomes034@gmail.com ' ||
                    // $_SESSION['usuario'] == 'bastoscba@gmail.com' || $_SESSION['usuario'] == 'bastoscba@gmail.com ' || $_SESSION['usuario'] == 'Bastoscba@gmail.com' || $_SESSION['usuario'] == 'Bastoscba@gmail.com ' ||
                    // $_SESSION['usuario'] == 'larissaoliveirapsicologia@gmail.com' || $_SESSION['usuario'] == 'larissaoliveirapsicologia@gmail.com ' || $_SESSION['usuario'] == 'Larissaoliveirapsicologia@gmail.com' || $_SESSION['usuario'] == 'Larissaoliveirapsicologia@gmail.com ' ||
                    // $_SESSION['usuario'] == 'fernandaxex@outlook.com' || $_SESSION['usuario'] == 'fernandaxex@outlook.com ' || $_SESSION['usuario'] == 'Fernandaxex@outlook.com' || $_SESSION['usuario'] == 'Fernandaxex@outlook.com ' ||
                    // $_SESSION['usuario'] == 'andressabruceze28@gmail.com' || $_SESSION['usuario'] == 'andressabruceze28@gmail.com ' || $_SESSION['usuario'] == 'Andressabruceze28@gmail.com' || $_SESSION['usuario'] == 'Andressabruceze28@gmail.com ' ||
                    // $_SESSION['usuario'] == 'thamirisscunha@gmail.com' || $_SESSION['usuario'] == 'thamirisscunha@gmail.com ' || $_SESSION['usuario'] == 'Thamirisscunha@gmail.com' || $_SESSION['usuario'] == 'Thamirisscunha@gmail.com ' ||
                    // $_SESSION['usuario'] == 'brunna.cavalheiroo@gmail.com' || $_SESSION['usuario'] == 'brunna.cavalheiroo@gmail.com ' || $_SESSION['usuario'] == 'Brunna.cavalheiroo@gmail.com' || $_SESSION['usuario'] == 'Brunna.cavalheiroo@gmail.com ' ||
                    // $_SESSION['usuario'] == 'juliamota197@gmail.com' || $_SESSION['usuario'] == 'juliamota197@gmail.com ' || $_SESSION['usuario'] == 'Juliamota197@gmail.com' || $_SESSION['usuario'] == 'Juliamota197@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'smrezende19@gmail.com' || $_SESSION['usuario'] == 'smrezende19@gmail.com ' || $_SESSION['usuario'] == 'Smrezende19@gmail.com' || $_SESSION['usuario'] == 'Smrezende19@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'deboraffdireito@gmail.com' || $_SESSION['usuario'] == 'deboraffdireito@gmail.com ' || $_SESSION['usuario'] == 'Deboraffdireito@gmail.com' || $_SESSION['usuario'] == 'Deboraffdireito@gmail.com ' ||
                    // $_SESSION['usuario'] == 'gustavojsa2@gmail.com' || $_SESSION['usuario'] == 'gustavojsa2@gmail.com ' || $_SESSION['usuario'] == 'Gustavojsa2@gmail.com' || $_SESSION['usuario'] == 'Gustavojsa2@gmail.com ' ||
                    // $_SESSION['usuario'] == 'andrezatavaresl@hotmail.com' || $_SESSION['usuario'] == 'andrezatavaresl@hotmail.com ' || $_SESSION['usuario'] == 'Andrezatavaresl@hotmail.com' || $_SESSION['usuario'] == 'Andrezatavaresl@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'natalia.fava@hotmail.com' || $_SESSION['usuario'] == 'natalia.fava@hotmail.com ' || $_SESSION['usuario'] == 'Natalia.fava@hotmail.com' || $_SESSION['usuario'] == 'Natalia.fava@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'elizete73ferreira@gmail.com' || $_SESSION['usuario'] == 'elizete73ferreira@gmail.com ' || $_SESSION['usuario'] == 'Elizete73ferreira@gmail.com' || $_SESSION['usuario'] == 'Elizete73ferreira@gmail.com ' ||
                    // $_SESSION['usuario'] == 'gustavojsa.adv@gmail.com' || $_SESSION['usuario'] == 'gustavojsa.adv@gmail.com ' || $_SESSION['usuario'] == 'Gustavojsa.adv@gmail.com' || $_SESSION['usuario'] == 'Gustavojsa.adv@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'pamelaoliveira544@gmail.com' || $_SESSION['usuario'] == 'pamelaoliveira544@gmail.com ' || $_SESSION['usuario'] == 'Pamelaoliveira544@gmail.com' || $_SESSION['usuario'] == 'Pamelaoliveira544@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'vinimono@outlook.com' || $_SESSION['usuario'] == 'vinimono@outlook.com ' || $_SESSION['usuario'] == 'Vinimono@outlook.com' || $_SESSION['usuario'] == 'Vinimono@outlook.com ' ||
                    // $_SESSION['usuario'] == 'tata_ormond@hotmail.com' || $_SESSION['usuario'] == 'tata_ormond@hotmail.com ' || $_SESSION['usuario'] == 'Tata_ormond@hotmail.com' || $_SESSION['usuario'] == 'Tata_ormond@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'daniella_amaral@hotmail.com' || $_SESSION['usuario'] == 'daniella_amaral@hotmail.com ' || $_SESSION['usuario'] == 'Daniella_amaral@hotmail.com' || $_SESSION['usuario'] == 'Daniella_amaral@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'lucasvjcosta@gmail.com' || $_SESSION['usuario'] == 'lucasvjcosta@gmail.com ' || $_SESSION['usuario'] == 'Lucasvjcosta@gmail.com' || $_SESSION['usuario'] == 'Lucasvjcosta@gmail.com ' ||
                    // $_SESSION['usuario'] == 'willian.alm39@gmail.com' || $_SESSION['usuario'] == 'willian.alm39@gmail.com ' || $_SESSION['usuario'] == 'Willian.alm39@gmail.com' || $_SESSION['usuario'] == 'Willian.alm39@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jubbabrasil@yahoo.com.br' || $_SESSION['usuario'] == 'jubbabrasil@yahoo.com.br ' || $_SESSION['usuario'] == 'Jubbabrasil@yahoo.com.br' || $_SESSION['usuario'] == 'Jubbabrasil@yahoo.com.br ' ||
                    // $_SESSION['usuario'] == 'juliacba@hotmail.com.br' || $_SESSION['usuario'] == 'juliacba@hotmail.com.br ' || $_SESSION['usuario'] == 'Juliacba@hotmail.com.br' || $_SESSION['usuario'] == 'Juliacba@hotmail.com.br ' ||
                    // $_SESSION['usuario'] == 'costa92douglas@gmail.com' || $_SESSION['usuario'] == 'costa92douglas@gmail.com ' || $_SESSION['usuario'] == 'Costa92douglas@gmail.com' || $_SESSION['usuario'] == 'Costa92douglas@gmail.com ' ||
                    // $_SESSION['usuario'] == 'dasmarq@gmail.com' || $_SESSION['usuario'] == 'dasmarq@gmail.com ' || $_SESSION['usuario'] == 'Dasmarq@gmail.com' || $_SESSION['usuario'] == 'Dasmarq@gmail.com ' ||
                    // $_SESSION['usuario'] == 'mariana.gfonseca@hotmail.com' || $_SESSION['usuario'] == 'mariana.gfonseca@hotmail.com ' || $_SESSION['usuario'] == 'Mariana.gfonseca@hotmail.com' || $_SESSION['usuario'] == 'Mariana.gfonseca@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'agnescaires@gmail.com' || $_SESSION['usuario'] == 'agnescaires@gmail.com ' || $_SESSION['usuario'] == 'Agnescaires@gmail.com' || $_SESSION['usuario'] == 'Agnescaires@gmail.com ' ||
                    // $_SESSION['usuario'] == 'krcaguiar@hotmail.com' || $_SESSION['usuario'] == 'krcaguiar@hotmail.com ' || $_SESSION['usuario'] == 'Krcaguiar@hotmail.com' || $_SESSION['usuario'] == 'Krcaguiar@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'cecymiranda20@hotmail.com' || $_SESSION['usuario'] == 'cecymiranda20@hotmail.com ' || $_SESSION['usuario'] == 'Cecymiranda20@hotmail.com' || $_SESSION['usuario'] == 'Cecymiranda20@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'rayanetaques@hotmail.com' || $_SESSION['usuario'] == 'rayanetaques@hotmail.com ' || $_SESSION['usuario'] == 'Rayanetaques@hotmail.com' || $_SESSION['usuario'] == 'Rayanetaques@hotmail.com ' ||
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

                    // $_SESSION['usuario'] == 'ag.manu@hotmail.com' || $_SESSION['usuario'] == 'ag.manu@hotmail.com ' || $_SESSION['usuario'] == 'Ag.manu@hotmail.com' || $_SESSION['usuario'] == 'Ag.manu@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'glen.ewellin@gmail.com' || $_SESSION['usuario'] == 'glen.ewellin@gmail.com ' || $_SESSION['usuario'] == 'Glen.ewellin@gmail.com' || $_SESSION['usuario'] == 'Glen.ewellin@gmail.com ' ||
                    // $_SESSION['usuario'] == 'giselda_blue@hotmail.com' || $_SESSION['usuario'] == 'giselda_blue@hotmail.com ' || $_SESSION['usuario'] == 'Giselda_blue@hotmail.com' || $_SESSION['usuario'] == 'Giselda_blue@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'augustoalbuquerque91@hotmail.com' || $_SESSION['usuario'] == 'augustoalbuquerque91@hotmail.com ' || $_SESSION['usuario'] == 'Augustoalbuquerque91@hotmail.com' || $_SESSION['usuario'] == 'Augustoalbuquerque91@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'anamoura_silva@hotmail.com' || $_SESSION['usuario'] == 'anamoura_silva@hotmail.com ' || $_SESSION['usuario'] == 'anamoura_silva@hotmail.com' || $_SESSION['usuario'] == 'Anamoura_silva@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'mayararocha16@hotmail.com' || $_SESSION['usuario'] == 'mayararocha16@hotmail.com ' || $_SESSION['usuario'] == 'Mayararocha16@hotmail.com' || $_SESSION['usuario'] == 'Mayararocha16@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'yngridmonteiro1@gmail.com' || $_SESSION['usuario'] == 'yngridmonteiro1@gmail.com ' || $_SESSION['usuario'] == 'Yngridmonteiro1@gmail.com' || $_SESSION['usuario'] == 'Yngridmonteiro1@gmail.com ' ||
                    // $_SESSION['usuario'] == 'maurogoncalo2013@hotmail.com' || $_SESSION['usuario'] == 'maurogoncalo2013@hotmail.com ' || $_SESSION['usuario'] == 'Maurogoncalo2013@hotmail.com' || $_SESSION['usuario'] == 'Maurogoncalo2013@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'kamila.ervatim@hotmail.com' || $_SESSION['usuario'] == 'kamila.ervatim@hotmail.com ' || $_SESSION['usuario'] == 'Kamila.ervatim@hotmail.com' || $_SESSION['usuario'] == 'Kamila.ervatim@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'valerialuiselli7991@gmail.com' || $_SESSION['usuario'] == 'valerialuiselli7991@gmail.com ' || $_SESSION['usuario'] == 'Valerialuiselli7991@gmail.com' || $_SESSION['usuario'] == 'Valerialuiselli7991@gmail.com ' ||
                    // $_SESSION['usuario'] == 'ronissandraconde@gmail.com' || $_SESSION['usuario'] == 'ronissandraconde@gmail.com ' || $_SESSION['usuario'] == 'Ronissandraconde@gmail.com' || $_SESSION['usuario'] == 'Ronissandraconde@gmail.com ' ||
                    // $_SESSION['usuario'] == 'carlianesouzafreire@gmail.com' || $_SESSION['usuario'] == 'carlianesouzafreire@gmail.com ' || $_SESSION['usuario'] == 'Carlianesouzafreire@gmail.com' || $_SESSION['usuario'] == 'Carlianesouzafreire@gmail.com ' ||
                    // $_SESSION['usuario'] == 'viana.eveline@gmail.com' || $_SESSION['usuario'] == 'viana.eveline@gmail.com ' || $_SESSION['usuario'] == 'Viana.eveline@gmail.com' || $_SESSION['usuario'] == 'Viana.eveline@gmail.com ' ||
                    // $_SESSION['usuario'] == 'danielly_crf@hotmail.com' || $_SESSION['usuario'] == 'danielly_crf@hotmail.com ' || $_SESSION['usuario'] == 'Danielly_crf@hotmail.com' || $_SESSION['usuario'] == 'Danielly_crf@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'tamy_domingues@hotmail.com' || $_SESSION['usuario'] == 'tamy_domingues@hotmail.com ' || $_SESSION['usuario'] == 'Tamy_domingues@hotmail.com' || $_SESSION['usuario'] == 'Tamy_domingues@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'brenda.lopes9200@gmail.com' || $_SESSION['usuario'] == 'brenda.lopes9200@gmail.com ' || $_SESSION['usuario'] == 'Brenda.lopes9200@gmail.com' || $_SESSION['usuario'] == 'Brenda.lopes9200@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rafael.silva00891@gmail.com' || $_SESSION['usuario'] == 'rafael.silva00891@gmail.com ' || $_SESSION['usuario'] == 'Rafael.silva00891@gmail.com' || $_SESSION['usuario'] == 'Rafael.silva00891@gmail.com ' ||
                    // $_SESSION['usuario'] == 'Beatriz1.2araujo55@gmail.com' || $_SESSION['usuario'] == 'Beatriz1.2araujo55@gmail.com ' || $_SESSION['usuario'] == 'beatriz1.2araujo55@gmail.com' || $_SESSION['usuario'] == 'beatriz1.2araujo55@gmail.com ' ||
                    // $_SESSION['usuario'] == 'elmo.80@hotmail.com' || $_SESSION['usuario'] == 'elmo.80@hotmail.com ' || $_SESSION['usuario'] == 'Elmo.80@hotmail.com' || $_SESSION['usuario'] == 'Elmo.80@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'luanammorbeck@hotmail.com' || $_SESSION['usuario'] == 'luanammorbeck@hotmail.com ' || $_SESSION['usuario'] == 'Luanammorbeck@hotmail.com' || $_SESSION['usuario'] == 'Luanammorbeck@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'fe.sguario@yahoo.com.br' || $_SESSION['usuario'] == 'fe.sguario@yahoo.com.br ' || $_SESSION['usuario'] == 'Fe.sguario@yahoo.com.br' || $_SESSION['usuario'] == 'Fe.sguario@yahoo.com.br ' ||
                    // $_SESSION['usuario'] == 'vilela.dougla@gmail.com' || $_SESSION['usuario'] == 'vilela.dougla@gmail.com ' || $_SESSION['usuario'] == 'Vilela.dougla@gmail.com' || $_SESSION['usuario'] == 'Vilela.dougla@gmail.com ' ||
                    // $_SESSION['usuario'] == 'elvistopcba@gmail.com' || $_SESSION['usuario'] == 'elvistopcba@gmail.com ' || $_SESSION['usuario'] == 'Elvistopcba@gmail.com' || $_SESSION['usuario'] == 'Elvistopcba@gmail.com ' ||
                    // $_SESSION['usuario'] == 'thaisoliveira2912@gmail.com' || $_SESSION['usuario'] == 'thaisoliveira2912@gmail.com ' || $_SESSION['usuario'] == 'Thaisoliveira2912@gmail.com' || $_SESSION['usuario'] == 'Thaisoliveira2912@gmail.com ' ||
                    // $_SESSION['usuario'] == 'dricamdelmadi@gmail.com' || $_SESSION['usuario'] == 'dricamdelmadi@gmail.com ' || $_SESSION['usuario'] == 'Dricamdelmadi@gmail.com' || $_SESSION['usuario'] == 'Dricamdelmadi@gmail.com ' ||
                    // $_SESSION['usuario'] == 'letdecarli@hotmail.com' || $_SESSION['usuario'] == 'letdecarli@hotmail.com ' || $_SESSION['usuario'] == 'Letdecarli@hotmail.com' || $_SESSION['usuario'] == 'Letdecarli@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'matheusjunior4639@gmail.com' || $_SESSION['usuario'] == 'matheusjunior4639@gmail.com ' || $_SESSION['usuario'] == 'Matheusjunior4639@gmail.com' || $_SESSION['usuario'] == 'Matheusjunior4639@gmail.com ' ||
                    // $_SESSION['usuario'] == 'carmona.everton@gmail.com' || $_SESSION['usuario'] == 'carmona.everton@gmail.com ' || $_SESSION['usuario'] == 'Carmona.everton@gmail.com' || $_SESSION['usuario'] == 'Carmona.everton@gmail.com ' ||
                    // $_SESSION['usuario'] == 'leandromatoos@gmail.com' || $_SESSION['usuario'] == 'leandromatoos@gmail.com ' || $_SESSION['usuario'] == 'Leandromatoos@gmail.com' || $_SESSION['usuario'] == 'Leandromatoos@gmail.com ' ||
                    // $_SESSION['usuario'] == 'morganasaldanha@gmail.com' || $_SESSION['usuario'] == 'morganasaldanha@gmail.com ' || $_SESSION['usuario'] == 'Morganasaldanha@gmail.com' || $_SESSION['usuario'] == 'Morganasaldanha@gmail.com ' ||
                    // $_SESSION['usuario'] == 'danieleteixeiraadv@gmail.com' || $_SESSION['usuario'] == 'danieleteixeiraadv@gmail.com ' || $_SESSION['usuario'] == 'Danieleteixeiraadv@gmail.com' || $_SESSION['usuario'] == 'Danieleteixeiraadv@gmail.com ' ||
                    // $_SESSION['usuario'] == 'pamelaoliveiras544@gmail.com' || $_SESSION['usuario'] == 'pamelaoliveiras544@gmail.com ' || $_SESSION['usuario'] == 'Pamelaoliveiras544@gmail.com' || $_SESSION['usuario'] == 'Pamelaoliveiras544@gmail.com ' ||
                    // $_SESSION['usuario'] == 'caiocapoani@gmail.com' || $_SESSION['usuario'] == 'caiocapoani@gmail.com ' || $_SESSION['usuario'] == 'Caiocapoani@gmail.com' || $_SESSION['usuario'] == 'Caiocapoani@gmail.com ' ||
                    // $_SESSION['usuario'] == 'annabertaia@gmail.com' || $_SESSION['usuario'] == 'annabertaia@gmail.com ' || $_SESSION['usuario'] == 'Annabertaia@gmail.com' || $_SESSION['usuario'] == 'Annabertaia@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'alnfotografa@gmail.com' || $_SESSION['usuario'] == 'alnfotografa@gmail.com ' || $_SESSION['usuario'] == 'Alnfotografa@gmail.com' || $_SESSION['usuario'] == 'Alnfotografa@gmail.com ' ||
                    // $_SESSION['usuario'] == 'marinalauratn@gmail.com' || $_SESSION['usuario'] == 'marinalauratn@gmail.com ' || $_SESSION['usuario'] == 'Marinalauratn@gmail.com' || $_SESSION['usuario'] == 'Marinalauratn@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rosane.luiza@unemat.br' || $_SESSION['usuario'] == 'rosane.luiza@unemat.br ' || $_SESSION['usuario'] == 'Rosane.luiza@unemat.br' || $_SESSION['usuario'] == 'Rosane.luiza@unemat.br ' ||
                    // $_SESSION['usuario'] == 'ethiene.moura@hotmail.com' || $_SESSION['usuario'] == 'ethiene.moura@hotmail.com ' || $_SESSION['usuario'] == 'Ethiene.moura@hotmail.com' || $_SESSION['usuario'] == 'Ethiene.moura@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'b_bruna11@hotmail.com' || $_SESSION['usuario'] == 'b_bruna11@hotmail.com ' || $_SESSION['usuario'] == 'B_bruna11@hotmail.com' || $_SESSION['usuario'] == 'B_bruna11@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'flavia_ponce@hotmail.com' || $_SESSION['usuario'] == 'flavia_ponce@hotmail.com ' || $_SESSION['usuario'] == 'Flavia_ponce@hotmail.com' || $_SESSION['usuario'] == 'Flavia_ponce@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'ketelinsc@hotmail.com' || $_SESSION['usuario'] == 'ketelinsc@hotmail.com ' || $_SESSION['usuario'] == 'Ketelinsc@hotmail.com' || $_SESSION['usuario'] == 'Ketelinsc@hotmail.com ' ||
                    // // $_SESSION['usuario'] == 'luisotavio1509@hotmail.com' || $_SESSION['usuario'] == 'luisotavio1509@hotmail.com ' || $_SESSION['usuario'] == 'Luisotavio1509@hotmail.com' || $_SESSION['usuario'] == 'Luisotavio1509@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'andrenatalino07@gmail.com' || $_SESSION['usuario'] == 'andrenatalino07@gmail.com ' || $_SESSION['usuario'] == 'Andrenatalino07@gmail.com' || $_SESSION['usuario'] == 'Andrenatalino07@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'netodireito26@gmail.com' || $_SESSION['usuario'] == 'netodireito26@gmail.com ' || $_SESSION['usuario'] == 'Netodireito26@gmail.com' || $_SESSION['usuario'] == 'Netodireito26@gmail.com ' ||
                    // $_SESSION['usuario'] == 'dayanefranzenufmt@hotmail.com' || $_SESSION['usuario'] == 'dayanefranzenufmt@hotmail.com ' || $_SESSION['usuario'] == 'Dayanefranzenufmt@hotmail.com' || $_SESSION['usuario'] == 'Dayanefranzenufmt@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'elisangelalva@gmail.com' || $_SESSION['usuario'] == 'elisangelalva@gmail.com  ' || $_SESSION['usuario'] == 'Elisangelalva@gmail.com' || $_SESSION['usuario'] == 'Elisangelalva@gmail.com  ' ||
                    // $_SESSION['usuario'] == 'drumondmatta@gmail.com' || $_SESSION['usuario'] == 'drumondmatta@gmail.com ' || $_SESSION['usuario'] == 'Drumondmatta@gmail.com' || $_SESSION['usuario'] == 'Drumondmatta@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rbd_acs@hotmail.com' || $_SESSION['usuario'] == 'rbd_acs@hotmail.com ' || $_SESSION['usuario'] == 'Rbd_acs@hotmail.com' || $_SESSION['usuario'] == 'Rbd_acs@hotmail.com ' ||
                    // // $_SESSION['usuario'] == 'layannecorreia1@gmail.com' || $_SESSION['usuario'] == 'layannecorreia1@gmail.com ' || $_SESSION['usuario'] == 'Layannecorreia1@gmail.com' || $_SESSION['usuario'] == 'Layannecorreia1@gmail.com ' ||
                    // $_SESSION['usuario'] == 'denilzamascarello@hotmail.com' || $_SESSION['usuario'] == 'denilzamascarello@hotmail.com ' || $_SESSION['usuario'] == 'Denilzamascarello@hotmail.com' || $_SESSION['usuario'] == 'Denilzamascarello@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'alailton.geo@gmail.com' || $_SESSION['usuario'] == 'alailton.geo@gmail.com ' || $_SESSION['usuario'] == 'Alailton.geo@gmail.com' || $_SESSION['usuario'] == 'Alailton.geo@gmail.com ' ||
                    // $_SESSION['usuario'] == 'priscilabmarques@gmail.com' || $_SESSION['usuario'] == 'priscilabmarques@gmail.com ' || $_SESSION['usuario'] == 'Priscilabmarques@gmail.com' || $_SESSION['usuario'] == 'Priscilabmarques@gmail.com ' ||
                    // $_SESSION['usuario'] == 'flavianotut@yahoo.com.br' || $_SESSION['usuario'] == 'flavianotut@yahoo.com.br ' || $_SESSION['usuario'] == 'Flavianotut@yahoo.com.br' || $_SESSION['usuario'] == 'Flavianotut@yahoo.com.br ' ||
                    // $_SESSION['usuario'] == 'dayellebarros4@gmail.com' || $_SESSION['usuario'] == 'dayellebarros4@gmail.com ' || $_SESSION['usuario'] == 'Dayellebarros4@gmail.com' || $_SESSION['usuario'] == 'Dayellebarros4@gmail.com ' ||
                    // $_SESSION['usuario'] == 'lcamposmraz13@gmail.com' || $_SESSION['usuario'] == 'lcamposmraz13@gmail.com ' || $_SESSION['usuario'] == 'Lcamposmraz13@gmail.com' || $_SESSION['usuario'] == 'Lcamposmraz13@gmail.com ' ||
                    // $_SESSION['usuario'] == 'michel_velter@hotmail.com' || $_SESSION['usuario'] == 'michel_velter@hotmail.com ' || $_SESSION['usuario'] == 'Michel_velter@hotmail.com' || $_SESSION['usuario'] == 'Michel_velter@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'ketelinsc@hotmail.com' || $_SESSION['usuario'] == 'ketelinsc@hotmail.com ' || $_SESSION['usuario'] == 'Ketelinsc@hotmail.com' || $_SESSION['usuario'] == 'Ketelinsc@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'marcelomoreiracampos21@gmail.com' || $_SESSION['usuario'] == 'marcelomoreiracampos21@gmail.com ' || $_SESSION['usuario'] == 'Marcelomoreiracampos21@gmail.com' || $_SESSION['usuario'] == 'Marcelomoreiracampos21@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jjferreira88@gmail.com' || $_SESSION['usuario'] == 'jjferreira88@gmail.com ' || $_SESSION['usuario'] == 'Jjferreira88@gmail.com' || $_SESSION['usuario'] == 'Jjferreira88@gmail.com ' ||
                    // $_SESSION['usuario'] == 'wanderson_28lopes@hotmail.com' || $_SESSION['usuario'] == 'wanderson_28lopes@hotmail.com ' || $_SESSION['usuario'] == 'Wanderson_28lopes@hotmail.com' || $_SESSION['usuario'] == 'Wanderson_28lopes@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'ewellyn.amanda2018@gmail.com' || $_SESSION['usuario'] == 'ewellyn.amanda2018@gmail.com ' || $_SESSION['usuario'] == 'Ewellyn.amanda2018@gmail.com' || $_SESSION['usuario'] == 'Ewellyn.amanda2018@gmail.com ' ||
                    // $_SESSION['usuario'] == 'bruna2010mendes@hotmail.com' || $_SESSION['usuario'] == 'bruna2010mendes@hotmail.com ' || $_SESSION['usuario'] == 'Bruna2010mendes@hotmail.com' || $_SESSION['usuario'] == 'Bruna2010mendes@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'karina.ap.silva345.ks@gmail.com' || $_SESSION['usuario'] == 'karina.ap.silva345.ks@gmail.com ' || $_SESSION['usuario'] == 'Karina.ap.silva345.ks@gmail.com' || $_SESSION['usuario'] == 'Karina.ap.silva345.ks@gmail.com ' ||
                    // $_SESSION['usuario'] == 'lidianacuiabano@gmail.com' || $_SESSION['usuario'] == 'lidianacuiabano@gmail.com ' || $_SESSION['usuario'] == 'Lidianacuiabano@gmail.com' || $_SESSION['usuario'] == 'Lidianacuiabano@gmail.com ' ||
                    // $_SESSION['usuario'] == 'lilian_neves2@outlook.com' || $_SESSION['usuario'] == 'lilian_neves2@outlook.com ' || $_SESSION['usuario'] == 'Lilian_neves2@outlook.com' || $_SESSION['usuario'] == 'Lilian_neves2@outlook.com ' ||
                    // $_SESSION['usuario'] == 'rbd_acs@hotmail.com' || $_SESSION['usuario'] == 'rbd_acs@hotmail.com ' || $_SESSION['usuario'] == 'Rbd_acs@hotmail.com' || $_SESSION['usuario'] == 'Rbd_acs@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'raphaelanarciso15@gmail.com' || $_SESSION['usuario'] == 'raphaelanarciso15@gmail.com ' || $_SESSION['usuario'] == 'Raphaelanarciso15@gmail.com' || $_SESSION['usuario'] == 'Raphaelanarciso15@gmail.com ' ||
                    // $_SESSION['usuario'] == 'ametista254@gmail.com' || $_SESSION['usuario'] == 'ametista254@gmail.com ' || $_SESSION['usuario'] == 'Ametista254@gmail.com' || $_SESSION['usuario'] == 'Ametista254@gmail.com ' ||
                    // $_SESSION['usuario'] == 'flavimoraesvg@yahoo.com.br' || $_SESSION['usuario'] == 'flavimoraesvg@yahoo.com.br ' || $_SESSION['usuario'] == 'Flavimoraesvg@yahoo.com.br' || $_SESSION['usuario'] == 'Flavimoraesvg@yahoo.com.br ' ||
                    // $_SESSION['usuario'] == 'denilzamascarello@hotmail.com' || $_SESSION['usuario'] == 'denilzamascarello@hotmail.com ' || $_SESSION['usuario'] == 'Denilzamascarello@hotmail.com' || $_SESSION['usuario'] == 'Denilzamascarello@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'alandeoliveirainstrutor@gmail.com' || $_SESSION['usuario'] == 'alandeoliveirainstrutor@gmail.com ' || $_SESSION['usuario'] == 'Alandeoliveirainstrutor@gmail.com' || $_SESSION['usuario'] == 'Alandeoliveirainstrutor@gmail.com ' ||
                    // $_SESSION['usuario'] == 'ldtorres30@gmail.com' || $_SESSION['usuario'] == 'ldtorres30@gmail.com ' || $_SESSION['usuario'] == 'Ldtorres30@gmail.com' || $_SESSION['usuario'] == 'Ldtorres30@gmail.com ' ||
                    // $_SESSION['usuario'] == 'alailton.geo@gmail.com' || $_SESSION['usuario'] == 'alailton.geo@gmail.com ' || $_SESSION['usuario'] == 'Alailton.geo@gmail.com' || $_SESSION['usuario'] == 'Alailton.geo@gmail.com ' ||
                    // $_SESSION['usuario'] == 'alexandreabilio10@gmail.com' || $_SESSION['usuario'] == 'alexandreabilio10@gmail.com ' || $_SESSION['usuario'] == 'Alexandreabilio10@gmail.com' || $_SESSION['usuario'] == 'Alexandreabilio10@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'kathia.cfadv@gmail.com' || $_SESSION['usuario'] == 'kathia.cfadv@gmail.com ' || $_SESSION['usuario'] == 'Kathia.cfadv@gmail.com' || $_SESSION['usuario'] == 'Kathia.cfadv@gmail.com ' ||
                    // $_SESSION['usuario'] == 'temilhomem@hotmail.com' || $_SESSION['usuario'] == 'temilhomem@hotmail.com ' || $_SESSION['usuario'] == 'Temilhomem@hotmail.com' || $_SESSION['usuario'] == 'Temilhomem@hotmail.com ' ||
                    // // $_SESSION['usuario'] == 'gracieleap.francisco@gmail.com' || $_SESSION['usuario'] == 'gracieleap.francisco@gmail.com ' || $_SESSION['usuario'] == 'Gracieleap.francisco@gmail.com' || $_SESSION['usuario'] == 'Gracieleap.francisco@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'juciely@gmail.com' || $_SESSION['usuario'] == 'juciely@gmail.com ' || $_SESSION['usuario'] == 'Juciely@gmail.com' || $_SESSION['usuario'] == 'Juciely@gmail.com ' ||
                    // $_SESSION['usuario'] == 'adonabruna@gmail.com' || $_SESSION['usuario'] == 'adonabruna@gmail.com ' || $_SESSION['usuario'] == 'Adonabruna@gmail.com' || $_SESSION['usuario'] == 'Adonabruna@gmail.com ' ||
                    // $_SESSION['usuario'] == 'ingridacostta@gmail.com' || $_SESSION['usuario'] == 'ingridacostta@gmail.com ' || $_SESSION['usuario'] == 'Ingridacostta@gmail.com' || $_SESSION['usuario'] == 'Ingridacostta@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'oluansartori@gmail.com' || $_SESSION['usuario'] == 'oluansartori@gmail.com ' || $_SESSION['usuario'] == 'Oluansartori@gmail.com' || $_SESSION['usuario'] == 'Oluansartori@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'renaira_dossantos.duarte@hotmail.com' || $_SESSION['usuario'] == 'renaira_dossantos.duarte@hotmail.com ' || $_SESSION['usuario'] == 'Renaira_dossantos.duarte@hotmail.com' || $_SESSION['usuario'] == 'Renaira_dossantos.duarte@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'haiesa.sorretino@gmail.com' || $_SESSION['usuario'] == 'haiesa.sorretino@gmail.com ' || $_SESSION['usuario'] == 'Haiesa.sorretino@gmail.com' || $_SESSION['usuario'] == 'Haiesa.sorretino@gmail.com ' ||
                    // $_SESSION['usuario'] == 'larissafael171194@gmail.com' || $_SESSION['usuario'] == 'larissafael171194@gmail.com ' || $_SESSION['usuario'] == 'Larissafael171194@gmail.com' || $_SESSION['usuario'] == 'Larissafael171194@gmail.com ' ||
                    // $_SESSION['usuario'] == 'mariana.gfonseca@hotmail.com' || $_SESSION['usuario'] == 'mariana.gfonseca@hotmail.com ' || $_SESSION['usuario'] == 'Mariana.gfonseca@hotmail.com' || $_SESSION['usuario'] == 'Mariana.gfonseca@hotmail.com ' ||
                    // // $_SESSION['usuario'] == 'rodrigodemorais23@gmail.com' || $_SESSION['usuario'] == 'rodrigodemorais23@gmail.com ' || $_SESSION['usuario'] == 'Rodrigodemorais23@gmail.com' || $_SESSION['usuario'] == 'Rodrigodemorais23@gmail.com ' ||
                    // $_SESSION['usuario'] == 'fucyankee@gmail.com' || $_SESSION['usuario'] == 'fucyankee@gmail.com ' || $_SESSION['usuario'] == 'Fucyankee@gmail.com' || $_SESSION['usuario'] == 'Fucyankee@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rodmagalhaes18@gmail.com' || $_SESSION['usuario'] == 'rodmagalhaes18@gmail.com ' || $_SESSION['usuario'] == 'Rodmagalhaes18@gmail.com' || $_SESSION['usuario'] == 'Rodmagalhaes18@gmail.com ' ||
                    // $_SESSION['usuario'] == 'adriellysilva123456h@gmail.com' || $_SESSION['usuario'] == 'adriellysilva123456h@gmail.com ' || $_SESSION['usuario'] == 'Adriellysilva123456h@gmail.com' || $_SESSION['usuario'] == 'Adriellysilva123456h@gmail.com ' ||
                    // $_SESSION['usuario'] == 'renato.silvinossales@outlook.com' || $_SESSION['usuario'] == 'renato.silvinossales@outlook.com ' || $_SESSION['usuario'] == 'Renato.silvinossales@outlook.com' || $_SESSION['usuario'] == 'Renato.silvinossales@outlook.com ' ||
                    // $_SESSION['usuario'] == 'kakarodrigues21@hotmail.com' || $_SESSION['usuario'] == 'kakarodrigues21@hotmail.com ' || $_SESSION['usuario'] == 'kakarodrigues21@hotmail.com' || $_SESSION['usuario'] == 'kakarodrigues21@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'elio.hahn@yahoo.com' || $_SESSION['usuario'] == 'elio.hahn@yahoo.com ' || $_SESSION['usuario'] == 'Elio.hahn@yahoo.com' || $_SESSION['usuario'] == 'Elio.hahn@yahoo.com ' ||
                    // $_SESSION['usuario'] == 'brunocm30@hotmail.com' || $_SESSION['usuario'] == 'brunocm30@hotmail.com ' || $_SESSION['usuario'] == 'Brunocm30@hotmail.com' || $_SESSION['usuario'] == 'Brunocm30@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'paula_flisboa@hotmail.com' || $_SESSION['usuario'] == 'paula_flisboa@hotmail.com ' || $_SESSION['usuario'] == 'Paula_flisboa@hotmail.com' || $_SESSION['usuario'] == 'Paula_flisboa@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'marcelasoares.adv@gmail.com' || $_SESSION['usuario'] == 'marcelasoares.adv@gmail.com ' || $_SESSION['usuario'] == 'Marcelasoares.adv@gmail.com' || $_SESSION['usuario'] == 'Marcelasoares.adv@gmail.com ' ||
                    // $_SESSION['usuario'] == 'mich.chelly@hotmail.com' || $_SESSION['usuario'] == 'mich.chelly@hotmail.com ' || $_SESSION['usuario'] == 'Mich.chelly@hotmail.com' || $_SESSION['usuario'] == 'Mich.chelly@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'valeriamartinsamorim123@gmail.com' || $_SESSION['usuario'] == 'valeriamartinsamorim123@gmail.com ' || $_SESSION['usuario'] == 'Valeriamartinsamorim123@gmail.com' || $_SESSION['usuario'] == 'Valeriamartinsamorim123@gmail.com ' ||
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

                    // $_SESSION['usuario'] == 'glen.ewellin@gmail.com' || $_SESSION['usuario'] == 'glen.ewellin@gmail.com ' || $_SESSION['usuario'] == 'Glen.ewellin@gmail.com' || $_SESSION['usuario'] == 'Glen.ewellin@gmail.com ' ||
                    // $_SESSION['usuario'] == 'alcimara.lima@hotmail.com' || $_SESSION['usuario'] == 'alcimara.lima@hotmail.com ' || $_SESSION['usuario'] == 'Alcimara.lima@hotmail.com' || $_SESSION['usuario'] == 'Alcimara.lima@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'agnescaires@gmail.com' || $_SESSION['usuario'] == 'agnescaires@gmail.com ' || $_SESSION['usuario'] == 'Agnescaires@gmail.com' || $_SESSION['usuario'] == 'Agnescaires@gmail.com ' ||
                    // $_SESSION['usuario'] == 'brunohenriquegomes034@gmail.com' || $_SESSION['usuario'] == 'brunohenriquegomes034@gmail.com ' || $_SESSION['usuario'] == 'Brunohenriquegomes034@gmail.com' || $_SESSION['usuario'] == 'Brunohenriquegomes034@gmail.com ' ||
                    // $_SESSION['usuario'] == 'dayanefranzenufmt@hotmail.com' || $_SESSION['usuario'] == 'dayanefranzenufmt@hotmail.com ' || $_SESSION['usuario'] == 'Dayanefranzenufmt@hotmail.com' || $_SESSION['usuario'] == 'Dayanefranzenufmt@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'elisangelalva@gmail.com' || $_SESSION['usuario'] == 'elisangelalva@gmail.com  ' || $_SESSION['usuario'] == 'Elisangelalva@gmail.com' || $_SESSION['usuario'] == 'Elisangelalva@gmail.com  ' ||
                    // $_SESSION['usuario'] == 'rbd_acs@hotmail.com' || $_SESSION['usuario'] == 'rbd_acs@hotmail.com ' || $_SESSION['usuario'] == 'Rbd_acs@hotmail.com' || $_SESSION['usuario'] == 'Rbd_acs@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'alexandreabilio10@gmail.com' || $_SESSION['usuario'] == 'amobibi.ss@gmail.com' || $_SESSION['usuario'] == 'wisley2207@hotmail.com' ||
                    // $_SESSION['usuario'] == 'ingridacostta@gmail.com' || $_SESSION['usuario'] == 'ingridacostta@gmail.com ' || $_SESSION['usuario'] == 'Ingridacostta@gmail.com' || $_SESSION['usuario'] == 'Ingridacostta@gmail.com ' ||
                    // // $_SESSION['usuario'] == 'renaira_dossantos.duarte@hotmail.com' || $_SESSION['usuario'] == 'renaira_dossantos.duarte@hotmail.com ' || $_SESSION['usuario'] == 'Renaira_dossantos.duarte@hotmail.com' || $_SESSION['usuario'] == 'Renaira_dossantos.duarte@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'larissafael171194@gmail.com' || $_SESSION['usuario'] == 'larissafael171194@gmail.com ' || $_SESSION['usuario'] == 'Larissafael171194@gmail.com' || $_SESSION['usuario'] == 'Larissafael171194@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rodmagalhaes18@gmail.com' || $_SESSION['usuario'] == 'rodmagalhaes18@gmail.com ' || $_SESSION['usuario'] == 'Rodmagalhaes18@gmail.com' || $_SESSION['usuario'] == 'Rodmagalhaes18@gmail.com ' ||
                    // $_SESSION['usuario'] == 'silviosoares622@gmail.com' || $_SESSION['usuario'] == 'silviosoares622@gmail.com ' || $_SESSION['usuario'] == 'Silviosoares622@gmail.com' || $_SESSION['usuario'] == 'Silviosoares622@gmail.com ' ||
                    // $_SESSION['usuario'] == 'taynajully@hotmail.com' || $_SESSION['usuario'] == 'taynajully@hotmail.com ' || $_SESSION['usuario'] == 'Taynajully@hotmail.com' || $_SESSION['usuario'] == 'Taynajully@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'lucimarasilvasantos@hotmail.com' || $_SESSION['usuario'] == 'lucimarasilvasantos@hotmail.com ' || $_SESSION['usuario'] == 'Lucimarasilvasantos@hotmail.com' || $_SESSION['usuario'] == 'Lucimarasilvasantos@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'anapaulla.costa@yahoo.com.br' || $_SESSION['usuario'] == 'anapaulla.costa@yahoo.com.br ' || $_SESSION['usuario'] == 'Anapaulla.costa@yahoo.com.br' || $_SESSION['usuario'] == 'Anapaulla.costa@yahoo.com.br ' ||
                    // $_SESSION['usuario'] == 'drumondmatta@gmail.com' || $_SESSION['usuario'] == 'drumondmatta@gmail.com ' || $_SESSION['usuario'] == 'Drumondmatta@gmail.com' || $_SESSION['usuario'] == 'Drumondmatta@gmail.com ' ||
                    // $_SESSION['usuario'] == 'denilzamascarello@hotmail.com' || $_SESSION['usuario'] == 'denilzamascarello@hotmail.com ' || $_SESSION['usuario'] == 'Denilzamascarello@hotmail.com' || $_SESSION['usuario'] == 'Denilzamascarello@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'moniquethomem@hotmail.com' || $_SESSION['usuario'] == 'moniquethomem@hotmail.com ' || $_SESSION['usuario'] == 'Moniquethomem@hotmail.com' || $_SESSION['usuario'] == 'Moniquethomem@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'lucianapadilhapersonal@gmail.com' || $_SESSION['usuario'] == 'lucianapadilhapersonal@gmail.com ' || $_SESSION['usuario'] == 'Lucianapadilhapersonal@gmail.com' || $_SESSION['usuario'] == 'Lucianapadilhapersonal@gmail.com ' ||
                    // $_SESSION['usuario'] == 'suelenzem1993@gmail.com' || $_SESSION['usuario'] == 'suelenzem1993@gmail.com ' || $_SESSION['usuario'] == 'Suelenzem1993@gmail.com' || $_SESSION['usuario'] == 'Suelenzem1993@gmail.com ' ||
                    // $_SESSION['usuario'] == 'thamiresjara95@gmail.com' || $_SESSION['usuario'] == 'thamiresjara95@gmail.com ' || $_SESSION['usuario'] == 'Thamiresjara95@gmail.com' || $_SESSION['usuario'] == 'Thamiresjara95@gmail.com ' ||
                    // $_SESSION['usuario'] == 'brunodeoliveiramatos@hotmail.com' || $_SESSION['usuario'] == 'brunodeoliveiramatos@hotmail.com ' || $_SESSION['usuario'] == 'Brunodeoliveiramatos@hotmail.com' || $_SESSION['usuario'] == 'Brunodeoliveiramatos@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'kellyamorim52a@gmail.com' || $_SESSION['usuario'] == 'kellyamorim52a@gmail.com ' || $_SESSION['usuario'] == 'Kellyamorim52a@gmail.com' || $_SESSION['usuario'] == 'Kellyamorim52a@gmail.com ' ||
                    // $_SESSION['usuario'] == 'ag.manu@hotmail.com' || $_SESSION['usuario'] == 'ag.manu@hotmail.com ' || $_SESSION['usuario'] == 'Ag.manu@hotmail.com' || $_SESSION['usuario'] == 'Ag.manu@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'andrea_mdv@hotmail.com' || $_SESSION['usuario'] == 'andrea_mdv@hotmail.com ' || $_SESSION['usuario'] == 'Andrea_mdv@hotmail.com' || $_SESSION['usuario'] == 'Andrea_mdv@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'miltoneto4395@gmail.com' || $_SESSION['usuario'] == 'miltoneto4395@gmail.com ' || $_SESSION['usuario'] == 'Miltoneto4395@gmail.com' || $_SESSION['usuario'] == 'Miltoneto4395@gmail.com ' ||
                    // $_SESSION['usuario'] == 'mel-com-mel@hotmail.com.br' || $_SESSION['usuario'] == 'mel-com-mel@hotmail.com.br ' || $_SESSION['usuario'] == 'Mel-com-mel@hotmail.com.br' || $_SESSION['usuario'] == 'Mel-com-mel@hotmail.com.br ' ||
                    // $_SESSION['usuario'] == 'lo.mattos17@gmail.com' || $_SESSION['usuario'] == 'lo.mattos17@gmail.com ' || $_SESSION['usuario'] == 'Lo.mattos17@gmail.com' || $_SESSION['usuario'] == 'Lo.mattos17@gmail.com ' ||
                    // $_SESSION['usuario'] == 'anapaula.costa@yahoo.com.br' || $_SESSION['usuario'] == 'anapaula.costa@yahoo.com.br ' || $_SESSION['usuario'] == 'Anapaula.costa@yahoo.com.br' || $_SESSION['usuario'] == 'Anapaula.costa@yahoo.com.br ' ||
                    // $_SESSION['usuario'] == 'ssgiselesouza@gmail.com' || $_SESSION['usuario'] == 'ssgiselesouza@gmail.com ' || $_SESSION['usuario'] == 'Ssgiselesouza@gmail.com' || $_SESSION['usuario'] == 'Ssgiselesouza@gmail.com ' ||
                    // $_SESSION['usuario'] == 'victoramorimm9@gmail.com' || $_SESSION['usuario'] == 'victoramorimm9@gmail.com ' || $_SESSION['usuario'] == 'Victoramorimm9@gmail.com' || $_SESSION['usuario'] == 'Victoramorimm9@gmail.com ' ||
                    // $_SESSION['usuario'] == 'jennifersydele86@gmail.com' || $_SESSION['usuario'] == 'jennifersydele86@gmail.com ' || $_SESSION['usuario'] == 'Jennifersydele86@gmail.com' || $_SESSION['usuario'] == 'Jennifersydele86@gmail.com ' ||
                    // $_SESSION['usuario'] == 'adriellysilva123456h@gmail.com' || $_SESSION['usuario'] == 'adriellysilva123456h@gmail.com ' || $_SESSION['usuario'] == 'Adriellysilva123456h@gmail.com' || $_SESSION['usuario'] == 'Adriellysilva123456h@gmail.com ' ||
                    // $_SESSION['usuario'] == 'marinalauratn@gmail.com' || $_SESSION['usuario'] == 'marinalauratn@gmail.com ' || $_SESSION['usuario'] == 'Marinalauratn@gmail.com' || $_SESSION['usuario'] == 'Marinalauratn@gmail.com ' ||
                    // $_SESSION['usuario'] == 'temilhomem@hotmail.com' || $_SESSION['usuario'] == 'temilhomem@hotmail.com ' || $_SESSION['usuario'] == 'Temilhomem@hotmail.com' || $_SESSION['usuario'] == 'Temilhomem@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'claud-pa@hotmail.com' || $_SESSION['usuario'] == 'claud-pa@hotmail.com ' || $_SESSION['usuario'] == 'Claud-pa@hotmail.com' || $_SESSION['usuario'] == 'Claud-pa@hotmail.com ' ||
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

                    // $_SESSION['usuario'] == 'armandomassonfurtado@gmail.com' || $_SESSION['usuario'] == 'armandomassonfurtado@gmail.com ' || $_SESSION['usuario'] == 'Armandomassonfurtado@gmail.com' || $_SESSION['usuario'] == 'Armandomassonfurtado@gmail.com ' ||
                    // $_SESSION['usuario'] == 'glen.ewellin@gmail.com' || $_SESSION['usuario'] == 'glen.ewellin@gmail.com ' || $_SESSION['usuario'] == 'Glen.ewellin@gmail.com' || $_SESSION['usuario'] == 'Glen.ewellin@gmail.com ' ||
                    // $_SESSION['usuario'] == 'viana.eveline@gmail.com' || $_SESSION['usuario'] == 'viana.eveline@gmail.com ' || $_SESSION['usuario'] == 'Viana.eveline@gmail.com' || $_SESSION['usuario'] == 'Viana.eveline@gmail.com ' ||
                    // $_SESSION['usuario'] == 'ethiene.moura@hotmail.com' || $_SESSION['usuario'] == 'ethiene.moura@hotmail.com ' || $_SESSION['usuario'] == 'Ethiene.moura@hotmail.com' || $_SESSION['usuario'] == 'Ethiene.moura@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'adrielelimaalves@gmail.com' || $_SESSION['usuario'] == 'adrielelimaalves@gmail.com ' || $_SESSION['usuario'] == 'Adrielelimaalves@gmail.com' || $_SESSION['usuario'] == 'Adrielelimaalves@gmail.com ' ||
                    // $_SESSION['usuario'] == 'ewellyn.amanda2018@gmail.com' || $_SESSION['usuario'] == 'ewellyn.amanda2018@gmail.com ' || $_SESSION['usuario'] == 'Ewellyn.amanda2018@gmail.com' || $_SESSION['usuario'] == 'Ewellyn.amanda2018@gmail.com ' ||
                    // $_SESSION['usuario'] == 'luaacarol16@gmail.com' || $_SESSION['usuario'] == 'luaacarol16@gmail.com ' || $_SESSION['usuario'] == 'Luaacarol16@gmail.com' || $_SESSION['usuario'] == 'Luaacarol16@gmail.com ' ||
                    // $_SESSION['usuario'] == 'elmo.80@hotmail.com' || $_SESSION['usuario'] == 'elmo.80@hotmail.com ' || $_SESSION['usuario'] == 'Elmo.80@hotmail.com' || $_SESSION['usuario'] == 'Elmo.80@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'brunohenriquegomes034@gmail.com' || $_SESSION['usuario'] == 'brunohenriquegomes034@gmail.com ' || $_SESSION['usuario'] == 'Brunohenriquegomes034@gmail.com' || $_SESSION['usuario'] == 'Brunohenriquegomes034@gmail.com ' ||
                    // $_SESSION['usuario'] == 'admnielli@gmail.com' || $_SESSION['usuario'] == 'admnielli@gmail.com ' || $_SESSION['usuario'] == 'Admnielli@gmail.com' || $_SESSION['usuario'] == 'Admnielli@gmail.com ' ||
                    // $_SESSION['usuario'] == 'haiesa.sorretino@gmail.com' || $_SESSION['usuario'] == 'haiesa.sorretino@gmail.com ' || $_SESSION['usuario'] == 'Haiesa.sorretino@gmail.com' || $_SESSION['usuario'] == 'Haiesa.sorretino@gmail.com ' ||
                    // $_SESSION['usuario'] == 'ag.manu@hotmail.com' || $_SESSION['usuario'] == 'ag.manu@hotmail.com ' || $_SESSION['usuario'] == 'Ag.manu@hotmail.com' || $_SESSION['usuario'] == 'Ag.manu@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'dracorinthiana@gmail.com' || $_SESSION['usuario'] == 'dracorinthiana@gmail.com ' || $_SESSION['usuario'] == 'Dracorinthiana@gmail.com' || $_SESSION['usuario'] == 'Dracorinthiana@gmail.com ' ||
                    // $_SESSION['usuario'] == 'oluansartori@gmail.com' ||
                    // $_SESSION['usuario'] == 'flavia_ponce@hotmail.com' || $_SESSION['usuario'] == 'flavia_ponce@hotmail.com ' || $_SESSION['usuario'] == 'Flavia_ponce@hotmail.com' || $_SESSION['usuario'] == 'Flavia_ponce@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'lidianacuiabano@gmail.com' || $_SESSION['usuario'] == 'lidianacuiabano@gmail.com ' || $_SESSION['usuario'] == 'Lidianacuiabano@gmail.com' || $_SESSION['usuario'] == 'Lidianacuiabano@gmail.com ' ||
                    // $_SESSION['usuario'] == 'elio.hahn@yahoo.com' || $_SESSION['usuario'] == 'elio.hahn@yahoo.com ' || $_SESSION['usuario'] == 'Elio.hahn@yahoo.com' || $_SESSION['usuario'] == 'Elio.hahn@yahoo.com ' ||
                    // $_SESSION['usuario'] == 'matheusjunior4639@gmail.com' || $_SESSION['usuario'] == 'matheusjunior4639@gmail.com ' || $_SESSION['usuario'] == 'Matheusjunior4639@gmail.com' || $_SESSION['usuario'] == 'Matheusjunior4639@gmail.com ' ||
                    // $_SESSION['usuario'] == 'larimiter@hotmail.com' || $_SESSION['usuario'] == 'larimiter@hotmail.com ' || $_SESSION['usuario'] == 'Larimiter@hotmail.com' || $_SESSION['usuario'] == 'Larimiter@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'anniellysouza@detran.mt.gov.br' || $_SESSION['usuario'] == 'anniellysouza@detran.mt.gov.br ' || $_SESSION['usuario'] == 'Anniellysouza@detran.mt.gov.br' || $_SESSION['usuario'] == 'Anniellysouza@detran.mt.gov.br ' ||
                    // $_SESSION['usuario'] == 'anap_rondon@hotmail.com' || $_SESSION['usuario'] == 'anap_rondon@hotmail.com ' || $_SESSION['usuario'] == 'Anap_rondon@hotmail.com' || $_SESSION['usuario'] == 'Anap_rondon@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'kamillamelo123@hotmail.com' || $_SESSION['usuario'] == 'kamillamelo123@hotmail.com ' || $_SESSION['usuario'] == 'Kamillamelo123@hotmail.com' || $_SESSION['usuario'] == 'Kamillamelo123@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'Adarleniassis@gmail.com' || $_SESSION['usuario'] == 'Adarleniassis@gmail.com ' || $_SESSION['usuario'] == 'adarleniassis@gmail.com' || $_SESSION['usuario'] == 'adarleniassis@gmail.com ' ||
                    // $_SESSION['usuario'] == 'marinalauratn@gmail.com' || $_SESSION['usuario'] == 'marinalauratn@gmail.com ' || $_SESSION['usuario'] == 'Marinalauratn@gmail.com' || $_SESSION['usuario'] == 'Marinalauratn@gmail.com ' ||
                    // $_SESSION['usuario'] == 'dayanefranzenufmt@hotmail.com' || $_SESSION['usuario'] == 'dayanefranzenufmt@hotmail.com ' || $_SESSION['usuario'] == 'Dayanefranzenufmt@hotmail.com' || $_SESSION['usuario'] == 'Dayanefranzenufmt@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'elisangelalva@gmail.com' || $_SESSION['usuario'] == 'elisangelalva@gmail.com  ' || $_SESSION['usuario'] == 'Elisangelalva@gmail.com' || $_SESSION['usuario'] == 'Elisangelalva@gmail.com  ' ||
                    // $_SESSION['usuario'] == 'drumondmatta@gmail.com' || $_SESSION['usuario'] == 'drumondmatta@gmail.com ' || $_SESSION['usuario'] == 'Drumondmatta@gmail.com' || $_SESSION['usuario'] == 'Drumondmatta@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rbd_acs@hotmail.com' || $_SESSION['usuario'] == 'rbd_acs@hotmail.com ' || $_SESSION['usuario'] == 'Rbd_acs@hotmail.com' || $_SESSION['usuario'] == 'Rbd_acs@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'denilzamascarello@hotmail.com' || $_SESSION['usuario'] == 'denilzamascarello@hotmail.com ' || $_SESSION['usuario'] == 'Denilzamascarello@hotmail.com' || $_SESSION['usuario'] == 'Denilzamascarello@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'alexandreabilio10@gmail.com' || $_SESSION['usuario'] == 'amobibi.ss@gmail.com' || $_SESSION['usuario'] == 'wisley2207@hotmail.com' ||
                    // $_SESSION['usuario'] == 'temilhomem@hotmail.com' || $_SESSION['usuario'] == 'temilhomem@hotmail.com ' || $_SESSION['usuario'] == 'Temilhomem@hotmail.com' || $_SESSION['usuario'] == 'Temilhomem@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'ingridacostta@gmail.com' || $_SESSION['usuario'] == 'ingridacostta@gmail.com ' || $_SESSION['usuario'] == 'Ingridacostta@gmail.com' || $_SESSION['usuario'] == 'Ingridacostta@gmail.com ' ||
                    // $_SESSION['usuario'] == 'renaira_dossantos.duarte@hotmail.com' || $_SESSION['usuario'] == 'renaira_dossantos.duarte@hotmail.com ' || $_SESSION['usuario'] == 'Renaira_dossantos.duarte@hotmail.com' || $_SESSION['usuario'] == 'Renaira_dossantos.duarte@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'larissafael171194@gmail.com' || $_SESSION['usuario'] == 'larissafael171194@gmail.com ' || $_SESSION['usuario'] == 'Larissafael171194@gmail.com' || $_SESSION['usuario'] == 'Larissafael171194@gmail.com ' ||
                    // $_SESSION['usuario'] == 'mariana.gfonseca@hotmail.com' || $_SESSION['usuario'] == 'mariana.gfonseca@hotmail.com ' || $_SESSION['usuario'] == 'Mariana.gfonseca@hotmail.com' || $_SESSION['usuario'] == 'Mariana.gfonseca@hotmail.com ' ||
                    // $_SESSION['usuario'] == 'agnescaires@gmail.com' || $_SESSION['usuario'] == 'agnescaires@gmail.com ' || $_SESSION['usuario'] == 'Agnescaires@gmail.com' || $_SESSION['usuario'] == 'Agnescaires@gmail.com ' ||
                    // $_SESSION['usuario'] == 'fucyankee@gmail.com' || $_SESSION['usuario'] == 'fucyankee@gmail.com ' || $_SESSION['usuario'] == 'Fucyankee@gmail.com' || $_SESSION['usuario'] == 'Fucyankee@gmail.com ' ||
                    // $_SESSION['usuario'] == 'rodmagalhaes18@gmail.com' || $_SESSION['usuario'] == 'rodmagalhaes18@gmail.com ' || $_SESSION['usuario'] == 'Rodmagalhaes18@gmail.com' || $_SESSION['usuario'] == 'Rodmagalhaes18@gmail.com ' ||
                    // $_SESSION['usuario'] == 'adriellysilva123456h@gmail.com' || $_SESSION['usuario'] == 'adriellysilva123456h@gmail.com ' || $_SESSION['usuario'] == 'Adriellysilva123456h@gmail.com' || $_SESSION['usuario'] == 'Adriellysilva123456h@gmail.com ' ||
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
                $codCurso = 2834;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso && $userTemp['statusAcesso'] == 'ATIVO')
                ) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CURSO SEFAZ-MT PÓS-EDITAL [Online]</h5>
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

                <div>
                    <h2>CURSOS EM ANDAMENTO:
                </div>

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