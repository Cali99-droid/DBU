<?php 
$pas_controller = new PacienteController();

if( $_POST['r'] == 'paciente-delete' && $_SESSION['ROL'] == 'Administrador' && !isset($_POST['crud'])  ) {

	$pas = $pas_controller->get($_POST['idpaciente']);

	if( empty($pas) ) {
		$template = '
			<div class="container">
				<p class=" error">No existe el paciente <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("pacientes")
				}
			</script>
		';

		printf($template, $_POST['idpaciente']);
	} else {
		$template_pas = '
        <div class="gestion">
        <div class="gestion__nombre">
            <h2 class="no-margin gestion__titulo">Eliminar Paciente</h2>
        </div>


			<form method="POST" class="pregunta">
				<div class="pregunta__eliminar">
					¿Estas seguro de eliminar el paciente: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="pregunta__opciones">
					<input  class=" boton boton--no_eliminar" type="submit" value="SI">
					<input class="boton boton--negar" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="idpaciente" value="%s">
					<input type="hidden" name="r" value="paciente-delete">
					<input type="hidden" name="crud" value="del">
				</div>
			</form>

            </div>
        
            </div>
		';

		printf(
			$template_pas,
			$pas[0]['IDPACIENTE'],
			$pas[0]['IDPACIENTE']
		);	
	}

} else if( $_POST['r'] == 'paciente-delete' && $_SESSION['ROL'] == 'Administrador' && $_POST['crud'] == 'del' ) {	

	$pas = $pas_controller->del($_POST['idpaciente']);

	$template = '
		<div class="container">
			<p class="error"> <b>%s</b> </p>
		</div>
		<script>
        function reloadPage(url) {
            setTimeout(function (){
                window.location.href = url
            }, 3000)
        }
        window.onload = function () {
         reloadPage("pacientes")
         }
		</script>
	';

	printf($template, $pas[0]);
} else {
	$controller = new ViewController();
	$controller->load_view('error404');
}