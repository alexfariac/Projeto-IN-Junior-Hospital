<?php session_start();
    if(!isset($_SESSION['user'])){
        desloga();
    }
?>
<html>
<head>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' href='css/theme.css'>
</head>
<body>
<div id='header'>
    <?php
        $_SESSION['nome'];
    ?>
    <img id='logo' src='img/logo.jpg'>
    <form id='fheader' method='POST' action='b_control.php?op=ponto' enctype='multipart/form-data'>
        <button  type='submit' class='log'>
            <img id='entrar' src='img/botaoEntrar.png'>
        </button>
    </form>
    <form id='fheader' method='POST' action='b_control.php?op=desloga' enctype='multipart/form-data'>
        <button  type='submit' class='log'>
            <img id='entrar' src='img/botaoEntrar.png'>
        </button>
    </form>
</div>


<nav class='navbar navbar-default' role='navigation'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class='navbar-header'>
        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
        </button>
    </div>
<div class='collapse navbar-collapse navbar-ex1-collapse'>
    <ul class='nav navbar-nav navbar-left'>
        <li class='dropdown'>
            <a  class='dropdown-toggle' data-toggle='dropdown'><font>Funcionario</font><b class='caret'></b></a>
            <ul class='dropdown-menu'>
                <li><a href='form_funcionario.php?op=criar'>Criar</a></li>
                <li><a href='form_funcionario.php?op=ver'>Visualizar</a></li>
            </ul>
        </li>
    </ul><!--Funcionario-->
    <ul class='nav navbar-nav navbar-left'>
        <li class='dropdown'>
            <a href='#' class='dropdown-toggle' data-toggle='dropdown'><font>Ponto</font><b class='caret'></b></a>
            <ul class='dropdown-menu'>
                <li><a href='form_funcionario.php?op=criar'>Criar</a></li>
                <li><a href='form_funcionario.php?op=ver'>Visualizar</a></li>
            </ul>
        </li>
    </ul><!--Ponto-->
    <ul class='nav navbar-nav navbar-left'>
        <li class='dropdown'>
            <a href='#' class='dropdown-toggle' data-toggle='dropdown'><font>Paciente</font><b class='caret'></b></a>
            <ul class='dropdown-menu'>
                <li><a href='form_paciente.php?op=criar'>Criar</a></li>
                <li><a href='form_paciente.php?op=ver'>Visualizar</a></li>
            </ul>
        </li>
    </ul><!--Paciente-->
    <ul class='nav navbar-nav navbar-left'>
        <li class='dropdown'>
            <a href='#' class='dropdown-toggle' data-toggle='dropdown'><font>Prontuario</font><b class='caret'></b></a>
            <ul class='dropdown-menu'>
                <li><a href='form_prontuario.php?op=criar'>Criar</a></li>
                <li><a href='form_prontuario.php?op=ver'>Visualizar</a></li>
            </ul>
        </li>
    </ul><!--Prontuario-->
    <ul class='nav navbar-nav navbar-left'>
        <li class='dropdown'>
            <a href='#' class='dropdown-toggle' data-toggle='dropdown'><font>Quarto</font><b class='caret'></b></a>
            <ul class='dropdown-menu'>
                <li><a href='form_quarto.php?op=criar'>Criar</a></li>
                <li><a href='form_quarto.php?op=ver'>Visualizar</a></li>
            </ul>
        </li>
    </ul><!--Quarto-->
    <ul class='nav navbar-nav navbar-left'>
        <li class='dropdown'>
            <a href='#' class='dropdown-toggle' data-toggle='dropdown'><font>Admin</font><b class='caret'></b></a>
            <ul class='dropdown-menu'>
                <li><a href='form_generico.php' target='iframe'>Tipo Quarto</a></li>
                <li><a href='form_generico.php' target='iframe'>Status Quarto</a></li>
                <li><a href='form_generico.php' target='iframe'>Tipo Usuario</a></li>
                <li><a href='form_generico.php' target='iframe'>Status Usuario</a></li>
                <li><a href='form_generico.php' target='iframe'>Status Saude</a></li>
            </ul>
        </li>
    </ul><!--Admin-->
</div><!-- /.navbar-collapse -->

<iframe class='formula' src='form_quarto.php' name='iframe'></iframe>


<footer id='rodape'>
    <p id='copyrigth'>Copyrigth 2015 IN Junior</p>
</footer>


<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script src='js/validacao.js'></script>
</body>
</html>