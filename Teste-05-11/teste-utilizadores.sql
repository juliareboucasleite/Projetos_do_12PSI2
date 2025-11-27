DROP DATABASE IF EXISTS teste_utilizadores;

CREATE DATABASE teste_utilizadores
	CHARACTER SET utf8mb4
	COLLATE utf8mb4_general_ci;

USE teste_utilizadores;

CREATE TABLE utilizadores (
    id              INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    ativo           BOOL NOT NULL,
    tipo         	VARCHAR(20),
    email           VARCHAR(100) UNIQUE NOT NULL,
    `password`      VARCHAR(255),
    nome            VARCHAR(255)
);

INSERT INTO utilizadores (ativo, tipo, email, `password`, nome) VALUES
(TRUE, 'Admin', 'admin@filmex.pt', '$2y$10$QBQpDlxD3iNanBmnCuEKpuZ8TTEYmcwIv0NQYXGlqqwZ5LyLAvChO', 'Admin'),
(TRUE, 'Utilizador', 'ana.silva@example.com', '$2y$10$DuIkE4W.KVmRHi.MtEzsb.vMupUd3qsn4rGGbXnPxriruOK19T7ma', 'Ana Silva'),
(TRUE, 'Utilizador', 'joao.costa@example.com', '$2y$10$VZZGL91y44ZTHEEnCIv5AOuTRQ7qH2/wn.NzehdOpqDv7Uxrz0pYq', 'João Costa'),
(FALSE, 'Utilizador', 'maria.ferreira@example.com', '$2y$10$86EeSSPFz.sTyCTNp.fSme1XaheRWg9bqluzTQ0vHb4Dllj2hrCzu', 'Maria Ferreira'),
(TRUE, 'Utilizador', 'ricardo.pinto@example.com', '$2y$10$bTILuTxXr2ag5nELXLR/Lu5EIQH4r1M0TJorEcreBaNYmJKgBf0vK', 'Ricardo Pinto'),
(TRUE, 'Utilizador', 'sofia.lopes@example.com', '$2y$10$xSb5nz8OMhA1tnZNfwM10eS4Ct9e.gdutXnE/Wphettcr0rFYlS86', 'Sofia Lopes');