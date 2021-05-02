<?php 

//require("C:/wamp64/www/Proyectos/DBU/controllers/PsiController.php");

$odon_controller = new OdonController();
$odontologia = $odon_controller->get();

if( empty($odontologia) ) {
	print( '
		<div class="container">
			<p class="item  error">No hay Status</p>
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
				<input class="campo__buscar" type="text" placeholder="Buscar Paciente">
				<button class="boton boton--buscar">Buscar</button>
			</div> 
            
            <form method="POST">
				<input type="hidden" name="r" value="historial-add">
				<input class="boton boton--nuevo" type="submit" value="estadistica">
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


	printf($template_odontologia);
}