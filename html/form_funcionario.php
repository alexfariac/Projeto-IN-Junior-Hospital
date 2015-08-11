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
						<?php
						if(isset($_REQUEST['editar'])){
							$op = 'editado';
                            include_once 'b_config.php';
                            $conn = conecta_bd();
                            $sql = "SELECT * FROM funcionario,usuario WHERE fk_usuario = id_usuario AND fk_usuario = ".$_REQUEST['editar'];
                            $query = $conn->query($sql);
                            $user = $query->fetch_array();
						}else{
							$op = 'cria';
						}
						?>
						<form class="form-signin" id="formfuncionario" method="POST" action="b_control.php?op=<?php echo $op ."&entidade=funcionario";
                        if(isset($_REQUEST['editar'])){echo "&id=".$_REQUEST['editar'];}
                        ?>" enctype="multipart/form-data">
							
							<span class="id_campo">Nome:</span>
							<label class="sr-only" id="campo_senha">Nome</label>
							<input class="form-control" id="nomefun" placeholder="Nome" required="" name="nome" <?php if(isset($_REQUEST['editar'])){echo "value=".$user['nome'];} ?>>
							
							<span class="id_campo">CPF:</span>
							<label class="sr-only" id="campo_senha">CPF</label>
							<input class="form-control" id="cpffun" placeholder="CPF" required="" name="cpf" <?php if(isset($_REQUEST['editar'])){echo "value=".$user['cpf'];} ?>>


                            <span class="id_campo">Email:</span>
                            <label class="sr-only" id="campo_senha">Email</label>
                            <input class="form-control" id="endfun" placeholder="Email" required="" name="email" <?php if(isset($_REQUEST['editar'])){echo "value=".$user['email'];} ?>>


							<span class="id_campo">Cargo:</span>
							<select id="listbox" name="tipo_funcionario">
								<?php
									include_once 'b_config.php';
									$conn = conecta_bd();
									$sql = "select * from tipo_funcionario";
									$query = $conn->query($sql);
									while($dados = $query->fetch_array()){
										echo "<option value=".$dados['id_tipo_funcionario'];
                                        if(isset($_REQUEST['editar'])){
                                            if($dados['id_tipo_funcionario']==$user['fk_tipo_funcionario']){
                                                echo " selected='selected'";}}
                                        echo ">".$dados['tipo_funcionario']."</option>";
									}
								?>
							</select>
							
							<span class="id_campo">Login:</span>
							<label class="sr-only" id="campo_senha">Login</label>
							<input class="form-control" id="logfun" placeholder="Login" required="" name="login" <?php if(isset($_REQUEST['editar'])){echo "value=".$user['login'];} ?>>
							
							<span class="id_campo">Senha:</span>
							<label class="sr-only" id="campo_senha">Senha</label>
							<input type="password" id="inputPassword" class="form-control" placeholder="Senha" required="" name="senha">
							
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
	
	<!--Script validacao js -->
	<script src="js/validacaofuncionario.js"></script>
	</body>
</html>