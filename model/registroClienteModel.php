<?php 
require_once("../model/conexion.php");
class registroClienteModel extends PDOConexion{

  public function listaPais(){
    try {
      $conexion=$this->getConexion();
      $stm = $conexion->prepare("SELECT * FROM pais");
      $stm->execute();
      $listaPais = $stm->fetchAll();
      return $listaPais;
    } catch(PDOException $ex){
      echo "Error:  " . $ex->getMessage();
      return "Error";
    } 
    
  }

  public function listaUsuarios(){
    try {
      $conexion=$this->getConexion();
      $stm = $conexion->prepare("CALL consultar_usuarios();");
      $stm->execute();
      $listaUsuarios = $stm->fetchAll();
      return $listaUsuarios;
    } catch(PDOException $ex){
      echo "Error:  " . $ex->getMessage();
      return "Error";
    } 
  }

  public function datosUsuarioId($ID){
    try {
      $conexion=$this->getConexion();
      $stm = $conexion->prepare("CALL consultarCliUsuCod(:codUsuC,:codClie);");
      $stm->bindParam(':codUsuC', $ID, PDO::PARAM_INT,11);
      $stm->bindParam(':codClie', $ID, PDO::PARAM_INT,11);
      $stm->execute();
      $datosUsuarioId = $stm->fetchAll();
      return $datosUsuarioId;
    } catch(PDOException $ex){
      echo "Error:  " . $ex->getMessage();
      return "Error";
    } 
  }

  public function registroCliente($datos){
    try {
      $conexion=$this->getConexion();      
      $query ="CALL spRegistroCliente(:nombresC,:apePaternoC,:apeMaternoC,:paisC,:fechNacC,:tipoDocum,:numDocum,:celularC,:correoC,:usuarioC,
      :passUser,:fechCreaC,@ID)";
      $stm = $conexion->prepare($query);
      $stm->bindParam(':nombresC', $datos['nombresC'], PDO::PARAM_STR,25);
      $stm->bindParam(':apePaternoC', $datos['apePaternoC'], PDO::PARAM_STR,25);
      $stm->bindParam(':apeMaternoC', $datos['apeMaternoC'], PDO::PARAM_STR,25);
      $stm->bindParam(':paisC', $datos['paisC'], PDO::PARAM_INT,11);
      $stm->bindParam(':fechNacC', $datos['fechNacC'], PDO::PARAM_STR);
      $stm->bindParam(':tipoDocum', $datos['tipoDocum'], PDO::PARAM_INT,11);
      $stm->bindParam(':numDocum', $datos['numDocum'], PDO::PARAM_STR,50);
      $stm->bindParam(':celularC', $datos['celularC'], PDO::PARAM_STR,15);
      $stm->bindParam(':correoC', $datos['correoC'], PDO::PARAM_STR,15);
      $stm->bindParam(':usuarioC', $datos['usuarioC'], PDO::PARAM_STR,20);
      $stm->bindParam(':passUser', $datos['passUser'], PDO::PARAM_STR,25);
      $stm->bindParam(':fechCreaC', $datos['fechCreaC'], PDO::PARAM_STR);

      $stm->execute();
      $stm->closeCursor();
    } catch(PDOException $ex){
      echo "Error:  " . $ex->getMessage();
      return "Error";
    } 
  }

  public function updateCliente($datos){
    try {
      $conexion=$this->getConexion();      
      $query ="CALL spUpdateCliente(:codUsuC,:codClie,:nombresC,:apePaternoC,:apeMaternoC,:paisC,:fechNacC,:tipoDocum,:numDocum,:celularC,:correoC,:usuarioC,:passUserC,@ID)";
      $stm = $conexion->prepare($query);
      $stm->bindParam(':codUsuC', $datos['codUsuC'], PDO::PARAM_INT,11);
      $stm->bindParam(':codClie', $datos['codClie'], PDO::PARAM_INT,11);
      $stm->bindParam(':nombresC', $datos['nombresC'], PDO::PARAM_STR,25);
      $stm->bindParam(':apePaternoC', $datos['apePaternoC'], PDO::PARAM_STR,25);
      $stm->bindParam(':apeMaternoC', $datos['apeMaternoC'], PDO::PARAM_STR,25);
      $stm->bindParam(':paisC', $datos['paisC'], PDO::PARAM_INT,11);
      $stm->bindParam(':fechNacC', $datos['fechNacC'], PDO::PARAM_STR);
      $stm->bindParam(':tipoDocum', $datos['tipoDocum'], PDO::PARAM_INT,11);
      $stm->bindParam(':numDocum', $datos['numDocum'], PDO::PARAM_STR,50);
      $stm->bindParam(':celularC', $datos['celularC'], PDO::PARAM_STR,15);
      $stm->bindParam(':correoC', $datos['correoC'], PDO::PARAM_STR,15);
      $stm->bindParam(':usuarioC', $datos['usuarioC'], PDO::PARAM_STR,20);
      $stm->bindParam(':passUserC', $datos['passUserC'], PDO::PARAM_STR,25);

      $stm->execute();
      $stm->closeCursor();
    } catch(PDOException $ex){
      echo "Error:  " . $ex->getMessage();
      return "Error";
    } 
  }

  public function bajaUsuario($datos){
    try {
      $conexion=$this->getConexion(); 
      $query ="CALL spBajaUsuario(:codUsuC,:estadoUsuC)";
      $stm = $conexion->prepare($query);
      $stm->bindParam(':codUsuC', $datos['codUsuC'], PDO::PARAM_INT,11);
      $stm->bindParam(':estadoUsuC', $datos['estadoUsuC'], PDO::PARAM_INT,11);
      $stm->execute();
      $stm->closeCursor();
      $stm = $conexion->prepare($query);
    } catch(PDOException $ex){
      echo "Error:  " . $ex->getMessage();
      return "Error";
    }     
  }

}

?>