<?php 
$pas_controller = new PacienteController();

if($_POST['r'] == 'paciente-edit' && $_SESSION['ROL'] == 'Administrador' && !isset($_POST['crud']) ) {

    $topico = new TopController();
    $escuelas = $topico->getEscuelas(); 
	$escuela_select = '';

	for ($n=0; $n < count($escuelas); $n++) { 
		$escuela_select .= '<option value="' . $escuelas[$n]['escuela'] . '">' . $escuelas[$n]['escuela'] . '</option>';
	}

	$pas = $pas_controller->getPaciente($_POST['idpaciente']);
    $idp = $_POST['idpaciente'];
    $fecha =  date("Y-m-d");
	if( empty($pas) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe el Paciente <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("paciente")
				}
			</script>
		';

		printf($template, $_POST['idpaciente']);
	} else {
		
		// $status_controller = new StatusController();
		// $status = $status_controller->get();
		// $status_select = '';

		// for ($n=0; $n < count($status); $n++) { 
		// 	$selected = ($ms[0]['status'] == $status[$n]['status']) ? 'selected' : '';
		// 	$status_select .= '<option value="' . $status[$n]['status_id'] . '"' . $selected . '>' . $status[$n]['status'] . '</option>';
		// }

		$template_pas = '
        <div class="gestion">
        <div class="gestion__nombre">
            <h2 class="no-margin gestion__titulo">Editar Datos</h2>
        </div>

        <div class="gestion__cuerpo">
            <form method="POST" class="formulario__entrada">

                <div class="campo">
                    <label for="codigo" class="campo__label">DNI</label>
                    <input  class="campo__field num" type="number"  value="%s" placeholder="DNI " name="codigo" required>
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
                    <input   class="campo__field" type="text"  value="%s"  name="nom_per" required>
                </div>

        
                <div class="campo">
                    <label for="ape_pat" class="campo__label">Apellido Paterno</label>
                    <input type="text" name="ape_pat"  value="%s" class="campo__field"  required></input>
                </div>

                <div class="campo">
                    <label for="ape_mat_per" class="campo__label">Apellido Materno</label>
                    <input type="text" name="ape_mat_per"  value="%s"  class="campo__field"></input>
                </div>

                <div class="campo">
                <label for="celular" class="campo__label">Celular</label>
                <input  type="number" class="campo__field" value="%s" name="celular"  ></input>
                </div>


                <div class="campo">
                <label for="fech_nac" class="campo__label">Fecha de Nacimiento</label>
                <input  type="text" class="campo__field"  value="%s" name="fech_nac"  ></input>
                </div>

                <div class="campo">
                <label for="cod" class="campo__label">Codigo</label>
                <input  type="text" class="campo__field"  value="%s" name="cod" ></input>
                </div>

                <div class="campo">
                <label for="escuela" class="campo__label">Escuela</label>
                <select class="campo__field--select"  name="escuela" placeholder="escuela" required>
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

            
                <input  type="hidden" name="idpaciente" class="campo__field"  value="%s" name="cod" ></input>
  

                <div class="campo guardar_psi">
                    <input type="submit" value="Guardar" class="boton boton--guardar ">
                    <input type="hidden" name="r" value="paciente-edit">
				    <input type="hidden" name="crud" value="set">
                </div>
            </form>
        </div>
        
    </div>
	';

		printf(
			$template_pas,
			$pas[0]['dni_per'],
			$pas[0]['nom_per'],
			$pas[0]['ape_pat'],
			$pas[0]['ape_mat_per'],
            $pas[0]['celular'],
            $pas[0]['fech_nac'],
            $pas[0]['CODIGO'],
            $escuela_select,
            $idp
        
		);	
	}

} else if( $_POST['r'] == 'paciente-edit' && $_SESSION['ROL'] == 'Administrador'&& $_POST['crud'] == 'set' ) {	

	$save_pas = array(

		'codigo' =>  $_POST['codigo'], 
		'nom_per' =>  $_POST['nom_per'], 
		'ape_pat' =>  $_POST['ape_pat'],
        'ape_mat_per' =>  $_POST['ape_mat_per'],
		'celular' =>  $_POST['celular'],
		'fech_nac' =>  $_POST['fech_nac'],
        'cod' => $_POST['cod'],
        'escuela' =>  $_POST['escuela'],
        'tipo_paciente' =>  $_POST['tipo_paciente'],
        'sexo_per' => $_POST['sexo_per'],
        'idpaciente' => $_POST['idpaciente']

	);

	$pas = $pas_controller->update($save_pas);
    $mensajeC = 'INSERTADO CON ??XITO';
    $mensajeU = 'PACIENTE ACTUALIZADO CON ??XITO';
    if($pas[0] == $mensajeU){
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
            reloadPage("pacientes")
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
         reloadPage("pacientes")
         }
         </script>
  
        
	';
    }

        printf($template,  $pas[0]);

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