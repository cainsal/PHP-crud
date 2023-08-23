DELIMITER $$
      CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateCliente`(IN `codUsuC` INT(11), IN `codClie` INT(11), IN `nombresC` VARCHAR(25), IN `apePaternoC` VARCHAR(25), IN `apeMaternoC` VARCHAR(25),IN `paisC` INT(11), IN `fechNacC` DATETIME, IN `tipoDocum` INT(11), IN `numDocum` VARCHAR(50),IN `celularC` VARCHAR(15), IN `correoC` VARCHAR(50), IN `usuarioC` VARCHAR(30), IN `passUserC` VARCHAR(25), OUT `ID` INT)

      BEGIN            
            DECLARE existe INT;
            SET existe = (SELECT count(*) AS num 
                          FROM users 
                          WHERE codUser=codUsuC);
            
            IF existe > 0 THEN
              UPDATE users  
              SET correo = correoC,
                  celular = celularC,
                  usuario = usuarioC,
                  passUser = passUserC
              WHERE codUser = codUsuC;         
            END IF;

            IF existe > 0 THEN
              UPDATE cliente  
              SET nombres = nombresC,
                  apePaterno = apePaternoC,
                  apeMaterno = apeMaternoC,
                  codPais = paisC,
                  fechNac = fechNacC
              WHERE codCli = codClie
              AND codUser = codUsuC;         
            END IF;  

            IF existe > 0 THEN
              UPDATE documento  
              SET tipoDoc = tipoDocum,
                  numDoc = numDocum
              WHERE codCli = codClie;       
            END IF; 
           
            IF existe>0 THEN
              SET ID=0;
            END IF;  
      END$$
DELIMITER ;

