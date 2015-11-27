<?php /* Smarty version Smarty-3.0.9, created on 2015-11-27 15:53:43
         compiled from "C:/xampp/htdocs/MAGNUS/templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:478856586e775c5d21-80236134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b9d26ad0854bd4c5bae31151a63ee37afe75f85' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\header.tpl',
      1 => 1448633582,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '478856586e775c5d21-80236134',
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
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    
        <style type="text/css">@import url(<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
css/star-rating.min.css); </style>
        <style type="text/css">@import url(<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
css/estilos.css); </style>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title><?php echo $_smarty_tpl->getVariable('titulo')->value;?>
</title>
</head>

<body class="white">
    <header>
        <div class="logo">
            <a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
">
                <img src="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
/images/logo.png">
            </a>
        </div>

        <nav class="green lighten-1">
            <div class="nav-wrapper">
                <?php if (isset($_smarty_tpl->getVariable('usuario',null,true,false)->value)){?>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                
                    <li>Usuario: <?php echo $_smarty_tpl->getVariable('usuario')->value;?>
</li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
logout.php"><i class="material-icons left">power_settings_new</i>Cerrar Sesión</a>
                    </li>
                </ul>
                <?php }?>
            </div>
        </nav>
    </header>