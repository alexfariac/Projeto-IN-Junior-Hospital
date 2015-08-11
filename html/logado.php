<?php
    //session_start();
    //if(!isset($_SESSION['user'])){
    //    desloga();
    //}
?>
<html>
<head>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' href='css/theme.css'>
</head>
<body>
<div id='header'>
    <img id='logo' src='img/logo.jpg'>
    <?php
    echo  "<span id='nomeusuario'>".$_SESSION['nome']."</span>";
    ?>

    <form id='pheader' method='POST' action='b_control.php?op=desloga' enctype='multipart/form-data'>
        <button  type='submit' class='log'>
            <img id='logado' src='img/botaoSair.png'>
        </button>
    </form>
    <form id='pheader' method='POST' action='b_control.php?op=ponto' enctype='multipart/form-data'>
        <button  type='submit' class='log'>
            <img id='logado' src='<?php
                                        if($_SESSION['ponto']=='novo'){
                                            echo 'img/botaoIniciarPonto.png';
                                        }else{
                                            echo 'img/botaoFecharPonto.png';
                                        }
                                    ?>'>
        </button>
    </form>
</div>


<?php
    include_once "b_funcoes.php";
    carraga_menu($_SESSION['tipo']);
?>

<iframe class='formula' src='in.php?op=ver&entidade=ponto' id='iframe' name='iframe'></iframe>


<footer id='rodape'>
    <p id='copyrigth'>Copyrigth 2015 IN Junior</p>
</footer>


<script src='js/jquery-1.11.3.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script src='js/validacao.js'></script>
</body>
</html>