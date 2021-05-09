<?php 
$odon_controller = new Odoncontroller();

if($_POST['r'] == 'odontologia-edit' && $_SESSION['ROL'] == 'Odontologo' && !isset($_POST['crud']) ) {

	$odon = $odon_controller->get($_POST['idodontologo']);
    $dni = $_POST['dni_per'];
    $fecha =  date("Y-m-d");
	if( empty($odon) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe el Historial <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("odontologia")
				}
			</script>
		';

		printf($template, $_POST['idodontologo']);
	} else {
		
		// $status_controller = new StatusController();
		// $status = $status_controller->get();
		// $status_select = '';

		// for ($n=0; $n < count($status); $n++) { 
		// 	$selected = ($ms[0]['status'] == $status[$n]['status']) ? 'selected' : '';
		// 	$status_select .= '<option value="' . $status[$n]['status_id'] . '"' . $selected . '>' . $status[$n]['status'] . '</option>';
		// }

		$template_odon = '
        <div class="gestion">
        <div class="gestion__nombre">
            <h2 class="no-margin gestion__titulo">Editar Datos Odontológicos</h2>
        </div>

        <div class="gestion__cuerpo">
            <form method="POST" class="formulario__entrada">

                <div class="campo">
                <label for="codigo" class="campo__label">DNI</label>
                <input  class="campo__field num" type="number" value="%s" placeholder="DNI " name="codigo" required>
                </div>

                <div class="campo">
                <label for="fecha" class="campo__label">Fecha</label>
                <input  type="text" class="campo__field"  name="fecha"  value="%s"></input>
                </div>
                

                <div class="campo">
                    <label for="labios" class="campo__label" >Labios</label>
                    <input   class="campo__field" type="text" value="%s"  name="labios"  required>
                </div>

                
                <div class="campo">
                    <label for="carrillos" class="campo__label" >Carrillos</label>
                    <input   class="campo__field" type="text" value="%s" name="carrillos"  required>
                </div>

                <div class="campo">
                <label for="encias" class="campo__label" >Encias</label>
                <input   class="campo__field" type="text"  value="%s" name="encias"  required>
            </div>

            
            <div class="campo">
                <label for="paladar" class="campo__label" >Paladar</label>
                <input   class="campo__field" type="text" value="%s"  name="paladar"  required>
            </div>

            <div class="campo">
                <label for="zona_retromoral" class="campo__label" >Zona retromoral</label>
                <input   class="campo__field" type="text" value="%s"  name="zona_retromoral"  required>
            </div>

        
                <div class="campo">
                    <label for="oro_faringe" class="campo__label">Orofaringe</label>
                    <input type="text" name="oro_faringe" value="%s"  class=" campo__field"  required></input>
                </div>

                <div class="campo">
                    <label for="otros" class="campo__label">Otros</label>
                    <input name="otros" value="%s"  class="campo__field campo__field"></input>
                </div>


                <div class="campo">
                <label for="diagnostico" class="campo__label">Diagnostico</label>
                <input name="diagnostico" value="%s"  class="campo__field--textarea campo__field"></input>
            </div>

            <div class="campo">
                <label for="tratamiento" class="campo__label">Tratamiento</label>
                <input name="tratamiento"  value="%s" class="campo__field--textarea campo__field"></input>
            </div>

   

            
            <div class="campo">
            <label for="atm" class="campo__label">ATM</label>
            <input name="atm" value="%s"  class="campo__field campo__field"></input>
           <br>
           <div >
           <input type="hidden" placeholder="idodontologo" value="%s" disabled required>
           <input type="hidden" name="idodontologo" value="%s" >
           </div>
            <div class="campo guardar_psi">
                    <input type="submit" value="Guardar" class="boton boton--guardar ">
                    <input type="hidden" name="r" value="odontologia-edit">
				    <input type="hidden" name="crud" value="set">
                </div>
            </div>

          
           
                
            </form>
        </div>
        
    </div>
	';

		printf(
			$template_odon,
            $dni,
			$odon[0]['fecha'],
			$odon[0]['labios'],
			$odon[0]['carrillos'],
			$odon[0]['encias'],
            $odon[0]['paladar'],
            $odon[0]['zona_retromoral'],
            $odon[0]['oro_faringe'],
            $odon[0]['otros'],
            $odon[0]['diagnostico'],
            $odon[0]['tratamiento'],
            $odon[0]['atm'],
            $odon[0]['idodontologo'],
            $odon[0]['idodontologo']
		);	
	}

} else if( $_POST['r'] == 'odontologia-edit' && $_SESSION['ROL'] == 'Odontologo'&& $_POST['crud'] == 'set' ) {	
    
	$new_odon = array(
		
		'labios' =>  $_POST['labios'], 
        'carrillos' => $_POST['carrillos'], 
        'encias' => $_POST['encias'], 
        'paladar' => $_POST['paladar'], 
		'piso_boca' =>  '',//$_POST['piso_boca'], 
		'zona_retromoral' =>  $_POST['zona_retromoral'],
		'oro_faringe' =>  $_POST['oro_faringe'],  
        'otros' =>  $_POST['otros'],  
        'atm' =>  $_POST['atm'],  
		'fecha' =>  $_POST['fecha'],
        'codigo' =>  $_POST['codigo'],
        'diagnostico' =>  $_POST['diagnostico'],
		'tratamiento' =>  $_POST['tratamiento'],
        'idodontologo' => $_POST['idodontologo']
	
	);

	$odon = $odon_controller->update($new_odon);
    $mensajeC = 'INSERTADO CON ÉXITO';
    $mensajeU = 'ACTUALIZADO CON ÉXITO';
    if($odon[0] == $mensajeU ){
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
            reloadPage("odontologia")
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
         reloadPage("odontologia")
         }
         </script>
  
        
	';
    }

        printf($template,  $odon[0]);

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