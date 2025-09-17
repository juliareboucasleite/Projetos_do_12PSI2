DROP DATABASE IF EXISTS escola;
CREATE DATABASE escola
	CHARACTER SET utf8mb4
	COLLATE utf8mb4_general_ci;
USE escola;

CREATE TABLE alunos (
	ID				INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    NumeroProcesso	INT,
    Numero			INT,
    Nome			VARCHAR(255),
    Morada			VARCHAR(300),
    CodigoPostal	VARCHAR(8),
    Email			VARCHAR(100),
    DataNascimento	DATE
);

INSERT INTO alunos (NumeroProcesso, Numero, Nome, Morada, CodigoPostal, Email, DataNascimento) VALUES
(1000, 1, 'Ana Martins', 'Rua António Vasconcelos', '3003-301', 'ana.martins@email.com', '2010-04-15'),
(1001, 2, 'André Sousa', 'Rua do Rossaio', '3040-031', 'andre.sousa@email.com', '2010-01-28'),
(1002, 3, 'Beatriz Faria', 'Rua 1º de Maio', '3045-523', 'beatriz.faria@email.com', '2011-06-17'),
(1003, 4, 'Bruno Pinto', 'Estrada da Beira', '3033-303', 'bruno.pinto@email.com', '2010-07-24'),
(1004, 5, 'Carlos Gomes', 'Rua 1º de Maio', '3040-771', 'carlos.gomes@email.com', '2010-08-09'),
(1005, 6, 'Carla Rocha', 'Rua General Humberto Delgado', '3033-301', 'carla.rocha@email.com', '2009-02-18'),
(1006, 7, 'Diogo Carvalho', 'Rua do Lagar', '3043-301', 'diogo.carvalho@email.com', '2009-07-07'),
(1007, 8, 'Helena Cruz', 'Rua 1 de Abril', '3040-589', 'helena.cruz@email.com', '2009-03-25'),
(1008, 9, 'Inês Dias', 'Rua Pedro Nunes', '3033-304', 'ines.dias@email.com', '2010-12-02'),
(1009, 10, 'Joana Neves', 'Avenida Luís Albuquerque', '3034-002', 'joana.neves@email.com', '2009-10-14'),
(1010, 11, 'João Silva', 'Avenida Fernão de Magalhães', '3004-010', 'joao.silva@email.com', '2009-11-22'),
(1011, 12, 'Luís Monteiro', 'Rua do Ouro', '1100-062', 'luis.monteiro@email.com', '2009-12-30'),
(1012, 13, 'Marta Costa', 'Rua Nossa Senhora do Desterro', '3020-224', 'marta.costa@email.com', '2011-01-10'),
(1013, 14, 'Miguel Fonseca', 'Rua Monsenhor Augusto Nunes Pereira', '3033-305', 'miguel.fonseca@email.com', '2011-05-06'),
(1014, 15, 'Pedro Ferreira', 'Rua da Bela Vista', '3020-420', 'pedro.ferreira@email.com', '2009-06-05'),
(1015, 16, 'Patrícia Almeida', 'Rua de São Bernardo', '3040-301', 'patricia.almeida@email.com', '2011-08-11'),
(1016, 17, 'Ricardo Nunes', 'Urbanização Quinta da Relva', '3047-301', 'ricardo.nunes@email.com', '2010-11-19'),
(1017, 18, 'Sofia Lopes', 'Rua Doutor Mário Nunes', '3030-404', 'sofia.lopes@email.com', '2010-09-30'),
(1018, 19, 'Tiago Ramos', 'Rua Palmira Pedro', '3030-770', 'tiago.ramos@email.com', '2011-03-12'),
(1019, 20, 'Vanessa Teixeira', 'Rua das Oliveiras', '3045-209', 'vanessa.teixeira@email.com', '2011-04-03');