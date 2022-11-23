 
 
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
          
        case "2":
          if(alert_aux_des == '1'){
            Swal.fire(
                '¡Alerta!',
                '¡Usuario no resgitrado o desactivado!',
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

////////////////////////////////////// ALERTAS MODULO PACIENTE //////////////////////////////////////

if (typeof (error_cita) !== 'undefined') {

  switch (error_cita){

    case "1":

      if (error_cita_fecha == '1') {

        Swal.fire(
          '¡Alerta!',
          'No hay citas disponibles para el día seleccionado',
          'warning'
        )

      }
    break;

    case "2":

      if (error_cita_fecha == '2') {

        Swal.fire(
          '¡Alerta!',
          'No es posible agendar una cita el día seleccionado',
          'warning'
        )

      }
    break;

    case "3":

      if (error_esp_cita == '3') {

        Swal.fire(
          '¡Alerta!',
          'No es posible agendar una cita con esta especialidad, ya hay una agendada',
          'warning'
        )

      }
    break;

  }

}

function form_cita(e, n, a, f, c, k){

  const esp = e
  const nom = n
  const ape = a
  const fec = f
  const con = c
  const cos = k

  Swal.fire({
    title: 'Resumen de cita',
    text: "Su cita es de " + e + ", con el profesional " + n + " " + a + " el día y hora " + f + ", en el consultorio " + c + ", con un costo de " + "$" + k + ". " + "¿Desea continuar?",
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar',
    cancelButtonText:'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('formulario_cita').submit();
    }
  })
}

//////////// MODULO AUXILIAR ADMINISTRATIVO ///////////////
if (typeof alerta_m_aux !=="undefined"){
  switch(alerta_m_aux){
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
    case "8":
          if(alerta_cita_pac_aux  == "1"){
              Swal.fire(
                  '¡Correcto!',
                  'Cita agenda',
                  'success'
                  )
          }else{
              Swal.fire(
                  '¡Error!',
                  'No se pudo agendar vuelva a intentarlo',
                  'warning'
                  )
          }
          break;      
         
  }
}
function cancelar_cita_pac_aux(a){
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



function cancelar_cita_prof_aux(a){
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
    text: "Despues de confirmar y no desea continuar con el proceso de reagendar la cita quedara cancelada",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirmar',
    cancelButtonText:'Volver'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById(a).submit();
    }
  })
}

function form_ci_aux(e, n, a, f, c, k){

  Swal.fire({
    title: 'Resumen de cita',
    text: "Su cita es de " + e + ", con el profesional " + n + " " + a + " el día y hora " + f + ", en el consultorio " + c + ", con un costo de " + "$" + k + ". " + "¿Desea continuar?",
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar',
    cancelButtonText:'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('form_cita_aux').submit();
    }
  })
}