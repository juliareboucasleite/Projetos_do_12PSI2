CREATE DATABASE IF NOT EXISTS emprego_php;
USE emprego_php;
CREATE TABLE IF NOT EXISTS `Candidaturas` (
    `id_candidatura` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(45) NOT NULL,
    `data_nascimento` DATE NOT NULL,
    `documento` VARCHAR(45) NOT NULL,
    `nr_documento` INT NOT NULL,
    `escolaridade` VARCHAR(45) NULL DEFAULT NULL,
    `estabelecimento` VARCHAR(60) NULL DEFAULT NULL,
    `situacao` VARCHAR(30) NULL,
    PRIMARY KEY (`id_candidatura`)
) ENGINE = InnoDB;

