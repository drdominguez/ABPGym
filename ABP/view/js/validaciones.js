/*CÓDIGO VALIDACIONES FORMULARIOS*/
// JavaScript Document
/*Creado el 22 de noviembre del 2017 por drdominguez*/
/*Contiene funciones javascript necesarias para validar los campos del formulario*/
/*Variable inicial que permite controlar la ventana alert*/
var avisado = false;
/*Defino un array atributo con los diferentes campos para que cambien de idioma*/
var atributo = new Array();
atributo['contenido'] = i18nMessages['contenido'];
atributo['Asunto'] = i18nMessages['Asunto'];
atributo['nombre'] = i18nMessages['nombre'];
atributo['precio'] = i18nMessages['precio'];
atributo['dni'] = i18nMessages['dni'];
atributo['contraseña'] = i18nMessages['contraseña'];

/*Comprueba que el campo no contenga null ni cero*/
function comprobarVacio(campo) {
    /*Si el campo esta vacio, no se ha escrito ningún caracter o solo se han escrito espacios en blanco salta alerta*/
    if ((campo.value == null) || (campo.value.length == 0) || /^\s*$/.test(campo.value)) {
        /*Para controlar bucle infinito del onblur*/
        if (!avisado) {
            alert(i18nMessages['El atributo '] + atributo[campo.name] + i18nMessages[' no puede ser vacío']);
            avisado = true;
            setTimeout('avisado=false', 50);
            campo.focus();
            return false;
        }
    } else { /*si no está vacio*/
        return true;
    }
}

/*Comprueba que el texto tenga el tamaño indicado*/
function comprobarTexto(campo, size) {
    /*si el tamaño sobrepasa el tamaño maximo salta alerta*/
    if (campo.value.length > size) {
        /*Para controlar bucle infinito del onblur*/
        if (!avisado) {
            alert(i18nMessages['Longitud incorrecta. El atributo '] + atributo[campo.name] + i18nMessages[' debe tener una longitud máxima de '] + size + i18nMessages[' y tiene '] + campo.value.length);
            avisado = true;
            /*Esta función controla que la ventana de alerta no se quede en bucle infinito*/
            setTimeout('avisado=false', 50);
            campo.focus();
            return false;
        }
    }
    return true;
}
/*Comprueba que el email sigue el formato correcto*/
function comprobarEmail(campo) {
    /*comprobacion permite validar que la estructura del email es correcta*/
    var comprobacion = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    /*si no cumple el formato correcto salta la alerta*/
    if (comprobacion.test(campo.value) == false) {
        /*Para controlar bucle infinito del onblur*/
        if (!avisado) {
            alert(i18nMessages['El atributo no sigue el formato correcto. Pruebe example@example.com']);
            avisado = true;
            setTimeout('avisado=false', 50);
            campo.focus();
            return false;
        }
    }
    return true;
}

function comprobarEmail(campo) {
    /*comprobacion permite validar que la estructura del email es correcta*/
    var comprobacion = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    /*si no cumple el formato correcto salta la alerta*/
    if (comprobacion.test(campo.value) == false) {
        /*Para controlar bucle infinito del onblur*/
        if (!avisado) {
            alert(i18nMessages['El atributo no sigue el formato correcto. Pruebe example@example.com']);
            avisado = true;
            setTimeout('avisado=false', 50);
            campo.focus();
            return false;
        }
    }
    return true;
}

function comprobarVideo(campo) {
    var stringYoutube = "https://www.youtube.com/embed/";
    var video = campo.value.substr(0,30);
        if (video != stringYoutube) {
            alert(i18nMessages['El video no sigue el formato correcto. Tiene que tener el siguiente formato https://www.youtube.com/embed/(id del video)']);
            campo.focus();
            return false;
        }
    return true;
}

/*Comprueba que el campo contenga todo caracteres alfabéticos*/
function comprobarAlfabetico(campo, size) {
    /*variable "abc" para la expresion regular que va a validar que un campo solo contenga caracteres alfabéticos*/
    /* la "i" es ignore case (ignora mayúsculas y minúsculas)*/
    /*Comprueba también las tildes y si hay un espacio entre dos nombres*/
    /*Como permite espacio le obligo a que el primer carácter sea alfabético para que no se introduzca ningún campo en blanco*/
    var abc = /^[a-záéíóú]{1}[a-záéíóú ]*$/i;
    /*si no cumple el formato o sobrepasa el tamaño maximo salta la alerta*/
    if (abc.test(campo.value) == false && campo.value.length <= size) {
        /*Para controlar bucle infinito del onblur*/
        if (!avisado) {
            alert(i18nMessages['El atributo '] + atributo[campo.name] + i18nMessages[' contiene caracteres no alfabéticos']);
            avisado = true;
            setTimeout('avisado=false', 50);
            campo.focus();
        }
    } else {
        return true;
    }
}
/*Comprueba que el numero se encuentra entre el rango indicado*/
function comprobarEntero(campo, valormenor, valormayor) {
    /* Guardo el numero entero*/
    var entero = parseInt(campo);
    /*  Guardo el numero menor*/
    var entero = parseInt(valormenor);
    /*  Guardo el numero mayor*/
    var entero = parseInt(valormayor);
    /*Si el campo es menor que el valormenor o mayor que el valormayor*/
    if (entero < menor || entero > mayor) {
        /*Para controlar bucle infinito del onblur*/
        if (!avisado) {
            alert(i18nMessages['El atributo '] + atributo[campo.name] + i18nMessages[' no esta comprendido en ['] + valormenor + '-' + valormayor + ']');
            avisado = true;
            setTimeout('avisado=false', 50);
            campo.focus();
            return false;
        }
    }
    return true;
}
/*Compruebo que el número sea real, teniendo en cuenta q la parte entera y la parte decimal se pueden separar tanto con "." como con ","*/
function comprobarReal(campo, numDecim, valormenor, valormayor) {
    /*Convierto la coma a punto y almaceno el valor en una variable punto*/
    var punto = campo.value.replace(',', '.');
    /*Casteo y almaceno la variable en formato float en otra variable llamada num*/
    var num = parseFloat(punto);
    /*Si el real es menor que valormenor o mayor que valormayor*/
    if (num < valormenor || num > valormayor) {
        /*Para controlar bucle infinito del onblur*/
        if (!avisado) {
            alert(i18nMessages['El atributo '] + atributo[campo.name] + i18nMessages[' no esta comprendido en ['] + valormenor + '-' + valormayor + ']');
            avisado = true;
            setTimeout('avisado=false', 50);
            campo.focus();
            return false;
        }
    } else {
        /*Defino una nueva subcadena que parte desde la parte decimal hasta el final*/
        var decimal = punto.substr(punto.indexOf('.') + 1, punto.length);
    }
    if (numDecim > decimal.length) { /*compruebo que no sobrepasa los decimales maximos*/
        /*Para controlar bucle infinito del onblur*/
        if (!avisado) {
            alert(i18nMessages['El atributo '] + atributo[campo.name] + i18nMessages[' no puede tener mas de '] + numDecim + i18nMessages['decimales']);
            avisado = true;
            setTimeout('avisado=false', 50);
            campo.focus();
            return false;
        }
    }
    return true;
}
/*Comprueba que el formato del DNI sea válido y que su letra se corresponda con su número*/
function comprobarDni(campo) {
    /*variable "dni" define un patrón para la estructura de un DNI*/
    /*Compruebo que el formato sea válido*/
    var dni = /^[0-9]{8}[a-z]$/i;
    /*compruebo que el dni tiene el formato correcto*/
    if (dni.test(campo.value) == false) {
        /*Para controlar bucle infinito del onblur*/
        if (!avisado) {
            alert(i18nMessages['El atributo '] + atributo[campo.name] + i18nMessages[' no tiene 8 números seguidos de una letra: FORMATO INCORRECTO!!!']);
            avisado = true;
            setTimeout('avisado=false', 50);
            campo.focus();
            return false;
        }
    } else { /*si no compruebo que la letra sea la correcta*/
        /* Guardo un array de las posibles letras del DNI*/
        var letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
        /* variable que almacena el resto de la división entera*/
        var numeros = parseInt(campo.value.substr(0, 8));
        /*variable para almacenar la letra del dni*/
        var letra = campo.value.substr(8, 9);
        /*variable que almacena el indice de la letra para comprobar su posión en el array*/
        var numLetra = numeros % 23;
        /*variable que almacena la letra que debería tener el dni*/
        var letraDni = letras[numLetra];
        /*Compruebo que las letras coincidan*/
        if (letraDni !== letra.toUpperCase(letra)) {
            /*Para controlar bucle infinito del onblur*/
            if (!avisado) {
                alert(i18nMessages['La letra del DNI no es correcta']);
                avisado = true;
                setTimeout('avisado=false', 50);
                campo.focus();
                return false;
            }
        } else {
            return true;
        }
    }
}
/*Comprueba que el telefono tenga un formato nacional o internacional*/
function comprobarTelf(campo) {
    /*La variable telef permite comprobar que el teléfono es nacional si es 34 o +34 y si es internacional con 0034*/
    var telef = /^(\+34|0034|34)?[\s|\-|\.]?[6|7|9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}$/;
    /*compruebo que el telefono sea correcto*/
    if (!telef.test(campo.value)) {
        /*Para controlar bucle infinito del onblur*/
        if (!avisado) {
            alert(i18nMessages['El atributo '] + atributo[campo.name] + i18nMessages[' no tiene un formato válido de telefeno.']);
            avisado = true;
            setTimeout('avisado=false', 50);
            campo.focus();
            return false;
        }
    } else {
        return true;
    }
}
/*Comprueba que no se escriben caracteres que no sean dígitos*/
function comprobarSolonum(campo) {
    /*solonum permite comprobar que solo existan dígitos en el campo*/
    var solonum = /^([0-9])*$/;
    /*compruebo que solo existan numeros en el campo*/
    if (!solonum.test(campo.value)) {
        /*Para controlar bucle infinito del onblur*/
        if (!avisado) {
            alert(i18nMessages['El atributo '] + atributo[campo.name] + i18nMessages[' debe estar compuesto únicamente por digitos.']);
            avisado = true;
            setTimeout('avisado=false', 50);
            campo.focus();
            return false;
        }
    } else {
        return true;
    }
}

    function radioValidation(radio){

        var radioValue = false;

        for(var i=0; i<radio.length;i++){
            if(radio[i].checked == true){
                radioValue = true;    
            }
        }

        if(!radioValue){
            alert(i18nMessages['Debe seleccionar al menos un deportista']);
            setTimeout('radioValue=false', 50);
            radio.focus();
            return false;
        }
        return true;

    }


function checkboxValidation()
{
    if($('input:checkbox').is(':checked')){
        return true;
    }else{
        alert(i18nMessages['Debe seleccionar al menos un deportista.']);
        return false;
    }
}

function validarDatePicker(campo){
    if(campo.value() == "") {
        alert("no date selected");
          return false;
    }
}

function habilitarAsignar(){

    document.getElementById("btnAsignar").disabled = false;
}

function validarPersonalizadaADD(Formu) {
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 50))
}

function validarEstandarADD(Formu) {
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 50))
}

function validarTablaEDIT(Formu) {
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 50))
}

function validarNotificacionADD(Formu) {
    return (comprobarVacio(Form.Asunto) && comprobarTexto(Form.Asunto, 15) && comprobarVacio(Form.contenido) && checkboxValidation())
}

function validarRecursoADD(Formu) {
    return (comprobarVacio(Form.nombreRecurso) && comprobarTexto(Form.nombreRecurso, 50))
}

function validarRecursoEDIT(Formu) {
    return (comprobarVacio(Form.nombreRecurso) && comprobarTexto(Form.nombreRecurso, 50))
}

function validarCardioADD(Formu) {
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 50))
}

function validarEstiramientoADD(Formu) {
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 50))
}

function validarMuscularADD(Formu) {
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 50))
}

function validarCardioEDIT(Formu){
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 50))
}

function validarEstiramientoEDIT(Formu){
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 50))
}

function validarMuscularEDIT(Formu){
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 50))
}

function validarIndividualADD(Formu) {
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 50) && comprobarVacio(Form.precio) && comprobarReal(Form.precio, 2, 0, 1000000) && comprobarVacio(Form.dia) && comprobarTexto(Form.dia,25) && comprobarVacio(Form.hora) && comprobarTexto(Form.hora, 25))
}

function validarGrupoADD(Formu) {
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 50) && comprobarVacio(Form.precio) && comprobarReal(Form.precio, 2, 0, 1000000) && comprobarVacio(Form.dia) && comprobarTexto(Form.dia,25) && comprobarVacio(Form.hora) && comprobarTexto(Form.hora, 25))
}

function validarActividadEDIT(Formu) {
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 50) && comprobarVacio(Form.precio) && comprobarReal(Form.precio, 2, 0, 1000000) && comprobarVacio(Form.dia) && comprobarTexto(Form.dia,25) && comprobarVacio(Form.hora) && comprobarTexto(Form.hora, 25))
}






function validarLogin(Formu) {
    return (comprobarVacio(Form.dni) && comprobarDni(Form.dni) && comprobarVacio(Form.contraseña))
}


function validarGrupoADD(Formu) {
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 30) && comprobarVacio(Form.precio) && comprobarReal(Form.precio, 2, 0, 1000000) && comprobarVacio(Form.instalaciones) && comprobarTexto(Form.instalaciones, 1000000000000) && comprobarVacio(Form.plazas) && comprobarEntero(Form.plazas, 0, 255))
}

function validarActividadEdit(Formu) {
    return (comprobarVacio(Form.nombre) && comprobarTexto(Form.nombre, 30) && comprobarVacio(Form.precio) && comprobarReal(Form.precio, 2, 0, 1000000) && comprobarSolonum(Form.precio) && comprobarVacio(Form.instalaciones) && comprobarTexto(Form.instalaciones, 1000000000000) && comprobarVacio(Form.plazas) && comprobarEntero(Form.plazas, 0, 255))
}

function validarLogin(Formu) {
    return (comprobarVacio(Form.nombre)  && comprobarDni(Form.nombre) && comprobarVacio(Form.contraseña))
}

/*Funcion para encriptar la contraseña*/
function encriptar() {
    if ((document.getElementById('password').value == null) || (document.getElementById('password').value.length == 0) || /^\s*$/.test(document.getElementById('password').value)) { /*si no hay contraseña no hace nada*/
        return false;
    } else { /*si no encripta*/
        document.getElementById('password').value = hex_md5(document.getElementById('password').value);
        return true;
    }
}
