$.ajaxSetup({ cache:false });
$(document).ready(function () {
    $('.boton-crear-asig').leanModal({
        dismissible: false
    }); //Activar modales para Crear Asignatura

	$('.boton-eliminar-asig').leanModal({
        dismissible: false
    }); //Activar modales para Eliminar Asignatura

    if(Cookies.get("login")==="false"){
        Cookies.remove("login");
        Materialize.toast("Nombre de usuario o contraseña no valido", 60000, "rounded toast_error");
    }

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
    } else if ($mensaje === "error-crear-asig-prof") {
        Materialize.toast("El profesor a asignar al grupo no existe", 60000, "rounded toast_error");
    }
});

//--------------------------------Login-------------------------------
function verif_datos_login(){

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
        $form.submit(function(){
            $form.ajaxSubmit(
                {
                    url: 'login.php',
                    type: 'post',
                    success: function(result){
                        $mensaje = JSON.parse(result);
                        
                        if($mensaje.exito === "admin"){
                            window.location.replace("index_asignatura.php");
                        }else if ($mensaje.exito === "user"){
                            window.location.replace("login.php");
                        }else{
                            Cookies.set("login", "false");
                            window.location.replace("login.php");
                        }

                    }
                });
        });

        $form.trigger('submit');
    } else {
        Materialize.toast('Hay campos obligatorios sin diligenciar', 10000, 'rounded toast_error');  
    }
});


//---------------------------------------------------------------

//--------------------------------Crear Asignatura-------------------------------

function verif_datos_crear_asig () {
    $id = $('#div-principal-crear-asig #id');
    $label_id = $('#div-principal-crear-asig label[for="id"]');
    $nombre = $('#div-principal-crear-asig #nombre');
    $label_nombre = $('#div-principal-crear-asig label[for="nombre"]');
    $escuela = $('#div-principal-crear-asig #escuela');
    $label_escuela = $('#div-principal-crear-asig label[for="escuela"]');
    $creditos = $('#div-principal-crear-asig #creditos');
    $label_creditos = $('#div-principal-crear-asig label[for="creditos"]');
    $correcto = [true, true, true, true];

    if ($id.val().length === 0) {
        $id.addClass('invalid');
        $label_id.addClass('active');
        $label_id.attr('data-error', "Campo Obligatorio");
        $correcto[0] = false;
    } else {
        if ($.isNumeric($id.val())) {
            $asignaturas = JSON.parse($('#div-principal-crear-asig .datos-ocultos:first').text());

            $.each($asignaturas, function (index, element) {
                if (element.id === $id.val()) {
                    $id.addClass('invalid');
                    $label_id.addClass('active');
                    $label_id.attr('data-error', "Código ya asignado");
                    $correcto[1] = false;
                };
            });
        } else {
            $id.addClass('invalid');
            $label_id.addClass('active');
            $label_id.attr('data-error', "Campo Numérico");
            $correcto[2] = false;
        }
        
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

    if ($creditos.val().length === 0) {
        $creditos.addClass('invalid');
        $label_creditos.addClass('active');
        $label_creditos.attr('data-error', "Campo Obligatorio");
        $correcto[0] = false;
    } else if (!$.isNumeric($creditos.val())) {
        $creditos.addClass('invalid');
        $label_creditos.addClass('active');
        $label_creditos.attr('data-error', "Campo Numérico");
        $correcto[3] = false;
    }

    return $correcto;
};

function verif_datos_crear_grupo(horario) {
    $profesor1 = $('#lista_desplegable_profesor_1').val();
    $correcto = [true, true];

    if ($profesor1 === null) {
        $('.select-wrapper:first input').addClass('validate invalid');
        $correcto[0] = false;
    }

    if (horario.length < 2) {
        $correcto[1] = false;
    }

    return $correcto;
};

$('#conf-guardar-asig').on('click',function () {
    $correcto = verif_datos_crear_asig();
    
    if ($correcto[0] && $correcto[1] && $correcto[2] && $correcto[3]) {
        $form = $('#div-principal-crear-asig').find('form:first');
        $form.submit();
    } else {
        if (!$correcto[0]) {
            Materialize.toast('Hay campos obligatorios sin diligenciar', 10000, 'rounded toast_error');  
        }
        
        if (!$correcto[1]) {
            Materialize.toast("El código ya pertenece a otra asignatura", 10000, "rounded toast_error");
        }

        if (!$correcto[2]) {
            Materialize.toast("El código debe ser un valor numérico", 10000, "rounded toast_error");
        }

        if (!$correcto[3]) {
            Materialize.toast("Los créditos deben ser un valor numérico", 10000, "rounded toast_error");
        }
    }
});

$('#conf-crear-grupo-asig').on('click', function (e) {
    $correcto_asig = verif_datos_crear_asig();

    if ($correcto_asig[0] && $correcto_asig[1] && $correcto_asig[2] && $correcto_asig[3]) {
        $('.input-crear-asig').attr('readonly', true);
        $('.botones-inferiores').hide();

        $.get("templates/crear_grupo.tpl", function (result) {
            $profesores = JSON.parse($('#div-crear-grupo div:first').text());

            $('#div-crear-grupo').html(result);

            $nombre_asignatura = $('#div-principal-crear-asig #nombre').val();

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
        });
    } else {
        if (!$correcto_asig[0]) {
            Materialize.toast('Hay campos obligatorios sin diligenciar', 10000, 'rounded toast_error');  
        }
        
        if (!$correcto_asig[1]) {
            Materialize.toast("El código ya pertenece a otra asignatura", 10000, "rounded toast_error");
        }

        if (!$correcto_asig[2]) {
            Materialize.toast("El código debe ser un valor numérico", 10000, "rounded toast_error");
        }

        if (!$correcto_asig[3]) {
            Materialize.toast("Los créditos deben ser un valor numérico", 10000, "rounded toast_error");
        }
    }
}); //Cargar Crear Grupo por AJAX desde Crear Asignatura

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

    $correcto_grupo = verif_datos_crear_grupo($horario);

    if ($correcto_grupo[0] && $correcto_grupo[1]) {
        $('#div-principal-crear-asig #profesor1').val($('#lista_desplegable_profesor_1').val());
        $('#div-principal-crear-asig #profesor2').val($('#lista_desplegable_profesor_2').val());
        $('#div-principal-crear-asig #horario').val(JSON.stringify($horario));
        $('#div-principal-crear-asig').find('form:first').submit();
    } else {
        $offset = $('#div-crear-grupo').offset();

        window.scrollTo(0, $offset.top - 20);
    }

    if (!$correcto_grupo[0]) {
        Materialize.toast('Seleccione un Profesor 1', 10000, 'rounded toast_error');
    }

    if (!$correcto_grupo[1]) {
        Materialize.toast('Seleccione por lo menos dos bloques en el horario', 10000, 'rounded toast_error');
    }
}); //Guardar Grupo

$('#div-crear-grupo').on('click', '#conf-cancelar-grupo-asig', function (e) {
    $('#div-principal-crear-asig').find('form:first').submit();
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