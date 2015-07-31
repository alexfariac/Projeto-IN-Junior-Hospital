CREATE TABLE tipo_quarto (
  id_tipo_quarto INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo_quarto VARCHAR(64) NOT NULL,
  PRIMARY KEY(id_tipo_quarto)
);

CREATE TABLE status_quarto (
  id_status_quarto INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  status_quarto VARCHAR(64) NOT NULL,
  PRIMARY KEY(id_status_quarto)
);

CREATE TABLE quarto (
  id_quarto INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
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

CREATE TABLE tipo_usuario (
  id_tipo_usuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo_usuario VARCHAR(64) NOT NULL,
  PRIMARY KEY(id_tipo_usuario)
);

CREATE TABLE status_usuario (
  id_status_usuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  status_usuario VARCHAR(64) NOT NULL,
  PRIMARY KEY(id_status_usuario)
);

CREATE TABLE usuario (
  id_usuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  login VARCHAR(64) NOT NULL,
  senha VARCHAR(64) NOT NULL,
  fk_tipo_usuario INTEGER UNSIGNED NOT NULL,
  fk_status_usuario INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_usuario),
  CONSTRAINT fk_tipo_usuario
	  FOREIGN KEY(fk_tipo_usuario)
		REFERENCES tipo_usuario(id_tipo_usuario),
  CONSTRAINT fk_status_usuario
	  FOREIGN KEY(fk_status_usuario)
		REFERENCES status_usuario(id_status_usuario)
);

CREATE TABLE ponto (
  id_ponto INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  fk_usuario INTEGER UNSIGNED NOT NULL,
  hora_entrada TIME NOT NULL,
  hora_saida TIME ,
  data_ DATE NOT NULL,
  horas_trabalhadas INTEGER UNSIGNED,
  PRIMARY KEY(id_ponto),
  CONSTRAINT fk_usuario_ponto
	  FOREIGN KEY(fk_usuario)
		REFERENCES usuario(id_usuario)
);

CREATE TABLE medico (
  id_medico INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  fk_usuario INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(64) NOT NULL,
  cpf CHAR(11) NOT NULL,
  PRIMARY KEY(id_medico),
  CONSTRAINT fk_usuario_medico
	  FOREIGN KEY(fk_usuario)
		REFERENCES usuario(id_usuario)
);

CREATE TABLE paciente (
  id_paciente INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(64) NOT NULL,
  cpf CHAR(11) NOT NULL,
  PRIMARY KEY(id_paciente)
);


CREATE TABLE status_saude (
  id_status_saude INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  status_saude VARCHAR(64) NOT NULL,
  PRIMARY KEY(id_status_saude)
);

CREATE TABLE prontuario (
  id_prontuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  fk_quarto INTEGER UNSIGNED NOT NULL,
  fk_medico INTEGER UNSIGNED NOT NULL,
  fk_paciente INTEGER UNSIGNED NOT NULL,
  fk_status_saude INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_prontuario),
  CONSTRAINT fk_quarto
	  FOREIGN KEY(fk_quarto)
		REFERENCES quarto(id_quarto),
  CONSTRAINT fk_medico
	  FOREIGN KEY(fk_medico)
		REFERENCES medico(id_medico),
  CONSTRAINT fk_paciente
	  FOREIGN KEY(fk_paciente)
		REFERENCES paciente(id_paciente),
  CONSTRAINT fk_status_saude
	  FOREIGN KEY(fk_status_saude)
		REFERENCES status_saude(id_status_saude)
);
