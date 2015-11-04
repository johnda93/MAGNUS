<?php /* Smarty version Smarty-3.0.9, created on 2015-11-04 15:03:16
         compiled from "C:/xampp/htdocs/MAGNUS/templates\admin_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8240563a102488a013-04016319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0630623454fa9da40e9856a9adad5072d1c0180' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\admin_header.tpl',
      1 => 1446575244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8240563a102488a013-04016319',
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
    
        <style type="text/css">@import url(<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
css/admin.css); </style>
    
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
                
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
index_asignatura.php"><i class="material-icons left">library_books</i>Asignaturas</a></li>
                    <li><a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
index_profesor.php"><i class="material-icons left">face</i>Profesores</a></li>
                    <li><a href="#"><i class="material-icons left">power_settings_new</i>Cerrar Sesión</a></li>
                </ul>
            </div>
        </nav>
    </header>