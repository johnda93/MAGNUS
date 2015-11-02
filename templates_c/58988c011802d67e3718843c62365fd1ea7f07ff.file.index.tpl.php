<?php /* Smarty version Smarty-3.0.9, created on 2015-10-13 21:15:28
         compiled from "C:/xampp/htdocs/MAGNUS/templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32730561d58505def43-89458265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58988c011802d67e3718843c62365fd1ea7f07ff' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\index.tpl',
      1 => 1444763724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32730561d58505def43-89458265',
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
  	</head>
  	<body class="white">
  		<header>
  			<nav class="green lighten-1">
			    <div class="container">
				    <a href="#" class="brand-logo">MAGNUS: Administración</a>
				    <ul id="nav-mobile" class="right hide-on-med-and-down">
					    <li><a href="#">Asignaturas</a></li>
					    <li><a href="#">Profesores</a></li>
					    <li><a href="#">Cerrar Sesión</a></li>
				    </ul>
			    </div>
	  		</nav>
  		</header>
  		
  		<main>
		  	<div id="asignatures" class="white container z-depth-1">
		  		<h5 class="center-align">Asignaturas</h5>

		  		<div id="table" class="white container">
			  		<table class="centered striped z-depth-1">
			  			<thead>
			  				<tr>
			  					<th data-field="nombre">Nombre</th>
			  					<th data-field="facultad">Facultad</th>
			  					<th data-field="acciones">Acciones</th>
			  				</tr>
			  			</thead>

			  			<tbody>
			  				<tr>
			  					<td>Cálculo Diferencial</td>
			  					<td>Matemáticas</td>
			  					<td>
			  						<a href="#"><i class="material-icons center action-icons">create</i></a>
			  						<a href="#"><i class="material-icons center action-icons">delete</i></a>
			  					</td>
			  				</tr>
			  				<tr>
			  					<td>Bases de Datos II</td>
			  					<td>Minas</td>
			  					<td>
			  						<a href="#"><i class="material-icons center action-icons">create</i></a>
			  						<a href="#"><i class="material-icons center action-icons">delete</i></a>
			  					</td>
			  				</tr>
			  				<tr>
			  					<td>DCPS</td>
			  					<td>Minas</td>
			  					<td>
			  						<a href="#"><i class="material-icons center action-icons">create</i></a>
			  						<a href="#"><i class="material-icons center action-icons">delete</i></a>
			  					</td>
			  				</tr>
			  			</tbody>
			  		</table>
		  		</div>

		  		<div style="padding: 20px;">
		  			<a class="waves-effect waves-light green lighten-1 btn">
		  				<i class="material-icons left">add</i>
		  				Crear Asignatura
		  			</a>
		  		</div>
	      	</div>
      	</main>

      	<footer class="page-footer green">
      		<div class="container">
      			<div class="row">
      				<div class="col l6 s12">
      					<h5 class="white-text">Creadores:</h5>

      					<div class="row grey-text text-lighten-4">
      						<div class="col s6">Juan Alejandro Álvarez M.</div>
      						<div class="col s6">juaalvarezme@unal.edu.co</div>
      						<div class="col s6">Alejandro Trujillo G.</div>
      						<div class="col s6">altrujillogo@unal.edu.co</div>
      						<div class="col s6">John Daniel Castro R.</div>
      						<div class="col s6">jodcastrori@aunal.edu.co</div>
      					</div>
      				</div>
      				<div class="col l4 offset-l2 s12">
      					<h5 class="white-text">Enlaces Relacionados:</h5>
      					<ul>
      						<li><a class="grey-text text-lighten-3" href="#!">Moodle DCPS</a></li>
      						<li><a class="grey-text text-lighten-3" href="#!">Glight Package</a></li>
      						<li><a class="grey-text text-lighten-3" href="#!">MaterializeCSS</a></li>
      					</ul>
      				</div>
      			</div>
      		</div>

      		<div class="footer-copyright green darken-1">
      			<div class="container">
      				© 2015 Equipo #4 - Diseño y Construcción de Proyectos de Software 2015-II
      			</div>
      		</div>
      	</footer>

	    <!--Import jQuery before materialize.js-->
	    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
  	</body>
</html>