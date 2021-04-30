<?php 
$psi_controller = new PsiController();

if( $_POST['r'] == 'psicologia-delete' && $_SESSION['rol'] == 'psicologo' && !isset($_POST['crud'])  ) {

	$psi = $psi_controller->get($_POST['idpsicologia']);

	if( empty($psi) ) {
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

		printf($template, $_POST['idpsicologia']);
	} else {
		$template_psi = '
        <div class="gestion">
        <div class="gestion__nombre">
            <h2 class="no-margin gestion__titulo">Eliminar Consulta Psicologica</h2>
        </div>


			<form method="POST" class="pregunta">
				<div class="pregunta__eliminar">
					¿Estas seguro de eliminar la Consulta Psicologica: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="pregunta__opciones">
					<input  class=" boton boton--no_eliminar" type="submit" value="SI">
					<input class="boton boton--negar" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="idpsicologia" value="%s">
					<input type="hidden" name="r" value="psicologia-delete">
					<input type="hidden" name="crud" value="del">
				</div>
			</form>

            </div>
        
            </div>
		';

		printf(
			$template_psi,
			$psi[0]['idpsicologia'],
			$psi[0]['idpsicologia']
		);	
	}

} else if( $_POST['r'] == 'psicologia-delete' && $_SESSION['rol'] == 'psicologo' && $_POST['crud'] == 'del' ) {	

	$psi = $psi_controller->del($_POST['idpsicologia']);

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

	printf($template, $_POST['idpsicologia']);
} else {
	$controller = new ViewController();
	$controller->load_view('error404');
}