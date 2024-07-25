// Validacion con JavaScript

function validarFormularioJS() {
    let campos = document.querySelectorAll("#formularioJS input");
    let camposInvalidos = [];
    const nombreCompleto = "Ion Cucer";

    campos.forEach(function(campo) {
        if (campo.name === "categoriaID") {
            // Omite la validación para el campo categoriaID
            return;
        }
        let valor = campo.value.trim();
        if (valor === "") {
            camposInvalidos.push(campo.name);
        }
    });

    if (camposInvalidos.length > 0) {
        alert("Los siguientes campos no pueden estar vacíos o contener solo espacios en blanco: "
            + camposInvalidos.join(', ') + "\n" + nombreCompleto);
        return false;
    } else {
        alert("Todo está ok! Formulario procesado \n" + nombreCompleto);
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

    // Iterar sobre cada campo de entrada en el formulario, excepto el campo 'productoID'
    $("#formularioProductos input, #formularioProductos textarea").each(function() {
        // Ignorar el campo 'productoID'
        if ($(this).attr('id') === 'productoID') {
            return true; // Continuar al siguiente elemento en el bucle
        }
        
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