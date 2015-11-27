<main>
	<div class="white container principal z-depth-1">
		<h5 class="center-align">{$carrera->get('nombre')}</h5>

  <ul class="collapsible" data-collapsible="accordion">
  
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i>Fundamentacion</div>

      <div class="collapsible-body">
      <ul>
      {section loop=$asignaturas name=i}
      	{if $asignaturas[i]->auxiliars['componente']==="Fundamentación"}
      		<li><a href="asignatura.php?id={$asignaturas[i]->get('id')}">{$asignaturas[i]->get('nombre')}</a></li>		
      	{/if}
      	{/section}
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">place</i>Disciplinar</div>
      <div class="collapsible-body">
      <ul>
	      {section loop=$asignaturas name=i}
	      	{if $asignaturas[i]->auxiliars['componente']==="Disciplinar"}
	      		<li><a href="asignatura.php?id={$asignaturas[i]->get('id')}">{$asignaturas[i]->get('nombre')}</a></li>
	      	{/if}
	      {/section}
	     </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">whatshot</i>Libre eleccion</div>
      <div class="collapsible-body">
      <ul>
	      {section loop=$asignaturas name=i}
	      	{if $asignaturas[i]->auxiliars['componente']==="Libre eleccion"}
	      		<li><a href="asignatura.php?id={$asignaturas[i]->get('id')}">{$asignaturas[i]->get('nombre')}</a></li>
	      	{/if}
	      {/section}
	     </ul>
	  </div>
    </li>
    
  </ul>
	</div>
</main>