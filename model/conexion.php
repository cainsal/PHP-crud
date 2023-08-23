<?php
//  $conexion = new mysqli("127.0.0.1","root","","crud_php_mvc");
//  $conexion->set_charset("utf8");
date_default_timezone_set('America/Lima');

class PDOConexion {
  
  private $Host = "localhost";
  private $User = "root";
  private $Pass = "";
  private $DB = "crud_php_mvc";
  private $Chatset = "utf8";

  public function getConexion(){
    try {
    
      $conexion= "mysql:host=".$this->Host.";dbname=".$this->DB.";charset=".$this->Chatset;
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES =>false,
        PDO::ATTR_CASE,PDO::CASE_LOWER,PDO::ATTR_DEFAULT_FETCH_MODE,
      ];
      $PDOConn = new PDO($conexion,$this->User,$this->Pass,$options);
      // $PDOConn = new PDO($conexion,$this->User,$this->Pass);
      // $PDOConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      // $PDOConn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
			// $PDOConn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
			// $PDOConn->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
      return $PDOConn;
      
    } catch(PDOException $ex) {
      echo "Error ".$ex->getMessage();
    }
  }

  
  
}

  
?>