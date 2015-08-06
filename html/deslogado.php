<html>
<head>
    <meta charset="UTF-8">
	<link href='css/bootstrap.min.css' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='css/theme.css'>
</head>
<body>
<div id='header'>
    <img id='logo' src='img/logo.jpg'>
    <form id='fheader' method='POST' action='b_control.php?op=valida' enctype='multipart/form-data'>
        <input type='text' placeholder='Usuário' name='login'>
        <input type='password' placeholder='Senha' name='senha'>
        <button  type='submit' class='log'>
            <img id='entrar' src='img/botaoLogar.png'>
        </button>
    </form>
</div>


<footer id='rodape'>
    <p id='copyrigth'>Copyrigth 2015 IN Junior</p>
</footer>


<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script src='js/validacao.js'></script>
</body>
</html>