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

                <p>Bem-Vindo, <?php echo $_SESSION['usuario']; ?></p>
                <li>
                    <a href="index.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="perfil.php"><i class="fas fa-user-alt"></i> Perfil</a>
                </li>
                <li>
                    <a href="videoaulas.php"><i class="fas fa-book"></i> Cursos</a>
                </li>
                <p></p>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
            </ul>
            </li>
            <p>&copy; 2020 | KM Cursos & Concursos<p>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>

                    </button>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">KM Online</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <img src="/assets/Tela ops.png" style="margin:auto; width:auto; display:block" />
            <!-- <h2>Vídeo Aulas</h2>
            <p>Aqui ficam listadas suas vídeos aulas disponíveis, separadas por blocos de conteúdo. 
                Para acessar uma aula basta clicar em "Aulas" no bloco do conteúdo referente, e para fazer o 
                download do material de apoio do bloco, basta clicar em "Materiais" que o Download irá começar.</p>

            
            <div class="row">

            <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CONTEÚDO BÔNUS</h5>
                            <p class="card-text">Neste bloco serão apresentados conteúdos extras de algumas matérias, se tratando de conteúdo bônus
                            ao curso presencial e online.
                                <p>
                                   </p>
                                    <a href="PF_PRF_CONTEUDO_EXTRA.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="#" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PORTUGUÊS (EXERCÍCIOS)</h5>
                            <p class="card-text">Bloco de exercícios de Língua Protuguesa.
                                <p>
                                    Ministrado por Prof. Gouveia.</p>
                                    <a href="PF_PRF_PT_EXERCICIOS.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="#" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>

                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">REDAÇÃO</h5>
                            <p class="card-text">Bloco de Redação.
                                <p>
                                    Ministrado por Prof. Gouveia.</p>
                                    <a href="Redacao.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    a style="margin-left: 30px;" href="#" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a> 
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">GRAMÁTICA</h5>
                            <p class="card-text">Bloco de Gramática.
                                <p>
                                    Ministrado por Prof Hélio Taques.</p>
                                    <a href="PF_PRF_GRAMATICA.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=18srQQvXgjBT4EKJLYv8y1gD9NTz-RC3r&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">INTERPRETAÇÃO DE TEXTO</h5>
                            <p class="card-text">Bloco de Interpretação de texto.
                                <p>
                                    Ministrado por Prof. Hélio Taques.</p>
                                    <a href="PF_PRF_INTERPRETACAO.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="#" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">INFORMÁTICA</h5>
                            <p class="card-text">Bloco de Informática.
                                <p>
                                    Ministrado por Prof. Wilton Sobrinho</p>
                                    <a href="menuInfoUFMT.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1opKOg3EJIUszJfMakd1ppwbDh40MYhrY&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ESTATÍSTICA</h5>
                            <p class="card-text">Bloco de Estatística.
                                <p>
                                    Ministrado por Prof. Anderson Brito</p>
                                    <a href="PF_PRF_ESTATISTICA.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1ei6ICy6r6JnE_azrJSb7rFUCM3lieqQk&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LEGISLAÇÃO ESPECIAL</h5>
                            <p class="card-text">Bloco de Legislação Especial.
                                <p>
                                    Ministrado por Prof. Sérgio Mitsuo</p>
                                    <a href="PF_PRF_LEGISLACAO_ESPECIAL.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="#" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DIREITO ADMISTRATIVO</h5>
                            <p class="card-text">Bloco de Direito Administrativo.
                                <p>
                                    Ministrado por Profª Cleide Regina.</p>
                                    <a href="PF_PRF_DIREITO_ADM.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1Nqnz03mKXUT2mkupK9lXd35fVXIwcFz8&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DIREITO CONSTITUCIONAL</h5>
                            <p class="card-text">Bloco de Direito Constitucional.
                                <p>
                                    Ministrado por Prof. Carlão</p>
                                    <a href="PF_PRF_DIREITO_CONSTITUCIONAL.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1Z9WbVcZozYQMFx4eTxlAznccjgm9nocT&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DIREITO PENAL</h5>
                            <p class="card-text">Bloco de Direito Penal.
                                <p>
                                    Ministrado por Prof. Kleber Pinho</p>
                                    <a href="PF_PRF_DIREITO_PENAL.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1rJy8lZOHGdIZWvQsoBuRYST6nWkTyK1S&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PROCESSO PENAL</h5>
                            <p class="card-text">Bloco de Processo Penal.
                                <p>
                                    Ministrado por Prof. Rodrigo Pouso.</p>
                                    <a href="PF_PRF_PROCESSO_PENAL.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=14a8zPibRwvLOjJTfmWvNgKbrdRbebwi-&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">RACIOCÍNIO LÓGICO</h5>
                            <p class="card-text">Bloco de Raciocínio Lógico.
                                <p>
                                    Ministrado por Prof. Anderson Brito.</p>
                                    <a href="PF_PRF_RACIOCINIO_LOGICO.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1MijqEul_JRVbZxawDVAjbYV2Md2pxldM&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ARQUIVOLOGIA</h5>
                            <p class="card-text">Bloco de Arquivologia.
                                <p>
                                    Ministrado por Prof. Fernando Davoli.</p>
                                    <a href="PF_PRF_ARQUIVOLOGIA.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1LKc_y52WPIQr0l9CdsHoWZv-VDF3LSWT&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">FÍSICA</h5>
                            <p class="card-text">Bloco de Física.
                                <p>
                                    Ministrado por Prof. Anderson Brito.</p>
                                    <a href="PF_PRF_FISICA.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1H8CVUdjbdAtHncOnwvfRqkU02bibnnMk&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CONTABILIDADE</h5>
                            <p class="card-text">Bloco de Contabilidade.
                                <p>
                                    Ministrado por Prof. Ederaldo.</p>
                                    <a href="PF_PRF_CONTABILIDADE.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="#" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CÓDIGO DE TRÂNSITO BRASILEIRO</h5>
                            <p class="card-text">Bloco de CTB.
                                <p>
                                    Ministrado por Prof. Alan de Oliveira.</p>
                                    <a href="PF_PRF_CTB.php" class="btn btn-primary"><i class="fas fa-play-circle"></i> Aulas</a>
                                    <a style="margin-left: 30px;" href="https://drive.google.com/uc?id=1mHkeeU80xBF1klYSOuM051cnU4asyaX8&export=download" class="btn btn-primary"><i class="fas fa-book-open"></i> Materiais</a>
                        </div>
                    </div>
                </div>





            </div> 
         -->
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