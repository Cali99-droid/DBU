  
<?php 
if( $_POST['r'] == 'cuenta-add' && $_SESSION['rol'] == 'Administrador' && !isset($_POST['crud']) ) {
   
     $fecha =  date("Y-m-d");
   
	//$psicologia_select = '';
/*/
	for ($n=0; $n < count($status); $n++) { 
		$status_select .= '<option value="' . $status[$n]['status_id'] . '">' . $status[$n]['status'] . '</option>';
	}
    */

        
        print('
        <div class="gestion">
            <div class="gestion__nombre">
                <h2 class="no-margin gestion__titulo">Ingresar Datos </h2>
            </div>
    
            <div class="gestion__cuerpo">
                <form method="POST" class="formulario__entrada">
    
                    <div class="campo">
                    <label for="codigo" class="campo__label">DNI</label>
                    <input  class="campo__field num" type="number" placeholder="DNI " name="codigo" required>
                    </div>
    
      
           
                    <div class="campo">
                    <label for="user" class="campo__label">Usuario</label>
                    <input  type="text" class="campo__field" name="user" ></input>
                    </div>

                    <div class="campo">
                    <label for="pass" class="campo__label">Contraseña</label>
                    <input  type="password" class="campo__field" name="pass" ></input>
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
    
                    <div class="campo guardar_psi">
                        <input type="submit" value="Guardar" class="boton boton--guardar ">
                        <input type="hidden" name="r" value="cuenta-add">
                        <input type="hidden" name="crud" value="set">
                    </div>
                </form>
            </div>
            
        </div>
        ');	
    

} else if( $_POST['r'] == 'cuenta-add' && $_SESSION['rol'] == 'Administrador' && $_POST['crud'] == 'set' ) {
    $user_controller = new UsersController();
    $indice = 0;
    	$new_user = array(
		'idcargo' =>  $indice,	
		'codigo' =>  $_POST['codigo'], 
        'user' =>  $_POST['user'],
        'pass' =>  $_POST['pass'],
        'rol' =>  $_POST['rol']
        
	
	);

    $user = $user_controller->asignarCuenta($new_user);
    $mensaje = 'REGISTRADO CON ÉXITO';

    
    
    if($user[0] == $mensaje ){
       
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

/*  */