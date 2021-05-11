<?php 
$top_controller = new TopController();

if( $_POST['r'] == 'topico-delete' && $_SESSION['ROL'] == 'Topico' && !isset($_POST['crud'])  ) {

	$top = $top_controller->get($_POST['idtopico']);

	if( empty($top) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe El Historial topico <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("topico")
				}
			</script>
		';

		printf($template, $_POST['idtopico']);
	} else {
		$template_top = '
        <div class="gestion">
        <div class="gestion__nombre">
            <h2 class="no-margin gestion__titulo">Eliminar Consulta Tópico</h2>
        </div>


			<form method="POST" class="pregunta">
				<div class="pregunta__eliminar">
					¿Estas seguro de eliminar la Consulta de Triaje: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="pregunta__opciones">
					<input  class=" boton boton--no_eliminar" type="submit" value="SI">
					<input class="boton boton--negar" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="idtopico" value="%s">
					<input type="hidden" name="r" value="topico-delete">
					<input type="hidden" name="crud" value="del">
				</div>
			</form>

            </div>
        
            </div>
		';

		printf(
			$template_top,
			$top[0]['idtopico'],
			$top[0]['idtopico']
		);	
	}

} else if( $_POST['r'] == 'topico-delete' && $_SESSION['ROL'] == 'Topico' && $_POST['crud'] == 'del' ) {	

	$top = $top_controller->del($_POST['idtopico']);

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
         reloadPage("topico")
         }
		</script>
	';

	printf($template, $_POST['idtopico']);
} else {
	$controller = new ViewController();
	$controller->load_view('error404');
}