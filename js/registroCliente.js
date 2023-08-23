    /* Initialize Form Validation */
    let registroCliente = document.getElementById("regisUsu");
    registroCliente.onclick = regisCliFunc;

    function regisCliFunc() {

        let nombre = document.forms['form-validation-new']['name'].value;
        let apepaterno = document.forms['form-validation-new']['apepat'].value;
        let apematerno = document.forms['form-validation-new']['apemat'].value;
        let pais = document.forms['form-validation-new']['pais'].value;
        let fechnac = document.forms['form-validation-new']['fechnac'].value;
        let tipodocum = document.forms['form-validation-new']['tipodocum'].value;
        let numdoc = document.forms['form-validation-new']['numdoc'].value;
        let celular = document.forms['form-validation-new']['celular'].value;
        let correo = document.forms['form-validation-new']['correo'].value;
        let contras = document.forms['form-validation-new']['contras'].value;
        let fechcreacli = document.forms['form-validation-new']['fechcreacli'].value;      
        

        let nomAviso = 'SI';
        let apePAviso = 'SI';
        let apeMAviso = 'SI';
        let fechNaAviso = 'SI';
        let numDocAviso = "SI";
        let celAviso = 'SI';
        let correoAviso = 'SI';
        let contraAviso = 'SI';

        if(nombre=="" || nombre== null){            
            let alertaNombre = '<span style="color: red; font-size:13px;" >Este un campo obligatorio.</span>';
            document.getElementById('alertaInputN').innerHTML= alertaNombre;            
        }else if(nombre!="" || nombre!= null){
            let alertaNombre = '';
            document.getElementById('alertaInputN').innerHTML= alertaNombre;
            nomAviso = 'NO';  
                      
        }

        if(apepaterno=="" || apepaterno== null){
            let alertaAP = '<span style="color: red; font-size:13px;" >Este un campo obligatorio.</span>';
           document.getElementById('alertaInputAP').innerHTML = alertaAP;
          
        }else if(nombre!="" || nombre!= null){
            let alertaAP = '';
            document.getElementById('alertaInputAP').innerHTML= alertaAP;
            apePAviso = 'NO';            
        }

        if(apematerno=="" || apematerno== null){
            let alertaAM = '<span style="color: red; font-size:13px;" >Este un campo obligatorio.</span>';
            document.getElementById('alertaInputAM').innerHTML= alertaAM;           
        }else if(apematerno!="" || apematerno!= null){
            let alertaAM = '';
            document.getElementById('alertaInputAM').innerHTML= alertaAM; 
            apeMAviso = 'NO';     
        }

        if(pais==""||pais==null){
            let alertaPais = '<span style="color: red; font-size:13px;" >Este un campo obligatorio.</span>';
            document.getElementById('alertaInputPais').innerHTML= alertaPais;    
        }

        if(fechnac==""||fechnac==null){
            let alertaFechN = '<span style="color: red; font-size:13px;" >Este un campo obligatorio.</span>';
            document.getElementById('alertaInputFechNa').innerHTML= alertaFechN;    
        }else if(fechnac!=""||fechnac!=null){
            let alertaFechN = "";
            document.getElementById('alertaInputFechNa').innerHTML = alertaFechN;
            fechNaAviso = "NO";
        }

        if(numdoc==""||numdoc==null){
            let alertaNumDo =  '<span style="color: red; font-size:13px;" >Este un campo obligatorio.</span>';
            document.getElementById('alertaInputNumDocu').innerHTML= alertaNumDo;

        }else if(numdoc!=""||numdoc!=null){
            let alertaNumDo = '';
            document.getElementById('alertaInputNumDocu').innerHTML= alertaNumDo;
            numDocAviso = "NO";
        }

        if (celular==""||celular==null) {
            let alertaCel = '<span style="color: red; font-size:13px;" >Este un campo obligatorio.</span>';
            document.getElementById('alertaInputCelular').innerHTML = alertaCel;
        } else if(celular!=""||celular!=null){
            let alertaCel = '';
            document.getElementById('alertaInputCelular').innerHTML = alertaCel;
            celAviso = "NO";
        }

        if (correo==""||correo==null) {
            let alertaCorreo = '<span style="color: red; font-size:13px;" >Este un campo obligatorio.</span>';
            document.getElementById('alertaInputCorreo').innerHTML = alertaCorreo;
        } else if(correo!=""||correo!=null){
            let alertaCorreo = '';
            document.getElementById('alertaInputCorreo').innerHTML = alertaCorreo;
            correoAviso = "NO";
        }

        if (contras==""||contras==null) {
            let alertaContra = '<span style="color: red; font-size:13px;" >Este un campo obligatorio.</span>';
            document.getElementById('alertaInputContras').innerHTML = alertaContra;
        } else if(contras!=""||contras!=null){
            let alertaContra = '';
            document.getElementById('alertaInputContras').innerHTML = alertaContra;
            contraAviso = "NO";
        }


        
        
        if(nomAviso=='NO' && apePAviso=='NO' && apeMAviso=='NO' && fechNaAviso=='NO' && numDocAviso=='NO' && celAviso=='NO' && correoAviso=='NO' && contraAviso=='NO'){
            alert('asdasdasdas');
            const datos = {  
                func:'funcNewCli',              
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
                fechcreacli : fechcreacli,                
            };

            $.ajax({
                type: 'POST',
                url: '../controller/registroCliente.php',
                data: datos,
                dataType: "text",
                success: function (response) {
                    console.log(response); 
                    alert("Evento onclick ejecutado!");                   
                    window.location="../view/index.php";                            
    
                },
                error: function (error) {
                    console.log(error);
                    
                }
            });  
        }else{
            return false;
        }
        
       
        
    }


     
    
    
    function funcObtUsu(codUsuC){ 
        // document.getElementById("myP").innerHTML = codUsuC;
        document.getElementById("codUsuModel").value = codUsuC;
    }

    function funcBajaUsu(){        
        let estadoUsu = 0;
        let codUsuC = document.getElementById("codUsuModel").value
        const datos = {
            func : 'funcBajaUsu', 
            codUsuC : codUsuC,
            estadoUsuC : estadoUsu,
        }  
        // console.log(datos);      
        $.ajax({
            type: 'POST',
            url: '../controller/registroCliente.php',
            data: datos,
            dataType: "text",
            success: function (response) {
                console.log(response); 
                // alert("Dado de Baja Exitosamente!");                
                window.location="../view/index.php";    
            },
            error: function (error) {
                console.log(error);
                
            }
        });
    }
   
                
        
