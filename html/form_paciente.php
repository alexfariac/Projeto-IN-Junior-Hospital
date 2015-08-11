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
                        <?php
                        if(isset($_REQUEST['editar'])){
                            $op = 'editado';
                            include_once 'b_config.php';
                            $conn = conecta_bd();
                            $sql = "SELECT * FROM paciente WHERE id_paciente = ".$_REQUEST['editar'];
                            $query = $conn->query($sql);
                            $paciente = $query->fetch_array();
                        }else{
                            $op = 'cria';
                        }
                        ?>
                        <form class="form-signin" id="formpaciente" method="POST" action="b_control.php?op=<?php echo $op ."&entidade=paciente";
                        if(isset($_REQUEST['editar'])){echo "&id=".$_REQUEST['editar'];}
                        ?>" enctype="multipart/form-data">
							<span class="id_campo">Nome:</span>
							<label for="inputEmail" class="sr-only">Nome</label>
							<input name="nome" id="inputEmail" class="form-control" placeholder="Nome" required="" autofocus="" <?php if(isset($_REQUEST['editar'])){echo "value=".$paciente['nome'];} ?>>
							<span class="id_campo">CPF:</span>
							<label class="sr-only" id="campo_senha">CPF</label>
							<input name="cpf" id="inputPassword" class="form-control" placeholder="CPF" required="" <?php if(isset($_REQUEST['editar'])){echo "value=".$paciente['cpf'];} ?>>
							<button  type="submit"	 class="log">
								<img id="botao" src="img/botaoCadastrar.png">
							</button>
						</form>
					</div>	
				</div>
			</div>	
		</div>
	</div>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	
	<!--VALIDACAO PACIENTE important-->
	<script src="js/validacaopaciente.js"></script>
	</body>
</html>