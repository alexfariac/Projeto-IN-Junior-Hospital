<!DOCTYPE html>
<html>
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
						<form class="form-signin">
							
							<span class="id_campo">Nome:</span>
							<label class="sr-only" id="campo_senha">Nome</label>
							<input class="form-control" id="nomefun" placeholder="Nome" required="">
							
							<span class="id_campo">CPF:</span>
							<label class="sr-only" id="campo_senha">CPF</label>
							<input class="form-control" id="cpffun" placeholder="CPF" required="">
							
							<span class="id_campo">Endereço:</span>
							<label class="sr-only" id="campo_senha">Endereço</label>
							<input class="form-control" id="endfun" placeholder="Endereço" required="">
							
							<span class="id_campo">Cargo:</span>
							<select id="listbox">
								<option value="Recepcionista">Recepcionista</option>
								<option value="Médico">Médico</option>
								<option value="Administrador">Administrador</option>
							</select>
							
							<span class="id_campo">Login:</span>
							<label class="sr-only" id="campo_senha">Login</label>
							<input class="form-control" id="logfun" placeholder="Login" required="">
							
							<span class="id_campo">Senha:</span>
							<label class="sr-only" id="campo_senha">Senha</label>
							<input type="password" id="inputPassword" class="form-control" placeholder="Senha" required="">
							
							
							<button  type="button" class="log">
								<img id="botao" src="img/botaoCadastrar.png">
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	
	<!--Script validacao js -->
	<script src="js/validacaofuncionario.js"></script>
	</body>
</html>