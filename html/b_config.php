<?php
	function conecta_bd(){
        global $conn;
		$db['server'] = 'localhost';
		$db['user'] = 'root';
		$db['password'] = '';
		$db['dbname'] = 'hospital';
		
		$conn = new mysqli($db['server'],$db['user'],$db['password'],$db['dbname']);
        if (mysqli_connect_errno()){
			die('Nao foi possivel conectar. Erro número : ' . mysqli_connect_errno());
		}
        else {
            mysqli_set_charset($conn, 'utf8');
            return $conn;
        }
	}
?>