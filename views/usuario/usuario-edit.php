<?php 
$user_controller = new UsersController();

if($_POST['r'] == 'usuario-edit' && $_SESSION['ROL'] == 'Administrador' && !isset($_POST['crud']) ) {

    $topico = new TopController();
    $escuelas = $topico->getEscuelas(); 
	$escuela_select = '';

	for ($n=0; $n < count($escuelas); $n++) { 
		$escuela_select .= '<option value="' . $escuelas[$n]['escuela'] . '">' . $escuelas[$n]['escuela'] . '</option>';
	}

	$user = $user_controller->getUsuario($_POST['IDCARGO']);
    $idc = $_POST['IDCARGO'];
    $fecha =  date("Y-m-d");
	if( empty($user) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe el usuario <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("paciente")
				}
			</script>
		';

		printf($template, $_POST['IDCARGO']);
	} else {
		
		// $status_controller = new StatusController();
		// $status = $status_controller->get();
		// $status_select = '';

		// for ($n=0; $n < count($status); $n++) { 
		// 	$selected = ($ms[0]['status'] == $status[$n]['status']) ? 'selected' : '';
		// 	$status_select .= '<option value="' . $status[$n]['status_id'] . '"' . $selected . '>' . $status[$n]['status'] . '</option>';
		// }

        $template_user = '
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
                <label for="escuela" class="campo__label">Escuela</label>
                <select class="campo__field--select"  name="escuela" placeholder="escuela" required>
					<option value="">Escuela</option>
					%s
				</select>
                </div>

                <div class="campo">
                <label for="user" class="campo__label">Usuario</label>
                <input  type="text" class="campo__field" name="user" value="%s"></input>
                </div>

                <div class="campo">
                <label for="pass" class="campo__label">Contraseña</label>
                <input  type="password" class="campo__field" name="pass" value="%s"></input>
                </div>

                <div class="campo">
                <label for="rol" class="campo__label">Rol</label>
                <select class="campo__field--select" name="rol" placeholder="rol" required>
                    <option value="">ROL</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Topico">Topico</option>
                    <option value="Medico">Medico</option>
                    <option value="psicologo">psicologo</option>
                    <option value="Odontologo">Odontologo</option>
                    <option value="Estudiante">Estudiante</option>
                    
                </select>
                </div>

            
                <input  type="hidden" name="idcargo" class="campo__field"  value="%s"  ></input>
  

                <div class="campo guardar_psi">
                    <input type="submit" value="Guardar" class="boton boton--guardar ">
                    <input type="hidden" name="r" value="usuario-edit">
				    <input type="hidden" name="crud" value="set">
                </div>
            </form>
        </div>
        
    </div>
	';

		printf(
			$template_user,
			$user[0]['dni_per'],
			$user[0]['nom_per'],
			$user[0]['ape_pat'],
			$user[0]['ape_mat_per'],
            $user[0]['celular'],
            $user[0]['fech_nac'],
            $escuela_select,
            $user[0]['USER'],
            MD5($user[0]['PASS']),
            $idc
        
		);	
	}

} else if( $_POST['r'] == 'usuario-edit' && $_SESSION['ROL'] == 'Administrador'&& $_POST['crud'] == 'set' ) {	
    $newDate = date("Y/m/d", strtotime($_POST['fech_nac']));
    $new_user = array(
		
		'nom_per' =>  $_POST['nom_per'], 
		'ape_pat' =>  $_POST['ape_pat'], 
		'ape_mat_per' => $_POST['ape_mat_per'],
		'codigo' =>  $_POST['codigo'], 
        'sexo_per' => $_POST['sexo_per'], 
        'celular' => $_POST['celular'], 
        'fech_nac' => $newDate,  
		'escuela' =>  $_POST['escuela'],
        'user' =>  $_POST['user'],
        'pass' =>  $_POST['pass'],
        'rol' =>  $_POST['rol'],
        'idcargo' => $_POST['idcargo']
        
	
	);


	$user = $user_controller->update($new_user);

    $mensajeU = 'USUARIO ACTUALIZADO CON ÉXITO';
    if($user[0] == $mensajeU){
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
            reloadPage("usuarios")
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
         reloadPage("usuarios")
         }
         </script>
  
        
	';
    }

        printf($template,  $user[0]);

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