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
							
							<span class="id_campo">Número do Quarto:</span>
							<label class="sr-only" id="campo_senha">Número</label>
							<input class="form-control" id="nqt" placeholder="Número do Quarto" required="">
							
							<span class="id_campo">Tipo:</span>
							<select id="listbox">
								<option value="Individual">Individual</option>
								<option value="Coletivo">Coletivo</option>
								
							</select>
						<!--	<span class="id_campo">Tipo:</span>
							<label class="sr-only" id="campo_senha">Tipo</label>
							<input class="form-control" id="tqt" placeholder="Tipo" required="">
						-->	
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
	
	<!-- Validacao quarto-->
	<script src="js/validacaoquarto.js"></script>
	</body>
</html>