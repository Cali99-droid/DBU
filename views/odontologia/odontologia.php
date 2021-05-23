<?php 
$template_odontologia = '';
//require("C:/wamp64/www/Proyectos/DBU/controllers/PsiController.php");
if($_SESSION['ROL'] == 'Estudiante'  ) {
	$odon_controller = new OdonController();
	$odontologia = $odon_controller->getHistorial($_SESSION['dni_per']);
	if( empty($odontologia) ) {
		print( '
			<div class="container">
				<p class="item  error">No cuenta con consultas odontologicas</p>
			</div>
		');
	} else {
		$template_odontologia = '
		
		<div class="gestion">
			<div class="gestion__nombre">
				<h2 class="no-margin gestion__titulo">Mis consultas Odontológicas</h2>
			</div>
	
			
				
				
		
	
			<div class="contenedor ">   
				<div class="contenedor__tabla">    
					<table class="tabla">
						<thead >
						<tr>
							<th>ID</th>
							<th>Paciente</th>
							<th>Diagnostico</th>
							<th>Tratamiento</th>
							<th>Fecha</th>
							<th>Estado Atención</th>
							<th class="act">Acciones</th>
						
							
						</tr>
						</thead>
						<tbody>';
	
				for ($n=0; $n < count($odontologia); $n++) { 
					$estado =  $odontologia[$n]['estado_atencion'];
					$estadoT = 'completado';
	
					if($estado == 'Completado'){
					   $estadoT = 'completado';
					}else{
						$estadoT = 'pendiente';
					}
					$template_odontologia .= '
						<tr>
							
							<td>' .  $odontologia[$n]['idodontologo'] . '</td>
							<td>' .  $odontologia[$n]['Paciente'] . '</td>
							<td>' .  $odontologia[$n]['diagnostico'] . '</td>
							<td>' .  $odontologia[$n]['tratamiento'] . '</td>
							<td>' .  $odontologia[$n]['fecha'] . '</td>
		
							<td class="center"><span class=" label '.$estadoT.'">' .  $odontologia[$n]['estado_atencion'] . '</span></td> 
	
						
							<td  class="action">
							
	
								
								<form method="POST">
									<input type="hidden" name="r" value="odontologia-report">
									<input type="hidden" name="idodontologo" value="' . $odontologia[$n]['idodontologo'] . '">
									<input class="boton--reporte" type="submit" value="">
								</form>
								
							</td>
						</tr>
				'; 
			}
	
			$template_odontologia  .= '
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
$odon_controller = new OdonController();
$odontologia = $odon_controller->get();

if( empty($odontologia) ) {
	print( '
		<div class="container">
			<p class="item  error">No hay datos</p>
		</div>
	');
} else {
	$template_odontologia = '
	
	<div class="gestion">
		<div class="gestion__nombre">
			<h2 class="no-margin gestion__titulo">Gestión Odontología</h2>
		</div>

		<div class="gestion__area">
			<div class="busqueda">
				<form method="POST">
					<input type="hidden" name="r" value="odontologia-buscar">
					<input class="campo__buscar" name = "nombre" type="number" placeholder="Todos">
					<input class="boton boton--nuevo" type="submit" value="Buscar">
				</form>
			</div> 
			
			
			<form method="POST">
			
				<input type="hidden" name="r" value="odontologia-estadis">
				<input class="boton--dash" type="submit" value="">
				<p class="no-margin graf">Tablero informatívo</p>
			</form>
		</div>

		<div class="contenedor ">   
			<div class="contenedor__tabla">    
				<table class="tabla">
					<thead >
					<tr>
						<th>ID</th>
						<th>Paciente</th>
						<th>Diagnostico</th>
						<th>Tratamiento</th>
						<th>Fecha</th>
                        <th>Estado Atención</th>
						<th class="act">Acciones</th>
						<th>
						<form method="POST">
								<input type="hidden" name="r" value="odontologia-add">
								<input class="boton boton--nuevo" type="submit" value="Nuevo">
						</form>
						</th>
						
					</tr>
					</thead>
					<tbody>';

			for ($n=0; $n < count($odontologia); $n++) { 
				$estado =  $odontologia[$n]['estado_atencion'];
				$estadoT = 'completado';

				if($estado == 'Completado'){
                   $estadoT = 'completado';
				}else{
					$estadoT = 'pendiente';
				}
				$template_odontologia .= '
					<tr>
					    
						<td>' .  $odontologia[$n]['idodontologo'] . '</td>
						<td>' .  $odontologia[$n]['Paciente'] . '</td>
						<td>' .  $odontologia[$n]['diagnostico'] . '</td>
						<td>' .  $odontologia[$n]['tratamiento'] . '</td>
						<td>' .  $odontologia[$n]['fecha'] . '</td>
    
						<td class="center"><span class=" label '.$estadoT.'">' .  $odontologia[$n]['estado_atencion'] . '</span></td> 

					
						<td  class="action">
							<form method="POST">
								<input type="hidden" name="r" value="odontologia-edit">
								<input type="hidden" name="idodontologo" value="' .$odontologia[$n]['idodontologo'] . '">
								<input type="hidden" name="dni_per" value="' .$odontologia[$n]['dni_per'] . '">
								<input class="boton--editar" type="submit" value="">
							</form>
					
							<form method="POST">
								<input type="hidden" name="r" value="odontologia-delete">
								<input type="hidden" name="idodontologo" value="' . $odontologia[$n]['idodontologo'] . '">
								<input class="boton--eliminar" type="submit" value="">
							</form>

							
							<form method="POST">
								<input type="hidden" name="r" value="odontologia-report">
								<input type="hidden" name="idodontologo" value="' . $odontologia[$n]['idodontologo'] . '">
								<input class="boton--reporte" type="submit" value="">
							</form>
							
						</td>
					</tr>
			'; 
		}

		$template_odontologia  .= '
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

printf($template_odontologia);
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid