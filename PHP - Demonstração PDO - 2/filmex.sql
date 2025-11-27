DROP DATABASE IF EXISTS filmex;

CREATE DATABASE filmex
	CHARACTER SET utf8mb4
	COLLATE utf8mb4_general_ci;

USE filmex;

CREATE TABLE realizadores (
	ID		INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome	VARCHAR(100) NOT NULL
);

CREATE TABLE filmes (
	ID				INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	titulo			VARCHAR(100) NOT NULL,
    ano				INT,
    duracao			INT,
    url_imdb		VARCHAR(255),
    imagem          VARCHAR(255),
    realizador_ID	INT,
    
    FOREIGN KEY (realizador_ID) REFERENCES realizadores (ID)    
);

CREATE TABLE tipos_utilizadores (
    id              INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    designacao      VARCHAR(50) UNIQUE
);

CREATE TABLE utilizadores (
    id              INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    ativo           BOOL NOT NULL,
    tipo_id         INT,
    email           VARCHAR(100) UNIQUE NOT NULL,
    `password`      VARCHAR(255),
    nome            VARCHAR(255),
    nif             CHAR(9) UNIQUE,

    FOREIGN KEY (tipo_id) REFERENCES tipos_utilizadores (id)
);

INSERT INTO `realizadores` (`ID`, `nome`) VALUES
(1, 'Manoel de Oliveira'),
(2, 'Luc Besson'),
(3, 'Frank Darabont'),
(4, 'Edgar Wright');

INSERT INTO `filmes` (`ID`, `titulo`, `ano`, `duracao`, `url_imdb`, `imagem`, `realizador_id`) VALUES
(1, 'Vale Abraão', 1993, 187, 'http://www.imdb.com/title/tt0108471/?ref_=nm_flmg_dr_33', 'vale-abraao.webp', 1),
(2, 'O 5º Elemento', 1997, 126, 'http://www.imdb.com/title/tt0119116/?ref_=nm_flmg_dr_18', 'the-fifth-element.webp', 2),
(3, 'Valerian e a Cidade dos Mil Planetas', 2017, 137, 'http://www.imdb.com/title/tt2239822/?ref_=nm_flmg_dr_3', 'valerian.webp', 2),
(4, 'The Shawshank Redemption', 1994, 142, 'http://www.imdb.com/title/tt0111161/?ref_=nv_sr_1', 'the-shawshank-redemption.webp', 3),
(5, 'Baby Driver', 2017, 112, 'http://www.imdb.com/title/tt3890160/?ref_=nv_sr_1', 'baby-driver.webp', 4),
(6, 'Shaun of the Dead', 2004, 99, 'http://www.imdb.com/title/tt0365748/?ref_=nm_flmg_dr_11', 'shaun-of-the-dead.webp', 4);

INSERT INTO tipos_utilizadores (designacao) VALUES
('Administrador'),
('Utilizador');

INSERT INTO utilizadores (ativo, tipo_id, email, `password`, nome, nif) VALUES
(TRUE, 1, 'admin@filmex.pt', '', 'Admin', '000000000'),
(TRUE, 2, 'ana.silva@example.com', '', 'Ana Silva', '245871369'),
(TRUE, 2, 'joao.costa@example.com', '', 'João Costa', '193084562'),
(FALSE, 2, 'maria.ferreira@example.com', '', 'Maria Ferreira', '317682045'),
(TRUE, 2, 'ricardo.pinto@example.com', '', 'Ricardo Pinto', '284593176'),
(TRUE, 2, 'sofia.lopes@example.com', '', 'Sofia Lopes', '165927834');