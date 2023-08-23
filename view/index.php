<?php 
require_once("../model/registroClienteModel.php");
// echo date_default_timezone_get();
// $horaActual = date('m-d-Y h:i:s a', time()); 
$horaActual = date('Y-m-d G:i:s'); 
// echo $horaActual; 
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
  <link href="../css/style.css" rel="stylesheet">

  
  <!-- FONTAWESOME -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!--  -->

  <!-- JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!--  -->
  <script>
      function soloLetras(e) {

        let keyLe = window.event ? e.which : e.keyCode ;
        //Tecla de retroceso para borrar, y espacio siempre la permite 32//33 = ''
        if (keyLe == 8 || keyLe == 33) {
          e.preventDefault();
        }

        // // Patrón de entrada
        patron = /^[A-Za-z- ]/;
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
  <div class="container-fluid row">
    
      <div class="col-4 p-8">
        <form action="" method="post" enctype="multipart/form-data" id="form-validation-new" novalidate>
          <div class="mb-3">
            <label for="name" class="form-label">Nombres <span></span></label>
            <input  type="text" 
                    class="form-control" 
                    name="name" 
                    id="name" 
                    onKeyPress="return soloLetras(event)"
                    required>
            <div id="alertaInputN"></div>
          </div>
          <div class="mb-3">
            <label for="apepat" class="form-label">Apellido Paterno <span></span></label>
            <input  type="text" 
                    class="form-control" 
                    name="apepat" 
                    id="apepat"
                    onKeyPress="return soloLetras(event)" 
                    required>
            <div id="alertaInputAP"></div>
          </div>
          <div class="mb-3">
            <label for="apemat" class="form-label">Apellido Materno <span></span></label>
            <input  type="text" 
                    class="form-control" 
                    name="apemat" 
                    id="apemat" 
                    onKeyPress="return soloLetras(event)"
                    required>
            <div id="alertaInputAM"></div>
          </div>
          <div class="mb-3">
            <label for="pais" class="form-label">Pais <span></span></label>
           
            <select class="form-select" name="pais" id="pais" required>
              <option class="custom-select" value="174" selected>Perú</option>
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
            <?php } ?>
            </select>
            <div id="alertaInputPais"></div>
          </div>
          <div class="mb-3">
            <label for="fechnac" class="form-label">Fecha Nacimiento <span></span></label>
            <input type="date" class="form-control" name="fechnac" id="fechnac" required>
            <div id="alertaInputFechNa"></div>
          </div>
          <div class="mb-3">
            <label for="tipodocum" class="form-label">Documento <span></span></label>       
            <select class="form-select" name="tipodocum" id="tipodocum">
              <option value="1" selected>DNI</option>
              <option value="2">PASAPORTE</option>
              <option value="3">CE</option>
            </select>
            <div class="mb-3">        
            </div>
            <input type="text" class="form-control" name="numdoc" id="numdoc" required>
            <div id="alertaInputNumDocu"></div>
          </div>
          <div class="mb-3">
            <label for="celular" class="form-label">Celular <span></span></label>
            <input type="num" class="form-control" name="celular" id="celular" required>
            <div id="alertaInputCelular"></div>
          </div>
          <div class="mb-3">
            <label for="correo" class="form-label">Correo electronico <span></span></label>
            <input type="email" class="form-control" name="correo" id="correo" required>
            <div id="alertaInputCorreo"></div>
          </div>
          <input type="hidden" class="form-control" name="fechcreacli" id="fechcreacli" value="<?php echo $horaActual;?>" required>   
          <div class="mb-3">
            <label for="contras" class="form-label">Contraseña <span></span></label>
            <div class="input-group">
              <input type="password" class="form-control" name="contras" id="contras" required>
              <div class="input-group-append">
                <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
              </div>              
            </div>
            <div id="alertaInputContras"></div>
          </div>

          <div class="mb-3">
            <button id="regisUsu" class="btn btn-success" type="submit">Registrar</button>
            <button id="btnCan" class="btn btn-danger">cancelar</button>
          </div>
        </form>
      </div>
    
    
      <div class="col-4">    
        <!-- <div class="table-responsive"> -->
        <table class="display nowrap">
          <thead>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Nombres</th>
              <th scope="col">Paterno</th>
              <th scope="col">Materno</th>            
              <th scope="col">Nacionalidad</th>
              <th scope="col">Fecha Nac</th>
              <th scope="col">Documento</th>
              <th scope="col">Celular</th> 
              <th scope="col">Correo Electronico</th>                       
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <th scope="row">1</th>
                <td>Inca</td>
                <td>Salinas</td>
                <td>Carlos</td>
                <td>Perú</td>
                <td>10/07/1990</td>
                <td>46730445</td>
                <td>916735833</td>
                <td>carlos.incasalinas@gmail.com</td>              
                <td>
                  <span>
                  <a href="#" class="btn btn-danger btn-xs" target="_blank" rel="noopener noreferrer" title='Editar usuario'><i class="fa-solid fa-pen-to-square"></i></a>
                  <a href="#" class="btn btn-info btn-xs" target="_blank" rel="noopener noreferrer" title='Cancelar'><i class="fas fa-trash-alt"></i></a>    
                  </span>                          
                </td>
            </tr> -->
            <?php 
            
            // $queryListar = "CALL consultar_usuarios();";
            // $resultListar = mysqli_query($conexion,$queryListar);
            // if(isset($resultListar)){
            //   echo "holaaaaa";
            // }           
            
            // while ($rowC=mysqli_fetch_array($resultListar)){

            $listaUsu = new registroClienteModel();
            $resListaUsu = $listaUsu->listaUsuarios();
            // var_dump($resListaUsu);
            foreach($resListaUsu as $rowC){
                    $codUsuC = $rowC['codUser'];
                    $codClie = $rowC['codCli'];
                    $nombres = $rowC['nombres'];
                    $apePaterno = $rowC['apePaterno'];
                    $apeMaterno = $rowC['apeMaterno'];
                    $apeMaterno = $rowC['apeMaterno'];
                    $pais = $rowC['nomPais'];
                    $fechNac= $rowC['fechNac'];
                    $fechNacConver = new DateTime($fechNac);
                    $numDoc = $rowC['numDoc'];
                    $celular = $rowC['celular'];
                    $correo = $rowC['correo'];
            ?>
            <tr>
              <th scope="row">1</th>
                <td><?php echo $nombres; ?></td>
                <td><?php echo $apePaterno; ?></td>
                <td><?php echo $apeMaterno; ?></td>
                <td><?php echo $pais;?></td>
                <td><?php echo $fechNacConver->format('d/m/Y'); ?></td>
                <td><?php echo $numDoc; ?></td>
                <td><?php echo $celular; ?></td>
                <td><?php echo $correo; ?></td>             
                <td>
                  <span>
                    <form action="../view/editDatosCliente.php" method="POST">
                      <input type="hidden" id="codUsuC" name="codUsuC" value="<?php echo $codUsuC; ?>"> 
                      <input type="hidden" id="codClie" name="codClie" value="<?php echo $codClie; ?>">
                      <button  type="submit" id="btnActCli" class="btn btn-danger btn-xs" target="" rel="noopener noreferrer" title='Editar Cliente'><i class="fa-solid fa-pen-to-square"></i></button>
                    </form>                   
                    
                  <!-- <a id="btnBajaUsu" name="btnBajaUsu" type="submit" class="btn btn-info btn-xs" rel="noopener noreferrer" onclick="funcBajaUsu()" title='Dar de baja'><i class="fas fa-trash-alt"></i></a> -->
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" onclick="funcObtUsu(<?php echo $codUsuC; ?>)" data-bs-toggle="modal" data-bs-target="#modalBajaUsu">
                    <i class="fas fa-trash-alt"></i>
                  </button>
    
                  </span>                          
                </td>
            </tr>
            <?php }?>
          </tbody>
        </table>      
      </div>
      
      <!-- Modal -->
      <div class="modal fade" id="modalBajaUsu" tabindex="-1" aria-labelledby="modLabBajaUsu" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modLabBajaUsu">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>              
            </div>
            <div class="modal-body">
              ¿Estas seguro de dar de baja?
              <input type="hidden" id="codUsuModel" name="codUsuModel" value="" >
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" onclick="funcBajaUsu()" class="btn btn-primary">Dar de Baja</button>
            </div>
          </div>
        </div>
      </div>

  </div>

 
  
  <script src="../js/registroCliente.js?<?php echo time();?>"></script>
  <!-- <script src="jquery-validation/jquery.validate.js"></script> -->
  <!-- <script> $(function() { FormsValidation.init(); }); </script> -->
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>



