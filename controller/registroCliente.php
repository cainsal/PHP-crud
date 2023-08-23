<?php 
// session_start();

$func = $_POST['func'];
// var_dump($func);
// var_dump($_POST);

if(function_exists($func)) {    
  require_once("../model/registroClienteModel.php");
  
   $var=$_POST;
   $func($var);
}else{
   header("location: ../error.php");
   exit;
}


function funcNewCli($var){

  extract($var);
  // echo $var['nombre'];
  // var_dump($var);
  $datos = array(
    "nombresC"=>$nombre,
    "apePaternoC"=>$apepaterno,
    "apeMaternoC"=>$apematerno,
    "paisC"=>$pais,
    "fechNacC"=> $fechnac,
    "tipoDocum"=>$tipodocum,
    "numDocum"=>$numdoc,
    "celularC"=>$celular,
    "correoC"=>$correo,    
    "usuarioC"=>$nombre,
    "passUser"=>$contras,
    "fechCreaC"=>$fechcreacli,
  );

  $resRegistroCLiente = new registroClienteModel();
  $listaUsuarios = $resRegistroCLiente->registroCliente($datos);
  // echo json_encode($listaUsuarios);
  var_dump($listaUsuarios);
  // var_dump($datos);
}

function funcUpdateCli($var){

  extract($var);
  // echo $var['nombre'];
  // var_dump($var);
  $datos = array(
    "codUsuC"=>$codUsu,
    "usuarioC"=>$usuario,
    "codClie"=>$codCli,
    "nombresC"=>$nombre,
    "apePaternoC"=>$apepaterno,
    "apeMaternoC"=>$apematerno,
    "paisC"=>$pais,
    "fechNacC"=> $fechnac,
    "tipoDocum"=>$tipodocum,
    "numDocum"=>$numdoc,
    "celularC"=>$celular,
    "correoC"=>$correo,   
    "passUserC"=>$contras,
    // "fechCreaC"=>$fechcreacli,
  );

  $resUpdateCLiente = new registroClienteModel();
  $datosCliente = $resUpdateCLiente->updateCliente($datos);
  // echo json_encode($listaUsuarios);
  var_dump($datosCliente);
  // var_dump($datos);
}

function funcBajaUsu($var){
  extract($var);
  $datos = array(
    "codUsuC"=>$codUsuC,
    "estadoUsuC"=>$estadoUsuC,
  );
  $resBajaUsuario = new registroClienteModel();
  $bajaClie = $resBajaUsuario->bajaUsuario($datos);
  var_dump($bajaClie);
}

?>
