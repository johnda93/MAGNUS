<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
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
        <div class="logo">
            <a href="{$gvar.l_global}">
                <img src="{$gvar.l_global}/images/logo.png">
            </a>
        </div>

        <nav class="green lighten-1">
            <div class="nav-wrapper">
                {if isset($usuario)}
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                
                    <li>Usuario: {$usuario}</li>
                    <li>
                        <a href="{$gvar.l_global}logout.php"><i class="material-icons left">power_settings_new</i>Cerrar Sesión</a>
                    </li>
                </ul>
                {/if}
            </div>
        </nav>
    </header>