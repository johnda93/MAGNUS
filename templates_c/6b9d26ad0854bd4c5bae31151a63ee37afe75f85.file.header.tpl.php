<?php /* Smarty version Smarty-3.0.9, created on 2015-11-27 12:51:11
         compiled from "C:/xampp/htdocs/MAGNUS/templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29896564f807c584082-13574323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b9d26ad0854bd4c5bae31151a63ee37afe75f85' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\header.tpl',
      1 => 1448624649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29896564f807c584082-13574323',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    
        <style type="text/css">@import url(<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
css/estilos.css); </style>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title><?php echo $_smarty_tpl->getVariable('titulo')->value;?>
</title>
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