CREATE TABLE users(
	codUser int(11) AUTO_INCREMENT NOT NULL,   
    correo varchar(50) NOT NULL,     
    celular varchar(15) NOT NULL,
    usuario varchar(20),
    passUser varchar(25),
    fechCrea datetime,
    estadoUser bit DEFAULT 1,
    PRIMARY KEY (codUser)
);

CREATE TABLE cliente(
    codCli int(11) AUTO_INCREMENT NOT NULL,
    codUser int(11) NOT NULL,
    nombres varchar(25) NOT NULL,
    apePaterno varchar(25) NOT NULL,
    apeMaterno varchar(25) NOT NULL,
    codPais int(11) NOT NULL,
    fechNac datetime,
    fechCrea datetime,
    PRIMARY KEY (codCli)
);

CREATE TABLE documento(
    codDoc int(11) AUTO_INCREMENT NOT NULL,
    codCli int(11) NOT NULL,
    tipoDoc int(11) NOT NULL,
    numDoc varchar(20),
    PRIMARY KEY (codDoc)
);

CREATE TABLE pais(
    codPais int(11) AUTO_INCREMENT NOT NULL,
    nombreCort varchar(2),
    nomPais varchar(100),
    PRIMARY KEY (codPais)
);


--///////////////// SP CONSULTAR USUARIOS

DELIMITER $$
CREATE DEFINER='root'@'localhost' PROCEDURE `consultar_usuarios`()  
BEGIN
  SELECT *  
    FROM users u,cliente c,documento d,pais p
    WHERE c.codPais = p.codPais
    AND d.codCli = c.codCli
    AND u.codUser = c.codUser
    AND u.estadoUser = 1;    
END$$
DELIMITER ;

--///////////////// SP CONSULTAR USUARIO POR CODIGO
DELIMITER $$
CREATE DEFINER='root'@'localhost' PROCEDURE `consultarCliUsuCod`(IN `codUsuC` INT,IN `codClie` INT)  
BEGIN
    SELECT *  
    FROM users u,cliente c,documento d,pais p
    WHERE u.codUser = codUsuC
    AND c.codCli = codClie
    AND c.codCli = d.codCli
    AND c.codPais = p.codPais;
END$$
DELIMITER ;

--///////////////// SP BAJA USUARIO
DELIMITER $$
CREATE DEFINER='root'@'localhost' PROCEDURE `spBajaUsuario`(IN `codUsuC` INT,IN `estadoUsuC` INT)  
BEGIN
    DECLARE existe INT;
        SET existe = (SELECT count(*) AS num 
                    FROM users 
                    WHERE codUser=codUsuC);
        IF existe > 0 THEN
            UPDATE users  
            SET estadoUser = estadoUsuC
            WHERE codUser = codUsuC;         
        END IF;
END$$
DELIMITER ;



CALL consultar_usuarios();
-- GRANT EXECUTE ON PROCEDURE crud_php_mvc.consultar_usuarios TO 'root'@'%';

INSERT INTO `users`(`correo`, `celular`, `usuario`, `passUser`,`fechCrea`)
VALUES ('carlos.incasalinas@gmail.com','916735833','carlos','fsasfFSAASFA3123sDdaS',current_timestamp());

INSERT INTO `cliente`(`codUser`, `nombres`, `apePaterno`, `apeMaterno`, `codPais`, `fechNac`,`fechCrea`)
VALUES (1,'Carlos Alfredo','Inca','Salinas',174,'1990-07-10',current_timestamp());

INSERT INTO `documento`(`codCli`, `tipoDoc`, `numDoc`)
VALUES (1,1,'46730445');

INSERT INTO `users`(`correo`, `celular`, `usuario`, `passUser`,`fechCrea`)
VALUES ('carlos.incasalinas22@gmail.com','999999963','carlos22','fsasfFSAASFA3123sDdaS',current_timestamp());

INSERT INTO `cliente`(`codUser`, `nombres`, `apePaterno`, `apeMaterno`, `codPais`, `fechNac`,`fechCrea`)
VALUES (2,'Carlos Alfredo22','Inca22','Salinas22',174,'1990-07-10',current_timestamp());

INSERT INTO `documento`(`codCli`, `tipoDoc`, `numDoc`)
VALUES (2,1,'46730444');

