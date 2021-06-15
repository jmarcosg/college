/**
 * Vacia los campos ingresados
 */
function vaciarCampos(){
    document.getElementById("txtPelicula").value = "";
    document.getElementById("txtDirector").value = "";
    document.getElementById("txtAnio").value = "";
    document.getElementById("txtCalificacion").value = "";
    document.getElementById("txtOpinion").value = "";
}

/**
 * @param {*} campo 
 * Colorea de rojo el borde del input con valor incorrecto
 */
function colorearBorde(campo){
    campo.style.borderColor = "red";
}

/**
 * Vuelve a poner los bordes de los inputs en su color orignal
 */
function resetearColorBordes(){
    inputPelicula = document.getElementById("txtPelicula");
    inputDirector =document.getElementById("txtDirector");
    inputAnio = document.getElementById("txtAnio");
    inputCalificacion = document.getElementById("txtCalificacion");
    inputOpinion = document.getElementById("txtOpinion");
    
    // Pongo los bordes al color original
    inputPelicula.style.borderColor = "";
    inputDirector.style.borderColor = "";
    inputAnio.style.borderColor = "";
    inputCalificacion.style.borderColor = "";
    inputOpinion.style.borderColor = "";
}

/**
 * 
 * @returns formValido
 * Verifica que el formulario este cargado con datos correctos
 */
function verificarFormulario(){
    // Inicializacion de variables
    var valorIngresado, formValido, divGuardar;
    formValido = true;

    // Almaceno el valor del input "txtPelicula"
    valorIngresado = document.getElementById("txtPelicula");
    
    // Si el campo es vacio, el borde del input se vuelve de color rojo y el formulario no es valido
    if (valorIngresado.value == "" || !isNaN(valorIngresado.value)) {
        colorearBorde(valorIngresado);
        formValido = false;
    }

    // Almaceno el valor del input "txtDirector"
    valorIngresado = document.getElementById("txtDirector");
    
    // Si el campo es vacio, el borde del input se vuelve de color rojo y el formulario no es valido
    if (valorIngresado.value == "" || !isNaN(valorIngresado.value)) {
        colorearBorde(valorIngresado);
        formValido = false;
    }

    // Almaceno el valor del input "txtAnio" y parseo su valor a int
    valorIngresado = document.getElementById("txtAnio");
    var num = parseInt(valorIngresado.value);
    
    // Si el campo es vacio o no es un numero, el borde del input se vuelve de color rojo y el formulario no es valido
    if(valorIngresado.value == "" || isNaN(valorIngresado.value)){
        colorearBorde(valorIngresado);
        formValido = false;
    }else{
        // Utilizo a la funcion Date() para sacar la fecha actual y luego solamente almacenar y utilizar el año actual
        var fecha = new Date();
        var anioActual = fecha.getFullYear();
        
        // Si la fecha ingresada no esta entre 1900 y el año actual, el borde del input se vuelve de color rojo y el formulario no es valido
        if (1900 >= num || num >= anioActual) {
            colorearBorde(valorIngresado);
            formValido = false;
        }
    }

    // Almaceno el valor del input "txtCalificacion" y parseo su valor a int
    valorIngresado = document.getElementById("txtCalificacion");
    
    // Si el campo es vacio o nulo, el borde del input se vuelve de color rojo y el formulario no es valido
    if (valorIngresado.value == "" || isNaN(valorIngresado.value)) {
        colorearBorde(valorIngresado);
        formValido = false;
    }else{
        var puntaje = parseInt(valorIngresado.value);
        
        // Si el puntaje ingresado es menor a 1 o mayor a 10
        if (puntaje < 1 || puntaje > 10){
            colorearBorde(valorIngresado);
            formValido = false;
        }
    }

    // Almaceno el valor del input "txtOpinion"
    valorIngresado = document.getElementById("txtOpinion");
    
    // Si el campo es vacio o nulo, el borde del input se vuelve de color rojo y el formulario no es valido
    if (valorIngresado.value == "") {
        colorearBorde(valorIngresado);
        formValido = false;
    }
    
    return formValido;
}

function organizarFormulario(){
    // Declaracion e inicializacion de variables
    var formularioValido, stringDatosPelicula, puntos, calificacion;
    formularioValido = verificarFormulario(); // Verifico y almaceno el valor true/false si el formulario es valido o no
    calificacion = document.getElementById("txtCalificacion");
    
    // Armo un string con los valores de la pelicula
    stringDatosPelicula = "Pelicula: " + document.getElementById("txtPelicula").value +
                        "  " + document.getElementById("txtAnio").value +
                        "<br/>Director: " + document.getElementById("txtDirector").value +
                        "<br/>Calificacion: " + calificacion.value+
                        "<br/>Opinion: " + document.getElementById("txtOpinion").value + "<hr/>";

    // Si el formulario es valido, parseo a int el valor de calificacion
    if (formularioValido) {
        puntos = parseInt(calificacion.value);
        
        // Organizo los valores en su grupo correspondiente
        if (puntos >= 1 && puntos <=3) {
                // 1 a 3 inclusive: Pelicula Mala. 
                divGuardar = document.getElementById("PMalas");
            }else if (puntos >= 4 && puntos <= 6 ) {
                // 4 a 6 inclusive: Pelicula Regular
                divGuardar = document.getElementById("PRegulares");
            }else if (puntos >= 7 || puntos <=10) {
                // 7 a 10 inclusive: Pelicular Buena
                divGuardar = document.getElementById("PBuenas");
            }
            // Registro los valores
            divGuardar.innerHTML+=stringDatosPelicula+"\r\n";
            
            // Vacio los inputs
            vaciarCampos();
            
            // Reseteo el color de los bordes
            resetearColorBordes();
        }
    }