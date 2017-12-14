function mostrar(id) {
    if (id == "tdu") {
        $("#textarea").hide();
        $("#comentarioLabel").hide();
        $("#anadirlabel").value=" Añadir TDU";
    }

    if (id == "pef") {
        $("#textarea").show();
        $("#comentarioLabel").show();
        $("#anadirlabel").value=" Añadir PEF";
    }
}
