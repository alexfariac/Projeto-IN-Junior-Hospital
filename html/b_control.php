<?php
    if(!isset($_SESSION)) {session_start();}
    include 'b_funcoes.php';
    if($_REQUEST['op']=='loga'){
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
            case 'cria':
                switch ($_REQUEST['entidade']) {
                    case 'quarto':
                        insert_quarto($_REQUEST['quarto'], $_REQUEST['tipo_quarto']);
                        break;
                    case 'paciente':
                        insert_paciente($_REQUEST['nome'], $_REQUEST['cpf']);
                        break;
                    case 'funcionario':
                    case 'usuario':
                        insert_funcionario($_REQUEST['login'], $_REQUEST['senha'], $_REQUEST['tipo_funcionario'], $_REQUEST['nome'], $_REQUEST['cpf'], $_REQUEST['email']);
                        break;
                    case 'ponto':
                        insert_ponto($_REQUEST['nome'], $_REQUEST['entrada'], $_REQUEST['saida']);
                        break;
                    case 'prontuario':
                        insert_prontuario($_REQUEST['quarto'], $_REQUEST['medico'], $_REQUEST['paciente'], $_REQUEST['status_saude']);
                        break;
                    case 'tipo_funcionario':
                    case 'tipo_quarto':
                    case 'status_usuario':
                    case 'status_quarto':
                    case 'status_saude':
                        $gn = $_REQUEST['entidade'];
                        insert_generico($gn,$_REQUEST[$gn]);
                        break;
                }
                exit;
            case 'ponto':
                echo "ponto:".$_SESSION['ponto'];
                if ($_SESSION['ponto'] == 'novo') {
                    auto_insert_ponto($_SESSION['user']);
                } else {
                    auto_update_ponto();
                }
                break;
            case 'edit':
                //editar($_REQUEST['entidade'],$_REQUEST['id']);
                switch ($_REQUEST['entidade']){
                    case 'tipo_funcionario':
                    case 'tipo_quarto':
                    case 'status_quarto':
                    case 'status_usuario':
                    case 'status_saude':
                        header("Location:form_generico.php?editar=".$_REQUEST['id']);
                        exit;
                    case 'usuario':
                        header("Location:form_funcionario.php?editar=".$_REQUEST['id']);
                        exit;
                    default:
                        header("Location:form_".$_REQUEST['entidade'] .".php?editar=".$_REQUEST['id']);
                        exit;
                }
            case 'editado':
                switch ($_REQUEST['entidade']) {
                    case 'quarto':
                        update_quarto($_REQUEST['id'],$_REQUEST['quarto'], $_REQUEST['tipo_quarto']);
                        break;
                    case 'paciente':
                        update_paciente($_REQUEST['id'],$_REQUEST['nome'], $_REQUEST['cpf']);
                        break;
                    case 'funcionario':
                    case 'usuario':
                        update_funcionario($_REQUEST['id'],$_REQUEST['login'], $_REQUEST['senha'], $_REQUEST['tipo_funcionario'], $_REQUEST['nome'], $_REQUEST['cpf'], $_REQUEST['email']);
                        break;
                    case 'ponto':
                        update_ponto($_REQUEST['id'],$_REQUEST['nome'], $_REQUEST['entrada'], $_REQUEST['saida']);
                        break;
                    case 'prontuario':
                        update_prontuario($_REQUEST['id'],$_REQUEST['quarto'], $_REQUEST['medico'], $_REQUEST['paciente'], $_REQUEST['status_saude']);
                        break;
                    case 'tipo_funcionario':
                    case 'tipo_quarto':
                    case 'status_usuario':
                    case 'status_quarto':
                    case 'status_saude':
                        $gn = $_REQUEST['entidade'];
                        update_generico($_REQUEST['id'],$gn,$_REQUEST[$gn]);
                        break;
                }
                exit;
            case 'excl':
                deletar($_REQUEST['entidade'],$_REQUEST['id']);
                exit;

        }
    }
    header("Location:home.php");
