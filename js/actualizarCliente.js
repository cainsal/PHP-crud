  // let actuCliente = document.getElementById("actUsu");
  // actuCliente.onclick = actuCliFunc;

  function actuCliFunc(){
    
    let codUsu = document.forms['form-update']['codUsuC'].value;
    let usuario = document.forms['form-update']['usuario'].value;
    let codCli = document.forms['form-update']['codclie'].value;
    let nombre = document.forms['form-update']['name'].value;
    let apepaterno = document.forms['form-update']['apepat'].value;
    let apematerno = document.forms['form-update']['apemat'].value;
    let pais = document.forms['form-update']['pais'].value;
    let fechnac = document.forms['form-update']['fechnac'].value;
    let tipodocum = document.forms['form-update']['tipodocum'].value;
    let numdoc = document.forms['form-update']['numdoc'].value;
    let celular = document.forms['form-update']['celular'].value;
    let correo = document.forms['form-update']['correo'].value;
    let contras = document.forms['form-update']['contras'].value;
    
    const datos = {
      func :'funcUpdateCli',
      codUsu : codUsu,
      usuario : usuario,
      codCli : codCli,
      nombre : nombre,
      apepaterno : apepaterno,
      apematerno : apematerno,
      pais : pais,
      fechnac : fechnac,
      tipodocum : tipodocum,
      numdoc : numdoc,
      celular : celular,
      correo : correo,
      contras : contras,
    };

    

    $.ajax({
      type: 'POST',
      url: '../controller/registroCliente.php',
      data: datos,
      dataType: "text",
      success: function (response) {
          console.log(response); 
          alert("ACTUALIZADO!");                
          window.location="../view/index.php";
      },
      error: function (error) {
          console.log(error);
          
      }
    });  

    // console.log(datos);
  }

  function cancelar(){
    window.location="../view/index.php";
  }

  