
function mostrar(id) {
    if (id == "TDU") {
        $("#textarea").hide();
        $("#comentarioLabel").hide();
        $("#anadirlabel").value="TDU";
    }

    if (id == "PEF") {
        $("#textarea").show();
        $("#comentarioLabel").show();
        $("#anadirlabel").value="PEF";
    }
}