<?php
    session_start()
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/estilo_form.css">
		<link rel="stylesheet" href="css/jquery-ui.css"
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
                        <form class="form-signin" id="formprontuario" method="POST" action="b_control.php?op=<?php echo $op ."&entidade=prontuario" ?>" enctype="multipart/form-data">


							<span class="id_campo">Quarto:</span>
                            <select id="listbox" name="quarto">
                                <?php
                                include_once 'b_config.php';
                                $tabela = 'quarto';
                                $conn = conecta_bd();
                                $sql = "select * from $tabela";
                                $query = $conn->query($sql);
                                while($dados = $query->fetch_array()){
                                    echo "<option value=".$dados['id_'.$tabela].">".$dados[$tabela]."</option>";
                                }
                                ?>
                            </select>

							<span class="id_campo">Médico:</span>
                            <select id="listbox" name="medico">
                                <?php
                                $tabela = 'funcionario';
                                $conn = conecta_bd();
                                $sql = "select * from $tabela";
                                $query = $conn->query($sql);
                                while($dados = $query->fetch_array()){
                                    echo "<option value=".$dados['fk_usuario'].">".$dados['nome']."</option>";
                                }
                                ?>
                            </select>
                            <span class="id_campo">Paciente:</span>
                            <select id="listbox" name="paciente">
                                <?php
                                $tabela = 'paciente';
                                $conn = conecta_bd();
                                $sql = "select * from $tabela";
                                $query = $conn->query($sql);
                                while($dados = $query->fetch_array()){
                                    echo "<option value=".$dados['id_'.$tabela].">".$dados['nome']."</option>";
                                }
                                ?>
                            </select>
                            <span class="id_campo">Status de Saúde:</span>
                            <select id="listbox" name="status_saude">
                                <?php
                                $tabela = 'status_saude';
                                $conn = conecta_bd();
                                $sql = "select * from $tabela";
                                $query = $conn->query($sql);
                                while($dados = $query->fetch_array()){
                                    echo "<option value=".$dados['id_'.$tabela].">".$dados[$tabela]."</option>";
                                }
                                ?>
                            </select>
							<!--
							<span class="id_campo">Médico:</span>
							<label class="sr-only" id="campo_senha">Médico</label>
							<input type="text" class="form-control" id="medpront" placeholder="Medico" required="" name="medico">
							
							<span class="id_campo">Paciente:</span>
							<label class="sr-only" id="campo_senha">Paciente</label>
							<input type="text" class="form-control" id="pacpront" placeholder="Paciente" name="paciente">
							
							<span class="id_campo">Status de Saúde:</span>
							<label class="sr-only" id="campo_senha">Status</label>
							<input class="form-control" id="stpront" placeholder="Status" required="" name="status_saude">
							-->
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

	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/ui/jquery-ui.js"></script>


	<!-- Auto complete -->
	<script>
	$(function pac() {
		var nome_paciente = <?php
		                        include_once 'b_funcoes.php';
		                        echo json_encode(autocomplete('paciente'));
		                        ?>;
		$("#pacpront").autocomplete({source: nome_paciente});

        var nome_medico = <?php
		                        //include_once 'b_funcoes.php';
		                        echo json_encode(autocomplete('funcionario'));
		                        ?>;
        $("#medpront").autocomplete({source: nome_medico});
	});
	</script>


	<!--Validacao JS -->
	<script src="js/validacaoprontuario.js"></script>
	</body>
</html>
