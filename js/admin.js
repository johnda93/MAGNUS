$(document).ready(function () {
	$('.boton-eliminar-asig').leanModal({
        dismissible: false
    }); //Activar modales para Eliminar Asignatura

	$mensaje = $('#msj-index-asig').val();

    if  ($mensaje === "exito-eliminar-asig") {
        Materialize.toast("Asignatura eliminada correctamente", 60000, "rounded toast_exito");
    } else if ($mensaje === "error-eliminar-asig") {
    	Materialize.toast("La asignatura a eliminar no existe", 60000, "rounded toast_error");
    }
});


//------------------------------Eliminar Asignatura------------------------------

$('.boton-eliminar-asig').on('click', function (e) {
	$boton_eliminar = $(this);

    $('#modal-eliminar-asig').on('click', '#conf-eliminar-asig', function (e) {
        $boton_eliminar.find('form').submit();
    });
});

//-------------------------------------------------------------------------------