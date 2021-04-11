<?php 
$template = '

<div class="gestion">
            <div class="gestion__nombre">
                <h2 class="no-margin gestion__titulo">Bienvenido %s </h2>
            </div>

            <div class="gestion__cuerpo">
                <div class="gestion__grafico card">
                   <!--<img class="gestion__img" src="public/img/portada.jpg" alt="">--> 
                </div>
                <div class="card">
                    <div class="card__img--nombre">
                        <img class="card__img--perfil" src="public/img/profile.svg" alt="imagen de perfil">
                     </div>
                    <h2>%s</h2>
                    <p class="p_rol">%s</p>
                </div>
                <div class="card">
                    <div class="card__img">
                        <img class="card__port" src="public/img/topico.jpg" alt="">
                        <a href="#" class="card__enlace">Gestion Topico</a>
                     </div>
                    
                </div>
                <div class="card">
                    <div class="card__img">
                        <img class="card__port" src="public/img/medico.jpg" alt="">
                        <a href="#" class="card__enlace">Gestion Medico</a>
                     </div> 
                    
                </div>
                <div class="card">
                    <div class="card__img">
                        <img class="card__port" src="public/img/psicologia.jpg" alt="">
                        <a href="psicologia" class="card__enlace">Gestion Psicologico</a>
                     </div>
                    
                </div>
                <div class="card">
                    <div class="card__img">
                       <img class="card__port" src="public/img/odontologia.jpg" alt="">
                       <a href="#" class="card__enlace">Gestion Odontologico</a>
                    </div> 

                </div>
            </div>

        </div>


</body>
</html>
	
';

printf(
	$template,
	$_SESSION['nombre'],
	$_SESSION['nombre'],
	$_SESSION['rol']

);
