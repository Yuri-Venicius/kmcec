<?php
session_start();
// include('verifica_login.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>KM Online</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="./assets/brand.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="login.php" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-48">
					<img src="./assets/Logo KM Cursos & Concursos.png" width="151" height="121">
					</span>
					<span class="login100-form-title p-b-26">
						Bem-Vindo(a)
					</span>
					<div class="alert alert-primary" role="alert">
						No campo Email, inserir o e-mail cadastrado, no campo Senha, inserir o número de seu CPF.
					</div>
					<?php
					if(isset($_SESSION['usuario_invalido'])):
					?>
					<div class="notification is-danger">
						<p>Usuário ou Senha Inválidos, tente novamente.</p>
					</div>
					<div class="alert alert-primary" role="warning">
						Esta tendo dificuldades para acessar? Entre em contato com nosso suporte, clicando 
							<a href="https://api.whatsapp.com/send?phone=5565998120834&text=Ol%C3%A1,%20estou%20enfrentando%20dificuldade%20em%20acessar%20o%20portal%20do%20aluno%20na%20km,%20poderia%C2%A0me%C2%A0ajudar?" class="alert-link">
								aqui
							</a>.
					</div>
					<?php
					
					endif;

					unset($_SESSION['usuario_invalido']);
					?>

					<div class="wrap-input100 validate-input" data-validate = "Ex. fulano@email.com">
						<input class="input100" type="text" name="usuario">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Digite a Senha (apenas os números de seu CPF)">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="senha">
						<span class="focus-input100" data-placeholder="Senha"></span>
					</div>

					<div class="container-login100-form-btn">
						
							<button class="btn btn-primary" type="submit">Login</button>
					
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>