
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
        
        case "2":
            if(alerta_update_info == "1"){
                Swal.fire(
                    '¡Correcto!',
                    'Su informacion se ha actualizado correctamente',
                    'success'
                    )
            }else{
                Swal.fire(
                    '¡Error!',
                    'Sus datos no se actulizaron',
                    'warning'
                    )
            }
            break;

           
    }
if(typeof alerta_citas_pac_aux !=="undefined"){
    switch(alerta_citas_pac_aux){
        case "1":
            if(alert_cita_pac_cancel == '1'){
                Swal.fire(
                    'Correcto',
                    'El consultorio ha sido eliminado',
                    'success'
                    )
            }else{
                Swal.fire(
                '¡Alerta!',
                'El consultorio esta asignado a algun profesional, actualice informacion del profesional y vuelva a intentarlo',
                'warning'
                )
            }
            break;
    }
}
    function cancelar_cita_pac(a){
    const resultado = a
    Swal.fire({
      title: '¿Esta seguro de cancelar la cita?',
      text: "Esta accion es irreversible",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Cancelar',
      cancelButtonText:'Volver'
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = "index.php?c=Auxiliar&a=cancelar_cita_pac&id=" + resultado ;
      }
    })
  }    

            
    
}
