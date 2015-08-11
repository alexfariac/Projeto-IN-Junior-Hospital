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
                        <form class="form-signin" id="formponto" method="POST" action="b_control.php?op=<?php echo $op ."&entidade=ponto" ?>" enctype="multipart/form-data">

                            <span class="id_campo">Nome:</span>
                            <select id="listbox" name="nome">
                                <?php
                                include_once 'b_config.php';
                                $conn = conecta_bd();
                                $sql = "select * from funcionario";
                                $query = $conn->query($sql);
                                while($dados = $query->fetch_array()){
                                    echo "<option value=".$dados['fk_usuario'].">".$dados['nome']."</option>";
                                }
                                ?>
                            </select>

							<span class="id_campo">Data e Hora início:</span>
							<label class="sr-only" id="campo_senha">Data e Hora início:</label>
							<input class="form-control" id="medpront" placeholder="Data e Hora" required="" name="entrada">
							
							<span class="id_campo">Data e Hora fim:</span>
							<label class="sr-only" id="campo_senha">Data e Hora fim:</label>
							<input class="form-control" id="pacpront" placeholder="Data e Hora" required="" name="saida">
							
							<div class="centralizar">
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
	
	<!--Validacao JS -->
	<script src="js/validacaoprontuario.js"></script>
	</body>
</html>