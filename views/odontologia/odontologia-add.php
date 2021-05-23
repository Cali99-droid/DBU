  
<?php 
if( $_POST['r'] == 'odontologia-add' && $_SESSION['ROL'] == 'Odontologo' && !isset($_POST['crud']) ) {
   
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
            <h2 class="no-margin gestion__titulo">Ingresar Datos Odontológicos</h2>
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
                    <label for="labios" class="campo__label" >Labios</label>
                    <input   class="campo__field" type="text"  name="labios"  required>
                </div>

                
                <div class="campo">
                    <label for="carrillos" class="campo__label" >Carrillos</label>
                    <input   class="campo__field" type="text"  name="carrillos"  required>
                </div>

                <div class="campo">
                <label for="encias" class="campo__label" >Encias</label>
                <input   class="campo__field" type="text"  name="encias"  required>
            </div>

            
            <div class="campo">
                <label for="paladar" class="campo__label" >Paladar</label>
                <input   class="campo__field" type="text"  name="paladar"  required>
            </div>

            <div class="campo">
                <label for="zona_retromoral" class="campo__label" >Zona retromoral</label>
                <input   class="campo__field" type="text"  name="zona_retromoral"  required>
            </div>

        
                <div class="campo">
                    <label for="oro_faringe" class="campo__label">Orofaringe</label>
                    <input type="text" name="oro_faringe"  class=" campo__field"  required></input>
                </div>

                <div class="campo">
                    <label for="otros" class="campo__label">Otros</label>
                    <input name="otros"  class="campo__field campo__field"></input>
                </div>


                <div class="campo">
                <label for="diagnostico" class="campo__label">Diagnostico</label>
                <textarea name="diagnostico"  class="campo__field--textarea campo__field"></textarea>
            </div>

            <div class="campo">
                <label for="tratamiento" class="campo__label">Tratamiento</label>
                <textarea name="tratamiento"  class="campo__field--textarea campo__field"></textarea>
            </div>

            
            <div class="campo">
            <label for="atm" class="campo__label">ATM</label>
            <input name="atm"  class="campo__field campo__field"></input>
           <br>
            <div class="campo guardar_psi">
                    <input type="submit" value="Guardar" class="boton boton--guardar ">
                    <input type="hidden" name="r" value="odontologia-add">
				    <input type="hidden" name="crud" value="set">
                </div>
            </div>
           
                
            </form>
        </div>
        
    </div>
	', $fecha);	

} else if( $_POST['r'] == 'odontologia-add' && $_SESSION['ROL'] == 'Odontologo' && $_POST['crud'] == 'set' ) {
    $odon_controller = new OdonController();
    $indice = 0;
    
	$new_odon = array(
		'idodontologico' =>  $indice,
		'labios' =>  $_POST['labios'], 
        'carrillos' => '', $_POST['carrillos'], 
        'encias' => '', $_POST['encias'], 
        'paladar' => '',  $_POST['paladar'], 
		'piso_boca' =>  '',//$_POST['piso_boca'], 
		'zona_retromoral' =>  $_POST['zona_retromoral'],
		'oro_faringe' =>  $_POST['oro_faringe'],  
        'otros' =>  $_POST['otros'],  
        'atm' =>  $_POST['atm'],  
		'fecha' =>  $_POST['fecha'],
        'codigo' =>  $_POST['codigo'],
        'diagnostico' =>  $_POST['diagnostico'],
		'tratamiento' =>  $_POST['tratamiento']
	
	);

 
	$odon = $odon_controller->set($new_odon);
    $mensaje = 'INSERTADO CON ÉXITO';
    
    if($odon[0] == $mensaje ){
       
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
	$controller->load_view('error401'); //401
}

/*  */