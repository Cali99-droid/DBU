<?php 
$user_controller = new UsersController();

if( $_POST['r'] == 'cuenta-delete' && $_SESSION['rol'] == 'Administrador' && !isset($_POST['crud'])  ) {

	$user = $user_controller->get($_POST['user']);

	if( empty($user) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe el usuario <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("usuarios")
				}
			</script>
		';

		printf($template, $_POST['user']);
	} else {
		$template_user = '
        <div class="gestion">
        <div class="gestion__nombre">
            <h2 class="no-margin gestion__titulo">Eliminar Cuenta</h2>
        </div>


			<form method="POST" class="pregunta">
				<div class="pregunta__eliminar">
					¿Estas seguro de eliminar la Cuenta de: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="pregunta__opciones">
					<input  class=" boton boton--no_eliminar" type="submit" value="SI">
					<input class="boton boton--negar" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="user" value="%s">
					<input type="hidden" name="r" value="cuenta-delete">
					<input type="hidden" name="crud" value="del">
				</div>
			</form>

            </div>
        
            </div>
		';

		printf(
			$template_user,
			$user[0]['USER'],
			$user[0]['USER']
		);	
	}

} else if( $_POST['r'] == 'cuenta-delete' && $_SESSION['rol'] == 'Administrador' && $_POST['crud'] == 'del' ) {	

     $user_controller->del($_POST['user']);

	$template = '
		<div class="container">
			<p class="error">Cuenta de usuario <b>%s</b> eliminada</p>
		</div>
		<script>
        function reloadPage(url) {
            setTimeout(function (){
                window.location.href = url
            }, 2000)
        }
        window.onload = function () {
         reloadPage("usuarios")
         }
		</script>
	';

	printf($template, $_POST['user']);
} else {
	$controller = new ViewController();
	$controller->load_view('error404');
}