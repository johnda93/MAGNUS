$(document).ready(function () {
    $('.boton-crear-asig').leanModal({
        dismissible: false
    }); //Activar modales para Crear Asignatura

    $('.boton-eliminar-asig').leanModal({
        dismissible: false
    }); //Activar modales para Eliminar Asignatura

    if (Cookies.get("crear_asignatura") === "true") {
        Cookies.remove("crear_asignatura");
        Materialize.toast("Asignatura creada correctamente", 60000, "rounded toast_exito");
    }


});

function validar_campo_vacio (campo) {
    $id_campo = campo.attr('id');
    $label = campo.parent().parent().parent().find('label[for="' + $id_campo + '"]');

    if (campo.val().length === 0) {
        campo.addClass('invalid');
        $label.addClass('active');
        $label.attr('data-error', "Campo Obligatorio");
    } else {
        if (campo.hasClass('invalid')) {
            campo.removeClass('invalid');
        }
    }
}

function validar_campo_numerico (campo) {
    $id_campo = campo.attr('id');
    $label = campo.parent().parent().parent().find('label[for="' + $id_campo + '"]');

    if (!$.isNumeric(campo.val())) {
        campo.addClass('invalid');
        $label.addClass('active');
        $label.attr('data-error', "Campo Numérico");
    } else {
        if (campo.hasClass('invalid')) {
            campo.removeClass('invalid');
        }
    }
}


//--------------------------------Crear Asignatura-------------------------------

$('.input-crear-asig').on('blur change keyup', function () {
    validar_campo_vacio($(this));
});

$('#div-principal-crear-asig #id, #div-principal-crear-asig #creditos').on('blur change paste keyup', function () {
    $form = $('#div-principal-crear-asig').find('form');

    $form.submit(function (event) {
        $.ajax({
            url     : 'crear_asignatura.php?option=validar_id_creditos',
            type    : 'post',
            data    : $form.serialize(),
            success : function (result) {
                $mensaje = JSON.parse(result);

                $id = $('#div-principal-crear-asig #id');
                $label_id = $('#div-principal-crear-asig label[for="id"]');

                $creditos = $('#div-principal-crear-asig #creditos');
                $label_creditos = $('#div-principal-crear-asig label[for="creditos"]');

                if (!$mensaje.id1) {
                    $id.addClass('invalid');
                    $label_id.addClass('active');
                    $label_id.attr('data-error', "Código ya asignado");
                } else if (!$mensaje.id3) {
                    $id.addClass('invalid');
                    $label_id.addClass('active');
                    $label_id.attr('data-error', "Campo Numérico");
                }

                if (!$mensaje.creditos2) {
                    $creditos.addClass('invalid');
                    $label_creditos.addClass('active');
                    $label_creditos.attr('data-error', "Campo Numérico");
                }
            }
        });

        event.preventDefault();
        event.stopImmediatePropagation();
    });

    $form.trigger('submit');
    $form.off('submit');
});

$('#conf-guardar-asig').on('click', function () {
    $form = $('#div-principal-crear-asig').find('form');

    $form.submit(function (event) {
        $.ajax({
            url     : 'crear_asignatura.php?option=crear',
            method  : 'post',
            data    : $form.serialize(),
            success : function (result) {
                $mensaje = JSON.parse(result);

                console.log($mensaje);

                $id = $('#div-principal-crear-asig #id');
                $label_id = $('#div-principal-crear-asig label[for="id"]');

                if (!$mensaje.id1) {
                    $id.addClass('invalid');
                    $label_id.addClass('active');
                    $label_id.attr('data-error', "Código ya asignado");

                    Materialize.toast("El código ya pertenece a otra asignatura", 10000, "rounded toast_error");
                }

                if (!$mensaje.id3) {
                    validar_campo_numerico($('#div-principal-crear-asig #id'));

                    Materialize.toast('El código debe ser numérico', 10000, 'rounded toast_error');
                }

                if (!$mensaje.creditos2) {
                    validar_campo_numerico($('#div-principal-crear-asig #creditos'));

                    Materialize.toast('Los créditos deben ser numéricos', 10000, 'rounded toast_error');
                }

                if (!$mensaje.id2 || !$mensaje.nombre || !$mensaje.escuela || !$mensaje.creditos1) {
                    if (!$mensaje.id2) {
                        validar_campo_vacio($('#div-principal-crear-asig #id'));
                    }

                    if (!$mensaje.creditos1) {
                        validar_campo_vacio($('#div-principal-crear-asig #creditos'));
                    } 

                    validar_campo_vacio($('#div-principal-crear-asig #nombre'));
                    validar_campo_vacio($('#div-principal-crear-asig #escuela'));

                    Materialize.toast('Hay campos obligatorios sin diligenciar', 10000, 'rounded toast_error');
                }

                if ($mensaje.id1 && $mensaje.id2 && $mensaje.id3 && $mensaje.nombre && $mensaje.escuela && $mensaje.creditos1 && $mensaje.creditos2) {
                    Cookies.set("crear_asignatura", "true");
                    window.location.replace("index_asignatura.php");
                }
            }    
        });
    
        event.preventDefault();
        event.stopImmediatePropagation();
    });

    $form.trigger('submit');
    $form.off('submit');
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