<?php
  require_once("../model/registroClienteModel.php");

  if(isset($_POST)){
   
    // var_dump($_POST['codCli']);
    // echo $_SERVER['REQUEST_URI'];
    // echo $_SERVER['HTTP_HOST'];
    // echo $_SERVER['SERVER_NAME'];
    // echo $_SERVER['SERVER_ADDR'];

    $codUsuC = $_POST['codUsuC'];
    $codClie = $_POST['codClie'];

    $respuesta = new registroClienteModel();
    $datosCliente = $respuesta->datosUsuarioId($codUsuC,$codClie);
    // var_dump($datosCliente);
    foreach($datosCliente as $indice){
      $codUserC = $indice['codUser'];
      $usuario = $indice['usuario'];
      $codCli = $indice['codCli'];
      $nombresCli = $indice['nombres'];
      $apePaCli = $indice['apePaterno'];
      $apeMaCli = $indice['apeMaterno'];
      $codPais = $indice['codPais'];
      $pais = $indice['nomPais'];
      $fechNac = $indice['fechNac'];
      $tipoDoc = $indice['tipoDoc'];
      $numDoc = $indice['numDoc'];
      $celular = $indice['celular'];
      $correoC = $indice['correo'];
    }

    $datetimeR = new DateTime($fechNac);
    // echo $datetimeR->format('d/m/Y');
    // echo $fechNac;

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--  -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- FONTAWESOME -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!--  -->

  <!-- JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!--  -->

  <script>
      function soloLetras(e) {

        let keyLe = window.event ? e.which : e.keyCode ;
        //Tecla de retroceso para borrar, y espacio siempre la permite
        if (keyLe == 8 || keyLe == 33) {
          e.preventDefault();
        }

        // // Patrón de entrada
        patron = /[A-Za-z- ]/;
        tecla_final = String.fromCharCode(keyLe);
        return patron.test(tecla_final);

      }

      function soloNumeros(e){
        var keyNu = window.event ? e.which : e.keyCode;
        if (keyNu < 48 || keyNu > 57) {
          //Usando la definición del DOM level 2, "return" NO funciona.
          e.preventDefault();
        }
      }
  </script>
</head>
<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-4 center">
      <form action="actulizar/cuenta/" method="POST" enctype="multipart/form-data" id="form-update">
        <div class="mb-3">
          <label for="name" class="form-label">Nombres :</label>
          <input  type="text" 
                  class="form-control"
                  name="name" 
                  id="name"
                  value="<?php echo $nombresCli;?>"
                  onKeyPress="return soloLetras(event)"
                  required>
        </div>
        <div class="mb-3">
          <label for="apepat" class="form-label">Apellido Paterno :</label>
          <input  type="text" 
                  class="form-control" 
                  name="apepat" 
                  id="apepat"
                  value="<?php echo $apePaCli;?>"
                  required>
        </div>
        <div class="mb-3">
          <label for="apemat" class="form-label">Apellido Materno :</label>
          <input  type="text" 
                  class="form-control" 
                  name="apemat" 
                  id="apemat"
                  value="<?php echo $apeMaCli;?>"
                  required>
        </div>
        <div class="mb-3">
          <label for="pais" class="form-label">Pais :</label>
          
          <select class="form-select" name="pais" id="pais" required>
            <option class="custom-select" value="<?php echo $codPais;?>" selected><?php echo $pais;?></option>
          <?php 
            

            // $qListarPai = "SELECT * FROM pais";
            // $reListarPai = mysqli_query($conexion,$qListarPai);             
            // while ($rowPais = mysqli_fetch_array($reListarPai)){  

            $listaPais = new registroClienteModel();
            $reslistaPais = $listaPais->listaPais();
              // var_dump($lista); 
            foreach ($reslistaPais as $rowPais){ 
          ?>
            <option class="custom-select" value="<?php echo $rowPais['codPais'];?>"><?php echo $rowPais['nomPais'];?></option>
          <?php } 
          ?>
          
          </select>

        </div>
        <div class="mb-3">
          <label for="fechnac" class="form-label">Fecha Nacimiento :</label>
          <input  type="date" 
                  class="form-control" 
                  name="fechnac" 
                  id="fechnac"
                  value="<?php echo $datetimeR->format('Y-m-d');?>"                
                  required>
        </div>
        <div class="mb-3">
          <label for="tipodocum" class="form-label">Documento :</label>       
          <select class="form-select" name="tipodocum" id="tipodocum">

            <?php
              $Documento = "";
              if($tipoDoc==1){
                $Documento ="DNI";
              }elseif($tipoDoc==2){
                $Documento ="PASAPORTE";
              }else{
                $Documento ="CE";
              }

              $DocuNames = [
                0 => [0 => '1',
                      1 => 'DNI'],
                1 => [0 => '2',
                      1 => 'PASAPORTE'],
                2 => [0 => '3',
                      1 => 'CE'],               
              ];

              foreach($DocuNames as $indiceDN=>$docus){

              //seleccionar 
              if($docus[1] == $Documento){
                $selected = "selected";
              }else{
                $selected = "";
              }

            ?>            
            <option value="<?php echo $docus[0]; ?>" <?php echo $selected ?>><?php echo $docus[1]; ?></option>             
            <?php  }?>
          </select>
          <div class="mb-2">        
          </div>
          <input  type="text" 
                  class="form-control"
                  name="numdoc" 
                  id="numdoc" 
                  value="<?php echo $numDoc;?>"
                  required>
        </div>
        <div class="mb-3">
          <label for="celular" class="form-label">Celular :</label>
          <input  type="num" 
                  class="form-control" 
                  name="celular" 
                  id="celular"
                  value="<?php echo $celular?>" 
                  required>
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo electronico :</label>
          <input  type="email" 
                  class="form-control" 
                  name="correo" 
                  id="correo"
                  value="<?php echo $correoC;?>" 
                  required>
        </div>
        <!-- <input type="hidden" class="form-control" name="fechcreacli" id="fechcreacli" value="<?php //echo $horaActual;?>" required>    -->
        <div class="mb-3">
          <label for="contras" class="form-label">Contraseña :</label>
          <div class="input-group">
            <input  type="password" 
                    class="form-control" 
                    name="contras" 
                    id="contras" 
                    value="123456"
                    disabled
                    >
            <div class="input-group-append">
              <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
            </div>
          </div>
        </div>
        <input type="hidden" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario;?>">
        <input type="hidden" class="form-control" id="codUsuC" name="codUsuC" value="<?php echo $codUserC;?>">        
        <input type="hidden" class="form-control"  id="codclie" name="codclie" value="<?php echo $codCli;?>">     
        <div class="mb-3">
          <a id="actUsu" class="btn btn-success" type="submit" onclick="actuCliFunc()">Actualizar</a>
           <!-- <button id="actUsu" class="btn btn-success" onclick="actuCliFunc()">Actualizar</button> -->
          <a id="btnCan" class="btn btn-danger" onclick="cancelar()">cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="../js/actualizarCliente.js?<?php echo time();?>"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>