 
 
 ////////////ALERTAS AGENDA////////////////
 if (typeof alerta_agenda !=="undefined") {
      switch (alerta_agenda) {
        case "1":
          if(alert_agenda_existente == '1'){
              Swal.fire(
                  '¡Informacion!',
                  'El profesional cuenta con agenda creada',
                  'info'
                  )
          }else{
            Swal.fire(
              '¡Alerta!',
              'El profesional no cuenta con agenda creada',
              'warning'
              )
          }
          break;
        case "2":
          if(alert_agenda_repetida == '1'){
              Swal.fire(
                  '¡Proceso exitoso!',
                  'Agenda creada',
                  'success'
                  )
          }else{
              Swal.fire(
                '¡Error!',
                'La agenda ya se encuentra creada',
                'error'
                )
          }
          break;
        case "3":
          if(alert_agenda_excepciones == '1'){
              Swal.fire(
                  '¡Alerta!',
                  'El dia ha sido eliminado',
                  'success'
                  )
          }else{
            Swal.fire(
              '¡Informacion!',
              'El dia seleccionado puede que tenga una cita asignada o este vacio el campo, verifique por favor',
              'info'
              )
          }
          break;    
      }
 }

/////////////// ALERTAS INICIO DE SESION////////////////////////////////////////////////
 if (typeof alerta_login !=="undefined") {
      switch (alerta_login) {
        case "1":
          if(alert_sesion == '2'){
              Swal.fire(
                  '¡Alerta!',
                  '¡Datos incorrectos!',
                  'warning'
                  )
          }else{
            Swal.fire(
              '¡Alerta!',
              '¡Se ha cerrado su sesion!',
              'warning'
              )
          }
          break;    
      }
 }

 /////////////ALERTAS CONSULTORIOS ///////////////////////////////////
 if (typeof alerta_consult !=="undefined") {
  switch (alerta_consult) {
    case "1":
      if(alert_consult_insert == '1'){
          Swal.fire(
              'Correcto',
              'Se ha creado el consultorio',
              'success'
              )
      }else{
        Swal.fire(
          '¡Alerta!',
          '¡Consultorio ya existe!',
          'warning'
          )
      }
      break;
    case "2":
      if(alert_consult_eliminado == '1'){
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

function eliminar_consult(a){
  const resultado = a
  Swal.fire({
    title: '¿Esta seguro de eliminar el consultorio?',
    text: "Esta accion es irreversible",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar',
    cancelButtonText:'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = "index.php?c=Administrador&a=eliminar_consul&id=" + resultado ;
    }
  })
}


///////////////ALERTAS ESPECIALDIAD///////////////////////////////////
if (typeof alerta_espec !=="undefined") {
  switch (alerta_espec) {
    case "1":
      if(alert_espec_insert == '1'){
          Swal.fire(
              'Correcto',
              'Se ha creado la especialidad',
              'success'
              )
      }else{
        Swal.fire(
          '¡Alerta!',
          '¡Especialidad ya existente!',
          'warning'
          )
      }
      break;
    case "2":
      if(alert_espec_eliminado == '1'){
          Swal.fire(
              'Correcto',
              'Se ha eliminado la especialidad',
              'success'
              )
      }else{
        Swal.fire(
          '¡Alerta!',
          'La especialidad no se puede eliminar, por favor actualice los profesionales que la tengan asignada',
          'warning'
          )
      }
      break;
    case "3":
      if(alert_espec_update == '1'){
          Swal.fire(
              'Correcto',
              'Se ha actualizado la especialidad',
              'success'
              )
      }else{
        Swal.fire(
          '¡Alerta!',
          'La especialidad no se pudo actualizar, verifique que no se haya realizado ningun cambio',
          'warning'
          )
      }
      break;
  }
}

function eliminar_espec(a){
  const etiqueta = a
  Swal.fire({
    title: '¿Esta seguro de eliminar la especialidad?',
    text: "Esta accion es irreversible",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar',
    cancelButtonText:'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = "index.php?c=Administrador&a=eliminar_espec&id=" + etiqueta;
    }
  })
}
///////////ALERTAS PACIENTE /////////////////////////////////////////////////////
if (typeof alerta_pac !=="undefined") {
  switch (alerta_pac) {
    case "1":
      if(alert_pac_insert == '1'){
          Swal.fire(
              'Correcto',
              'Paciente creado con exito',
              'success'
              )
      }else{
        Swal.fire(
          '¡Alerta!',
          '¡El paciente ya existe!',
          'warning'
          )
      }
      break;
    case "2":
      if(alert_pac_eliminado == '1'){
          Swal.fire(
              'Correcto',
              'Paciente eliminado con exito',
              'success'
              )
      }else{
        Swal.fire(
          '¡Alerta!',
          'El paciente tiene citas agendadas, por favor cancelar las citas',
          'warning'
          )
      }
      break;    
    case "3":
      if(alert_pac_update == '1'){
          Swal.fire(
              'Correcto',
              'Paciente actualizado con exito',
              'success'
              )
      }else{
        Swal.fire(
          '¡Alerta!',
          'El paciente no se pudo actualizar, compruebe si se realizaron cambios',
          'warning'
          )
      }
      break;
  }
}

function eliminar_pac(a){
  const etiqueta = a
  Swal.fire({
    title: '¿Esta seguro de eliminar el paciente?',
    text: "Esta accion es irreversible",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar',
    cancelButtonText:'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = "index.php?c=Administrador&a=eliminar_pac&id=" + etiqueta;
    }
  })
}

///////////////// ALERTAS PROFESIONAL///////////////////////////////////////////
if (typeof alerta_prof !=="undefined") {
  switch (alerta_prof) {
    case "1":
      if(alert_prof_insert == '1'){
          Swal.fire(
              'Correcto',
              'Profesional creado con exito',
              'success'
              )
      }else{
        Swal.fire(
          '¡Alerta!',
          '¡El profesional ya existe!',
          'warning'
          )
      }
      break;
    case "2":
      if(alert_prof_eliminado == '1'){
          Swal.fire(
              'Correcto',
              'El profesional ha sido eliminado',
              'success'
              )
      }else{
        Swal.fire(
          '¡Alerta!',
          'El profesional tiene citas asignadas, por favor, reagende o cancele las citas',
          'warning'
          )
      }
      break;
    case "3":
      if(alert_prof_update == '1'){
          Swal.fire(
              'Correcto',
              'Profesional actualizado con exito',
              'success'
              )
      }else{
        Swal.fire(
          '¡Alerta!',
          'El profesional no se pudo actualizar, compruebe si se realizaron cambios',
          'warning'
          )
      }
      break;
  }
}

function eliminar_prof(a){
  const etiqueta = a
  console.log(etiqueta)
  Swal.fire({
    title: '¿Esta seguro de eliminar el profesional?',
    text: "Esta accion es irreversible",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar',
    cancelButtonText:'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = "index.php?c=Administrador&a=eliminar_prof&id=" + etiqueta;
    }
  })
}

//////////////// ALERTAS AUXILIAR /////////////////////////////////////////////////
  if (typeof alerta_aux !=="undefined") {
    switch (alerta_aux) {
      case "1":
        if(alert_aux_insert == '1'){
            Swal.fire(
                'Correcto',
                'Auxiliar creado con exito',
                'success'
                )
        }else{
          Swal.fire(
            '¡Alerta!',
            '¡Auxiliar ya existente!',
            'warning'
            )
        }
        break;  
      case "2":
        if(alert_aux_eliminado == '1'){
            Swal.fire(
                'Correcto',
                'Auxiliar eliminado con exito',
                'success'
                )
        }else{
          Swal.fire(
            '¡Alerta!',
            '¡No se pudo eliminar el auxiliar!',
            'warning'
            )
        }
        break;
      case "3":
        if(alert_aux_update == '1'){
            Swal.fire(
                'Correcto',
                'Auxiliar actualizado con exito',
                'success'
                )
        }else{
          Swal.fire(
            '¡Alerta!',
            'El auxiliar no se pudo actualizar, compruebe si se realizaron cambios',
            'warning'
            )
        }
        break;
    }
}

function eliminar_aux(a){
  const etiqueta = a
  Swal.fire({
    title: '¿Esta seguro de eliminar el auxiliar?',
    text: "Esta accion es irreversible",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar',
    cancelButtonText:'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = "index.php?c=Administrador&a=eliminar_aux&id=" + etiqueta;
    }
  })
}
