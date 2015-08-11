<?php
    include 'b_config.php';
    //Validacao de usuario...
	function loga($usuario,$senha){
        $conn = conecta_bd();
		$sql = "SELECT id_usuario, fk_status_usuario, senha FROM usuario WHERE login = ? AND senha = ? AND fk_status_usuario = 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss',$usuario,$senha);
        $stmt->execute();
        $stmt->bind_result($res_id_usuario, $res_status_usuario , $res_senha);
        $stmt->fetch();
        //$dados = $conn->query($stmt);
        //if(isset($dados)){echo "Vazio";}
        //echo $dados['senha'];
        if($res_senha == $senha && $res_status_usuario == 1) {
            echo 'Usuario autenticado com sucesso...';
            $conn = conecta_bd();
            $sql = "select * from funcionario where fk_usuario='$res_id_usuario'";
            $query = $conn->query($sql);
            $dados = $query->fetch_array();
            $_SESSION['user'] = $res_id_usuario;
            $_SESSION['tipo'] = $dados['fk_tipo_funcionario'];
            $_SESSION['nome'] = $dados['nome'];
            $conn = conecta_bd();
            $sql = "select * from ponto where fk_usuario='$res_id_usuario' and ISNULL(data_hora_saida)";
            $query = $conn->query($sql);
            //echo "<br>".$sql;
            //$qtd = $query->fetch_row();
            //echo $qtd;
            //<? =$qtd
            //echo "<script> alert('tst')</script>";
            if($query->fetch_row()>=1){
                //$dados2 = $query->fetch_array();
                //echo "print: ".$dados2;
                //echo "print: ".print_r($dados2);
                //echo "print: ".$dados2['id_ponto'];
                //$_SESSION['ponto'] = $dados2['id_ponto'];
                echo "pulei";
            } else{
                $_SESSION['ponto'] = 'novo';
            }
        }
        else{
            echo "Nao foi possivel autenticar...";
        }
        mysqli_close($conn);
	}
    function desloga(){
        //session_start();
        session_destroy();  //destruir a sessão
    }
    function valida_tipo($tipo){
    
    }
    //Carregar Menu
    function carraga_menu($tipo){
        require "in/menu". $tipo .".php";
    }
    //Create...
    function insert_paciente($nome,$cpf){
        //echo('Inserindo Paciente...');
        $conn = conecta_bd();
        $sql = "INSERT INTO paciente (nome,cpf) values (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss',$nome,$cpf);
        $ok = $stmt->execute();
        
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ;
        }
        mysqli_close($conn);
    }
    function insert_prontuario($quarto,$medico, $paciente, $status_saude){
        //echo('Inserindo prontuario...');
        $conn = conecta_bd();
        $sql = "INSERT INTO prontuario (fk_quarto,fk_usuario, fk_paciente, fk_status_saude) values (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iiii',$quarto,$medico, $paciente, $status_saude);
        $ok = $stmt->execute();
        
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ;
        }
        mysqli_close($conn);
    }
    function insert_quarto($quarto,$tipo_quarto){
        //echo('Inserindo quarto...');
        $conn = conecta_bd();
        $sql = "INSERT INTO quarto (quarto,fk_tipo_quarto) values (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si',$quarto,$tipo_quarto);
        $ok = $stmt->execute();
        
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ;
        }
        mysqli_close($conn);
    }
    function insert_ponto($fk_usuario,$data_hora_entrada,$data_hora_saida){
        //echo('Inserindo quarto...');
        $conn = conecta_bd();
        if($data_hora_saida!=""){
            $sql = "INSERT INTO ponto (fk_usuario,data_hora_entrada, data_hora_saida,horas_trabalhadas) values (?,?,?,TIMEDIFF(data_hora_saida,data_hora_entrada))";
        }else{
            $sql = "INSERT INTO ponto (fk_usuario,data_hora_entrada) values (?,?)";
        }
        $stmt = $conn->prepare($sql);
        if($data_hora_saida!="") {
            $stmt->bind_param('iss', $fk_usuario, $data_hora_entrada, $data_hora_saida);
        }else{
            $stmt->bind_param('is', $fk_usuario, $data_hora_entrada);
        }
        $ok = $stmt->execute();

        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
            ;
        }
        mysqli_close($conn);
    }
    function auto_insert_ponto($fk_usuario){
        //echo('Inserindo Ponto...');
        $conn = conecta_bd();
        $sql = "INSERT INTO ponto(fk_usuario) values (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$fk_usuario);
        if($stmt->execute()){
            echo 'Dados inseridos com sucesso...';
            $_SESSION['ponto']=mysqli_insert_id($conn);
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ;
        }
        mysqli_close($conn);
    }
    function insert_funcionario($login,$senha,$fk_tipo_funcionario, $nome, $cpf,$email){
        //echo('Inserindo Funcionario e Usuario...');
        $conn = conecta_bd();
        $sql = "INSERT INTO usuario (login,senha) values (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $login, $senha);
        $ok1 = $stmt->execute();
        $id_res = mysqli_insert_id($conn);//$stmt->insert_id;
        //echo 'Ultimo id:' . $id_res;
        //echo ' Tipo:' . var_dump($id_res);
        $sql = "INSERT INTO funcionario (fk_usuario,fk_tipo_funcionario, nome, cpf,email) values (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iisss', $id_res, $fk_tipo_funcionario, $nome, $cpf, $email);
        $ok2 = $stmt->execute();

        if ($ok1 && $ok2) {
            echo 'Dados inseridos com sucesso...';
        } elseif ($ok1 || $ok2) {
            echo "Nao foi possivel inserir os dados...<br> Mas alguma parte dos dados entrou.";
        } else {
            echo "Nao foi possivel inserir os dados...";
        }
        mysqli_close($conn);
    }//Endereco com problema :(
    function insert_generico($tabela,$data){
        //echo('Inserindo generico...');
        $conn = conecta_bd();
        $sql = "INSERT INTO $tabela ($tabela) values (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$data);
        $ok = $stmt->execute();

        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ;
        }
        mysqli_close($conn);
    }
    /*
    function insert_tipo_quarto($tipo_quarto){
        //echo('Inserindo Tipo de Quarto...');
        $conn = conecta_bd();
        $sql = "INSERT INTO tipo_quarto (tipo_quarto) values (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$tipo_quarto);
        $ok = $stmt->execute();
        
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ;
        }
        mysqli_close($conn);
    }
    function insert_tipo_funcionario($tipo_funcionario){
        //echo('Inserindo Tipo de Funcionário...');
        $conn = conecta_bd();
        $sql = "INSERT INTO tipo_funcionario(tipo_funcionario) values (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$tipo_funcionario);
        $ok = $stmt->execute();
        
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ;
        }
        mysqli_close($conn);
    }
    function insert_status_quarto($status_quarto){
        //echo('Inserindo Status Quarto...');
        $conn = conecta_bd();
        $sql = "INSERT INTO status_quarto (status_quarto) values (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$status_quarto);
        $ok = $stmt->execute();
        
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ;
        }
        mysqli_close($conn);
    }
    function insert_status_usuario($status_usuario){
        //echo('Inserindo Status de usuario...');
        $conn = conecta_bd();
        $sql = "INSERT INTO status_usuario(status_usuario) values (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$status_usuario);
        $ok = $stmt->execute();
        
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ;
        }
        mysqli_close($conn);
    }
    function insert_status_saude($status_saude){
        //echo('Inserindo Status de Saude...');
        $conn = conecta_bd();
        $sql = "INSERT INTO status_saude (status_saude) values (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$status_saude);
        $ok = $stmt->execute();
        
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ;
        }
        mysqli_close($conn);
    }
    */

    //Read...
    function autocomplete($tabela){
        $conn = conecta_bd();
        $sql ="SELECT nome FROM $tabela";
        if($tabela == 'funcionario'){
            $sql .=" WHERE fk_tipo_funcionario = 2";
        }
        $query = $conn->query($sql);
        $nomes = array();
        while($dados = $query->fetch_array()){
            $nomes[] = $dados['nome'];
        }
        return $nomes;
    }
    function tabela($tabela,$conn,$sql,$fields)
    {
        $abre = "<head>";
        $abre .= "<link rel='stylesheet' type='text/css' href='css/jquery.dataTables.min.css'>";
        $abre .= "<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>";
        $abre .= "<link rel='stylesheet' type='text/css' href='css/bootstrap-theme.min.css'>";
        $abre .= "</head>";
        $abre .= "<body><table id='tabela'>";
        $abre .= "<thead>";

        $query = $conn->query($sql);
        //echo $sql;
        if ($query->num_rows > 0) {
            echo $abre;
            foreach ($fields as $field) {
                echo("<th>" . $field . "</th>");
            }
            echo "</thead><tbody>";
            while ($data = $query->fetch_array()) {
                $id = $data['id_' . $tabela];
                echo("<tr>");
                foreach ($fields as $field) {
                    if ($field == 'editar') {
                        echo "<th>"
                            . "<a href='b_control.php?op=edit&id=$id&entidade=$tabela' class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span> Editar </a>"
                            . "</th>";
                    } elseif ($field == 'excluir') {
                        echo "<th>"
                            . "<a href='b_control.php?op=excl&id=$id&entidade=$tabela' class='btn btn-primary'><span class='glyphicon glyphicon-trash'></span> Excluir </a>"
                            . "</th>";
                    } else {
                        echo("<th>" . $data[$field] . "</th>");
                    }
                }
                echo("</tr>");
            }
            $fecha = "</tbody></table>";
            $fecha .= "<script type='text/javascript' src='js/jquery-2.1.4.min.js'></script>";
            $fecha .= "<script type='text/javascript' src='js/jquery.dataTables.min.js'></script>";
            $fecha .= "<script type='text/javascript' src='js/dataTable.js'></script>";
            $fecha .= "</body>";
            echo $fecha;
        }
    }
    function select_paciente(){
        $conn = conecta_bd();
        $sql ="SELECT * FROM paciente";
        if(isset($_SESSION['tipo'])) {
            if ($_SESSION['tipo'] == 2) {
                $sql .= "WHERE fk_usuario =" . $_SESSION["user"];
            }
        }
        $fields = ['nome','cpf','editar','excluir'];
       /* $query = $conn->query($sql);
        if($query->num_rows > 0){
            tabela("abre");
            foreach ($fields as $field) {
                echo("<th>" . $field ."</th>");
            }
            echo "</thead><tbody>";
            while($data = $query->fetch_array()) {
                $id =  $data['id_'.$tabela];
                echo("<tr>");
                foreach ($fields as $field) {
                    if($field == 'editar'){
                        echo "<th>"
                            . "<a href='b_control.php?op=editPac&id=$id_paciente' class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span> Editar </a>"
                            . "</th>";
                    }elseif($field == 'excluir'){
                        echo "<th>"
                            . "<a href='b_control.php?op=exclPac&id=$id_paciente' class='btn btn-primary'><span class='glyphicon glyphicon-trash'></span> Excluir </a>"
                            . "</th>";
                    }else {
                        echo("<th>" . $data[$field] . "</th>");
                    }
                }
                echo("</tr>");
            }
            tabela("fecha");
        }
       */
        tabela('paciente',$conn, $sql, $fields);
    }
    function select_prontuario(){
        $conn = conecta_bd();
        $sql ="SELECT id_prontuario, quarto, f.nome as medico,paciente.nome as paciente, status_saude "
                ."FROM prontuario p,quarto, paciente,funcionario f,status_saude "
                ."WHERE fk_quarto = id_quarto AND f.fk_usuario = p.fk_usuario AND fk_paciente = id_paciente AND fk_status_saude = id_status_saude";
        $fields = ['quarto','medico','paciente','status_saude','editar','excluir'];
        tabela('prontuario',$conn, $sql, $fields);
    }
    function select_quarto(){ //Para as tabelas Admin[status_*, tipo_*]
        $conn = conecta_bd();
        $sql ="SELECT id_quarto,quarto,tipo_quarto tipo,status_quarto status FROM quarto, tipo_quarto, status_quarto WHERE fk_tipo_quarto = id_tipo_quarto AND fk_status_quarto = id_status_quarto";
        $fields = ['quarto','tipo' ,'status','editar','excluir'];
        tabela('quarto',$conn, $sql, $fields);
    }
    function select_ponto(){ //Para as tabelas Admin[status_*, tipo_*]
        $conn = conecta_bd();
        $sql ="SELECT * FROM ponto, funcionario WHERE ponto.fk_usuario = funcionario.fk_usuario";
        $fields = ['nome','data_hora_entrada','data_hora_saida','horas_trabalhadas','editar','excluir'];
        tabela('ponto',$conn, $sql, $fields);
    }
    function select_funcionario(){ //Para as tabelas Admin[status_*, tipo_*]
        $conn = conecta_bd();
        $sql ="SELECT id_usuario, nome,login, tipo_funcionario cargo,cpf,email,status_usuario status FROM funcionario, usuario, status_usuario, tipo_funcionario "
            . "WHERE fk_usuario = id_usuario AND fk_status_usuario = id_status_usuario AND fk_tipo_funcionario = id_tipo_funcionario";
        $fields = ['nome','login','cargo','cpf','email','status','editar'];
        tabela('usuario',$conn, $sql, $fields);
    }
    function select_generico($tabela){ //Para as tabelas Admin[status_*, tipo_*]
        $conn = conecta_bd();
        $sql ="select * from $tabela";
        $fields = [$tabela,'editar','excluir'];
        tabela($tabela,$conn, $sql, $fields);
    }
    //Update...
    /*function editar($tabela,$id){
        //$conn = conecta_bd();
        //if($tabela == 'funcionario'){
        //    $sql = "SELECT * FROM $tabela WHERE fk_usuario = $id";
        //}else{
        //    $sql = "SELECT * FROM $tabela WHERE id_$tabela = $id";
        //}
        //$query = $conn->query($sql);
        //$data = $query->fetch_array();
        //header("Location:form_$tabela.php?editar=$id");
    }
    function update($tabela,$id,$array1,$array2){
        $conn = conecta_bd();
        $sql =  "UPDATE $tabela SET ";
        for($i=0;$i<count($array1);$i++){
            $sql .= $array1[$i]." = ". $array2[$i];
        }
        if($tabela=='funcionario'){
            $sql .= "WHERE fk_usuario= $id";
        }else{
            $sql .= "WHERE id_$tabela = $id";
        }
        $query = $conn->query($sql);
        $data = $query->fetch_array();
    }
    */
    function auto_update_ponto(){
        $conn = conecta_bd();
        $sql = "select id_ponto from ponto where fk_usuario='1' and ISNULL(data_hora_saida)";
        $query = $conn->query($sql);
        $dados = $query->fetch_array();
        $id_ponto = $dados['id_ponto'];
        echo $id_ponto;

        $conn = conecta_bd();
        $sql =  "UPDATE ponto ";
        $sql .= "SET data_hora_saida = NOW(),horas_trabalhadas = TIMEDIFF(NOW(),data_hora_entrada) ";
        $sql .= "WHERE id_ponto = $id_ponto";
        if($conn->query($sql)){
            echo "Feito!";
            $_SESSION['ponto'] = 'novo';
        }else{
            echo "Deu ruim!";}
    }

    function update_paciente($id,$nome,$cpf){
    //echo('Atualizando Paciente...');
    $conn = conecta_bd();
    $sql = "INSERT INTO paciente (nome,cpf) values (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss',$nome,$cpf);
    $ok = $stmt->execute();

    if($ok){
        echo 'Dados atualizados com sucesso...';
    }
    else{
        echo "Nao foi possivel atualizar os dados..."
        ;
    }
    mysqli_close($conn);
    }
    function update_prontuario($id,$quarto,$medico, $paciente, $status_saude){
        //echo('Atualizando prontuario...');
        $conn = conecta_bd();
        $sql = "INSERT INTO prontuario (fk_quarto,fk_usuario, fk_paciente, fk_status_saude) values (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iiii',$quarto,$medico, $paciente, $status_saude);
        $ok = $stmt->execute();

        if($ok){
            echo 'Dados atualizados com sucesso...';
        }
        else{
            echo "Nao foi possivel atualizar os dados..."
            ;
        }
        mysqli_close($conn);
    }
    function update_quarto($id,$quarto,$tipo_quarto){
        //echo('Atualizando quarto...');
        $conn = conecta_bd();
        $sql = "INSERT INTO quarto (quarto,fk_tipo_quarto) values (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si',$quarto,$tipo_quarto);
        $ok = $stmt->execute();

        if($ok){
            echo 'Dados atualizados com sucesso...';
        }
        else{
            echo "Nao foi possivel atualizar os dados..."
            ;
        }
        mysqli_close($conn);
    }
    function update_ponto($id,$fk_usuario,$data_hora_entrada,$data_hora_saida){
        //echo('Atualizando quarto...');
        $conn = conecta_bd();
        $sql =  "UPDATE ponto ";
        if($data_hora_saida!=""){
            $sql .= "SET fk_usuario = ?,data_hora_entrada= ?,data_hora_saida = ?,horas_trabalhadas = TIMEDIFF(data_hora_saida,data_hora_entrada) ";
        }else{
            $sql .= "SET fk_usuario = ?,data_hora_entrada= ? ";
        }
        $sql .= "WHERE id_ponto = $id";
        $stmt = $conn->prepare($sql);
        if($data_hora_saida!="") {
            $stmt->bind_param('iss', $fk_usuario, $data_hora_entrada, $data_hora_saida);
        }else{
            $stmt->bind_param('is', $fk_usuario, $data_hora_entrada);
        }
        $ok = $stmt->execute();

        if($ok){
            echo 'Dados atualizados com sucesso...';
        }
        else{
            echo "Nao foi possivel atualizar os dados..."
            ;
        }
        mysqli_close($conn);
    }
    function update_funcionario($id,$login,$senha,$fk_tipo_funcionario, $nome, $cpf,$email){
        //echo('Atualizando Funcionario e Usuario...');
        $conn = conecta_bd();
        $sql = "INSERT INTO usuario (login,senha) values (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $login, $senha);
        $ok1 = $stmt->execute();
        $id_res = mysqli_insert_id($conn);//$stmt->insert_id;
        //echo 'Ultimo id:' . $id_res;
        //echo ' Tipo:' . var_dump($id_res);
        $sql = "INSERT INTO funcionario (fk_usuario,fk_tipo_funcionario, nome, cpf,email) values (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iisss', $id_res, $fk_tipo_funcionario, $nome, $cpf, $email);
        $ok2 = $stmt->execute();

        if ($ok1 && $ok2) {
            echo 'Dados atualizados com sucesso...';
        } elseif ($ok1 || $ok2) {
            echo "Nao foi possivel atualizar os dados...<br> Mas alguma parte dos dados entrou.";
        } else {
            echo "Nao foi possivel atualizar os dados...";
        }
        mysqli_close($conn);
    }//Endereco com problema :(
    function update_generico($id,$tabela,$data){
        //echo('Atualizando generico...');
        $conn = conecta_bd();
        $sql = "INSERT INTO $tabela ($tabela) values (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$data);
        $ok = $stmt->execute();

        if($ok){
            echo 'Dados atualizados com sucesso...';
        }
        else{
            echo "Nao foi possivel atualizar os dados..."
            ;
        }
        mysqli_close($conn);
    }
    //Delete...
    function deletar($tabela,$id){
        $conn = conecta_bd();
        //echo $tabela;
        switch($tabela){
            case 'paciente':
                $sql = "SELECT * FROM prontuario WHERE fk_paciente = $id";
                break;
            case 'quarto':
                $sql = "SELECT * FROM prontuario WHERE fk_quarto = $id";
                break;
            case 'tipo_quarto':
                $sql = "SELECT * FROM quarto WHERE fk_tipo_quarto = $id";
                break;
            case 'status_quarto':
                $sql = "SELECT * FROM quarto WHERE fk_status_quarto = $id";
                break;
            case 'tipo_funcionario':
                $sql = "SELECT * FROM funcionario WHERE fk_tipo_funcionario = $id";
                break;
            case 'status_saude':
                $sql = "SELECT * FROM prontuario WHERE fk_status_saude = $id";
                break;
            case 'status_usuario':
                $sql = "SELECT * FROM usuario WHERE fk_status_usuario = $id";
                break;
        }
        $query = $conn->query($sql);
        $usado = $query->fetch_row();
        if($tabela=='funcinario'){
            //$sql =  "DELETE funcionario WHERE fk_usuario = $id";
            //$conn->query($sql);
            //$conn = conecta_bd();
            //$sql =  "DELETE usuario WHERE id_usuario = $id";
        }elseif($usado==0){
            $sql =  "DELETE FROM $tabela WHERE id_$tabela = $id";
        }else{
            echo "Nao pode ser deletado, pois outra tabela esta usando esta informacao";
        }
        //echo $sql;
        if($conn->query($sql)){
            echo "Feito!";
        }else{
            echo "Deu ruim!";}
    }
