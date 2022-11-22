if (typeof alertas !== "undefined") {
    switch (alertas) {
        case "1":
            if (asistencia_confirm == "1") {
                Swal.fire(
                    'Asistencia confirmada',
                    'Se ha confirmado la asistencia',
                    'success'
                )   
            } else{
                Swal.fire(
                    'Asistencia eliminada',
                    'Se ha eliminado la asistencia',
                    'success'
                )
            }
            break;
            
        case "2":
            if (update_pass == "1") {
                Swal.fire(
                    '¡Contraseña actualizada!',
                    'Se ha actualizado la contraseña con exito',
                    'success'
                )
            } else{
                Swal.fire(
                    '¡Error!',
                    'Las contraseñas no coinciden, vuelva a intentarlo',
                    'warning'
                    )
            }
            break;
        
        case "3":
            if (update_prof == "1") {
                Swal.fire(
                    '¡Datos actualizados!',
                    'Se han actualizado los datos con exito',
                    'success'
                )
            }else {
                Swal.fire(
                    '¡Error!',
                    'Error al actualizar los datos, vuelva a intentarlo',
                    'error'
                )
            }
            break;
    }
}

function asistencia(a){
    const etiqueta = a
    Swal.fire({
      title: 'Confirmar asistencia',
      text: "¿Desea confirmar la asistencia?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirmar',
      cancelButtonText:'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = "index.php?c=Profesional&a=asistencia_cita_1&id=" + etiqueta;
      }
    })
  }

function asistencia_2(a){
    const etiqueta = a
    Swal.fire({
      title: 'Eliminar asistencia',
      text: "¿Desea eliminar la asistencia?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirmar',
      cancelButtonText:'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = "index.php?c=Profesional&a=asistencia_cita_2&id=" + etiqueta;
      }
    })
  }

function cerrarsesion(){
    Swal.fire({
      title: 'Cerrar sesion',
      text: "¿Desea cerrar la sesion?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirmar',
      cancelButtonText:'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = "index.php?c=Profesional&a=cerrarsesion";
      }
    })
  }
