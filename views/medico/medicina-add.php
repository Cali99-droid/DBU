  
<?php 
if( $_POST['r'] == 'medicina-add' && $_SESSION['ROL'] == 'Medico' && !isset($_POST['crud']) ) {
   
     $fecha =  date("Y-m-d");
    // $fecha = date("Y-m-d",strtotime($fecha."- 1 days")); 
	//$psicologia_select = '';
/*/
	for ($n=0; $n < count($status); $n++) { 
		$status_select .= '<option value="' . $status[$n]['status_id'] . '">' . $status[$n]['status'] . '</option>';
	}
    */
	printf('
    <div class="gestion">
        <div class="gestion__nombre">
            <h2 class="no-margin gestion__titulo">Ingresar Datos</h2>
        </div>

        <div class="gestion__cuerpo--med">

                
  
            <form method="POST" class="formulario__entrada--med">
                   
                <fieldset class="grupo">

                <legend align="left">Antecedentes</legend>
                <div class="campo">
                    <label for="ant_medicos" class="campo__label medico">Medicos</label>
                    <input class="campo__field-med" type="text" placeholder="" id="ant_medicos" name="ant_medicos" required>
                </div>

                <div class="campo">
                    <label for="ant_quirurgicos" class="campo__label medico">Quirurgicos</label>
                    <input   class="campo__field-med" type="text"  name="ant_quirurgicos" required>
                </div>

                <div class="campo">
                    <label for="hozpitalizaciones" class="campo__label medico">Hozpitalizaciones</label>
                    <input name="hozpitalizaciones"  class=" campo__field-med"></input>
                </div>

                <div class="campo">
                    <label for="habitos_nocivos" class="campo__label medico">Hábitos Nocivos</label>
                    <input name="habitos_nocivos"  class=" campo__field-med"></input>
                </div>

                <div class="campo">
                    <label for="otros" class="campo__label medico">Otros</label>
                    <input name="otros"  class=" campo__field-med"></input>
                </div>

                </fieldset>

                <fieldset class="grupo">
                <legend align="left">Enfermedad Actual</legend>
                
                <div class="campo">
                    <label for="tipo_enfermedad" class="campo__label medico">Tipo de enfermedad</label>
                    <input name="tipo_enfermedad"  class=" campo__field-med"></input>
                </div>

                <div class="campo">
                    <label for="forma_inicio" class="campo__label medico">Forma de Inicio </label>
                    <input name="forma_inicio"  class=" campo__field-med"></input>
                </div>

                <div class="campo">
                    <label for="sintomas" class="campo__label medico">Síntomas</label>
                    <input name="sintomas"  class=" campo__field-med"></input>
                </div>
                </fieldset>

                <fieldset class="grupo">
              
                <legend align="left">Datos</legend>
                <div class="campo">
                    <label for="diagnostico" class="campo__label medico">Diagnostico</label>
                    <textarea name="diagnostico"  class="campo__field--textarea campo__field"></textarea>
                </div>

                <div class="campo">
                    <label for="tratamiento" class="campo__label medico">Tratamiento</label>
                    <textarea name="tratamiento"  class="campo__field--textarea campo__field"></textarea>
                </div>

                </fieldset>

                <div class="campo campo__med">
                    <div class="dni__med">
                    <label for="codigo" class="campo__label medico">DNI</label>
                    <input  class="campo__field " type="number" placeholder="DNI " name="codigo" required>
                    </div>
                   
                    <label for="fecha" class="campo__label medico">Fecha</label>
                    <input  type="date" class="campo__field-med" name="fecha"  value="%s"></input>
                    <div class="campo guardar_psi">
                    <input type="submit" value="Guardar" class="boton boton--guardar ">
                    <input type="hidden" name="r" value="medicina-add">
				    <input type="hidden" name="crud" value="set">
                </div>
               </div>

               
            </form>

        </div>
        
    </div>
	', $fecha);	

} else if( $_POST['r'] == 'medicina-add' && $_SESSION['ROL'] == 'Medico' && $_POST['crud'] == 'set' ) {
    $med_controller = new MedController();
    $indice = 0;
    
	$new_med = array(
		'idmedico' =>  $indice,
		'ant_medicos' =>  $_POST['ant_medicos'], 
		'ant_quirurgicos' =>  $_POST['ant_quirurgicos'], 
        'hozpitalizaciones' =>  $_POST['hozpitalizaciones'], 
        'habitos_nocivos' =>  $_POST['habitos_nocivos'], 
        'otros' =>  $_POST['otros'], 
        'tipo_enfermedad' =>  $_POST['tipo_enfermedad'], 
        'forma_inicio' =>  $_POST['forma_inicio'], 
        'sintomas' =>  $_POST['sintomas'], 
		'fecha' =>  $_POST['fecha'],
		'codigo' =>  $_POST['codigo'],  /* TODO */
		'diagnostico' =>  $_POST['diagnostico'],
		'tratamiento' =>  $_POST['tratamiento'],
	
	);

	$med = $med_controller->set($new_med);
    $mensaje = 'INSERTADO CON ÉXITO';
    if($med[0] == $mensaje ){
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
	$controller->load_view('error401'); //401
}

/*  */