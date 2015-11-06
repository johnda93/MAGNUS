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

    if (Cookies.get("eliminar_asignatura") === "true") {
        Cookies.remove("eliminar_asignatura");
        Materialize.toast("Asignatura eliminada correctamente", 60000, "rounded toast_exito");
    } else if (Cookies.get("eliminar_asignatura") === "false") {
        Cookies.remove("eliminar_asignatura");
        Materialize.toast("La asignatura a eliminar no existe", 60000, "rounded toast_error");
    };
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

$('#conf-guardar-asig, #conf-crear-grupo-asig').on('click', function () {
    $form = $('#div-principal-crear-asig').find('form');
    $boton_id = $(this).attr('id');

    $form.submit(function (event) {
        $.ajax({
            url     : 'crear_asignatura.php?option=crear',
            method  : 'post',
            data    : $form.serialize(),
            success : function (result) {
                $mensaje = JSON.parse(result);

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
                    if ($boton_id === "conf-guardar-asig") {
                        Cookies.set("crear_asignatura", "true");
                        window.location.replace("index_asignatura.php");
                    } else if ($boton_id === "conf-crear-grupo-asig"){
                        mostrar_crear_grupo("crear");
                    }
                    
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

//----------------------------------Crear Grupo----------------------------------

function mostrar_crear_grupo (div_crear_editar) {
    $('.input-' + div_crear_editar + '-asig').attr('readonly', true);
    $('.botones-inferiores').hide();

    $.get("templates/crear_grupo.tpl", function (result) {
        $('#div-crear-grupo').html(result);

        $.ajax({
            url     : 'crear_grupo.php?option=listar_profesores',
            type    : 'post',
            success : function (result) {
                $profesores = JSON.parse(result);

                $nombre_asignatura = $('#div-principal-' + div_crear_editar + '-asig #nombre').val();
                $id_asignatura = $('#div-principal-' + div_crear_editar + '-asig #id').val();
                $id_grupo = $id_asignatura + '-1';

                $('#div-crear-grupo #id').val($id_grupo);
                $('#div-crear-grupo #asignatura').val($id_asignatura);

                $('#div-crear-grupo div:first h5:first').html("Crear grupo para " + $nombre_asignatura);

                $lista_desplegable_1 = '<option value="" disabled selected></option>'

                $.each($profesores, function (index, element) {
                    $lista_desplegable_1 += '<option value="' + element.id + '">' + element.nombre + ' - ' + element.escuela + '</option>';
                });

                $('#lista_desplegable_profesor_1').html($lista_desplegable_1);

                $lista_desplegable_2 = '<option value="" disabled selected></option>'

                $.each($profesores, function (index, element) {
                    $lista_desplegable_2 += '<option value="' + element.id + '">' + element.nombre + ' - ' + element.escuela + '</option>';
                });

                $('#lista_desplegable_profesor_2').html($lista_desplegable_2);

                $('select').material_select();

                $('.boton-crear-grupo').leanModal({
                    dismissible: false
                }); // Activar modales para Crear Grupo
            }
        }); 
    });
}

$('#div-crear-grupo').on('click', '.bloque-horario', function (e) {
    if (!$(this).hasClass('bloque-activo')) {
        $(this).addClass('bloque-activo');
    } else {
        $(this).removeClass('bloque-activo');
    }
});

$('#div-crear-grupo').on('click', '#conf-guardar-grupo-asig', function (e) {

    $horario = [];

    $('.bloque-activo').each(function (index, element) {

        $hora = $(element).parent().parent().find('td:first').text();
        $numero_dia = $(element).parent().index();

        switch($numero_dia) {
            case 1: $dia = "Lunes"; break;
            case 2: $dia = "Martes"; break;
            case 3: $dia = "Miercoles"; break;
            case 4: $dia = "Jueves"; break;
            case 5: $dia = "Viernes"; break;
            case 6: $dia = "Sabado"; break;
            case 7: $dia = "Domingo"; break;
        }

        $horario.push({dia : $dia, hora : $hora});
    });

    $('#div-crear-grupo #profesor1').val($('#lista_desplegable_profesor_1').val());
    $('#div-crear-grupo #profesor2').val($('#lista_desplegable_profesor_2').val());
    $('#div-principal-crear-asig #horario').val(JSON.stringify($horario));
    
    $form = $('#div-crear-grupo').find('form');
        
    $form.submit(function (event) {
        $.ajax({
            url     : 'crear_grupo.php?option=crear',
            method  : 'post',
            data    : $form.serialize(),
            success : function (result) {
                $mensaje = JSON.parse(result);

                if (!$mensaje.profesor) {
                    $('.select-wrapper:first input').addClass('validate invalid');

                    Materialize.toast('Seleccione un Profesor 1', 10000, 'rounded toast_error');
                }

                if (!$mensaje.horario) {
                    Materialize.toast('Seleccione por lo menos dos bloques en el horario', 10000, 'rounded toast_error');
                }

                if (!$mensaje.profesor || !$mensaje.horario) {
                    $offset = $('#div-crear-grupo').offset();
                    window.scrollTo(0, $offset.top - 20);
                }

                if ($mensaje.profesor && $mensaje.horario) {
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

$('#div-crear-grupo').on('click', '#conf-cancelar-grupo-asig', function (e) {
    Cookies.set("crear_asignatura", "true");
    window.location.replace("index_asignatura.php");
});

//-------------------------------------------------------------------------------

//------------------------------Eliminar Asignatura------------------------------

$('.boton-eliminar-asig').on('click', function (e) {
    $boton_eliminar = $(this);

    $('#modal-eliminar-asig').on('click', '#conf-eliminar-asig', function (e) {
        $form = $boton_eliminar.find('form');
        $form.submit(function (event) {
            $form.ajaxSubmit(
                {
                    url     : 'eliminar_asignatura.php',
                    type    : 'post',
                    data    : $form.serialize(),
                    success : function (result) {
                        $mensaje = JSON.parse(result);

        

                        if ($mensaje.exito) {
                            Cookies.set("eliminar_asignatura", "true");
                        } else if (!$mensaje.exito){
                            Cookies.set("eliminar_asignatura", "false");
                        }

                        window.location.replace("index_asignatura.php");
                    }
                }
            );

            event.preventDefault();
        });

        $form.trigger('submit');
    });
});


//-------------------------------------------------------------------------------