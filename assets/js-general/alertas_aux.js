
if (typeof alerta_aux !=="undefined"){
    switch(alerta_aux){
        case "1": 
            if(alerta_pass_update == "1"){
                Swal.fire(
                    '¡Correcto!',
                    'Su contraseña se ha actualizado correctamente',
                    'success'
                    )
            }else{
                Swal.fire(
                    '¡Error!',
                    'Su contraseña no coincide, vuelva a intentarlo',
                    'warning'
                    )
            }
            break;
    }
}