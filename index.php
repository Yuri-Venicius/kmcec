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
                    <a href="listaAcessosUsuario.php"><i class="bi bi-grid-fill"></i></i> Gerir Acessos</a>
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

            <h2>Página Inicial</h2>

            <p>Acesse seus cursos disponíveis abaixo</p>
            <p></p>
            <h2>Seus Cursos Disponíveis</h2>
            <p></p>
            <div class="row">
                <?php
                $codCurso = 1444;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if ($verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso)) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CRM - Informática</h5>
                                <p class="card-text">Curso de informática e suas tecnologias voltado para o concurso do CRM 2020.
                                <p>
                                    Ministrado por Prof. Wilton Sobrinho.</p>
                                <a href="menuinfoCRM.php" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                $codCurso = 603;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'rhuanvinicios@hotmail.com' || $_SESSION['usuario'] == 'rhuanvinicios@hotmail.com ' || $_SESSION['usuario'] == 'Rhuanvinicios@hotmail.com' || $_SESSION['usuario'] == 'Rhuanvinicios@hotmail.com ' ||
                    $_SESSION['usuario'] == 'amabili.c.s.fanticheli@gmail.com' || $_SESSION['usuario'] == 'joaovictornohama@gmail.com' || $_SESSION['usuario'] == 'rodrigogeologia22@gmail.com' || $_SESSION['usuario'] == 'glen.ewellin@gmail.com' || $_SESSION['usuario'] == 'loide1441@hotmail.com' || $_SESSION['usuario'] == 'julianocunha216@gmail.com' || $_SESSION['usuario'] == 'yvenicios@gmail.com' || $_SESSION['usuario'] == 'ferri77ed@gmail.com' || $_SESSION['usuario'] == 'rubiaglaucia@hotmail.com' || $_SESSION['usuario'] == 'filinto_brandao@hotmail.com' || $_SESSION['usuario'] == 'cleiderribeiro@hotmail.com' || $_SESSION['usuario'] == 'kleybermoreno@gmail.com' || $_SESSION['usuario'] == 'joaovitormoreno01@gmail.com' || $_SESSION['usuario'] == 'kedmasantosmoreno@gmail.com'
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
                $codCurso = 642;
                $userTemp = verificaAcessoAoCurso($conexao, $usuarioLogado['id'], $codCurso);
                if (
                    $verificaAdm['nivelAcesso'] == '1' || ($userTemp['idUsuario'] == $usuarioLogado['id'] && $userTemp['idCurso'] == $codCurso) ||
                    $_SESSION['usuario'] == 'advandresampaio@gmail.com' || $_SESSION['usuario'] == 'advandresampaio@gmail.com' || $_SESSION['usuario'] == 'Advandresampaio@gmail.com ' || $_SESSION['usuario'] == 'Advandresampaio@gmail.com ' ||
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