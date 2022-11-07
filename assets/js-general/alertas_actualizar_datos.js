switch (alertas){

    case "1":

        if (alert_datos_actualizados == '1' ){

            Swal.fire(

                'Sus datos fueron actualizados exitosamente',
                'success'
            
            )

        }

        break;
    
    case "2":

        if (alert_error == '1'){

            Swal.fire(

                'Algo salío mal',
                'Intentelo nuevamente o comuniquese con un auxiliar',
                'warning'

            )

        }

        break;

}