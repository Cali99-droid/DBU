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
                <a class="card"  href="perfil">
                    <div class="card__img--nombre">
                        <img class="card__img--perfil" src="public/img/profile.svg" alt="imagen de perfil">
                     </div>
                    <h2>%s</h2>
                    <p class="p_rol">%s</p>
                </a>
                <a class="card" href="topico">
                    <div class="card__img"  >
                        <img class="card__port" src="public/img/topico.jpg" alt="">
                        <p href="#" class="card__enlace">Gestion Topico</p>
                     </div>
                    
                </a>
                <a class="card"  href="medicina">
                    <div class="card__img">
                        <img class="card__port" src="public/img/medico.jpg" alt="">
                        <p  class="card__enlace">Gestion Medico</p>
                     </div> 
                    
                </a>
                <a class="card" href="psicologia">
                    <div class="card__img">
                        <img class="card__port" src="public/img/psicologia.jpg" alt="">
                        <p class="card__enlace">Gestion Psicologico</p>
                     </div>
                    
                </a>
                <a class="card"  href="odontologia">
                    <div class="card__img">
                       <img class="card__port" src="public/img/odontologia.jpg" alt="">
                       <p  class="card__enlace">Gestion Odontologico</p>
                    </div> 

                </a>
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
