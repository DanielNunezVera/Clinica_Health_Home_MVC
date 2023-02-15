const preguntas = document.querySelectorAll('.preguntas .caja-pregunta');

preguntas.forEach((pregunta) => {

    pregunta.addEventListener('click' , (a) => {

        a.currentTarget.classList.toggle('activa');

        const respuesta = pregunta.querySelector('.respuesta');
        const alturaRealRespuesta = respuesta.scrollHeight;

        if(!respuesta.style.maxHeight){

            respuesta.style.maxHeight = alturaRealRespuesta + 'px';

        } else{

            respuesta.style.maxHeight = null;

        }

        preguntas.forEach((elemento) => {

            if(pregunta !== elemento){

                elemento.classList.remove('activa');
                elemento.querySelector('.respuesta').style.maxHeight = null;

            }

        });

    });

});