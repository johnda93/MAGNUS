
$(document).ready(function () {
    $('.boton-registrarse').leanModal({
        dismissible: false
    }); //Activar modales para Registrarse
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

//--------------------------------Registro-------------------------------
$('#modal-registrarse #nombre_registro').on('blur', function () {
    $form = $('#modal-registrarse').find('form');            
    $form.submit(function (event) {
        $.ajax({
            url     : 'registro.php?option=validar_nombre',
            type    : 'post',
            data    : $form.serialize(),
            success : function (result) {

                $mensaje = JSON.parse(result);

                $nombre = $('#modal-registrarse #nombre_registro');
                $label_nombre = $('#modal-registrarse label[for="nombre_registro"]');

                if (!$mensaje.nombre2) {
                    $nombre.addClass('invalid');
                    $label_nombre.addClass('active');
                    $label_nombre.attr('data-error', "Nombre de usuario ya asignada");
                }
            }
        });

        event.preventDefault();
        event.stopImmediatePropagation();
    });

    $form.trigger('submit');
    $form.off('submit');
});

//$('#modal-registrarse').closeModal();
    
$('#conf-registro').on('click', function () {
    $form = $('#modal-registrarse').find('form');

    $form.submit(function (event) {
        $.ajax({
            url     : 'registro.php?option=registrar',
            method  : 'post',
            data    : $form.serialize(),
            success : function (result) {
                $mensaje=JSON.parse(result);
                

                $nombre = $('#modal-registrarse #nombre_registro');
                $label_nombre = $('#modal-registrarse label[for="nombre_registro"]');
                $contraseña = $('#modal-registrarse #contraseña_registro');
                $label_contraseña = $('#modal-registrarse label[for="contraseña_registro"]');
                $contraseña2 = $('#modal-registrarse #contraseña2_registro');
                $label_contraseña2 = $('#modal-registrarse label[for="contraseña2_registro"]');

                if (!$mensaje.nombre2) {
                    $nombre.addClass('invalid');
                    $label_nombre.addClass('active');
                    $label_nombre.attr('data-error', "Nombre de usuario ya asignada");

                    Materialize.toast("El nombre de usuario ya esta en uso", 10000, "rounded toast_error");
                }

                if (!$mensaje.nombre1 || !$mensaje.contraseña1 || !$mensaje.contraseña2) {
                    if (!$mensaje.nombre1) {
                      $nombre.addClass('invalid');
                      $label_nombre.addClass('active');
                      $label_nombre.attr('data-error', "Campo obligatorio");
                    }

                    if (!$mensaje.contraseña1) {
                      $contraseña.addClass('invalid');
                      $label_contraseña.addClass('active');
                      $label_contraseña.attr('data-error', "Campo obligatorio");
                    }

                    if (!$mensaje.contraseña2) {
                      $contraseña2.addClass('invalid');
                      $label_contraseña2.addClass('active');
                      $label_contraseña2.attr('data-error', "Campo obligatorio");
                    }

                    Materialize.toast('Hay campos obligatorios sin diligenciar', 10000, 'rounded toast_error');
                }

                if(!$mensaje.contraseña3){
                  $contraseña.addClass('invalid');
                  $label_contraseña.addClass('active');

                  $contraseña2.addClass('invalid');
                  $label_contraseña2.addClass('active');
                  $label_contraseña2.attr('data-error', "Las contraseña no coincide");

                  Materialize.toast('Las contraseñas no coinciden', 10000, 'rounded toast_error');
                }
                console.log($mensaje);
                if ($mensaje.nombre1 && $mensaje.nombre2 && $mensaje.contraseña1 && $mensaje.contraseña2 && $mensaje.contraseña3) {
                    $("#nombre_registro").val("");
                    $("#contraseña_registro").val("");
                    $("#contraseña2_registro").val("");

                    $('#modal-registrarse').closeModal();

                    Materialize.toast('Usuario registrado exitosamente', 10000, 'rounded toast_error');
                }
            }    
        });
    
        event.preventDefault();
        event.stopImmediatePropagation();
    });

    $form.trigger('submit');
    $form.off('submit');
});
//----------------------------------------------------------------------

$(function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#search" ).autocomplete({
      source: availableTags
    });
  });