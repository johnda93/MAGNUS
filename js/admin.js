$(document).ready(function () {
	$('.boton-eliminar-asig').leanModal({
        dismissible: false
    }); //Activar modales para Eliminar Asignatura

    if (Cookies.get("eliminar_asignatura") === "true") {
        Cookies.remove("eliminar_asignatura");
        Materialize.toast("Asignatura eliminada correctamente", 60000, "rounded toast_exito");
    } else if (Cookies.get("eliminar_asignatura") === "false") {
        Cookies.remove("eliminar_asignatura");
        Materialize.toast("La asignatura a eliminar no existe", 60000, "rounded toast_error");
    };

});


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