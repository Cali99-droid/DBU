<?php 
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid
//require("C:/wamp64/www/Proyectos/DBU/controllers/PsiController.php");
$template_medicina = '';
if($_SESSION['ROL'] == 'Estudiante'  ) {
	$med_controller = new MedController();
    $medicina = $med_controller->getHistorial($_SESSION['dni_per']);
	if( empty($medicina) ) {
		print( '
			<div class="container">
				<p class="item  error">No cuenta con consultas medicas</p>
			</div>
		');
	} else {
		$template_medicina = '
		
		<div class="gestion">
			<div class="gestion__nombre">
				<h2 class="no-margin gestion__titulo">Mis Consultas Médicas</h2>
			</div>
	
		
	
			<div class="contenedor ">   
				<div class="contenedor__tabla">    
					<table class="tabla">
						<thead>
						<tr>
							<th>Id</th>
							<th>Paciente</th>
							<th>Diagnostico</th>
							<th>Tratamiento</th>
							<th>Fecha</th>
							<th>Estado</th>
							
							
							<th class="act">Acciones</th>
							
							
						</tr>
						</thead>
						<tbody>';
	
				for ($n=0; $n < count($medicina); $n++) { 
					$estado =  $medicina[$n]['estado_atencion'];
					$estadoT = 'completado';
					if($estado == 'Completado'){
						$estadoT = 'completado';
					 }else{
						 $estadoT = 'pendiente';
					 }
					$template_medicina .= '
						<tr>
							<td>' . $medicina[$n]['idmedico'] . '</td>
							<td>' .  $medicina[$n]['Paciente'] . '</td>
							<td>' .  $medicina[$n]['diagnostico'] . '</td>
							<td>' .  $medicina[$n]['tratamiento'] . '</td>
							<td>' .  $medicina[$n]['fecha'] . '</td> 
							<td class="center"><span class=" label '.$estadoT.'">' .  $medicina[$n]['estado_atencion'] . '</span></td>
							
	
						
							<td  class="action">
								
	
								<form method="POST">
									<input type="hidden" name="r" value="medico-report">
									<input type="hidden" name="idmedico" value="' . $medicina[$n]['idmedico'] . '">
									<input class="boton--reporte" type="submit" value="">
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
	
	
			
		
	}
}else{

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

		<div class="gestion__area">
			<div class="busqueda">
				<form method="POST">
					<input type="hidden" name="r" value="medicina-buscar">
					<input class="campo__buscar" name = "nombre" type="number" placeholder="Todos">
					<input class="boton boton--nuevo" type="submit" value="Buscar">
				</form>
			</div> 
			
			
			<form method="POST">
			
				<input type="hidden" name="r" value="medicina-estadis">
				<input class="boton--dash" type="submit" value="">
				<p class="no-margin graf">Tablero informatívo</p>
			</form>
		</div>

		<div class="contenedor ">   
			<div class="contenedor__tabla">    
				<table class="tabla">
					<thead>
					<tr>
						<th>Id</th>
						<th>Paciente</th>
						<th>Diagnostico</th>
						<th>Tratamiento</th>
						<th>Fecha</th>
						<th>Estado</th>
						
						
						<th class="act">Acciones</th>
						<th>
						<form method="POST">
								<input type="hidden" name="r" value="medicina-add">
								<input class="boton boton--nuevo" type="submit" value="Nuevo">
						</form>
						</th>
						
					</tr>
					</thead>
					<tbody>';

			for ($n=0; $n < count($medicina); $n++) { 
				$estado =  $medicina[$n]['estado_atencion'];
				$estadoT = 'completado';
				if($estado == 'Completado'){
					$estadoT = 'completado';
				 }else{
					 $estadoT = 'pendiente';
				 }
				$template_medicina .= '
					<tr>
						<td>' . $medicina[$n]['idmedico'] . '</td>
						<td>' .  $medicina[$n]['Paciente'] . '</td>
						<td>' .  $medicina[$n]['diagnostico'] . '</td>
						<td>' .  $medicina[$n]['tratamiento'] . '</td>
						<td>' .  $medicina[$n]['fecha'] . '</td> 
						<td class="center"><span class=" label '.$estadoT.'">' .  $medicina[$n]['estado_atencion'] . '</span></td>
						

					
						<td  class="action">
							<form method="POST">
								<input type="hidden" name="r" value="medicina-edit">
								<input type="hidden" name="idmedico" value="' .$medicina[$n]['idmedico'] . '">
								<input type="hidden" name="dni_per" value="' .$medicina[$n]['dni_per'] . '">
								<input class="boton--editar" type="submit" value="">
							</form>
					
							<form method="POST">
								<input type="hidden" name="r" value="medicina-delete">
								<input type="hidden" name="idmedico" value="' . $medicina[$n]['idmedico'] . '">
								<input class="boton--eliminar" type="submit" value="">
							</form>

							<form method="POST">
								<input type="hidden" name="r" value="medico-report">
								<input type="hidden" name="idmedico" value="' . $medicina[$n]['idmedico'] . '">
								<input class="boton--reporte" type="submit" value="">
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



   }
}

printf($template_medicina);