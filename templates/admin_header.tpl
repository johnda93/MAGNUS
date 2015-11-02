<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    {literal}
        <style type="text/css">@import url({/literal}{$gvar.l_global}{literal}css/admin.css); </style>
    {/literal}
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body class="white">
    <header>
        <nav class="green lighten-1">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">MAGNUS: Administración</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="{$gvar.l_global}index_asignatura.php"><i class="material-icons left">library_books</i>Asignaturas</a></li>
                    <li><a href="{$gvar.l_global}index_profesor.php"><i class="material-icons left">face</i>Profesores</a></li>
                    <li><a href="#"><i class="material-icons left">power_settings_new</i>Cerrar Sesión</a></li>
                </ul>
            </div>
        </nav>
    </header>