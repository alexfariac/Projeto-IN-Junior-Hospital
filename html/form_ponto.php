<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/estilo_form.css">
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
        <script src="js/moment.min.js"></script>
        <script src="js/bootstrap-datetimepicker.min.js"></script>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <style type="text/css">
            /**
             * Override feedback icon position
             * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
             */
            #meetingForm .dateContainer .form-control-feedback {
                top: 0;
                right: -15px;
            }
        </style>
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
                            $sql = "SELECT * FROM ponto WHERE id_ponto = ".$_REQUEST['editar'];
                            $query = $conn->query($sql);
                            $ponto = $query->fetch_array();
                        }else{
                            $op = 'cria';
                        }
                        ?>
                        <form class="form-signin" id="formponto" method="POST" action="b_control.php?op=<?php echo $op ."&entidade=ponto";
                        if(isset($_REQUEST['editar'])){echo "&id=".$_REQUEST['editar'];}
                        ?>" enctype="multipart/form-data">

                            <span class="id_campo">Nome:</span>
                            <select id="listbox" name="nome">
                                <?php
                                include_once 'b_config.php';
                                $conn = conecta_bd();
                                $sql = "select * from funcionario";
                                $query = $conn->query($sql);
                                while($dados = $query->fetch_array()){
                                    echo "<option value=".$dados['fk_usuario'];
                                    if(isset($_REQUEST['editar'])){if($dados['fk_usuario']==$ponto['fk_usuario']){echo " selected='selected'";}}
                                    echo ">".$dados['nome']."</option>";
                                }
                                ?>
                            </select>
                            <!--Tentativa de fazer validacao com JS...
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Data e Hora Inicio</label>
                                <div class="col-xs-6 dateContainer">
                                    <div class="input-group date" id="datetimePicker">
                                        <input type="text" class="form-control" placeholder="MM/DD/YYYY h:m A" required="" name="entrada" <?php //if(isset($_REQUEST['editar'])){echo "value=".$ponto['data_hora_entrada'];} ?> />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>
                            -->
                            <span class="id_campo">Data e Hora início:</span>
							<label class="sr-only" id="campo_senha">Data e Hora início:</label>
							<input type="date" class="form-control" id="medpront" placeholder="Data e Hora" required="" name="entrada" <?php if(isset($_REQUEST['editar'])){echo "value=".$ponto['data_hora_entrada'];} ?> >
							
							<span class="id_campo">Data e Hora fim:</span>
							<label class="sr-only" id="campo_senha">Data e Hora fim:</label>
							<input type="date" class="form-control" id="pacpront" placeholder="Data e Hora" name="saida" <?php if(isset($_REQUEST['editar'])){echo "value=".$ponto['data_hora_saida'];} ?> >
							
							<div class="centralizar">
							<button  type="submit" class="log">
                                <?php
                                    if(isset($_REQUEST['editar'])){
                                        echo '<img id="botao" src="img/botaoCadastrar.png">';//botao salvar?
                                    } else{
                                        echo '<img id="botao" src="img/botaoCadastrar.png">';
                                    }
                                ?>
							</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Validacao JS -->
	<script src="js/validacaoprontuario.js"></script>

    <script>
        $(document).ready(function() {
            $('#datetimePicker').datetimepicker();

            $('#meetingForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    meeting: {
                        validators: {
                            date: {
                                format: 'MM/DD/YYYY h:m A',
                                message: 'The value is not a valid date'
                            }
                        }
                    }
                }
            });

            $('#datetimePicker').on('dp.change dp.show', function(e) {
                $('#meetingForm').formValidation('revalidateField', 'meeting');
            });
        });
    </script>
	</body>
</html>