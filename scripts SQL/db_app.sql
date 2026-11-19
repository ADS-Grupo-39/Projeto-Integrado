DROP DATABASE db_primeiros_socorros;
CREATE DATABASE db_primeiros_socorros;
USE db_primeiros_socorros;

CREATE TABLE tb_emergencias (
	id BINARY(16) DEFAULT(UUID_TO_BIN(UUID())) NOT NULL PRIMARY KEY, -- UUID aumenta a segurança do app e TO_BIN aumenta ainda mais pro esconder o número gerado
	tipo VARCHAR(100) NOT NULL,
	protocolo VARCHAR(100),
	faixa_etaria ENUM('Bebês','Crianças', 'Adultos'),
	favorito BOOLEAN
);

INSERT INTO tb_emergencias (tipo, protocolo, faixa_etaria, favorito) VALUES
	('Engasgo', 'protocolos/engasgo_adulto.html', 'Adultos', TRUE),
	('Queimaduras', 'protocolos/queimadura_crianca.html', 'Crianças', FALSE),
	('Parada Cardiorrespiratória (PCR)', 'protocolos/pcr_adulto.html', 'Adultos', TRUE),
	('Cortes e Sangramentos Profusos', 'protocolos/cortes_crianca.html', 'Crianças', FALSE),
	('Convulsão', 'protocolos/convulsao_bebes.html', 'Bebês', FALSE);

SELECT * FROM tb_emergencias; -- esconde o idd

SELECT BIN_TO_UUID(id) AS id, tipo, protocolo, faixa_etaria, favorito -- mostra o id gerado
	FROM tb_emergencias;

-- Query da barra de pesquisa
SELECT * FROM tb_emergencias
	WHERE tipo LIKE '%queimadura%';
    
-- Lista de guias favoritos
SELECT * FROM tb_emergencias
	WHERE favorito = true;