<?php 
$med_controller = new MedController();

if( $_POST['r'] == 'medicina-delete' && $_SESSION['rol'] == 'Medico' && !isset($_POST['crud'])  ) {

	$med = $med_controller->get($_POST['idmedico']);

	if( empty($med) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe El Historial Psicologico <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("movieseries")
				}
			</script>
		';

		printf($template, $_POST['idmedico']);
	} else {
		$template_med = '
        <div class="gestion">
        <div class="gestion__nombre">
            <h2 class="no-margin gestion__titulo">Eliminar Consulta Médica</h2>
        </div>


			<form method="POST" class="pregunta">
				<div class="pregunta__eliminar">
					¿Estas seguro de eliminar la Consulta Médica: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="pregunta__opciones">
					<input  class=" boton boton--no_eliminar" type="submit" value="SI">
					<input class="boton boton--negar" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="idmedico" value="%s">
					<input type="hidden" name="r" value="medicina-delete">
					<input type="hidden" name="crud" value="del">
				</div>
			</form>

            </div>
        
            </div>
		';

		printf(
			$template_med,
			$med[0]['idmedico'],
			$med[0]['idmedico']
		);	
	}

} else if( $_POST['r'] == 'medicina-delete' && $_SESSION['rol'] == 'Medico' && $_POST['crud'] == 'del' ) {	

	$med = $med_controller->del($_POST['idmedico']);

	$template = '
		<div class="container">
			<p class="error">Consulta <b>%s</b> eliminada</p>
		</div>
		<script>
        function reloadPage(url) {
            setTimeout(function (){
                window.location.href = url
            }, 2000)
        }
        window.onload = function () {
         reloadPage("psicologia")
         }
		</script>
	';

	printf($template, $_POST['idmedico']);
} else {
	$controller = new ViewController();
	$controller->load_view('error404');
}