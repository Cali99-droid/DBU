<?php 

//require("C:/wamp64/www/Proyectos/DBU/controllers/PsiController.php");



$med_controller = new MedController();
$medicina = $med_controller->get();

if( empty($medicina) ) {
	print( '
		<div class="container">
			<p class="item  error">No hay Datos</p>
		</div>
	');
} else {
	$template_medicina = '
	
	<div class="gestion">
		<div class="gestion__nombre">
			<h2 class="no-margin gestion__titulo">Gestión Medicina</h2>
		</div>

		<div class="gestion__psicologia">
			<div class="busqueda">
				<input class="campo__buscar" type="text" placeholder="Buscar Paciente">
				<button class="boton boton--buscar">Buscar</button>
			</div>  
		</div>

		<div class="contenedor ">   
			<div class="contenedor__tabla">    
				<table class="tabla">
					<thead>
					<tr>
						<th>Id</th>
						<th>Diagnostico</th>
						<th>Tratamiento</th>
						<th>Fecha</th>
						<th>idpaciente</th>
						<th class="act">Acciones</th>
						<th>
						<form method="POST">
								<input type="hidden" name="r" value="psicologia-add">
								<input class="boton boton--nuevo" type="submit" value="Nuevo">
						</form>
						</th>
						
					</tr>
					</thead>
					<tbody>';

			for ($n=0; $n < count($medicina); $n++) { 
				$template_medicina .= '
					<tr>
						<td>' . $medicina[$n]['idmedico'] . '</td>
						<td>' .  $medicina[$n]['diagnostico'] . '</td>
						<td>' .  $medicina[$n]['tratamiento'] . '</td>
						<td>' .  $medicina[$n]['fecha'] . '</td> 
						<td>' .  $medicina[$n]['idpaciente'] . '</td>

					
						<td  class="action">
							<form method="POST">
								<input type="hidden" name="r" value="medicina-edit">
								<input type="hidden" name="idmedico" value="' .$medicina[$n]['idmedico'] . '">
								<input class="boton--editar" type="submit" value="">
							</form>
					
							<form method="POST">
								<input type="hidden" name="r" value="medicina-delete">
								<input type="hidden" name="idmedico" value="' . $medicina[$n]['idmedico'] . '">
								<input class="boton--eliminar" type="submit" value="">
							</form>
						</td>
					</tr>
			'; 
		}

		$template_medicina  .= '
				    </tbody>
				</table>
			</div>
		</div>  
	</div>

	</body>
  </main>

  </html>

	';


	printf($template_medicina);
}