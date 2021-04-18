<?php 
$psi_controller = new PsiController();

if($_POST['r'] == 'psicologia-edit' && $_SESSION['rol'] == 'psicologo' && !isset($_POST['crud']) ) {

	$psi = $psi_controller->get($_POST['idpsicologia']);

	if( empty($psi) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe el Historial <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("movieseries")
				}
			</script>
		';

		printf($template, $_POST['idpsicologia']);
	} else {
		
		// $status_controller = new StatusController();
		// $status = $status_controller->get();
		// $status_select = '';

		// for ($n=0; $n < count($status); $n++) { 
		// 	$selected = ($ms[0]['status'] == $status[$n]['status']) ? 'selected' : '';
		// 	$status_select .= '<option value="' . $status[$n]['status_id'] . '"' . $selected . '>' . $status[$n]['status'] . '</option>';
		// }

		$template_psi = '
        <div class="gestion">
        <div class="gestion__nombre">
            <h2 class="no-margin gestion__titulo">Ingresar Datos</h2>
        </div>

        <div class="gestion__cuerpo">
            <form method="POST" class="formulario__entrada">
            
                  <div class="campo">
                    <label for="codigo" class="campo__label">DNI</label>
                    <input  class="campo__field num" type="number" placeholder="DNI " name="codigo" value="%s" required >
                    </div>

          
                <div class="campo">
                    <label for="estado_psi" class="campo__label">Estado</label>
                    <input class="campo__field" type="text" placeholder="" id="estado_psi" name="estado_psi" value="%s" required>
                </div>



                <div class="campo">
                    <label for="descripcion_psi" class="campo__label">Descripcion</label>
                    <input   class="campo__field" type="text"  name="descripcion_psi" value="%s" required>
                </div>

                <div class="campo">
                    <label for="fecha" class="campo__label">Fecha</label>
                    <input  class="campo__field" name="fecha" value="%s"  required></input>
                </div>

                <div class="campo">
                    <label for="diagnostico" class="campo__label">Diagnostico</label>
                    <input name="diagnostico"  class="campo__field--textarea campo__field" value="%s" >
                </div>

                <div class="campo">
                    <label for="tratamiento" class="campo__label">Tratamiento</label>
                    <input name="tratamiento"  class="campo__field--textarea campo__field" value="%s" >
                </div>

                <div class="campo guardar_psi">
                    <input type="submit" value="Guardar" class="boton boton--guardar ">
                    <input type="hidden" name="r" value="psicologia-edit">
				    <input type="hidden" name="crud" value="set">
                </div>

                <div >
                    <input type="hidden" placeholder="idpsicologia" value="%s" disabled required>
                    <input type="hidden" name="idpsicologia" value="%s" >
                </div>
               

               
            </form>
        </div>
        
    </div>
	';

		printf(
			$template_psi,
		
            $psi[0]['idpaciente'],
			$psi[0]['estado_psi'],
			$psi[0]['descripcion_psi'],
			$psi[0]['fecha'],
			$psi[0]['diagnostico'],
			$psi[0]['tratamiento'],
            $psi[0]['idpsicologia'],
            $psi[0]['idpsicologia']
		);	
	}

} else if( $_POST['r'] == 'psicologia-edit' && $_SESSION['rol'] == 'psicologo'&& $_POST['crud'] == 'set' ) {	

	$save_psi = array(

		'estado_psi' =>  $_POST['estado_psi'], 
		'descripcion_psi' =>  $_POST['descripcion_psi'], 
		'fecha' =>  $_POST['fecha'],
        'codigo' =>  $_POST['codigo'],
		'diagnostico' =>  $_POST['diagnostico'],
		'tratamiento' =>  $_POST['tratamiento'],

	);

	$psi = $psi_controller->set($save_psi);
    $mensajeC = 'INSERTADO CON ÉXITO';
    $mensajeU = 'ACTUALIZADO  CON ÉXITO';
    if($psi[0] == $mensajeC || $psi[0] == $mensajeU ){
        $template = '
		<div class="container">
			<p class="exito">%s</p>
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

    } else{
        $template = '
		<div class="container">
			<p class="error">%s</p>
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
    }

        printf($template,  $psi[0]);

} else {
	$controller = new ViewController();
	$controller->load_view('error404'); //401
}

// window.onload = function () {
//     reloadPage("psicologia")
// }
// </script>


  //  <div class="campo">
            //     <label for="codigo" class="campo__label">DNI</label>
            //     <input  class="campo__field num" type="number" placeholder="DNI " name="codigo" value="%s" required >
            //     </div>