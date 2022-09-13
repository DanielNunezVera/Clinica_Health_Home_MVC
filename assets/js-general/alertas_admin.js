 
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



