<?php 

//require("C:/wamp64/www/Proyectos/DBU/controllers/PsiController.php");



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
						<th>Estado</th>
						<th>Descripcion</th>
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

			for ($n=0; $n < count($psicologia); $n++) { 
				$template_psicologia .= '
					<tr>
						<td>' . $psicologia[$n]['idpsicologia'] . '</td>
						<td>' .  $psicologia[$n]['estado_psi'] . '</td>
						<td>' .  $psicologia[$n]['descripcion_psi'] . '</td>
						<td>' .  $psicologia[$n]['fecha'] . '</td> 
						<td>' .  $psicologia[$n]['idpaciente'] . '</td>

					
						<td  class="action">
							<form method="POST">
								<input type="hidden" name="r" value="psicologia-edit">
								<input type="hidden" name="idpsicologia" value="' .$psicologia[$n]['idpsicologia'] . '">
								<input class="boton--editar" type="submit" value="">
							</form>
					
							<form method="POST">
								<input type="hidden" name="r" value="psicologia-delete">
								<input type="hidden" name="idpsicologia" value="' . $psicologia[$n]['idpsicologia'] . '">
								<input class="boton--eliminar" type="submit" value="">
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


	printf($template_psicologia);
}