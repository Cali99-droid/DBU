<?php 
$template = '


        <div class="gestion">

          <div class = "perfil">
          <p> <b> MIS DATOS: </> </>
            <p> <b>NOMBRE:</></p>
            <p> %s </p><br>
            <p> <b>DNI:</></p>
            <p> %s </p><br>
            <p> <b>FECHA DE NACIMIENTO:</></p>
            <p> %s </p><br>
            <p> <b>CELULAR:</></p>
            <p> %s </p><br>
            <p> <b>NOMBRE DE USUARIO:</></p>
            <p> %s </p><br>
            <p> <b>ROL:</></p>
            <p> %s </p>
           </div> 
            
        </div>


    </body>
</html>';


printf(
	$template,
    $_SESSION['Paciente'],
    $_SESSION['dni_per'],
    $_SESSION['fech_nac'],
    $_SESSION['celular'],
    $_SESSION['USER'],
    $_SESSION['ROL']

);