// A $( document ).ready() block.
$(document).ready(function() {
    // Cuando alguien toque el boton ejecuta la funcion crudData()


});

// Funcion Ajax de interaccion con la base de datos 
function crudData() {
    var operacion = $(this).attr("data-valor");
    var nombre = $('#nombreRegistro').val();
    var valor = $('#valor').val();
    var id_a = $("#idActualizaRegistro").val();
    var id_b = $("#idBorraRegistro").val();

    var datos = {
        'operacion': operacion,
        'nombre': nombre,
        'valor': valor,
        'id_a': id_a,
        'id_b': id_b
    }

    $.ajax({
        async: false, // Espera la respuesta y puede guardala en un valor temporal
        url: "http://tecsupb.enarequipa.org/respuesta/crud.php",
        type: "GET",
        data: datos,
        // código a ejecutar sin importar si la petición falló
        success: function(response) {
            //alert("Se realizo la interaccion de forma correcta");
            $("#respuesta").html(response);
        },
        // código a ejecutar sin importar si la petición falló
        error: function(xhr, status) {
            alert('Disculpe, existió un problema en la conexion, reintentelo más tarde');
        }
    });
}


// Cuando se dan cambios
$(document).on("change", "#valor", function() {
    // Recoge el valor del input range 
    var valor = $("#valor").val();
    // Escribe el valor dentro de la etiqueta con el nombre name="muestraValor"
    $('[name="muestraValor"]').text(valor);
})

$(document).on("click", ".botontop", crudData);