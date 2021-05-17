<?php 
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid
//require("C:/wamp64/www/Proyectos/DBU/controllers/PsiController.php");

if($_SESSION['ROL'] == 'Estudiante'  ) {
$psi_controller = new PsiController();
$psicologia = $psi_controller->getHistorial($_SESSION['dni_per']);
if( empty($psicologia) ) {
	print( '
		<div class="container">
			<p class="item  error">No hay Status</p>
		</div>
	');
} else {
	$template_psicologia = '
	
	<div class="gestion">
		<div class="gestion__nombre">
			<h2 class="no-margin gestion__titulo">Mis Consultas Psicológicas</h2>
		</div>



		<div class="contenedor ">   
			<div class="contenedor__tabla">    
				<table class="tabla">
					<thead >
					<tr>
						<th>Id</th>
						<th>Paciente</th>
						<th>Estado del Paciente</th>
						<th>Descripcion</th>
						<th class="fondo_chico">Fecha</th>
						<th>Estado</th>
						<th class="act">Acciones</th>
						
						
					</tr>
					</thead>
					<tbody>';

			for ($n=0; $n < count($psicologia); $n++) { 
				$estado =  $psicologia[$n]['estado_atencion'];
				$estadoT = 'completado';
				if($estado == 'Completado'){
					$estadoT = 'completado';
				 }else{
					 $estadoT = 'pendiente';
				 }
				$template_psicologia .= '
					<tr>
					    
						<td>' .  $psicologia[$n]['idpsicologia'] . '</td>
						<td>' .  $psicologia[$n]['Paciente'] . '</td>
						<td>' .  $psicologia[$n]['estado_psi'] . '</td>
						<td>' .  $psicologia[$n]['descripcion_psi'] . '</td>
						<td >' .  $psicologia[$n]['fecha'] . '</td>
						<td class="center"><span class=" label '.$estadoT.'">' .  $psicologia[$n]['estado_atencion'] . '</span></td>  

					
						<td  class="action">
						
							<form method="POST">
								<input type="hidden" name="r" value="psicologia-report">
								<input type="hidden" name="idpsicologia" value="' . $psicologia[$n]['idpsicologia'] . '">
								<input class="boton--reporte" type="submit" value="">
							</form>
						</td>
					</tr>
			'; 
		}

		$template_psicologia  .= '
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
	$psi_controller = new PsiController();
    $psicologia = $psi_controller->get();
	if( empty($psicologia) ) {
		print( '
			<div class="container">
				<p class="item  error">No hay Status</p>
			</div>
		');
	} else {
		$template_psicologia = '
		
		<div class="gestion">
			<div class="gestion__nombre">
				<h2 class="no-margin gestion__titulo">Gestión Psicologia</h2>
			</div>
	
			<div class="gestion__area">
				<div class="busqueda">
					<form method="POST">
						<input type="hidden" name="r" value="psicologia-buscar">
						<input class="campo__buscar" name = "nombre" type="number" placeholder="Todos">
						<input class="boton boton--nuevo" type="submit" value="Buscar">
					</form>
				</div> 
				
				
				<form method="POST" class = "estadis">
				
					<input type="hidden" name="r" value="psicologia-estadis">
					<input class="boton--dash" type="submit" value="">
					<p class="no-margin graf">Tablero informatívo</p>
				</form>
			</div>
	
			<div class="contenedor ">   
				<div class="contenedor__tabla">    
					<table class="tabla">
						<thead >
						<tr>
							<th>Id</th>
							<th>Paciente</th>
							<th>Estado del Paciente</th>
							<th>Descripcion</th>
							<th class="fondo_chico">Fecha</th>
							<th>Estado</th>
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
	
				for ($n=0; $n < count($psicologia); $n++) { 
					$estado =  $psicologia[$n]['estado_atencion'];
					$estadoT = 'completado';
					if($estado == 'Completado'){
						$estadoT = 'completado';
					 }else{
						 $estadoT = 'pendiente';
					 }
					$template_psicologia .= '
						<tr>
							
							<td>' .  $psicologia[$n]['idpsicologia'] . '</td>
							<td>' .  $psicologia[$n]['Paciente'] . '</td>
							<td>' .  $psicologia[$n]['estado_psi'] . '</td>
							<td>' .  $psicologia[$n]['descripcion_psi'] . '</td>
							<td >' .  $psicologia[$n]['fecha'] . '</td>
							<td class="center"><span class=" label '.$estadoT.'">' .  $psicologia[$n]['estado_atencion'] . '</span></td>  
	
						
							<td  class="action">
								<form method="POST">
									<input type="hidden" name="r" value="psicologia-edit">
									<input type="hidden" name="idpsicologia" value="' .$psicologia[$n]['idpsicologia'] . '">
									<input type="hidden" name="dni_per" value="' .$psicologia[$n]['dni_per'] . '">
									<input class="boton--editar" type="submit" value="">
								</form>
						
								<form method="POST">
									<input type="hidden" name="r" value="psicologia-delete">
									<input type="hidden" name="idpsicologia" value="' . $psicologia[$n]['idpsicologia'] . '">
									<input class="boton--eliminar" type="submit" value="">
								</form>
								<form method="POST">
									<input type="hidden" name="r" value="psicologia-report">
									<input type="hidden" name="idpsicologia" value="' . $psicologia[$n]['idpsicologia'] . '">
									<input class="boton--reporte" type="submit" value="">
								</form>
							</td>
						</tr>
				'; 
			}
	
			$template_psicologia  .= '
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





printf($template_psicologia);