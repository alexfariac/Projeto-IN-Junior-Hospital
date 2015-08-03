/*
Buscas completas para todas as tabelas (puxar tudo da tabela)
*/
SELECT * FROM status_usuario;
SELECT * FROM tipo_usuario;
SELECT * FROM usuario;
SELECT * FROM funcionario;
SELECT * FROM ponto;
SELECT * FROM paciente;
SELECT * FROM status_quarto;
SELECT * FROM tipo_quarto;
SELECT * FROM quarto;
SELECT * FROM status_saude;
SELECT * FROM prontuario;

/*
buscar paciente por nome, quarto, médico, codigo e cpf
*/
SELECT *
	FROM paciente
		INNER JOIN prontuario
			ON id_paciente = fk_paciente 
		WHERE
			nome = "" 					OR
			fk_quarto = "" 				OR
			fk_usuario = "" 			OR
			fk_paciente = "" 			OR
			cpf = ""
	;
/*
buscar medico por nome , cpf e matricula
*/
SELECT *
	FROM funcionario
		INNER JOIN usuario
			ON id_usuario = fk_usuario
		WHERE
			nome = "" 					OR
			cpf = "" 
	;

/*
buscar prontuario por paciente, medico, alta  
*/
SELECT *
	FROM prontuario
		WHERE
			fk_paciente = "" 			OR
			fk_usuario = "" 			OR
			fk_status_saude = ""
	;

/*
buscar quarto por numero,tipo , status
*/
SELECT *
	FROM quarto
		WHERE
			quarto = "" 				OR
			fk_tipo_quarto = "" 		OR
			fk_status_quarto = ""		
	;

/*
buscar ponto por medico, codigo, data (dia, mes e ano), hora_entrada, hora_saida ­ O sistema deve apresentar as horas totais dos pontos
*/
SELECT *
	FROM ponto
		WHERE
			fk_usuario = "" 			OR
			id_ponto = "" 				OR
			dia = "" 					OR 
			(dia <= "" AND dia >= "") 	OR
			data_hora_entrada = "" 		OR
			data_hora_saida = "" 
	;

/*
Consultas com busca por todos os campos
*/	

SELECT * 
	FROM status_usuario
		WHERE 
			id_status_usuario = "" OR
			status_usuario = ""
	;
SELECT * 
	FROM tipo_funcionario
		WHERE 
			id_tipo_funcionario = "" OR
			tipo_funcionario = ""
	;
SELECT * 
	FROM usuario
		WHERE
			id_usuario = "" OR
			fk_status_usuario = "" OR
			login = "" OR
			senha = "" 
	;
SELECT * 
	FROM funcionario
		WHERE
			fk_usuario = "" OR
			fk_tipo_funcionario = "" OR
			nome = "" OR
			cpf = "" OR
			endereco = ""
	;
SELECT * 
	FROM ponto
		WHERE
			id_ponto = "" OR
			data_hora_entrada = "" OR
			data_hora_saida = "" OR
			
	;
SELECT * 
	FROM paciente
		WHERE
			
	;
SELECT * 
	FROM status_quarto
		WHERE
			
	;
SELECT * 
	FROM tipo_quarto
		WHERE
			
	;
SELECT * 
	FROM quarto
		WHERE
			
	;
SELECT * 
	FROM status_saude
		WHERE
			
	;
SELECT * 
	FROM prontuario
		WHERE
			
	;