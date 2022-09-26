/**
 * Fills dynamically the form list.
 */
function optionsLanguage() {
    for (let i = 0; i < data.length; i++) {
        $("#options").append($("<option></option>")
            .val(data[i].id)
            .text(data[i].description));
    }
}

$(document).ready(function () {
    optionsLanguage();
});
