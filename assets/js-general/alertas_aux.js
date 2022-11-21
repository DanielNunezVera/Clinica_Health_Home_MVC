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
      case "3":
          if(alerta_cita_cancel == "1"){
              Swal.fire(
                  '¡Correcto!',
                  'La cita se cancelo con exito',
                  'success'
                  )
          }else{
              Swal.fire(
                  '¡Error!',
                  'No se pudo cancelar la cita',
                  'warning'
                  )
          }
          break;    
    case "4":
          if(alert_pdte_pago  == "1"){
              Swal.fire(
                  '¡Correcto!',
                  'Pago confirmado',
                  'success'
                  )
          }else{
              Swal.fire(
                  '¡Error!',
                  'Pago no confirmado',
                  'warning'
                  )
          }
          break;   

      case "5":
          if(alerta_pdte_pa  == "1"){
              Swal.fire(
                  '¡Correcto!',
                  'se cancelo pago',
                  'success'
                  )
          }else{
              Swal.fire(
                  '¡Error!',
                  'Error en cancelar pago',
                  'warning'
                  )
          }
          break;  
      case "6":
          if(alerta_ccl_ct_pc  == "1"){
              Swal.fire(
                  '¡Correcto!',
                  'Se cancelo cita',
                  'success'
                  )
          }else{
              Swal.fire(
                  '¡Error!',
                  'Hubo un error en cancelar cita',
                  'warning'
                  )
          }
          break;

    case "7":
          if(alerta_pac_desacti  == "1"){
              Swal.fire(
                  '¡Correcto!',
                  'Existe el paciente',
                  'success'
                  )
          }else{
              Swal.fire(
                  '¡Error!',
                  'Paciente desactivado o no registrado',
                  'warning'
                  )
          }
          break;
         
  }
}
function cancelar_cita_pac(a){
  const etiqueta = a
  Swal.fire({
    title: '¿Esta seguro de cancelar la cita?',
    text: "Esta accion es irreversible",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirmar',
    cancelButtonText:'Volver'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = "index.php?c=Auxiliar&a=cancelar_cita_pac&id=" + etiqueta;
    }
  })
}
function pdte_pago(a){
  const etiqueta = a
  Swal.fire({
    title: '¿Esta seguro de confirmar pago?',
    text: "Confirme esta accion",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirmar',
    cancelButtonText:'Volver'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = "index.php?c=Auxiliar&a=pago_ok&id=" + etiqueta;
    }
  })
}

function pago_ok(a){
  const etiqueta = a
  Swal.fire({
    title: '¿Esta seguro de cambiar estado pago?',
    text: "Confirme esta accion",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirmar',
    cancelButtonText:'Volver'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = "index.php?c=Auxiliar&a=pdte_pago&id=" + etiqueta;
    }
  })
}



function cancelar_cita_prof(a){
  const etiqueta = a
  Swal.fire({
    title: '¿Esta seguro de cancelar la cita?',
    text: "Esta accion es irreversible",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirmar',
    cancelButtonText:'Volver'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = "index.php?c=Auxiliar&a=cancelar_cita_prof&id=" + etiqueta;
    }
  })
}

function reagendar_cita(a){
  const etiqueta = a
  Swal.fire({
    title: '¿Esta seguro de reagendar la cita?',
    text: "Esta accion es irreversible",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirmar',
    cancelButtonText:'Volver'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = "index.php?c=Auxiliar&a=cancelar_cita_prof&id=" + etiqueta;
    }
  })
}
