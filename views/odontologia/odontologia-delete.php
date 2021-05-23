<?php 
$odon_controller = new OdonController();

if( $_POST['r'] == 'odontologia-delete' && $_SESSION['ROL'] == 'Odontologo' && !isset($_POST['crud'])  ) {

	$odon = $odon_controller->get($_POST['idodontologo']);

	if( empty($odon) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe El Historial odontologico <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("odontologia")
				}
			</script>
		';

		printf($template, $_POST['idodontologo']);
	} else {
		$template_odon = '
        <div class="gestion">
        <div class="gestion__nombre">
            <h2 class="no-margin gestion__titulo">Eliminar Consulta Odontologica</h2>
        </div>


			<form method="POST" class="pregunta">
				<div class="pregunta__eliminar">
					¿Estas seguro de eliminar la Consulta Odontológica: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="pregunta__opciones">
					<input  class=" boton boton--no_eliminar" type="submit" value="SI">
					<input class="boton boton--negar" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="idodontologo" value="%s">
					<input type="hidden" name="r" value="odontologia-delete">
					<input type="hidden" name="crud" value="del">
				</div>
			</form>

            </div>
        
            </div>
		';

		printf(
			$template_odon,
			$odon[0]['idodontologo'],
			$odon[0]['idodontologo']
		);	
	}

} else if( $_POST['r'] == 'odontologia-delete' && $_SESSION['ROL'] == 'Odontologo' && $_POST['crud'] == 'del' ) {	

	$odon = $odon_controller->del($_POST['idodontologo']);

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
         reloadPage("odontologia")
         }
		</script>
	';

	printf($template, $_POST['idodontologo']);
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}