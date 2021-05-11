  
<?php 
if( $_POST['r'] == 'topico-add' && $_SESSION['ROL'] == 'Topico' && !isset($_POST['crud']) ) {
   
     $fecha =  date("Y-m-d");
   
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

        <div class="gestion__cuerpo">
            <form method="POST" class="formulario__entrada">

                <div class="campo">
                <label for="codigo" class="campo__label">DNI</label>
                <input  class="campo__field num" type="number" placeholder="DNI " name="codigo" required>
                </div>

                <div class="campo">
                <label for="fecha" class="campo__label">Fecha</label>
                <input  type="text" class="campo__field" name="fecha"  value="%s"></input>
                </div>
                
                <div class="campo">
                <label for="tipo_sangre" class="campo__label">Tipo de Sangre</label>
                  <select  class="campo__field--select" name="tipo_sangre"  placeholder="Tipo de Sangre" required>
                    <option value="s">SELECCIONE</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="AB-">AB-</option>
                    <option value="O-">O-</option>
                 
                  </select>
                </div>

                
                <div class="campo">
                <label for="tipo_consulta" class="campo__label">Tipo de Consulta</label>
                  <select  class="campo__field--select" name="tipo_consulta"  placeholder="Tipo de Sangre" required>
                    <option value="">SELECCIONE</option>
                    <option value="examen">Examen</option>
                    <option value="consulta">Consulta</option>
                 
                  </select>
                </div>

                <div class="campo">
                    <label for="peso_pas" class="campo__label" >Peso</label>
                    <input   class="campo__field" type="number"  name="peso_pas" step="0.01" required>
                </div>

        
                <div class="campo">
                    <label for="talla_pas" class="campo__label">Talla</label>
                    <input type="number" name="talla_pas"  class=" campo__field"  step="0.01" required></input>
                </div>

                <div class="campo">
                    <label for="obser_top" class="campo__label">Observación</label>
                    <textarea name="obser_top"  class="campo__field--textarea campo__field"></textarea>
                </div>

                


                <div class="campo guardar_psi">
                    <input type="submit" value="Guardar" class="boton boton--guardar ">
                    <input type="hidden" name="r" value="topico-add">
				    <input type="hidden" name="crud" value="set">
                </div>
            </form>
        </div>
        
    </div>
	', $fecha);	

} else if( $_POST['r'] == 'topico-add' && $_SESSION['ROL'] == 'Topico' && $_POST['crud'] == 'set' ) {
    $top_controller = new TopController();
    $indice = 0;
    
	$new_top = array(
		'idtopico' =>  $indice,
		'tipo_sangre' =>  $_POST['tipo_sangre'], 
        'pa_pas' => '', /*$_POST['pa_pas'], */
        'pl_pas' => '', /* $_POST['pl_pas'], */
        'fc_pas' => '', /* $_POST['fc_pas'], */
		'peso_pas' =>  $_POST['peso_pas'], 
		'talla_pas' =>  $_POST['talla_pas'],
		'obser_top' =>  $_POST['obser_top'],  
		'fecha' =>  $_POST['fecha'],
        'codigo' =>  $_POST['codigo']
	
	);

    if($_POST['tipo_consulta'] == 'examen'){
        $top = $top_controller->setNuevoExamen($new_top);
        //$mensaje = 'EL PACIENTE TIENE PENDIENTE EL EXAMEN MÉDICO, PSICOLÓGICO Y ODONTOLÓGICO';
    }else{
        $top = $top_controller->set($new_top);
       // 
    }

    $mensaje = 'INSERTADO CON ÉXITO';
    if($top[0] == 'INSERTADO CON ÉXITO'){
       
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
            reloadPage("topico")
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
            reloadPage("topico")
        }
        </script>
        
	';
    }

    
	

        printf($template,  $top[0]);
    
	
} else {
	$controller = new ViewController();
	$controller->load_view('error404'); //401
}

/*  */