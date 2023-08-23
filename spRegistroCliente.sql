DELIMITER $$
       CREATE DEFINER=`root`@`localhost` PROCEDURE `spRegistroCliente`(IN `nombresC` VARCHAR(50), IN `apePaternoC` VARCHAR(50), IN `apeMaternoC` VARCHAR(50), IN `paisC` INT(11), IN `fechNacC` DATETIME, IN `tipoDocum` INT(11), IN `numDocum` VARCHAR(50), IN `celularC`VARCHAR(15), IN `correoC` VARCHAR(50), IN `usuarioC`VARCHAR(20), IN `passUser`VARCHAR(50), IN `rutaImgDocumU` VARCHAR(75), IN `codRol` INT(11), IN `fechCreaC` DATETIME, OUT `ID` INT)

       BEGIN
              DECLARE codigousu INT;
              DECLARE existe INT;
              DECLARE codigocli INT;
              SET existe = (SELECT count(*) AS num 
                            FROM users 
                            WHERE correo=correoC 
                            AND celular=celularC);
              
              IF existe = 0 THEN
                     INSERT INTO users    (correo,
                                          celular,
                                          usuario,
                                          passUser,
                                          codRol,
                                          rutaImgDocum,
                                          fechCrea)
                                   VALUES (correoC,
                                          celularC,
                                          usuarioC,
                                          passUser,
                                          rutaImgDocumU,
                                          codRol,
                                          fechCreaC);
                     SET codigousu = last_insert_id();
                     SET ID=codigousu;
              END IF;  
              IF codigousu>0 THEN
                     INSERT INTO cliente (codUser,
                                          nombres,
                                          apePaterno,
                                          apeMaterno,
                                          codPais,
                                          fechNac,
                                          fechCrea)
                                   VALUES (codigousu,
                                          nombresC,
                                          apePaternoC,
                                          apeMaternoC,
                                          paisC,
                                          fechNacC,
                                          fechCreaC);
                     SET codigocli = last_insert_id();
              END IF;
              IF codigousu>0 THEN
                     INSERT INTO documento (codCli,
                                          tipoDoc,
                                          numDoc)
                                   VALUES (codigocli,
                                          tipoDocum,
                                          numDocum);
              END IF;

              IF existe>0 THEN
              SET ID=0;
              END IF;  
       END$$
DELIMITER ;