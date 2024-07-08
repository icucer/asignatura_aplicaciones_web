// Validacion con JavaScript

function validarFormularioJS() {
    let campos = document.querySelectorAll("#formularioJS input");
    let camposInvalidos = [];
    const nombreCompleto = "Ion Cucer";

    campos.forEach(function(campo) {
        let valor = campo.value.trim();
        if (valor === "") {
            camposInvalidos.push(campo.name);
        }
    });

    if (camposInvalidos.length > 0) {
        alert("Los siguientes campos no pueden estar vacíos o contener solo espacios en blanco: "
            + camposInvalidos.join(', ') +"\n" + nombreCompleto);
        return false;
    } else {
        alert("Todo esta ok! Formulario procesado \n" + nombreCompleto);
        return true;
    }
}

function cancelarFormulario(formId) {
    const nombreCompleto = "Ion Cucer";
    document.getElementById(formId).reset();
    alert("El formulario ha sido cancelado \n" + nombreCompleto);
}

// Validacion con jQuery

function validarFormularioJQuery() {
    let camposInvalidos = [];
    const nombreCompleto = "Ion Cucer";

    // Iterar sobre cada campo de entrada en el formulario
    $("#formularioProductos input, #formularioProductos textarea").each(function() {
        let valor = $(this).val().trim();
        if (valor === "") {
            camposInvalidos.push($(this).attr('name'));
        }
    });

    // Si hay campos inválidos, mostrar alerta y retornar false para evitar el envío del formulario
    if (camposInvalidos.length > 0) {
        alert("Los siguientes campos no pueden estar vacíos:\n" + camposInvalidos.join(', ') + "\n\n" + nombreCompleto);
        return false;
    } else {
        alert("Todo está OK! Formulario procesado\n" + nombreCompleto);
        return true;
    }
}

function cancelarFormularioJQuery(formId) {
    const nombreCompleto = "Ion Cucer";
    $("#" + formId)[0].reset();
    alert("El formulario ha sido cancelado \n" + nombreCompleto);
}