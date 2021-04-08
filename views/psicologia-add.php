  
<?php 
if( $_POST['r'] == 'psicologia-add' && $_SESSION['idrol'] == 4 && !isset($_POST['crud']) ) {


	//$psicologia_select = '';
/*/
	for ($n=0; $n < count($status); $n++) { 
		$status_select .= '<option value="' . $status[$n]['status_id'] . '">' . $status[$n]['status'] . '</option>';
	}
    */
	print('
    <div class="gestion">
        <div class="gestion__nombre">
            <h2 class="no-margin gestion__titulo">Ingresar Datos</h2>
        </div>

        <div class="gestion__cuerpo">
            <form method="POST" class="formulario__entrada">

                <div class="campo">
                <label for="codigo" class="campo__label">Codigo</label>
                <input class="campo__field" type="text" placeholder="Codigo de paciente" name="codigo">
                </div>
                <div class="campo">
                    <label for="estado_psi" class="campo__label">Estado</label>
                    <input class="campo__field" type="text" placeholder="" id="estado_psi" name="estado_psi">
                </div>

                <div class="campo">
                    <label for="descripcion_psi" class="campo__label">Descripcion</label>
                    <input class="campo__field" type="text"  name="descripcion_psi">
                </div>

                <div class="campo">
                    <label for="fecha" class="campo__label">Fecha</label>
                    <input  class="campo__field" name="fecha" ></input>
                </div>

                <div class="campo">
                    <label for="diagnostico" class="campo__label">Diagnostico</label>
                    <textarea name="diagnostico"  class="campo__field--textarea campo__field"></textarea>
                </div>

                <div class="campo">
                    <label for="tratamiento" class="campo__label">Tratamiento</label>
                    <textarea name="tratamiento"  class="campo__field--textarea campo__field"></textarea>
                </div>

                <div class="campo guardar_psi">
                    <input type="submit" value="Guardar" class="boton boton--guardar ">
                    <input type="hidden" name="r" value="psicologia-add">
				    <input type="hidden" name="crud" value="set">
                </div>
            </form>
        </div>
        
    </div>
	');	

} else if( $_POST['r'] == 'psicologia-add' && $_SESSION['idrol'] == 4 && $_POST['crud'] == 'set' ) {
    $psi_controller = new PsiController();
    $indice = 0;
    
	$new_psi = array(
		'idpsicologia' =>  $indice,
		'estado_psi' =>  $_POST['estado_psi'], 
		'descripcion_psi' =>  $_POST['descripcion_psi'], 
		'fecha' =>  $_POST['fecha'],
		'idpaciente' =>  $_POST['codigo'],  /* TODO */
		'diagnostico' =>  $_POST['diagnostico'],
		'tratamiento' =>  $_POST['tratamiento'],
	
	);

	$psi = $psi_controller->set($new_psi);

	$template = '
		<div class="container">
			<p class="item  add">Paciente <b>%s</b> salvada</p>
		</div>
        <script>
        function reloadPage(url) {
            setTimeout(function (){
                window.location.href = url
            }, 3000)
        }
        window.onload = function () {
            reloadPage("psicologia")
        }
        </script>
        
	';

	printf($template, $_POST['codigo']);
} else {
	$controller = new ViewController();
	$controller->load_view('error404'); //401
}