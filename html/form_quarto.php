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
						}else{
							$op = 'cria';
						}
						?>
						<form class="form-signin" id="formquarto" method="POST" action="b_control.php?op=<?php echo $op ."&entidade=quarto" ?>" enctype="multipart/form-data">
							
							<span class="id_campo">Número do Quarto:</span>
							<label class="sr-only" id="campo_senha">Número</label>
							<input class="form-control" id="nqt" placeholder="Número do Quarto" required="" name="quarto">
							
							<span class="id_campo">Tipo:</span>
							<select id="listbox" name="tipo_quarto">
								<?php
                                include_once 'b_config.php';
                                $conn = conecta_bd();
                                $sql = "select * from tipo_quarto";
                                $query = $conn->query($sql);
                                while($dados = $query->fetch_array()){
                                    echo "<option value=".$dados['id_tipo_quarto'].">".$dados['tipo_quarto']."</option>";
                                }
                                ?>
							</select>
							<div id="centralizar">
							<button  type="submit" class="log">
								<img id="botao" src="img/botaoCadastrar.png">
							</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<!-- Validacao quarto-->
	<script src="js/validacaoquarto.js"></script>
	</body>
</html>