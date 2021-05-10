<?php 
$med_controller = new MedController();

if($_POST['r'] == 'medicina-edit' && $_SESSION['ROL'] == 'Medico' && !isset($_POST['crud']) ) {

	$med = $med_controller->get($_POST['idmedico']);
    $dni = $_POST['dni_per'];
  //  $fecha =  date("Y-m-d");
	if( empty($med) ) {
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

		printf($template, $_POST['idmedico']);
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
            <h2 class="no-margin gestion__titulo">Editar Datos</h2>
        </div>

        <div class="gestion__cuerpo--med">
            
            <form method="POST" class="formulario__entrada--med">
              
                <fieldset class="grupo">

                <legend align="left">Antecedentes</legend>
                <div class="campo">
                    <label for="ant_medicos" class="campo__label medico">Medicos</label>
                    <input class="campo__field-med" type="text" value="%s"  placeholder="" id="ant_medicos" name="ant_medicos" required>
                </div>

                <div class="campo">
                    <label for="ant_quirurgicos" class="campo__label medico">Quirurgicos</label>
                    <input   class="campo__field-med" type="text" value="%s"   name="ant_quirurgicos" required>
                </div>

                <div class="campo">
                    <label for="hozpitalizaciones" class="campo__label medico">Hozpitalizaciones</label>
                    <input name="hozpitalizaciones"  value="%s"  class=" campo__field-med"></input>
                </div>

                <div class="campo">
                    <label for="habitos_nocivos" class="campo__label medico">Hábitos Nocivos</label>
                    <input name="habitos_nocivos"  value="%s"  class=" campo__field-med"></input>
                </div>

                <div class="campo">
                    <label for="otros" class="campo__label medico">Otros</label>
                    <input name="otros"  class=" campo__field-med"  value="%s" ></input>
                </div>

                </fieldset>

                <fieldset class="grupo">
                <legend align="left">Enfermedad Actual</legend>
                
                <div class="campo">
                    <label for="tipo_enfermedad" class="campo__label medico">Tipo de enfermedad</label>
                    <input name="tipo_enfermedad" value="%s"   class=" campo__field-med"></input>
                </div>

                <div class="campo">
                    <label for="forma_inicio" class="campo__label medico">Forma de Inicio </label>
                    <input name="forma_inicio" value="%s"   class=" campo__field-med"></input>
                </div>

                <div class="campo">
                    <label for="sintomas" class="campo__label medico">Síntomas</label>
                    <input name="sintomas"  value="%s"  class=" campo__field-med"></input>
                </div>
                </fieldset>

                <fieldset class="grupo">
              
                <legend align="left">Datos</legend>
                <div class="campo">
                    <label for="diagnostico" class="campo__label medico">Diagnostico</label>
                    <textarea name="diagnostico"  value="%s"  class="campo__field--textarea campo__field"></textarea>
                </div>

                <div class="campo">
                    <label for="tratamiento" class="campo__label medico">Tratamiento</label>
                    <textarea name="tratamiento"  value="%s"  class="campo__field--textarea campo__field"></textarea>
                </div>

                </fieldset>

                <div class="campo campo__med">
                    <div class="dni__med">
                        <label for="codigo" class="campo__label medico">DNI</label>
                        <input  class="campo__field num" type="number" value="%s"  placeholder="DNI " name="codigo" required>
                    </div>
                   
                    <label for="fecha" class="campo__label medico">Fecha</label>
                    <input  type="date" class="campo__field-med" name="fecha"  value="%s"></input>

                    <div class="campo guardar_psi">
                    <input type="submit" value="Guardar" class="boton boton--guardar ">
                    <input type="hidden" name="r" value="medicina-edit">
				    <input type="hidden" name="crud" value="set">
                   </div>
               </div>

               <div >
               <input type="hidden" placeholder="idmedico" value="%s" disabled required>
               <input type="hidden" name="idmedico" value="%s" >
               </div>

               
            </form>

        </div>
        
    </div>
	';

		printf(
			$template_psi,
            
			$med[0]['ant_medicos'],
			$med[0]['ant_quirurgicos'],
            $med[0]['hozpitalizaciones'],
            $med[0]['habitos_nocivos'],		
            $med[0]['otros'],
            $med[0]['tipo_enfermedad'],
            $med[0]['forma_inicio'],
            $med[0]['sintomas'],
            $med[0]['diagnostico'],
            $med[0]['tratamiento'],
            $dni,
            $med[0]['fecha'],
            $med[0]['idmedico'],
            $med[0]['idmedico']
		);	
	}

} else if( $_POST['r'] == 'medicina-edit' && $_SESSION['ROL'] == 'Medico'&& $_POST['crud'] == 'set' ) {	

	$save_med = array(

		'ant_medicos' =>  $_POST['ant_medicos'], 
		'ant_quirurgicos' =>  $_POST['ant_quirurgicos'], 
		'hozpitalizaciones' =>  $_POST['hozpitalizaciones'],
        'habitos_nocivos' =>  $_POST['habitos_nocivos'],
        'otros' =>  $_POST['otros'],
        'tipo_enfermedad' =>  $_POST['tipo_enfermedad'],
        'forma_inicio' =>  $_POST['forma_inicio'],
        'sintomas' =>  $_POST['sintomas'],
        'fecha' =>  $_POST['fecha'],
        'codigo' =>  $_POST['codigo'],
		'diagnostico' =>  $_POST['diagnostico'],
		'tratamiento' =>  $_POST['tratamiento'],
        'idmedico' => $_POST['idmedico']

	);

	$med = $med_controller->update($save_med);
    $mensajeC = 'INSERTADO CON ÉXITO';
    $mensajeU = 'ACTUALIZADO CON ÉXITO';
    if($med[0] == $mensajeC || $med[0] == $mensajeU ){
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
            reloadPage("medicina")
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
         reloadPage("medicina")
         }
         </script>
  
        
	';
    }

        printf($template,  $med[0]);

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