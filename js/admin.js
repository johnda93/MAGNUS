$(document).ready(function () {
    $('.boton-crear-asig').leanModal({
        dismissible: false
    }); //Activar modales para Crear Asignatura

	$('.boton-eliminar-asig').leanModal({
        dismissible: false
    }); //Activar modales para Eliminar Asignatura

	$mensaje = $('#msj-index-asig').val();

    if ($mensaje === "exito-crear-asig") {
        Materialize.toast("Asignatura creada correctamente", 60000, "rounded toast_exito");
    } else if ($mensaje === "exito-eliminar-asig") {
        Materialize.toast("Asignatura eliminada correctamente", 60000, "rounded toast_exito");
    } else if ($mensaje === "error-eliminar-asig") {
    	Materialize.toast("La asignatura a eliminar no existe", 60000, "rounded toast_error");
    }

    $mensaje = $('#msj-crear-asig').val();

    if ($mensaje === "error-crear-asig-id") {
        $id = $('#div-principal-crear-asig #id');
        $label_id = $('#div-principal-crear-asig label[for="id"]');
    
        $id.addClass('invalid');

        Materialize.toast("El código ya pertenece a otra asignatura", 60000, "rounded toast_error");
    } else if ($mensaje === "error-crear-asig-campos") {
        $id = $('#div-principal-crear-asig #id');
        $label_id = $('#div-principal-crear-asig label[for="id"]');
        $nombre = $('#div-principal-crear-asig #nombre');
        $label_nombre = $('#div-principal-crear-asig label[for="nombre"]');
        $escuela = $('#div-principal-crear-asig #escuela');
        $label_escuela = $('#div-principal-crear-asig label[for="escuela"]');

        if ($id.val().length === 0) {
            $id.addClass('invalid');
            $label_id.addClass('active');
            $label_id.attr('data-error', "Campo Obligatorio");
        }

        if ($nombre.val().length === 0) {
            $nombre.addClass('invalid');
            $label_nombre.addClass('active');
            $label_nombre.attr('data-error', "Campo Obligatorio");
        }

        if ($escuela.val().length === 0) {
            $escuela.addClass('invalid');
            $label_escuela.addClass('active');
            $label_escuela.attr('data-error', "Campo Obligatorio");
        }
    }
});

//--------------------------------Crear Asignatura-------------------------------

function verif_datos_crear_asig () {
    $id = $('#div-principal-crear-asig #id');
    $label_id = $('#div-principal-crear-asig label[for="id"]');
    $nombre = $('#div-principal-crear-asig #nombre');
    $label_nombre = $('#div-principal-crear-asig label[for="nombre"]');
    $escuela = $('#div-principal-crear-asig #escuela');
    $label_escuela = $('#div-principal-crear-asig label[for="escuela"]');
    $correcto = [true, true];

    if ($id.val().length === 0) {
        $id.addClass('invalid');
        $label_id.addClass('active');
        $label_id.attr('data-error', "Campo Obligatorio");
        $correcto[0] = false;
    } else {
        $asignaturas = JSON.parse($('#div-principal-crear-asig .datos-ocultos:first').text());

        $.each($asignaturas, function (index, element) {
            if (element.id === $id.val()) {
                $id.addClass('invalid');
                $label_id.addClass('active');
                $label_id.attr('data-error', "Código ya asignado");
                $correcto[1] = false;
            };
        });
    }

    if ($nombre.val().length === 0) {
        $nombre.addClass('invalid');
        $label_nombre.addClass('active');
        $label_nombre.attr('data-error', "Campo Obligatorio");
        $correcto[0] = false;
    }

    if ($escuela.val().length === 0) {
        $escuela.addClass('invalid');
        $label_escuela.addClass('active');
        $label_escuela.attr('data-error', "Campo Obligatorio");
        $correcto[0] = false;
    }

    return $correcto;
};

function modales_verif_datos_crear_asig () {
    $correcto = verif_datos_crear_asig();
    
    if ($correcto[0] && $correcto[1]) {
        $form = $('#div-principal-crear-asig').find('form:first');
        $form.submit();
    } else {
        if (!$correcto[0]) {
            Materialize.toast('Hay campos obligatorios sin diligenciar', 10000, 'rounded toast_error');  
        };
        
        if (!$correcto[1]) {
            Materialize.toast("El código ya pertenece a otra asignatura", 10000, "rounded toast_error");
        };
    }
}

$('#conf-guardar-asig').on('click',function () {
    $correcto = verif_datos_crear_asig();
    
    if ($correcto[0] && $correcto[1]) {
        $form = $('#div-principal-crear-asig').find('form:first');
        $form.submit();
    } else {
        if (!$correcto[0]) {
            Materialize.toast('Hay campos obligatorios sin diligenciar', 10000, 'rounded toast_error');  
        };
        
        if (!$correcto[1]) {
            Materialize.toast("El código ya pertenece a otra asignatura", 10000, "rounded toast_error");
        };
    }
});

//-------------------------------------------------------------------------------

//------------------------------Eliminar Asignatura------------------------------

$('.boton-eliminar-asig').on('click', function (e) {
	$boton_eliminar = $(this);

    $('#modal-eliminar-asig').on('click', '#conf-eliminar-asig', function (e) {
        $boton_eliminar.find('form').submit();
    });
});

//-------------------------------------------------------------------------------