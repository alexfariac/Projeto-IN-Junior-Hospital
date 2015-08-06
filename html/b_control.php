<?php session_start();
    include 'b_funcoes.php';

        switch ($_REQUEST['op']) {
            case 'valida':
                $usuario = $_POST['login'];
                $senha = $_POST['senha'];
                //$senha = crypt($_POST['senha']);

                if ($usuario == "" || $senha == "") {
                    echo "Usuario e senha devem estar preenchidos!";
                } else {
                    valida_usuario($usuario, $senha);
                }
                break;
            case 'desloga':
                desloga();
                break;
            case 'ponto':
                echo $_SESSION['ponto'];
                if($_SESSION['ponto'] == 'novo'){
                    insert_ponto($_SESSION['user']);
                }
                break;
            case 'editPac':
                echo "EDIT!";
        }


?>