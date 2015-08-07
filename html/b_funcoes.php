<?php
    include 'b_config.php';
    //Validacao de usuario...
	function loga($usuario,$senha){
        $conn = conecta_bd();
		$sql = "SELECT id_usuario, fk_status_usuario, senha FROM usuario WHERE login = ? AND senha = ?";
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
            $sql = "select id_ponto from ponto where fk_usuario='$res_id_usuario' and ISNULL(data_hora_saida)";
            $query = $conn->query($sql);
            //$qtd = $query->fetch_row();
            //echo $qtd;
            //<? =$qtd
            //echo "<script> alert('tst')</script>";
            if($query->fetch_row()>=1){
                $dados = $query->fetch_array();
                echo "print: ".$dados;
                echo "print: ".print_r($dados);
                echo "print: ".$dados['id_ponto'];
                $_SESSION['ponto'] = $dados['id_ponto'];
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
        session_start();
        session_destroy();  //destruir a sessão
    }
    function valida_tipo($tipo){
    
    }
    //Carregar Menu
    function carraga_menu($tipo){
        require "menu/menu". $tipo .".php";
    }
    //Create...
    function insert_paciente($nome,$cpf){
        echo('Inserindo Paciente...');
        $conn = conecta_bd();
        $sql = "INSERT INTO paciente (nome,cpf) values (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss',$nome,$cpf);
        $ok = $stmt->execute();
        echo $ok;
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ."<br><a href=\"home.php\">clique aqui para tentar novamente</a>";
        }
        mysqli_close($conn);
    }
    function insert_prontuario($quarto,$medico, $paciente, $status_saude){
        echo('Inserindo prontuario...');
        $conn = conecta_bd();
        $sql = "INSERT INTO prontuario (fk_quarto,fk_usuario, fk_paciente, fk_status_saude) values (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iiii',$quarto,$medico, $paciente, $status_saude);
        $ok = $stmt->execute();
        echo $ok;
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ."<br><a href=\"home.php\">clique aqui para tentar novamente</a>";
        }
        mysqli_close($conn);
    }
    function insert_quarto($quarto,$tipo_quarto){
        echo('Inserindo quarto...');
        $conn = conecta_bd();
        $sql = "INSERT INTO quarto (quarto,fk_tipo_quarto) values (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si',$quarto,$tipo_quarto);
        $ok = $stmt->execute();
        echo $ok;
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ."<br><a href=\"home.php\">clique aqui para tentar novamente</a>";
        }
        mysqli_close($conn);
    }
    function insert_ponto($fk_usuario){
        echo('Inserindo Ponto...');
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
                ."<br><a href=\"home.php\">clique aqui para tentar novamente</a>";
        }
        mysqli_close($conn);
    }
    function insert_funcionario($login,$senha,$fk_tipo_funcionario, $nome, $cpf,$email){
        echo('Inserindo Funcionario e Usuario...');
        $conn = conecta_bd();
        $sql = "INSERT INTO usuario (login,senha) values (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $login, $senha);
        $ok1 = $stmt->execute();
        $id_res = mysqli_insert_id($conn);//$stmt->insert_id;
        echo 'Ultimo id:' . $id_res;
        echo ' Tipo:' . var_dump($id_res);
        $sql = "INSERT INTO funcionario (fk_usuario,fk_tipo_funcionario, nome, cpf,email) values (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iisss', $id_res, $fk_tipo_funcionario, $nome, $cpf, $email);
        $ok2 = $stmt->execute();

        if ($ok1 && $ok2) {
            echo 'Dados inseridos com sucesso...';
        } elseif ($ok1 || $ok2) {
            echo "Nao foi possivel inserir os dados...<br> Mas alguma parte dos dados entrou."
                . "<br><a href=\"home.php\">clique aqui para tentar novamente</a>";
        } else {
            echo "Nao foi possivel inserir os dados..."
                . "<br><a href=\"home.php\">clique aqui para tentar novamente</a>";
        }
        mysqli_close($conn);
    }//Endereco com problema :(
    function insert_generico($tabela,$data){
        echo('Inserindo generico...');
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
                ."<br><a href=\"home.php\">clique aqui para tentar novamente</a>";
        }
        mysqli_close($conn);
    }
    /*
    function insert_tipo_quarto($tipo_quarto){
        echo('Inserindo Tipo de Quarto...');
        $conn = conecta_bd();
        $sql = "INSERT INTO tipo_quarto (tipo_quarto) values (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$tipo_quarto);
        $ok = $stmt->execute();
        echo $ok;
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ."<br><a href=\"home.php\">clique aqui para tentar novamente</a>";
        }
        mysqli_close($conn);
    }
    function insert_tipo_funcionario($tipo_funcionario){
        echo('Inserindo Tipo de Funcionário...');
        $conn = conecta_bd();
        $sql = "INSERT INTO tipo_funcionario(tipo_funcionario) values (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$tipo_funcionario);
        $ok = $stmt->execute();
        echo $ok;
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ."<br><a href=\"home.php\">clique aqui para tentar novamente</a>";
        }
        mysqli_close($conn);
    }
    function insert_status_quarto($status_quarto){
        echo('Inserindo Status Quarto...');
        $conn = conecta_bd();
        $sql = "INSERT INTO status_quarto (status_quarto) values (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$status_quarto);
        $ok = $stmt->execute();
        echo $ok;
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ."<br><a href=\"home.php\">clique aqui para tentar novamente</a>";
        }
        mysqli_close($conn);
    }
    function insert_status_usuario($status_usuario){
        echo('Inserindo Status de usuario...');
        $conn = conecta_bd();
        $sql = "INSERT INTO status_usuario(status_usuario) values (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$status_usuario);
        $ok = $stmt->execute();
        echo $ok;
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ."<br><a href=\"home.php\">clique aqui para tentar novamente</a>";
        }
        mysqli_close($conn);
    }
    function insert_status_saude($status_saude){
        echo('Inserindo Status de Saude...');
        $conn = conecta_bd();
        $sql = "INSERT INTO status_saude (status_saude) values (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$status_saude);
        $ok = $stmt->execute();
        echo $ok;
        if($ok){
            echo 'Dados inseridos com sucesso...';
        }
        else{
            echo "Nao foi possivel inserir os dados..."
                ."<br><a href=\"home.php\">clique aqui para tentar novamente</a>";
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
    function tabela($parte){
        if($parte == "abre"){
            $abre =     "<head>";
            $abre .=    "<link rel='stylesheet' type='text/css' href='css/jquery.dataTables.min.css'>";
            $abre .=    "<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>";
            $abre .=    "<link rel='stylesheet' type='text/css' href='css/bootstrap-theme.min.css'>";
            $abre .=    "</head>";
            $abre .=    "<body><table id='tabela'>";
            $abre .=    "<thead>";
            echo $abre;
        }elseif($parte == "fecha"){
            $fecha =    "</tbody></table>";
            $fecha .=   "<script type='text/javascript' src='js/jquery-2.1.4.min.js'></script>";
            $fecha .=   "<script type='text/javascript' src='js/jquery.dataTables.min.js'></script>";
            $fecha .=   "<script type='text/javascript' src='js/dataTable.js'></script>";
            $fecha .=   "</body>";
            echo $fecha;
        }
    }
    function select_paciente(){
        $conn = conecta_bd();
        $sql ="SELECT * FROM paciente";
        if($_SESSION['tipo']=="medico"){
            $sql .= "WHERE fk_usuario =".$_SESSION["user"];
        }
        $fields = ['nome','cpf','editar','excluir'];
        $query = $conn->query($sql);
        if($query->num_rows > 0){
            tabela("abre");
            foreach ($fields as $field) {
                echo("<th>" . $field ."</th>");
            }
            echo "</thead><tbody>";
            while($data = $query->fetch_array()) {
                $id_paciente =  $data['id_paciente'];
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
    }
    function select_prontuario(){
        $conn = conecta_bd();
        $sql ="SELECT quarto, f.nome as medico,paciente.nome as paciente, status_saude FROM prontuario p,quarto, paciente,funcionario f,status_saude WHERE fk_quarto = id_quarto AND f.fk_usuario = p.fk_usuario AND fk_paciente = id_paciente AND fk_status_saude = id_status_saude";
        $fields = ['quarto','medico','paciente','status_saude'];
        $query = $conn->query($sql);
        if($query->num_rows > 0){
            echo $query->num_rows . "<br>";
            echo "<table>";
            foreach ($fields as $field) {
                echo("<th>" . $field ."</th>");
            }
            while($data = $query->fetch_array()) {
                echo("<tr>");
                foreach ($fields as $field) {
                    echo("<th>" . $data[$field] . "</th>");
                }
                echo("</tr>");
            }
            echo "</table>";
        }
    }
    function select_quarto(){ //Para as tabelas Admin[status_*, tipo_*]
        $conn = conecta_bd();
        $sql ="SELECT quarto,tipo_quarto tipo,status_quarto status FROM quarto, tipo_quarto, status_quarto WHERE fk_tipo_quarto = id_tipo_quarto AND fk_status_quarto = id_status_quarto";
        $fields = ['quarto','tipo' ,'status'];
        $query = $conn->query($sql);
        if($query->num_rows > 0){
            echo $query->num_rows . "<br>";
            echo "<table>";
            foreach ($fields as $field) {
                echo("<th>" . $field ."</th>");
            }
            while($data = $query->fetch_array()) {
                echo("<tr>");
                foreach ($fields as $field) {
                    echo("<th>" . $data[$field] ."</th>");
                }
                echo("</tr>");
            }
            echo "</table>";
        }
    }
    function select_ponto(){ //Para as tabelas Admin[status_*, tipo_*]
        $conn = conecta_bd();
        $sql ="SELECT nome,data_hora_entrada entrada, data_hora_saida saida, horas_trabalhadas FROM ponto, funcionario";
        $fields = ['nome','entrada','saida','horas_trabalhadas','editar','excluir'];
        $query = $conn->query($sql);
        if($query->num_rows > 0){
            echo $query->num_rows . "<br>";
            echo "<table>";
            foreach ($fields as $field) {
                echo("<th>" . $field ."</th>");
            }
            while($data = $query->fetch_array()) {
                echo("<tr>");
                foreach ($fields as $field) {
                    echo("<th>" . $data[$field] ."</th>");
                }
                echo("</tr>");
            }
            echo "</table>";
        }
    }
    function select_funcionario(){ //Para as tabelas Admin[status_*, tipo_*]
        $conn = conecta_bd();
        $sql ="select nome,login, tipo_funcionario as cargo,cpf,endereço,email,status_usuario as status from funcionario, usuario, status_usuario, tipo_funcionario"
            . "WHERE fk_usuario = id_usuario AND fk_status_usuario = id_status_usuario AND fk_tipo_funcionario = id_tipo_funcionario";
        $fields = ['nome','login','cargo','cpf','endereço','email','status'];
        $query = $conn->query($sql);
        if($query->num_rows > 0){
            echo $query->num_rows . "<br>";
            echo "<table>";
            foreach ($fields as $field) {
                echo("<th>" . $field ."</th>");
            }
            while($data = $query->fetch_array()) {
                echo("<tr>");
                foreach ($fields as $field) {
                    echo("<th>" . $data[$field] ."</th>");
                }
                echo("</tr>");
            }
            echo "</table>";
        }
    }
    function select_generico($tabela){ //Para as tabelas Admin[status_*, tipo_*]
        $conn = conecta_bd();
        $sql ="select * from $tabela";
        $fields = ['id_'.$tabela, $tabela];
        $query = $conn->query($sql);
        if($query->num_rows > 0){
            echo $query->num_rows . "<br>";
            echo "<table>";
            foreach ($fields as $field) {
                echo("<th>" . $field ."</th>");
            }
            while($data = $query->fetch_array()) {
                echo("<tr>");
                foreach ($fields as $field) {
                    echo("<th>" . $data[$field] ."</th>");
                }
                echo("</tr>");
            }
            echo "</table>";
        }
    }
    //Update...
    function update_ponto($id){
        echo "id: ".$id;
        $conn = conecta_bd();
        $sql =  "UPDATE ponto ";
        $sql .= "SET data_hora_saida = NOW(),horas_trabalhadas = TIMEDIFF(NOW(),data_hora_entrada) ";
        $sql .= "WHERE id_ponto = $id";
        if($conn->query($sql)){
            echo "Feito!";
            $_SESSION['ponto'] = 'novo';
        }else{
            echo "Deu ruim!";}

    }

    //Delete...


?>