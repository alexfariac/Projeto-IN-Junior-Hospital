/*
Buscas completas para todas as tabelas (puxar tudo da tabela)
buscar paciente por nome, quarto, médico, codigo e cpf
buscar medico por nome , cpf e matricula
buscar prontuario por paciente, medico, alta  
buscar quarto por numero,tipo , status
buscar ponto por medico, codigo, data (dia, mes e ano), hora_entrada, hora_saida ­ O sistema deve apresentar as horas totais dos pontos


*/
SELECT * FROM  status_usuario;
SELECT * FROM  tipo_usuario;
SELECT * FROM  usuario;
SELECT * FROM  medico;
SELECT * FROM  ponto;
SELECT * FROM  paciente;
SELECT * FROM  status_quarto;
SELECT * FROM  tipo_quarto;
SELECT * FROM  quarto;
SELECT * FROM  status_saude;
SELECT * FROM  prontuario;
