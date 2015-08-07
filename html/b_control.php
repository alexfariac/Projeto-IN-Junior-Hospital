<?php
    session_start();
    include 'b_funcoes.php';
    if($_REQUEST['op']=='valida'){
        $usuario = $_POST['login'];
        $senha = $_POST['senha'];
        //$senha = crypt($_POST['senha']);

        if ($usuario == "" || $senha == "") {
            echo "Usuario e senha devem estar preenchidos!";
        } else {
            loga($usuario, $senha);
        }
    }else {

        switch ($_REQUEST['op']) {
            case 'desloga':
                desloga();
                break;
            case 'ponto':
                echo "ponto:".$_SESSION['ponto'];
                if ($_SESSION['ponto'] == 'novo') {
                    insert_ponto($_SESSION['user']);
                } else {
                    update_ponto($_SESSION['ponto']);
                }
                break;
            case 'editPac':
                echo "EDIT!";
        }
    }
    header("Location:home.php");
?>