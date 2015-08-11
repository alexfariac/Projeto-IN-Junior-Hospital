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
                        <form class="form-signin" id="formgenerico" method="POST" action="b_control.php?op=<?php echo $op ."&entidade=".$_SESSION['gn'] ?>" enctype="multipart/form-data">
							<?php
							$gn = $_SESSION['gn'];
							echo "<span class='id_campo'> $gn </span>";
							echo "<label class='sr-only' id='campo_senha'>$gn</label>";
							echo "<input class='form-control' placeholder='$gn' required='' name='$gn'>";
							?>
							<button  type="submit"	 class="log">
								<img  id="botao" src="img/botaoCadastrar.png">
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>