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

            <h2>Vídeo Aulas</h2>
            <p>Aqui ficam listadas suas vídeos aulas disponíveis, separadas por blocos de conteúdo. 
                Para acessar uma aula basta clicar em "Aulas" no bloco do conteúdo referente, e para fazer o 
                download do material de apoio do bloco, basta clicar em "Materiais" que o Download irá começar.</p>


            <div class="row">


                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Atos Administrativos</h5>
                            <p class="card-text">Bloco de Atos Administrativos.
                                <p>
                                    Ministrado por Profª Cleide Regina.</p>
                                    <a href="DirAdm_Atos.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1VySYd1sWWqMkz99H-ynkbB3GmHdz1r5Y&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>

                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Licitação, Lei 8.666/93</h5>
                            <p class="card-text">Bloco de licitação.
                                <p>
                                    Ministrado por Profª Cleide Regina.</p>
                                    <a href="licitacao.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1rRVZmIEExLJNOYbCxihBqe6oNpgtnVOq&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Estatuto do Servidor Público Federal - Lei 8.112/90</h5>
                            <p class="card-text">Bloco da lei 8.112/90.
                                <p>
                                    Ministrado por Profª Cleide Regina.</p>
                                    <a href="depen8112.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1wV-XnwLto5TW8MvZp26DkXR17aQ-W_fL&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Conceitos - Estado, Governo e Administração Pública</h5>
                            <p class="card-text">Bloco de Conceitos Administrativos.
                                <p>
                                    Ministrado por Profª Cleide Regina.</p>
                                    <a href="DirAdm_ConceitosADM.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1Sg29OfiMr5V2SDbxMH7icVUDzh86RQ97&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Agente Público</h5>
                            <p class="card-text">Bloco de Agente Público.
                                <p>
                                    Ministrado por Profª Cleide Regina.</p>
                                    <a href="DirAdm_Agente.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1nQIvRLVKGoA0CvOsBrQxKTThva5Bzt64&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Controle Administrativo</h5>
                            <p class="card-text">Bloco de Controle Administrativo.
                                <p>
                                    Ministrado por Profª Cleide Regina.</p>
                                    <a href="DirAdm_Controle.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1BaAaQVeR5bUFRiEVk2CXddD1-3UhrxBF&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Responsabilidade Civil do Estado</h5>
                            <p class="card-text">Bloco de Responsabilidade civil do estado.
                                <p>
                                    Ministrado por Profª Cleide Regina.</p>
                                    <a href="DirAdm_Resp.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1l4UUO-cMPa7kLT9PsG4a8gFk0Jijfu3P&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Poderes Administrativos</h5>
                            <p class="card-text">Bloco de Poderes Administrativos.
                                <p>
                                    Ministrado por Profª Cleide Regina.</p>
                                    <a href="DirAdm_Poderes.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1vO0s0ht91lqbdE_1FC_oIn3oFRM6zVvq&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Improbidade Administrativa</h5>
                            <p class="card-text">Bloco de Improbidade Administrativa.
                                <p>
                                    Ministrado por Profª Cleide Regina.</p>
                                    <a href="DirAdm_Improbidade.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1Zwi1oI1iSS_HP3fa_pX02Cn_xlJg4wyy&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Organização - Direta e Indireta</h5>
                            <p class="card-text">Bloco de Organização Administrativa.
                                <p>
                                    Ministrado por Profª Cleide Regina.</p>
                                    <a href="DirAdm_Org.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1qufb5PwMdCvhfftss2UQGyleYe1Xu322&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Processo Administrativo</h5>
                            <p class="card-text">Bloco de Processos Administrativos
                                <p>
                                    Ministrado por Profª Cleide Regina.</p>
                                    <a href="DirAdm_pad.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1lb0A80QFI1_yizxRdwD6bzRRJREj2NQQ&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
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