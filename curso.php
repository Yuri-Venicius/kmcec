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

            <h2>Criar um novo Curso</h2>
            <p>Esta área é exclusiva para criar um novo curso na Plataforma (isso não afeta o site de vendas)</p>

            <?php

            if ($verificaAdm['nivelAcesso'] == '1') : ?>
                <form method="POST" id="formCriaNovoCurso" action="novoCurso.php">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="nome">Código do Curso</label>
                            <input type="number" placeholder="Insira o mesmo do site KM" class="form-control" name="idCurso" id="idCurso" required>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="nome">Link do Curso no Site KM</label>
                            <input type="text" placeholder="Insira o link do curso do site de vendas da KM" class="form-control" name="linkDoCursoNoSiteKM" id="linkDoCursoNoSiteKM " required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="nome">Nome do curso</label>
                            <input type="text" class="form-control" name="nomeCurso" id="nomeCurso" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="sobrenome">Descrição do Curso</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="4"></textarea>
                        </div>
                    </div>
                    <button type="submit" value="CriarNovoCurso" id="botaoCriarCursoNovo" class="btn btn-primary">Criar Curso</button>
                    <p></p>
                </form>

                <h2>Adicionar nova aula ao curso</h2>
                <p>Esta área é exclusiva para inserir uma nova aula em um curso EXISTENTE</p>
                <p>Nota: É necessário que o curso já esteja criado na plaforma</p>
                
                <form class="row g-12'" id="formularioCadastroAulaNovaEmCursoExistente" method="POST" action="novaAulaPorCurso.php">
                    <div class="col-md-4">
                        <label for="codCurso" class="form-label">Curso</label>
                        <select name="codCurso" id="codCurso" class="form-control" required>
                            <option selected>Selecione o curso</option>
                            <?php $query = "SELECT * from curso";
                            $select = mysqli_query($conexao, $query);
    
                            while ($result = mysqli_fetch_assoc($select)) { ?>
                                <option value="<?php echo $result['idCurso']; ?>"> <?php echo $result['idCurso'] . " - " . $result['nomeCurso']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="professorDaAula" class="form-label">Professor da Aula</label>
                        <input type="text" class="form-control" name="professorDaAula" id="professorDaAula" required>
                    </div>
                    <div class="col-md-4">
                        <label for="materiaDaAula" class="form-label">Matéria da Aula</label>
                        <select name="materiaDaAula" id="materiaDaAula" class="form-control" required>
                            <option selected>Selecione</option>
                            <option value="ONLINE">Aluno ONLINE</option>
                            <option value="PRESENCIAL">Aluno PRESENCIAL</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="tituloDaAula" class="form-label">Título da Aula</label>
                        <input placeholder="Título da aula" type="text" class="form-control" name="tituloDaAula" id="tituloDaAula" required>
                    </div>
                    <div class="col-md-12">
                        <label for="descricaoDaAula" class="form-label">Descrição da Aula</label>
                        <textarea class="form-control" name="descricaoDaAula" id="descricaoDaAula" rows="4"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="duracaoDaAula" class="form-label">Duração da Aula</label>
                        <input placeholder="Duração em minutos" type="number" class="form-control" name="duracaoDaAula" id="duracaoDaAula">
                    </div>
                    <div class="col-md-4">
                        <label for="dataDaGravacao" class="form-label">URL da aula no servidor</label>
                        <input placeholder="Cole aqui a URL da aula no servidor" type="number" class="form-control" name="urlNoServidor" id="urlNoServidor" required>
                    </div>
                    <div class="col-md-4">
                        <label for="dataDaGravacao" class="form-label">Data da Gravação da Aula</label>
                        <input placeholder="Insira a data em que a aula foi gravada" type="date" class="form-control" name="dataDaGravacao" id="dataDaGravacao" required>
                    </div>
                    <p></p>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" required>
                            <label class="form-check-label" for="gridCheck">
                                Marque para enviar e-mail notificando os alunos do curso!
                            </label>
                        </div>
                    </div>
                    <p></p>
                    <div class="col-12">
                        <button type="submit" value="CadastrarNovaAulaEmCursoExistente" id="cadastrarNovaAulaEmCursoExistente" class="btn btn-primary">Criar nova aula</button>
                    </div>
                </form>
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

        <script>
            $("#botaoCadastrarUsuario, #botaoAlterarDadosUsuario").click(function() {
                //Recebe o id do botão clicado
                var id = $(this).attr('id');
                //Verifica qual foi o botão clicado através do id do mesmo e seta o action correspondente
                if (id == 'botaoCadastrarUsuario') {
                    $('#formularioCadastroUsuario').attr('action', 'cadastroUsuario.php');
                } else{
                    $('#formularioCadastroUsuario').attr('action', 'alteraDadosUsuario.php');
                }
            });
        </script>

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