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
                            <h5 class="card-title">PORTUGUÊS - HÉLIO TAQUES</h5>
                            <p class="card-text">
                                    <a href="PMPJC_PT_HELIO.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1SxUgs2pNLz0_P_R8_t2vSPBYs3wotyeV?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div><p></p>
                </div>
                
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PORTUGUÊS - ELDER DENCATI</h5>
                            <p class="card-text">
                                    <a href="PMPJC_PT_ELDER.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1JBzIkmu4azbdD0zaBTXKrc4jhKPmAlqK" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>

                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DIREITO CONSTITUCIONAL - JOSÉ NETO</h5>
                                    <a href="PMPJC_DIR_CONST_NETO.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/15caelNe9XqnJO2z178bM1WtDAG-BXjYO?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
                </div>
                
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DIREITO PENAL - KLEBER PINHO</h5>
                                    <a href="PMPJC_DIR_PENAL_KLEBER.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1g-jWezsq0nNuZZMFpJNPYsvs_GlGvicY?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">RACIOCÍNIO LÓGICO - IGOR BRASIL</h5>
                                    <a href="PMPJC_RLM_IGOR.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1fc_7UnDd5wKQPkBInga_FBXTCBoemQk1?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DIREITO ADMINISTRATIVO - CLEIDE REGINA</h5>
                                    <a href="PMPJC_DIR_ADM_CLEIDE.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1HhfnIixzpOVFWAFL6ZsHkpl4ROvnyPi6?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PROCESSO PENAL - MARCIANO XAVIER</h5>
                                    <a href="PMPJC_PROC_PENAL_MARCIANO.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/16WugWqPrYGWEo586ONqXosoDpoqM68Hc?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">HISTÓRIA - GÊNESIS BARBARÁ</h5>
                                    <a href="PMPJC_HISTORIA_GENESIS.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1FG2YFthwWjVR08-2sMz4ic1sWvc1snh2?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">GEOGRAFIA - MARCELO LEMES</h5>
                                    <a href="PMPJC_GEOGRAFIA_MARCELO.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1POV0iVV4-8-4cBt2OhHliBnppgfo-IZJ?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LEGISLAÇÃO ESPECIAL - MICHELE DONEGÁ</h5>
                                    <a href="PMPJC_LEG_ESP_MICHELE.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1TbqSYKEre4TxULJqeWegEnfMc5kxlQKZ?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ÉTICA - DOUGLAS REMONATTO</h5>
                                    <a href="PMPJC_ETICA_DOUGLAS.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1Q22nVFVAwSOciF1wYuxGgjI7j7JTTYDR?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DIREITO PROCESSUAL PENAL - BRUNO FRANÇA</h5>
                                    <a href="PMPJC_DIR_PROC_PENAL_BRUNO.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1LFKBop1taNrTwCS_QuwHeoEQqluuoRIX?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LEGISLAÇÃO POLICIAL MILITAR - TEN. CEL. PM BRUNO MARCEL</h5>
                                    <a href="PMPJC_LEG_PM_BRUNO.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1PzPiwSCc8bxDnDd_TcBTUU6npYZFfji-?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DIREITO PENAL MILITAR - JOSÉ NETO</h5>
                                    <a href="PMPJC_DIR_PENAL_MIL_JOSE.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1RtFiPKB1SmMq7yr31mCwZz70y80_vCI-?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PROCESSO PENAL MILITAR - JOSÉ NETO </h5>
                                    <a href="PMPJC_PROC_PENAL_MIL_NETO.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1R5UZKPMFO-Lnr_EHwQR4EMxx1jZZMlyn?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DIREITO PENAL MILITAR E DIREITO PROCESSUAL PENAL MILITAR - TEN. CEL. BOMBEIRO HEITOR FERNANDES </h5>
                                    <a href="PMPJC_DIR_PEN_MIL_HEITOR.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/drive/folders/1QCxiA4Tz3pkZNrXnDHvT21o28jRcbhzh?usp=sharing" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div><p></p>
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