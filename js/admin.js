$.ajaxSetup({ cache:false });

$(document).ready(function () {
    $('.boton-crear-asig').leanModal({
        dismissible: false
    }); //Activar modales para Crear Asignatura

    $('.boton-editar-asig').leanModal({
        dismissible: false
    }); //Activar modales para Editar Asignatura

    $('.boton-eliminar-asig').leanModal({
        dismissible: false
    }); //Activar modales para Eliminar Asignatura

    $('.boton-eliminar-grupo').leanModal({
        dismissible: false
    }); //Activar modales para Eliminar Asignatura

    $('.boton-crear-prof').leanModal({
        dismissible: false
    }); //Activar modales para Crear Profesor

    $('.boton-editar-prof').leanModal({
        dismissible: false
    }); //Activar modales para Editar Profesor

    $('.boton-eliminar-prof').leanModal({
        dismissible: false
    }); //Activar modales para Eliminar Profesor

    $permiso = $('#permiso-login').val();

    if ($permiso === "true") {
        Materialize.toast("No tiene permisos suficientes para acceder a esa página", 60000, "rounded toast_error");
    }

    //-----------------Uso de cookies para renderizar mensajes Toast luego de una redirección----------------------

    if (Cookies.get("crear_profesor") === "true") {
        Cookies.remove("crear_profesor");
        Materialize.toast("Profesor creado correctamente", 60000, "rounded toast_exito");
    }

    if (Cookies.get("editar_profesor") === "true") {
        Cookies.remove("editar_profesor");
        Materialize.toast("Profesor editado correctamente", 60000, "rounded toast_exito");
    }

    if (Cookies.get("eliminar_profesor") === "true") {
        Cookies.remove("eliminar_profesor");
        Materialize.toast("Profesor eliminado correctamente", 60000, "rounded toast_exito");
    } else if (Cookies.get("eliminar_profesor") === "false") {
        Cookies.remove("eliminar_profesor");
        Materialize.toast("El profesor a eliminar no existe", 60000, "rounded toast_error");
    }

    if (Cookies.get("crear_asignatura") === "true") {
        Cookies.remove("crear_asignatura");
        Materialize.toast("Asignatura creada correctamente", 60000, "rounded toast_exito");
    }

    if (Cookies.get("editar_asignatura") === "true") {
        Cookies.remove("editar_asignatura");
        Materialize.toast("Asignatura editada correctamente", 60000, "rounded toast_exito");
    }

    if (Cookies.get("eliminar_asignatura") === "true") {
        Cookies.remove("eliminar_asignatura");
        Materialize.toast("Asignatura eliminada correctamente", 60000, "rounded toast_exito");
    } else if (Cookies.get("eliminar_asignatura") === "false") {
        Cookies.remove("eliminar_asignatura");
        Materialize.toast("La asignatura a eliminar no existe", 60000, "rounded toast_error");
    };

    if (Cookies.get("crear_grupo") === "true") {
        Cookies.remove("crear_grupo");
        Materialize.toast("Grupo creado correctamente", 60000, "rounded toast_exito");
    }

    if (Cookies.get("eliminar_grupo") === "true") {
        Cookies.remove("eliminar_grupo");
        Materialize.toast("Grupo eliminado correctamente", 60000, "rounded toast_exito");
    } else if (Cookies.get("eliminar_grupo") === "false") {
        Cookies.remove("eliminar_grupo");
        Materialize.toast("El grupo a eliminar no existe", 60000, "rounded toast_error");
    };

    //-------------------------------------------------------------------------------------------------------------

});

function validar_campo (campo) {
    $id_campo = campo.attr('id');
    $label = campo.parent().parent().parent().find('label[for="' + $id_campo + '"]');

    if (campo.val().length === 0) {
        campo.addClass('invalid');
        $label.addClass('active');
        $label.attr('data-error', "Campo Obligatorio");
    } else if (!$.isNumeric(campo.val())){ 
        campo.addClass('invalid');
        $label.addClass('active');
        $label.attr('data-error', "Campo Numérico");
    } else {
        if (campo.hasClass('invalid')) {
            campo.removeClass('invalid');
        }
    }
}

//--------------------------------Login-------------------------------

function verif_datos_login () {

    $contraseña = $('#div-principal-login #contraseña');
    $label_contraseña = $('#div-principal-login label[for="contraseña"]');
    $nombre = $('#div-principal-login #nombre');
    $label_nombre = $('#div-principal-login label[for="nombre"]');
    $correcto = true;

     if ($nombre.val().length === 0) {
        $nombre.addClass('invalid');
        $label_nombre.addClass('active');
        $label_nombre.attr('data-error', "Campo Obligatorio");
        $correcto = false;
    }

    if ($contraseña.val().length === 0) {
        $contraseña.addClass('invalid');
        $label_contraseña.addClass('active');
        $label_contraseña.attr('data-error', "Campo Obligatorio");
        $correcto = false;
    }

    return $correcto;

}

$('#conf-login').on('click',function () {
    $correcto = verif_datos_login();
    
    if ($correcto) {
        $form = $('#div-principal-login').find('form');
        $form.submit(function(e){
            $.ajax(
                {
                    url: 'login.php',
                    type: 'post',
                    data: $form.serialize(),
                    success: function(result){
                        $mensaje = JSON.parse(result);
                        
                        if($mensaje.exito === "admin"){
                            window.location.replace("index_asignatura.php");
                        }else if ($mensaje.exito === "user"){
                            window.location.replace("login.php");
                        }else{
                            Materialize.toast("Nombre de usuario o contraseña no valido", 60000, "rounded toast_error");
                        }

                    }
                });
            e.preventDefault();
        });

        $form.trigger('submit');
    } else {
        Materialize.toast('Hay campos obligatorios sin diligenciar', 10000, 'rounded toast_error');  
    }
});


//------------------------------------------------------------------------------------------------------------

//-----------------------------------------------Crear Asignatura---------------------------------------------

$('.input-crear-asig').on('blur change keyup', function () {
    validar_campo($(this));
});

$('#div-principal-crear-asig #id, #div-principal-crear-asig #creditos').on('blur', function () {
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
                    validar_campo($('#div-principal-crear-asig #id'));

                    Materialize.toast('El código debe ser numérico', 10000, 'rounded toast_error');
                }

                if (!$mensaje.creditos2) {
                    validar_campo($('#div-principal-crear-asig #creditos'));

                    Materialize.toast('Los créditos deben ser numéricos', 10000, 'rounded toast_error');
                }

                if (!$mensaje.id2 || !$mensaje.nombre || !$mensaje.escuela || !$mensaje.creditos1) {
                    if (!$mensaje.id2) {
                        validar_campo($('#div-principal-crear-asig #id'));
                    }

                    if (!$mensaje.creditos1) {
                        validar_campo($('#div-principal-crear-asig #creditos'));
                    } 

                    validar_campo($('#div-principal-crear-asig #nombre'));
                    validar_campo($('#div-principal-crear-asig #escuela'));

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

//--------------------------------Editar Asignatura-------------------------------

$('.input-editar-asig').on('blur change keyup', function () {
    validar_campo($(this));
});

$('#div-principal-editar-asig #id, #div-principal-editar-asig #creditos').on('blur', function () {
    $form = $('#div-principal-editar-asig').find('form');

    $form.submit(function (event) {
        $.ajax({
            url     : 'editar_asignatura.php?option=validar_id_creditos',
            type    : 'post',
            data    : $form.serialize(),
            success : function (result) {
                $mensaje = JSON.parse(result);

                $id = $('#div-principal-editar-asig #id');
                $label_id = $('#div-principal-editar-asig label[for="id"]');

                $creditos = $('#div-principal-editar-asig #creditos');
                $label_creditos = $('#div-principal-editar-asig label[for="creditos"]');

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

$('#conf-editar-asig, #conf-crear-grupo-editar-asig').on('click', function () {
    $form = $('#div-principal-editar-asig').find('form:first');
    $boton_id = $(this).attr('id');

    $form.submit(function (event) {
        $.ajax({
            url     : 'editar_asignatura.php?option=editar',
            method  : 'post',
            data    : $form.serialize(),
            success : function (result) {
                $mensaje = JSON.parse(result);console.log($mensaje);

                $id = $('#div-principal-editar-asig #id');
                $label_id = $('#div-principal-editar-asig label[for="id"]');

                if (!$mensaje.id1) {
                    $id.addClass('invalid');
                    $label_id.addClass('active');
                    $label_id.attr('data-error', "Código ya asignado");

                    Materialize.toast("El código ya pertenece a otra asignatura", 10000, "rounded toast_error");
                }

                if (!$mensaje.id3) {
                    validar_campo($('#div-principal-editar-asig #id'));

                    Materialize.toast('El código debe ser numérico', 10000, 'rounded toast_error');
                }

                if (!$mensaje.creditos2) {
                    validar_campo($('#div-principal-editar-asig #creditos'));

                    Materialize.toast('Los créditos deben ser numéricos', 10000, 'rounded toast_error');
                }

                if (!$mensaje.id2 || !$mensaje.nombre || !$mensaje.escuela || !$mensaje.creditos1) {
                    if (!$mensaje.id2) {
                        validar_campo($('#div-principal-editar-asig #id'));
                    }

                    if (!$mensaje.creditos1) {
                        validar_campo($('#div-principal-editar-asig #creditos'));
                    } 

                    validar_campo($('#div-principal-editar-asig #nombre'));
                    validar_campo($('#div-principal-editar-asig #escuela'));

                    Materialize.toast('Hay campos obligatorios sin diligenciar', 10000, 'rounded toast_error');
                }

                if ($mensaje.id1 && $mensaje.id2 && $mensaje.id3 && $mensaje.nombre && $mensaje.escuela && $mensaje.creditos1 && $mensaje.creditos2) {
                    if ($boton_id === "conf-editar-asig") {
                        Cookies.set("editar_asignatura", "true");
                        window.location.replace("index_asignatura.php");
                    } else if ($boton_id === "conf-crear-grupo-editar-asig"){
                        mostrar_crear_grupo("editar");
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

//------------------------------Eliminar Asignatura------------------------------

$('.boton-eliminar-asig').on('click', function (e) {
    $id_asignatura = $(this).find('form').find('#id').val();
    $nombre_asignatura = $(this).find('form').find('#nombre').val();
    $('#modal-eliminar-asig div:first p').text("¿Está seguro que desea eliminar la asignatura: " + $id_asignatura + " - " + $nombre_asignatura + "?");

    $boton_eliminar = $(this);

    $('#modal-eliminar-asig').on('click', '#conf-eliminar-asig', function (e) {
        $form = $boton_eliminar.find('form');
        $form.submit(function (event) {
            $.ajax({
                    url     : 'eliminar_asignatura.php',
                    type    : 'post',
                    data    : $form.serialize(),
                    success : function (result) {
                        $mensaje = JSON.parse(result);

                        Cookies.remove("eliminar_asignatura");

                        if ($mensaje.exito) {
                            Cookies.set("eliminar_asignatura", "true");
                        } else if (!$mensaje.exito){
                            Cookies.set("eliminar_asignatura", "false");
                        }

                        window.location.replace("index_asignatura.php");
                    }
            });

            event.preventDefault();
            event.stopImmediatePropagation();
        });

        $form.trigger('submit');
        $form.off('submit');

    });
});

//-------------------------------------------------------------------------------

//----------------------------------Crear Grupo----------------------------------

function mostrar_crear_grupo (div_crear_editar) {
    $('.input-' + div_crear_editar + '-asig').attr('readonly', true);
    $('.botones-inferiores').hide();

    if (div_crear_editar === "editar") {
        $('#titulo_tabla').hide();
        $('#tabla_grupos').hide();
    };

    $div_crear_grupo = $('#div-crear-grupo-' + div_crear_editar + '-asig');

    $.get("templates/crear_grupo.tpl", function (result) {
        $div_crear_grupo.html(result);

        $.ajax({
            url     : 'crear_grupo.php?option=listar_profesores',
            type    : 'post',
            success : function (result) {
                $profesores = JSON.parse(result);

                $nombre_asignatura = $('#div-principal-' + div_crear_editar + '-asig #nombre').val();
                $id_asignatura = $('#div-principal-' + div_crear_editar + '-asig #id').val();

                $div_crear_grupo.find('#asignatura').val($id_asignatura);

                $div_crear_grupo.find('div:first h5:first').html("Crear grupo para " + $nombre_asignatura);

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

    $div_crear_grupo.on('click', '.bloque-horario', function (e) {
        if (!$(this).hasClass('bloque-activo')) {
            $(this).addClass('bloque-activo');
        } else {
            $(this).removeClass('bloque-activo');
        }
    });

    $div_crear_grupo.on('click', '#conf-guardar-grupo-asig', function (e) {

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

        $div_crear_grupo.find('#profesor1').val($('#lista_desplegable_profesor_1').val());
        $div_crear_grupo.find('#profesor2').val($('#lista_desplegable_profesor_2').val());
        $div_crear_grupo.find('#horario').val(JSON.stringify($horario));
        
        $form = $div_crear_grupo.find('form');

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
                        $offset = $div_crear_grupo.offset();
                        window.scrollTo(0, $offset.top - 20);
                    }

                    if ($mensaje.profesor && $mensaje.horario) {
                        Cookies.set("crear_grupo", "true");
                        window.location.replace("editar_asignatura.php?id=" + $('#div-principal-' + div_crear_editar + '-asig #id').val());
                    }
                }    
            });

            event.preventDefault();
            event.stopImmediatePropagation();
        });

        $form.trigger('submit');
        $form.off('submit');
    });

    $div_crear_grupo.on('click', '#conf-cancelar-grupo-asig', function (e) {
        Cookies.set("crear_asignatura", "true");
        window.location.replace("index_asignatura.php");
    });

}

//-------------------------------------------------------------------------------

//------------------------------Eliminar Grupo------------------------------

$('.boton-eliminar-grupo').on('click', function (e) {
    $id_asignatura = $('#div-principal-editar-asig #id').val();

    $boton_eliminar = $(this);

    $('#modal-eliminar-grupo').on('click', '#conf-eliminar-grupo', function (e) {
        $form = $boton_eliminar.find('form');
        $form.submit(function (event) {
            $.ajax({
                    url     : 'eliminar_grupo.php',
                    type    : 'post',
                    data    : $form.serialize(),
                    success : function (result) {
                        $mensaje = JSON.parse(result);

                        if ($mensaje.exito) {
                            Cookies.set("eliminar_grupo", "true");
                        } else if (!$mensaje.exito){
                            Cookies.set("eliminar_grupo", "false");
                        }

                        window.location.replace("editar_asignatura.php?id=" + $id_asignatura);
                    }
            });

            event.preventDefault();
            event.stopImmediatePropagation();
        });

        $form.trigger('submit');
        $form.off('submit');

    });
});

//-------------------------------------------------------------------------------

//-------------------------------Crear Profesor-------------------------------

$('.input-crear-prof').on('blur change keyup', function () {
    validar_campo($(this));
});

$('#div-principal-crear-prof #id').on('blur', function () {
    $form = $('#div-principal-crear-prof').find('form');

    $form.submit(function (event) {
        $.ajax({
            url     : 'crear_profesor.php?option=validar_id',
            type    : 'post',
            data    : $form.serialize(),
            success : function (result) {
                $mensaje = JSON.parse(result);

                $id = $('#div-principal-crear-prof #id');
                $label_id = $('#div-principal-crear-prof label[for="id"]');

                if (!$mensaje.id1) {
                    $id.addClass('invalid');
                    $label_id.addClass('active');
                    $label_id.attr('data-error', "Cédula ya asignada");
                } else if (!$mensaje.id3) {
                    $id.addClass('invalid');
                    $label_id.addClass('active');
                    $label_id.attr('data-error', "Campo Numérico");
                }
            }
        });

        event.preventDefault();
        event.stopImmediatePropagation();
    });

    $form.trigger('submit');
    $form.off('submit');
});

$('#conf-crear-prof').on('click', function () {
    $form = $('#div-principal-crear-prof').find('form');

    $form.submit(function (event) {
        $.ajax({
            url     : 'crear_profesor.php?option=crear',
            method  : 'post',
            data    : $form.serialize(),
            success : function (result) {
                $mensaje=JSON.parse(result);

                $id = $('#div-principal-crear-prof #id');
                $label_id = $('#div-principal-crear-prof label[for="id"]');

                if (!$mensaje.id1) {
                    $id.addClass('invalid');
                    $label_id.addClass('active');
                    $label_id.attr('data-error', "Cédula ya asignada");

                    Materialize.toast("La cédula ya pertenece a otro profesor", 10000, "rounded toast_error");
                }

                if (!$mensaje.id3) {
                    validar_campo($('#div-principal-crear-prof #id'));

                    Materialize.toast('La cédula debe ser numérica', 10000, 'rounded toast_error');
                }

                if (!$mensaje.id2 || !$mensaje.nombre || !$mensaje.escuela) {
                    if (!$mensaje.id2) {
                        validar_campo($('#div-principal-crear-prof #id'));
                    } 

                    validar_campo($('#div-principal-crear-prof #nombre'));
                    validar_campo($('#div-principal-crear-prof #escuela'));

                    Materialize.toast('Hay campos obligatorios sin diligenciar', 10000, 'rounded toast_error');
                }

                if ($mensaje.id1 && $mensaje.id2 && $mensaje.id3 && $mensaje.nombre && $mensaje.escuela) {
                    Cookies.set("crear_profesor", "true");
                    window.location.replace("index_profesor.php");
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

//-----------------------------Editar Profesor-----------------------------------

$('.input-editar-prof').on('blur change keyup', function () {
    validar_campo($(this));
});

$('#div-principal-editar-prof #id').on('blur change paste keyup', function () {
    $form = $('#div-principal-editar-prof').find('form');

    $form.submit(function (event) {
        $.ajax({
            url     : 'editar_profesor.php?option=validar_id',
            type    : 'post',
            data    : $form.serialize(),
            success : function (result) {
                $mensaje = JSON.parse(result);

                $id = $('#div-principal-editar-prof #id');
                $label_id = $('#div-principal-editar-prof label[for="id"]');

                if (!$mensaje.id1) {
                    $id.addClass('invalid');
                    $label_id.addClass('active');
                    $label_id.attr('data-error', "Cédula ya asignada");
                } else if (!$mensaje.id3) {
                    $id.addClass('invalid');
                    $label_id.addClass('active');
                    $label_id.attr('data-error', "Campo Numérico");
                }
            }
        });

        event.preventDefault();
        event.stopImmediatePropagation();
    });

    $form.trigger('submit');
    $form.off('submit');
});

$('#conf-prof-edit').on('click', function () {
    $form = $('#div-principal-editar-prof').find('form');

    $form.submit(function (event) {
        $.ajax({
            url     : 'editar_profesor.php?option=editar',
            method  : 'post',
            data    : $form.serialize(),
            success : function (result) {

                $id = $('#div-principal-editar-prof #id');
                $label_id = $('#div-principal-editar-prof label[for="id"]');

                $mensaje = JSON.parse(result);

                console.log($mensaje);

                if (!$mensaje.id1) {
                    $id.addClass('invalid');
                    $label_id.addClass('active');
                    $label_id.attr('data-error', "Cédula ya asignada");

                    Materialize.toast("La cédula ya pertenece a otro profesor", 10000, "rounded toast_error");
                }

                if (!$mensaje.id4) {
                    $id.addClass('invalid');
                    $label_id.addClass('active');
                    $label_id.attr('data-error', "Conflicto con grupos");

                    Materialize.toast("El profesor posee grupos activos", 10000, "rounded toast_error");
                }

                if (!$mensaje.id3) {
                    validar_campo($('#div-principal-editar-prof #id'));

                    Materialize.toast('La cédula debe ser numérica', 10000, 'rounded toast_error');
                }

                if (!$mensaje.id2 || !$mensaje.nombre || !$mensaje.escuela) {
                    if (!$mensaje.id2) {
                        validar_campo($('#div-principal-editar-prof #id'));
                    } 

                    validar_campo($('#div-principal-editar-prof #nombre'));
                    validar_campo($('#div-principal-editar-prof #escuela'));

                    Materialize.toast('Hay campos obligatorios sin diligenciar', 10000, 'rounded toast_error');
                }

                if ($mensaje.id1 && $mensaje.id2 && $mensaje.id3 && $mensaje.id4 && $mensaje.nombre && $mensaje.escuela) {
                    Cookies.set("editar_profesor", "true");
                    window.location.replace("index_profesor.php");
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

//-----------------------------Eliminar Profesor---------------------------------

$('.boton-eliminar-prof').on('click', function (e) {
    $boton_eliminar = $(this);

    $('#modal-eliminar-prof').on('click', '#conf-eliminar-prof', function (e) {
        $form = $boton_eliminar.find('form');
        $form.submit(function (event) {
            $.ajax(
                {
                    url     : 'eliminar_profesor.php',
                    type    : 'post',
                    data    : $form.serialize(),
                    success : function (result) {
                        $mensaje = JSON.parse(result);

                        if ($mensaje.exito) {
                            Cookies.set("eliminar_profesor", "true");
                        } else if (!$mensaje.exito){
                            Cookies.set("eliminar_profesor", "false");
                        }

                        window.location.replace("index_profesor.php");
                    }
                }
            );

            event.preventDefault();
        });

        $form.trigger('submit');

    });
});


//-------------------------------------------------------------------------------