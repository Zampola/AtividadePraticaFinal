
CREATE DATABASE aps;

CREATE TABLE disciplina(
 cd_disc int NOT NULL PRIMARY KEY AUTO_INCREMENT,
 nm_disc varchar(30) NOT NULL
) AUTO_INCREMENT = 1111;

CREATE TABLE aluno(
 cd_aluno int NOT NULL PRIMARY KEY AUTO_INCREMENT,
 nm_aluno varchar(30) NOT NULL,
 cep_aluno int NOT NULL,
 rua_aluno varchar(30) NOT NULL,
 numero_aluno int NOT NULL,
 bairro_aluno varchar(30) NOT NULL,
 cidade_aluno varchar(30) NOT NULL,
 estado_aluno varchar(30) NOT NULL,
 email_aluno varchar(50) NOT NULL,
 tel_aluno varchar(20) NOT NULL,
 cd_disc int NOT NULL,
 FOREIGN KEY (cd_disc) REFERENCES disciplina(cd_disc)
 ) AUTO_INCREMENT = 222222;


CREATE TABLE nota(
cd_nota int NOT NULL PRIMARY KEY AUTO_INCREMENT,
n1 double NOT NULL,
n2 double NOT NULL,
n3 double NOT NULL,
cd_disc int NOT NULL,
cd_aluno int NOT NULL,
FOREIGN KEY (cd_disc) REFERENCES disciplina(cd_disc),
FOREIGN KEY (cd_aluno) REFERENCES aluno(cd_aluno)
);

INSERT INTO disciplina (nm_disc) VALUES(
 'Desenvolvimento de software para web'
);
INSERT INTO disciplina (nm_disc) VALUES(
 'Banco de dados II'
);
INSERT INTO disciplina (nm_disc) VALUES(
 'Engenharia de Software II'
);
INSERT INTO aluno (nm_aluno, cep_aluno, rua_aluno, numero_aluno, bairro_aluno, cidade_aluno, estado_aluno ,email_aluno, tel_aluno, cd_disc) VALUES(
'Lucas Zampola', '04256100', 'Rua Domingos Dissei', '66', 'Jardim Patente Novo', 'São Paulo', 'SP', 'lucaszampola@gmail.com', '965958100', '1111' );

INSERT INTO aluno (nm_aluno, cep_aluno, rua_aluno, numero_aluno, bairro_aluno, cidade_aluno, estado_aluno ,email_aluno, tel_aluno, cd_disc) VALUES(
'Bruno Nunes', '01519000', 'Rua do Lavapés', '1000', 'Cambuci', 'São Paulo', 'SP', 'brn_copa2010@hotmail.com', '987201890', '1112' );

INSERT INTO aluno (nm_aluno, cep_aluno, rua_aluno, numero_aluno, bairro_aluno, cidade_aluno, estado_aluno ,email_aluno, tel_aluno, cd_disc) VALUES(
'Paulo Alcantara', '06763220', 'Rua Anália Andrade Miranda', '321', 'Jardim Bontempo', 'Taboão da Serra', 'SP', 'pauloalcantara@gmail.com', '95295-6962', '1113' );

INSERT INTO nota (n1, n2, n3, cd_disc, cd_aluno) VALUES(
'4', '5', '5', '1111', '222222'
);

INSERT INTO nota (n1, n2, n3, cd_disc, cd_aluno) VALUES(
'6', '5', '9', '1112', '222223'
);

INSERT INTO nota (n1, n2, n3, cd_disc, cd_aluno) VALUES(
'4', '5', '5', '1113', '222224'
);
