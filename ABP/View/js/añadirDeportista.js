
function mostrar(id) {
    if (id == "tdu") {
        $("#textarea").hide();
        $("#comentarioLabel").hide();
        $("#anadirlabel").value=" Añadir TDU";
        tdu();
    }

    if (id == "pef") {
        $("#textarea").show();
        $("#comentarioLabel").show();
        $("#anadirlabel").value=" Añadir PEF";
        pef();
    }
    window.location = "./view/usuario/deportistas/deportistaADD?tipoDeportista=" + tipoDeportista;
}

function iniciar(){
    window.location = "./view/usuario/deportistas/deportistaADD?tipoDeportista=" + tipoDeportista;
}

function pef(){
    tipoDeportista="PEF";
}

function tdu(){
    tipoDeportista="TDU";
}