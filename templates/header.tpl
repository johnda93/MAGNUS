<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    {literal}
        <style type="text/css">@import url({/literal}{$gvar.l_global}{literal}css/star-rating.min.css); </style>
        <style type="text/css">@import url({/literal}{$gvar.l_global}{literal}css/estilos.css); </style>
    {/literal}
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>{$titulo}</title>
</head>

<body class="white">
    <header>
    <div class="logo"></div>

        <nav class="green lighten-1">
            <div class="nav-wrapper">
                <!--<a href="#" class="brand-logo">MAGNUS: Administración</a>-->
                
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown1">
                            Opción Busqueda<i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                </ul>

                <div class="right barra-busqueda">
                    <form>
                        <div class="input-field">
                            <input id="search" type="search" placeholder="Seleccione la opción de busqueda" data-activates='dropdown1' required>
                            <label for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>

                            <ul id='dropdown1' class='dropdown-content'>
    <li><a href="#!">one</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider"></li>
    <li><a href="#!">three</a></li>
  </ul>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </header>