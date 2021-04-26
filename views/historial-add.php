  
<?php 

if( $_POST['r'] == 'historial-add' && $_SESSION['rol'] == 'Topico' && !isset($_POST['crud']) ) {
   
    // $fecha =  date("Y-m-d");
    
$topico = new TopController();
$escuelas = $topico->getEscuelas();
   
	$escuela_select = '';

	for ($n=0; $n < count($escuelas); $n++) { 
		$escuela_select .= '<option value="' . $escuelas[$n]['escuela'] . '">' . $escuelas[$n]['escuela'] . '</option>';
	}
    
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
                <label for="sexo_per" class="campo__label">Sexo</label>
                  <select  class="campo__field--select" name="sexo_per"  placeholder="Sexo" required>
                    <option value="s">SELECCIONE</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                  </select>
                </div>

                <div class="campo">
                    <label for="nom_per" class="campo__label" >Nombre</label>
                    <input   class="campo__field" type="text"  name="nom_per" required>
                </div>

        
                <div class="campo">
                    <label for="ape_pat" class="campo__label">Apellido Paterno</label>
                    <input type="text" name="ape_pat"  class=" campo__field"  required></input>
                </div>

                <div class="campo">
                    <label for="ape_mat_per" class="campo__label">Apellido Materno</label>
                    <input type="text" name="ape_mat_per"  class="campo__field"></input>
                </div>

                <div class="campo">
                <label for="celular" class="campo__label">Celular</label>
                <input  type="number" class="campo__field" name="celular"  ></input>
                </div>


                <div class="campo">
                <label for="fech_nac" class="campo__label">Fecha de Nacimiento</label>
                <input  type="date" class="campo__field" name="fech_nac"  ></input>
                </div>

                <div class="campo">
                <label for="cod" class="campo__label">Codigo</label>
                <input  type="text" class="campo__field" name="cod" ></input>
                </div>

                <div class="campo">
                <label for="escuela" class="campo__label">Escuela</label>
                <select class="campo__field--select" name="escuela" placeholder="escuela" required>
					<option value="">Escuela</option>
					%s
				</select>
                </div>

                <div class="campo">
                <label for="tipo_paciente" class="campo__label">Tipo de Paciente</label>
                <select class="campo__field--select" name="tipo_paciente" placeholder="tipo paciente" required>
                    <option value="">Tipo Paciente</option>
					<option value="Alumno">Alumno</option>
                    <option value="Docente">Docente</option>
                    <option value="Administrativo">Administrativo</option>
				
				</select>
                </div>

                <div class="campo guardar_psi">
                    <input type="submit" value="Guardar" class="boton boton--guardar ">
                    <input type="hidden" name="r" value="historial-add">
				    <input type="hidden" name="crud" value="set">
                </div>
            </form>
        </div>
        
    </div>
	', $escuela_select);	

} else if( $_POST['r'] == 'historial-add' && $_SESSION['rol'] == 'Topico' && $_POST['crud'] == 'set' ) {
    $top_controller = new TopController();
    $indice = 0;
    $newDate = date("Y/m/d", strtotime($_POST['fech_nac']));
	$new_top = array(
		'idtopico' =>  $indice,
		'nom_per' =>  $_POST['nom_per'], 
		'ape_pat' =>  $_POST['ape_pat'], 
		'ape_mat_per' =>  $_POST['ape_mat_per'],
		'codigo' =>  $_POST['codigo'], 
        'sexo_per' => $_POST['sexo_per'], 
        'celular' => $_POST['celular'], 
        'fech_nac' => $newDate, 
        'cod' => $_POST['cod'],  
		'escuela' =>  $_POST['escuela'],
        'tipo_paciente' =>  $_POST['tipo_paciente']
	
	);

	$top = $top_controller->setNuevoHistorial($new_top);
    $mensaje = 'PACIENTE REGISTRADO CON ÉXITO';
    
    if($top[0] == $mensaje ){
       
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