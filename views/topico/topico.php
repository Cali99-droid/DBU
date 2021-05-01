<?php 

//require("C:/wamp64/www/Proyectos/DBU/controllers/PsiController.php");

$top_controller = new TopController();
$topico = $top_controller->get();

if( empty($topico) ) {
	print( '
		<div class="container">
			<p class="item  error">No hay Status</p>
		</div>
	');
} else {
	$template_topico = '
	
	<div class="gestion">
		<div class="gestion__nombre">
			<h2 class="no-margin gestion__titulo">Gestión Tópico</h2>
		</div>

		<div class="gestion__area">
			<div class="busqueda">
				<input class="campo__buscar" type="text" placeholder="Buscar Paciente">
				<button class="boton boton--buscar">Buscar</button>
			</div> 
            
            <form method="POST">
				<input type="hidden" name="r" value="historial-add">
				<input class="boton boton--nuevo" type="submit" value="Aperturar Historial">
			</form>
		</div>

		<div class="contenedor ">   
			<div class="contenedor__tabla">    
				<table class="tabla">
					<thead >
					<tr>
						<th>ID</th>
						<th>Paciente</th>
						<th>Tipo de Sangre</th>
						<th>Peso</th>
                        <th>Talla</th>
						<th>Fecha</th>
						<th>Estado</th>
						<th class="act">Acciones</th>
						<th>
						<form method="POST">
								<input type="hidden" name="r" value="topico-add">
								<input class="boton boton--nuevo" type="submit" value="Nuevo">
						</form>
						</th>
						
					</tr>
					</thead>
					<tbody>';

			for ($n=0; $n < count($topico); $n++) { 
				$estado =  $topico[$n]['estado_atencion'];
				$estadoT = 'completado';

				if($estado == 'Completado'){
                   $estadoT = 'completado';
				}else{
					$estadoT = 'pendiente';
				}
				$template_topico .= '
					<tr>
					    
						<td>' .  $topico[$n]['idtopico'] . '</td>
						<td>' .  $topico[$n]['Paciente'] . '</td>
						<td>' .  $topico[$n]['tipo_sangre'] . '</td>
						<td>' .  $topico[$n]['peso_pas'] . '</td>
						<td>' .  $topico[$n]['talla_pas'] . '</td> 
                        <td>' .  $topico[$n]['fecha'] . '</td> 
						<td class="center"><span class=" label '.$estadoT.'">' .  $topico[$n]['estado_atencion'] . '</span></td> 

					
						<td  class="action">
							<form method="POST">
								<input type="hidden" name="r" value="topico-edit">
								<input type="hidden" name="idtopico" value="' .$topico[$n]['idtopico'] . '">
								<input type="hidden" name="dni_per" value="' .$topico[$n]['dni_per'] . '">
								<input class="boton--editar" type="submit" value="">
							</form>
					
							<form method="POST">
								<input type="hidden" name="r" value="topico-delete">
								<input type="hidden" name="idtopico" value="' . $topico[$n]['idtopico'] . '">
								<input class="boton--eliminar" type="submit" value="">
							</form>

							
							<form method="POST">
								<input type="hidden" name="r" value="topico-report">
								<input type="hidden" name="idtopico" value="' . $topico[$n]['idtopico'] . '">
								<input class="boton--reporte" type="submit" value="">
							</form>
							
						</td>
					</tr>
			'; 
		}

		$template_topico  .= '
				    </tbody>
				</table>
			</div>
		</div>  
	</div>

	</body>
</main>

  </html>

	';


	printf($template_topico);
}