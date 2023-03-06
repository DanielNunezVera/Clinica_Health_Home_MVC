
let div = document.getElementById("franja_disponible")

const sirva = function (){
    $etiqueta = document.getElementById("id_consultorios")
    $etiqueta1=$etiqueta.options[$etiqueta.selectedIndex].getAttribute('name');
    $etiqueta2 = document.getElementById("tipo_franja")

    if ($etiqueta1=="1") {
        if ($etiqueta2.length!=1) {
            if ( $result=document.getElementById("213")!=undefined) {
                $etiqueta_eliminar_1=document.getElementById("213")
                $etiqueta_eliminar_1.remove();
                $cont = 1;
            }
            if ( $result=document.getElementById("312")!=undefined) {
                $etiqueta_eliminar_2=document.getElementById("312")
                $etiqueta_eliminar_2.remove();
                $cont = 1;
            }
            if ($cont==1) {
                if ( $result=document.getElementById("123")!=undefined) {
                    $etiqueta_eliminar_x1=document.getElementById("123")
                    $etiqueta_eliminar_x1.remove();
                }
                if ( $result=document.getElementById("321")!=undefined) {
                    $etiqueta_eliminar_x2=document.getElementById("321")
                    $etiqueta_eliminar_x2.remove();
                }    
            }
            
            console.log($cont)
        }
        let option = `<option id="123" value='b'>6:00 a.m - 2:00 p.m</option><option id="321" value='c'>2:00 p.m - 10:00 p.m</option>`
        $tabla=document.getElementById("tipo_franja")
        $tabla.insertAdjacentHTML("beforeend", option);
    }

    if ($etiqueta1=="b") {
        if ($etiqueta2.length!=1) {
            if ( $result=document.getElementById("123")!=undefined) {
                $etiqueta_eliminar_3=document.getElementById("123")
                $etiqueta_eliminar_3.remove();
                $cont = 1;
            }
            if ( $result=document.getElementById("321")!=undefined) {
                $etiqueta_eliminar_4=document.getElementById("321")
                $etiqueta_eliminar_4.remove();
                $cont = 1;
            }
            if ( $result=document.getElementById("312")!=undefined) {
                $etiqueta_eliminar_5=document.getElementById("312")
                $etiqueta_eliminar_5.remove();
                $cont = 1;
            }

            if ($cont==1) {
                if ( $result=document.getElementById("213")!=undefined) {
                    $etiqueta_eliminar_x3=document.getElementById("312")
                    $etiqueta_eliminar_x3.remove();
                }
            }
            
        }
        let option = `<option id="213" value='c'>2:00 p.m - 10:00 p.m</option>`
        $tabla=document.getElementById("tipo_franja")
        $tabla.insertAdjacentHTML("beforeend", option);
    }
    if ($etiqueta1=="c") {
        if ($etiqueta2.length!=1) {
            if ( $result=document.getElementById("123")!=undefined) {
                $etiqueta_eliminar_7=document.getElementById("123")
                $etiqueta_eliminar_7.remove();
                $cont=1;
            }
            if ( $result=document.getElementById("321")!=undefined) {
                $etiqueta_eliminar_8=document.getElementById("321")
                $etiqueta_eliminar_8.remove();
                $cont = 1;
            }
            if ( $result=document.getElementById("213")!=undefined) {
                $etiqueta_eliminar_9=document.getElementById("213")
                $etiqueta_eliminar_9.remove();
                $cont = 1;
            }
            if ($cont ==1) {
                if ( $result=document.getElementById("312")!=undefined) {
                    $etiqueta_eliminar_x4=document.getElementById("312")
                    $etiqueta_eliminar_x4.remove();
                }
            }

        }
        let option = `<option id="312" value='b'>6:00 a.m - 2:00 p.m</option>`
        $tabla=document.getElementById("tipo_franja")
        $tabla.insertAdjacentHTML("beforeend", option);
    }
}


