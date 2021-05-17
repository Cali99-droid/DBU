<?php 
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid
//require("C:/wamp64/www/Proyectos/DBU/controllers/PsiController.php");



$pas_controller = new PacienteController();
$pacientes = $pas_controller->getBuscar($_POST['nombre']);

if( empty($pacientes) ) {
	print( '
		<div class="container">
			<p class="item  error">No hay Pacientes</p>
		</div>
        <script>
        function reloadPage(url) {
            setTimeout(function (){
                window.location.href = url
            }, 2000)
        }
        window.onload = function () {
         reloadPage("pacientes")
         }
         </script>
	');
} else {
	$template_pacientes = '
	
	<div class="gestion">
		<div class="gestion__nombre">
			<h2 class="no-margin gestion__titulo">Gestión De Pacientes</h2>
		</div>

		<div class="gestion__area">
			<div class="busqueda">
				<form method="POST">
					<input type="hidden" name="r" value="paciente-buscar">
					<input class="campo__buscar" name = "nombre" type="number" placeholder="Todos">
					<input class="boton boton--nuevo" type="submit" value="Buscar">
				</form>
			</div> 
			
			
			
		</div>

		<div class="contenedor ">   
			<div class="contenedor__tabla">    
				<table class="tabla">
					<thead >
					<tr>
						<th>Id</th>
                        <th>Historia Clinica</th>
						<th>Paciente</th>
						<th>DNI</th>
						<th>Codigo</th>
						<th>Tipo de Paciente</th>
						<th>Escuela</th>
						<th class="act">Acciones</th>
						<th>
						<form method="POST">
								<input type="hidden" name="r" value="paciente-add">
								<input class="boton boton--nuevo" type="submit" value="Nuevo">
						</form>
						</th>
						
					</tr>
					</thead>
					<tbody>';

			for ($n=0; $n < count($pacientes); $n++) { 
				
				$template_pacientes .= '
					<tr>
					    
						<td>' .  $pacientes[$n]['IDPACIENTE'] . '</td>
                        <td>' .  $pacientes[$n]['HISTORI_CLINICA'] . '</td>
						<td>' .  $pacientes[$n]['Paciente'] . '</td>
						<td>' .  $pacientes[$n]['dni_per'] . '</td>
						<td>' .  $pacientes[$n]['CODIGO'] . '</td>
						<td >' .  $pacientes[$n]['TIPO_PACIENTE'] . '</td>
                        <td >' .  $pacientes[$n]['ESCUELA'] . '</td>
						

					
						<td  class="action">
							<form method="POST">
								<input type="hidden" name="r" value="paciente-edit">
								<input type="hidden" name="idpaciente" value="' .$pacientes[$n]['IDPACIENTE'] . '">
								<input type="hidden" name="dni_per" value="' .$pacientes[$n]['dni_per'] . '">
								<input class="boton--editar" type="submit" value="">
							</form>
					
							<form method="POST">
								<input type="hidden" name="r" value="paciente-delete">
								<input type="hidden" name="idpaciente" value="' . $pacientes[$n]['IDPACIENTE'] . '">
								<input class="boton--eliminar" type="submit" value="">
							</form>
							
						</td>
					</tr>
			'; 
		}

		$template_pacientes  .= '
				    </tbody>
				</table>
			</div>
		</div>  
	</div>

	</body>
  </main>

  </html>

	';


		printf($template_pacientes);
	
}