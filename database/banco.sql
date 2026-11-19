DROP DATABASE db_primeiros_socorros;
CREATE DATABASE db_primeiros_socorros;
USE db_primeiros_socorros;
CREATE TABLE tb_emergencias (
	id BINARY(16) DEFAULT(UUID_TO_BIN(UUID())) NOT NULL PRIMARY KEY, -- UUID aumenta a segurança do app e TO_BIN aumenta ainda mais pro esconder o número gerado
	tipo VARCHAR(100) NOT NULL,
	faixa_etaria ENUM('Bebês','Crianças', 'Adultos'),
	favorito BOOLEAN
);
USE db_primeiros_socorros;
INSERT INTO tb_emergencias (tipo, faixa_etaria, favorito) VALUES
	('Engasgo', 'Adultos', TRUE),
	('Queimaduras', 'Crianças', FALSE),
	('Parada Cardiorrespiratória (PCR)', 'Adultos', TRUE),
	('Cortes e Sangramentos Profusos', 'Crianças', FALSE),
	('Convulsão', 'Bebês', FALSE);
USE db_primeiros_socorros;

SELECT * FROM tb_emergencias; -- esconde o idd

SELECT BIN_TO_UUID(id) AS id, tipo, faixa_etaria, favorito  -- mostra o id gerado
	FROM tb_emergencias;

-- Query da barra de pesquisa
SELECT * FROM tb_emergencias
	WHERE tipo LIKE '%queimadura%';
    
-- Lista de guias favoritos
SELECT * FROM tb_emergencias
	WHERE favorito = true;