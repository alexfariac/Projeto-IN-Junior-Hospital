<?php
    if($_REQUEST['op']=='criar'){
        if(isset($_REQUEST['gn'])){
            include_once "form_generico.php";
        }else{
            include_once "form_".$_REQUEST['entidade'].".php";
        }
    }else{
        include_once "b_funcoes.php";
        if(isset($_REQUEST['gn'])){
            select_generico($_REQUEST['gn']);
        }else{
            switch($_REQUEST['entidade']){
                case 'funcionario':
                    select_funcionario();
                    break;
                case 'paciente':
                    select_paciente();
                    break;
                case 'ponto':
                    select_ponto();
                    break;
                case 'prontuario':
                    select_prontuario();
                    break;
                case 'quarto':
                    select_quarto();
                    break;
            }
        }
    }

?>