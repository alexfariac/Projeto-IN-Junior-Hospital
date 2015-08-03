<<<<<<< HEAD
CREATE TABLE tipo_funcionario (
  id_tipo_funcionario INTEGER UNSIGNED  AUTO_INCREMENT,
  tipo_funcionario VARCHAR(64) NOT NULL UNIQUE KEY,
  PRIMARY KEY(id_tipo_funcionario)
=======
CREATE TABLE tipo_usuario (
  id_tipo_usuario INTEGER UNSIGNED  AUTO_INCREMENT,
  tipo_usuario VARCHAR(64) NOT NULL,
  PRIMARY KEY(id_tipo_usuario)
>>>>>>> 842980357be8b44b95cb1784dff44842799262ad
);

CREATE TABLE status_usuario (
  id_status_usuario INTEGER UNSIGNED  AUTO_INCREMENT,
<<<<<<< HEAD
  status_usuario VARCHAR(64) NOT NULL UNIQUE KEY,
=======
  status_usuario VARCHAR(64) NOT NULL,
>>>>>>> 842980357be8b44b95cb1784dff44842799262ad
  PRIMARY KEY(id_status_usuario)
);

CREATE TABLE usuario (
  id_usuario INTEGER UNSIGNED  AUTO_INCREMENT,
<<<<<<< HEAD
  login VARCHAR(64) NOT NULL UNIQUE KEY,
=======
  login VARCHAR(64) NOT NULL,
>>>>>>> 842980357be8b44b95cb1784dff44842799262ad
  senha VARCHAR(64) NOT NULL,
  fk_status_usuario INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_usuario),
  CONSTRAINT fk_status_usuario
	  FOREIGN KEY(fk_status_usuario)
		REFERENCES status_usuario(id_status_usuario)
		ON UPDATE CASCADE
);

CREATE TABLE funcionario (
<<<<<<< HEAD
=======
  fk_tipo_funcionario INTEGER UNSIGNED NOT NULL,
>>>>>>> 842980357be8b44b95cb1784dff44842799262ad
  fk_usuario INTEGER UNSIGNED NOT NULL,
  fk_tipo_funcionario INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(64) NOT NULL,
<<<<<<< HEAD
  cpf CHAR(11) NOT NULL UNIQUE KEY,
  endereço VARCHAR(128) NOT NULL,
  PRIMARY KEY(fk_usuario),
  CONSTRAINT fk_usuario_funcionario
=======
  cpf CHAR(11) NOT NULL,
  endereço VARCHAR(128) NOT NULL,
  PRIMARY KEY(fk_usuario),
  CONSTRAINT fk_usuario_medico
>>>>>>> 842980357be8b44b95cb1784dff44842799262ad
	  FOREIGN KEY(fk_usuario)
		REFERENCES usuario(id_usuario)
		ON UPDATE CASCADE,
  CONSTRAINT fk_tipo_funcionario
	  FOREIGN KEY(fk_tipo_funcionario)
		REFERENCES tipo_funcionario(id_tipo_funcionario)
		ON UPDATE CASCADE
  CONSTRAINT fk_tipo_funcionario
	  FOREIGN KEY(fk_tipo_usuario)
		REFERENCES tipo_usuario(id_tipo_usuario)
		ON UPDATE CASCADE,
);

CREATE TABLE ponto (
  id_ponto INTEGER UNSIGNED  AUTO_INCREMENT,
  fk_usuario INTEGER UNSIGNED NOT NULL,
<<<<<<< HEAD
  data_hora_entrada DATETIME NOT NULL,
  data_hora_saida DATETIME ,
=======
  dh_entrada DATETIME NOT NULL,
  dh_saida DATETIME ,
>>>>>>> 842980357be8b44b95cb1784dff44842799262ad
  horas_trabalhadas INTEGER UNSIGNED,
  PRIMARY KEY(id_ponto),
  CONSTRAINT fk_usuario_ponto
	  FOREIGN KEY(fk_usuario)
		REFERENCES usuario(id_usuario)
		ON UPDATE CASCADE
);

CREATE TABLE paciente (
  id_paciente INTEGER UNSIGNED  AUTO_INCREMENT,
  nome VARCHAR(64) NOT NULL,
  cpf CHAR(11) NOT NULL UNIQUE KEY,
  PRIMARY KEY(id_paciente)
);

CREATE TABLE tipo_quarto (
  id_tipo_quarto INTEGER UNSIGNED  AUTO_INCREMENT,
<<<<<<< HEAD
  tipo_quarto VARCHAR(64) NOT NULL UNIQUE KEY,
=======
  tipo_quarto VARCHAR(64) NOT NULL,
>>>>>>> 842980357be8b44b95cb1784dff44842799262ad
  PRIMARY KEY(id_tipo_quarto)
);

CREATE TABLE status_quarto (
  id_status_quarto INTEGER UNSIGNED  AUTO_INCREMENT,
<<<<<<< HEAD
  status_quarto VARCHAR(64) NOT NULL UNIQUE KEY,
=======
  status_quarto VARCHAR(64) NOT NULL,
>>>>>>> 842980357be8b44b95cb1784dff44842799262ad
  PRIMARY KEY(id_status_quarto)
);

CREATE TABLE quarto (
  id_quarto INTEGER UNSIGNED  AUTO_INCREMENT,
  fk_tipo_quarto INTEGER UNSIGNED NOT NULL,
  fk_status_quarto INTEGER UNSIGNED NOT NULL,
  quarto INTEGER UNSIGNED NOT NULL UNIQUE KEY,
  PRIMARY KEY(id_quarto),
  CONSTRAINT fk_tipo_quarto
	  FOREIGN KEY(fk_tipo_quarto)
		REFERENCES tipo_quarto(id_tipo_quarto),
  CONSTRAINT fk_status_quarto
	  FOREIGN KEY(fk_status_quarto)
		REFERENCES status_quarto(id_status_quarto)
);

CREATE TABLE status_saude (
  id_status_saude INTEGER UNSIGNED  AUTO_INCREMENT,
<<<<<<< HEAD
  status_saude VARCHAR(64) NOT NULL UNIQUE KEY,
=======
  status_saude VARCHAR(64) NOT NULL,
>>>>>>> 842980357be8b44b95cb1784dff44842799262ad
  PRIMARY KEY(id_status_saude)
);

CREATE TABLE prontuario (
  id_prontuario INTEGER UNSIGNED  AUTO_INCREMENT,
  fk_quarto INTEGER UNSIGNED NOT NULL,
  fk_usuario INTEGER UNSIGNED NOT NULL,
  fk_paciente INTEGER UNSIGNED NOT NULL,
  fk_status_saude INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_prontuario),
  CONSTRAINT fk_quarto
	  FOREIGN KEY(fk_quarto)
		REFERENCES quarto(id_quarto)
		ON UPDATE CASCADE,
  CONSTRAINT fk_usuario_prontuario
	  FOREIGN KEY(fk_usuario)
		REFERENCES usuario(fk_usuario)
		ON UPDATE CASCADE,
  CONSTRAINT fk_paciente
	  FOREIGN KEY(fk_paciente)
		REFERENCES paciente(id_paciente)
		ON UPDATE CASCADE,
  CONSTRAINT fk_status_saude
	  FOREIGN KEY(fk_status_saude)
		REFERENCES status_saude(id_status_saude)
		ON UPDATE CASCADE
);

INSERT INTO tipo_funcionario
        (tipo_funcionario) VALUES
        ("Admin"),
        ("funcionario"),
		("Recepcionista")
        ;
		
INSERT INTO status_usuario
        (status_usuario) VALUES
        ("Ativado"),
        ("Desativado")
        ;

INSERT INTO usuario
        (login, senha, fk_status_usuario) VALUES
        ("Admin","Admin",1),
        ("funcionario","funcionario",1),
		("Recepcionista","Recepcionista",1)
        ;

INSERT INTO funcionario
        (fk_usuario, nome, cpf, fk_tipo_funcionario) VALUES
		(1,"Sr Admin",'11111111111',1),
        (2,"Dr funcionario",'44444444444',2),
		(3,"Sra Recepcionista",'55555555555',3)
        ;

INSERT INTO ponto
        (fk_usuario,data_hora_entrada,data_hora_saida,horas_trabalhadas) VALUES
        (1,'2015-07-30 09:00:00', '2015-07-30 11:00:00',NULL),
        (2,'2015-07-30 09:00:00', '2015-07-30 17:00:00',NULL),
		(3,'2015-07-30 09:00:00', '2015-07-30 16:00:00',NULL),
		(1,'2015-07-30 09:00:00', '2015-07-30 11:00:00',NULL),
        (2,'2015-07-30 09:00:00', '2015-07-30 17:00:00',NULL),
		(3,'2015-07-30 09:00:00', '2015-07-30 16:00:00',NULL)
        ;

INSERT INTO paciente
        (nome,cpf) VALUES
        ("Cliente",22222222222),
        ("Chatinho",33333333333)
        ;

INSERT INTO tipo_quarto
        (tipo_quarto) VALUES
        ("Individual"),
        ("Coletivo")
        ;

INSERT INTO status_quarto
        (status_quarto) VALUES
        ("Com vaga"),
        ("Sem vaga")
        ;
		
INSERT INTO quarto
        (fk_tipo_quarto, fk_status_quarto,quarto) VALUES
        (2,3,1),
        (1,2,2),
		(1,1,3)
        ;

INSERT INTO status_saude
        (status_saude) VALUES
        ("Alta"),
        ("Urgencia"),
		("Emergencia"),
        ("Observacao")
        ;
		
INSERT INTO prontuario
        (fk_quarto,fk_usuario, fk_paciente,fk_status_saude) VALUES
        (1,1,1,4),
        (2,1,2,3)
        ;