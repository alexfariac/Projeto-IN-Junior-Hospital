﻿<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/estilo_form.css">
	</head>
	<body>
	<div class="container">
		<div class="row" id="tudo">
			<div class="col-lg-12">
				<div class="col-lg-4 col-md-4 col-sm-4">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4" id="estilo">
					<div class="borda">
						<form class="form-signin" id="formpaciente">
							<span class="id_campo">Nome:</span>
							<label for="inputEmail" class="sr-only">Nome</label>
							<input id="inputEmail" class="form-control" placeholder="Nome" required="" autofocus="">
							<span class="id_campo">CPF:</span>
							<label class="sr-only" id="campo_senha">CPF</label>
							<input id="inputPassword" class="form-control" placeholder="CPF" required="">
							<button  type="button"	 class="log">
								<img id="botao" src="img/botaoCadastro.png">
							</button>
						</form>
					</div>	
				</div>
			</div>	
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	
	<!--VALIDACAO PACIENTE important-->
	<script src="js/validacaopaciente.js"></script>
	</body>
</html>