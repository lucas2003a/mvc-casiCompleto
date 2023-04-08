CREATE DATABASE mascotas;
USE mascotas

CREATE TABLE mascotas
(
	idmascota	INT AUTO_INCREMENT PRIMARY KEY,
	nombre		VARCHAR(20) 	NOT NULL,
	edad		VARCHAR(2) 	NOT NULL,
	raza		VARCHAR(20)	NOT NULL,
	peso 		DECIMAL(3,2)	NOT NULL,
	tamaño		DECIMAL(3,2)	NOT NULL,
	nacionalidad	VARCHAR(20)	NOT NULL,
	fechaupdate	DATETIME 	NOT NULL DEFAULT NOW(),
	fecharegistro	DATE 		NULL,
	estado		CHAR(1)		NOT NULL DEFAULT '1'
)ENGINE = INNODB;

INSERT INTO mascotas(nombre,edad,raza,peso,tamaño,nacionalidad,fecharegistro,fechaupdate) VALUES
		('FIDO','4','leongerber',6,0.9,'Alemán','2022-01-14','2022-01-14'),
		('Camilo','6','beagle',5,1.22,'Europeo','2022-03-12','2022-03-12'),
		('Sasha','2','botbail',2,0.2,'Europeo','2022-04-04','2022-04-04'),
		('Lala','3','Otterhound',3.51,0.62,'Británico','2022-04-12','2022-04-12')

SELECT * FROM mascotas;
DROP TABLE mascotas;

-- /////////////////////////
DELIMITER $$
 CREATE PROCEDURE spu_mascotas_listar()
 BEGIN
  SELECT
	idmascota,
	nombre,
	edad,
	raza,
	peso,
	tamaño,
	nacionalidad,
	fechaupdate
  FROM mascotas
  WHERE estado ='1'
  ORDER BY idmascota DESC;
END $$
 
CALL spu_mascotas_listar()

DELIMITER $$
CREATE PROCEDURE spu_mascotas_registrar
(
	IN _nombre		VARCHAR(20),
	IN _edad		VARCHAR(2),
	IN _raza		VARCHAR(20),
	IN _peso		DECIMAL(3,2),
	IN _tamaño		DECIMAL(3,2),
	IN _nacionalidad	VARCHAR(20),
	IN _fecharegistro	VARCHAR(20)
)
BEGIN
	INSERT INTO mascotas(nombre,edad,raza,peso,tamaño,nacionalidad,fecharegistro) VALUES
		(_nombre,_edad,_raza,_peso,_tamaño,_nacionalidad,_fecharegistro);
END $$

CALL spu_mascotas_registrar('Scot','3','Shepadoodle',2.56,0.48,'Amaricano','2022-03-12')

SELECT * FROM mascotas;

DELIMITER $$
CREATE PROCEDURE spu_mascotas_eliminar(IN idmascota_ INT)
BEGIN
	UPDATE mascotas SET estado ='0'
	WHERE idmascota = idmascota_; 
END $$

CALL spu_mascotas_eliminar(1)
CALL spu_mascotas_listar()

SELECT * FROM mascotas