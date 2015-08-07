<?php
    include 'b_funcoes.php';
    $login = 'teste2';
    $senha = 'senha';
    $fk_tipo_funcionario = 1;
    $nome = 'teste XD';
    $cpf = '12345671212';
    $endereco = '';
    $email = 'abc@abc.com';
    echo 'Testando...';
    //inserir_funcionario($login,$senha,$fk_tipo_funcionario, $nome, $cpf,$email); //Esta dando algum erro no campo endereco :P

    $tabela     = 'status_usuario';
    $data       = 'teste';
    //select_generico($tabela);
    //insert_generico($tabela,$data);
    //select_prontuario();
    //select_quarto();
    //select_funcionario();
    //select_ponto();
    select_paciente();
    //print_r(autocomplete('paciente'));
    ?>