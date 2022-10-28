 
if (typeof tipo_alerta !== 'undefined') {
  switch (tipo_alerta) {
    case "1":
      if(alert_agenda_no_exitente == '1'){
          Swal.fire(
              '¡Alerta!',
              'No existe agenda para este profesional',
              'warning'
              )
      }
      break;
    case "2":
      if(alerta_agenda_repetida == '1'){
          Swal.fire(
              '¡Alerta!',
              'La agenda ya existe para el mes seleccionado',
              'warning'
              )
      }
      break;
    case "3":
      if(alert_dia_eliminado == '1'){
          Swal.fire(
              '¡Alerta!',
              'El dia ha sido eliminado',
              'success'
              )
      }
      else if (alert_dia_eliminado == '0'){
          Swal.fire(
              '¡Alerta!',
              'El dia seleccionado no tiene agenda creada',
              'warning'
              )
      }
      break;
  
      
  }
}

if (typeof alerta_gestion_usuarios !== 'undefined') {
  switch (alerta_gestion_usuarios) {
    case "1":
      if (user_reg == 0) {
        Swal.fire(
          '¡Alerta!',
          'El usuario ya existe',
          'warning'
          )
      }
      break;
    case "2":
      if (user_reg == 1) {
        Swal.fire(
          '¡Registro exitoso!',
          'El usuario ha sido registrado',
          'success'
          )
      }
      break;

    case "3":
      if (act_datos == 1) {
        Swal.fire(
<<<<<<< HEAD
          '¡Actualización exitosa!',
          'Datos de usuario actualizados',
          'success'
          )
      }
      break;
  } 
=======
            '¡Alerta!',
            'El dia seleccionado no tiene agenda creada',
            'warning'
            )
    }
    break;

    
>>>>>>> 14edefa19b0dac4707925d5cd7db13acf246303a
}

if (typeof alerta_gestion_especialidades !== 'undefined') {
  switch (alerta_gestion_especialidades) {
    case "1":
      if (act_esp == 1) {
        Swal.fire(
          '¡Actualización exitosa!',
          'Especialidad actualizada',
          'success'
          )
      }
      break;
    
    case "2":
      if (esp_reg == 1) {
        Swal.fire(
          '¡Registro exitoso!',
          'Especialidad registrada',
          'success'
          )
      }
  }
}
