CREATE TABLE tipo_usuario (
  id_tipo_usuario INTEGER UNSIGNED  AUTO_INCREMENT,
  tipo_usuario VARCHAR(64) NOT NULL,
  PRIMARY KEY(id_tipo_usuario)
);

CREATE TABLE status_usuario (
  id_status_usuario INTEGER UNSIGNED  AUTO_INCREMENT,
  status_usuario VARCHAR(64) NOT NULL,
  PRIMARY KEY(id_status_usuario)
);

CREATE TABLE usuario (
  id_usuario INTEGER UNSIGNED  AUTO_INCREMENT,
  login VARCHAR(64) NOT NULL,
  senha VARCHAR(64) NOT NULL,
  fk_status_usuario INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_usuario),
  CONSTRAINT fk_status_usuario
	  FOREIGN KEY(fk_status_usuario)
		REFERENCES status_usuario(id_status_usuario)
		ON UPDATE CASCADE
);

CREATE TABLE funcionario (
  fk_tipo_funcionario INTEGER UNSIGNED NOT NULL,
  fk_usuario INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(64) NOT NULL,
  cpf CHAR(11) NOT NULL,
  endereço VARCHAR(128) NOT NULL,
  PRIMARY KEY(fk_usuario),
  CONSTRAINT fk_usuario_medico
	  FOREIGN KEY(fk_usuario)
		REFERENCES usuario(id_usuario)
		ON UPDATE CASCADE
  CONSTRAINT fk_tipo_funcionario
	  FOREIGN KEY(fk_tipo_usuario)
		REFERENCES tipo_usuario(id_tipo_usuario)
		ON UPDATE CASCADE,
);

CREATE TABLE ponto (
  id_ponto INTEGER UNSIGNED  AUTO_INCREMENT,
  fk_usuario INTEGER UNSIGNED NOT NULL,
  dh_entrada DATETIME NOT NULL,
  dh_saida DATETIME ,
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
  cpf CHAR(11) NOT NULL,
  PRIMARY KEY(id_paciente)
);

CREATE TABLE tipo_quarto (
  id_tipo_quarto INTEGER UNSIGNED  AUTO_INCREMENT,
  tipo_quarto VARCHAR(64) NOT NULL,
  PRIMARY KEY(id_tipo_quarto)
);

CREATE TABLE status_quarto (
  id_status_quarto INTEGER UNSIGNED  AUTO_INCREMENT,
  status_quarto VARCHAR(64) NOT NULL,
  PRIMARY KEY(id_status_quarto)
);

CREATE TABLE quarto (
  id_quarto INTEGER UNSIGNED  AUTO_INCREMENT,
  fk_tipo_quarto INTEGER UNSIGNED NOT NULL,
  fk_status_quarto INTEGER UNSIGNED NOT NULL,
  quarto INTEGER UNSIGNED NOT NULL,
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
  status_saude VARCHAR(64) NOT NULL,
  PRIMARY KEY(id_status_saude)
);

CREATE TABLE prontuario (
  id_prontuario INTEGER UNSIGNED  AUTO_INCREMENT,
  fk_quarto INTEGER UNSIGNED NOT NULL,
  fk_medico INTEGER UNSIGNED NOT NULL,
  fk_paciente INTEGER UNSIGNED NOT NULL,
  fk_status_saude INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_prontuario),
  CONSTRAINT fk_quarto
	  FOREIGN KEY(fk_quarto)
		REFERENCES quarto(id_quarto)
		ON UPDATE CASCADE,
  CONSTRAINT fk_medico
	  FOREIGN KEY(fk_medico)
		REFERENCES medico(id_medico)
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

INSERT INTO tipo_usuario
        (tipo_usuario) VALUES
        ("Admin"),
        ("Medico"),
		("Recepcionista")
        ;
		
INSERT INTO status_usuario
        (status_usuario) VALUES
        ("Ativado"),
        ("Desativado")
        ;

INSERT INTO usuario
        (login, senha,fk_tipo_usuario, fk_status_usuario) VALUES
        ("Admin","Admin",1,1),
        ("Medico","Medico",2,1),
		("Recepcionista","Recepcionista",3,1)
        ;

INSERT INTO medico
        (fk_usuario, nome, cpf) VALUES
        (2,"Dr Medico",11111111111)
        ;

INSERT INTO ponto
        (fk_usuario,hora_entrada,hora_saida,data_,horas_trabalhadas) VALUES
        (1,'09:00:00', '11:00:00','2015-07-30',NULL),
        (2,'09:00:00', '17:00:00','2015-07-30',NULL),
		(3,'09:00:00', '16:00:00','2015-07-30',NULL),
		(1,'09:00:00', '11:00:00','2015-07-31',NULL),
        (2,'09:00:00', '17:00:00','2015-07-31',NULL),
		(3,'09:00:00', '16:00:00','2015-07-31',NULL)
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
        ("Vazio"),
        ("Ocupado"),
		("Parcialmente vazio")
        ;
/*possibilidade de tirar este parcialmente vazio... por soh com vaga os sem vaga.*/
		
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
        (fk_quarto,fk_medico, fk_paciente,fk_status_saude) VALUES
        (1,1,1,4),
        (2,1,2,3)
        ;