<?php

$templateEstudiante = '

<!DOCTYPE html>
<html>
<head>
	<title>DBU</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/normalize.css">		
</head> 
<body>
<main class="contenido-principal">
<div class="barra">
	<a class="barra__logo" href="estudiante">
		<img class="img-unasam"src="public/img/escudoUNASAM.png" alt="escudo unasam">
		<h2 class="inicio">DIRECCION DE BIENESTAR UNIVERSITARIO Estudiante</h2>
	</a>
	<div class="barra__opciones">
			<a class="opcion" href="estudiante">  
				<svg class="opcion__log" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"">
				<path d="M3,13h1v2v5c0,1.103,0.897,2,2,2h3h6h3c1.103,0,2-0.897,2-2v-5v-2h1c0.404,0,0.77-0.244,0.924-0.617 c0.155-0.374,0.069-0.804-0.217-1.09l-9-9c-0.391-0.391-1.023-0.391-1.414,0l-9,9c-0.286,0.286-0.372,0.716-0.217,1.09 C2.23,12.756,2.596,13,3,13z M10,20v-5h4v5H10z M12,4.414l6,6V15l0,0l0.001,5H16v-5c0-1.103-0.897-2-2-2h-4c-1.103,0-2,0.897-2,2v5 H6v-5v-3v-1.586L12,4.414z"></path></svg>  
				Inicio
			</a>
			<a class="opcion"  href="">
				<svg class="opcion__log" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					<path d="M15 2.013L9 2.013 9 9 2 9 2 15 9 15 9 21.987 15 21.987 15 15 22 15 22 9 15 9z"></path></svg>
				Tópico
			</a>
			<a class="opcion"  href="">
				<svg class="opcion__log"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					<circle fill="none" cx="6.5" cy="17.5" r="1.5"></circle><path fill="none" d="M15 9L15 12 19.233 12 17.434 9z"></path><circle fill="none" cx="16.5" cy="17.5" r="1.5"></circle><path fill="none" d="M10 7L8 7 8 9 6 9 6 11 8 11 8 13 10 13 10 11 12 11 12 9 10 9z"></path><path d="M21.857,12.485l-2.709-4.515C18.789,7.372,18.132,7,17.434,7H15V5c0-0.553-0.447-1-1-1H4C2.897,4,2,4.897,2,6v10 c0,0.746,0.416,1.391,1.023,1.734C3.147,19.553,4.65,21,6.5,21c1.759,0,3.204-1.309,3.449-3h3.102c0.245,1.691,1.69,3,3.449,3 s3.204-1.309,3.449-3H20c1.103,0,2-0.897,2-2v-3C22,12.818,21.951,12.641,21.857,12.485z M6.5,19C5.673,19,5,18.327,5,17.5 S5.673,16,6.5,16S8,16.673,8,17.5S7.327,19,6.5,19z M12,11h-2v2H8v-2H6V9h2V7h2v2h2V11z M16.5,19c-0.827,0-1.5-0.673-1.5-1.5 s0.673-1.5,1.5-1.5s1.5,0.673,1.5,1.5S17.327,19,16.5,19z M15,12V9h2.434l1.8,3H15z"></path></svg>
				Médico
			</a>
			<a class="opcion"  href="estudiante-psi">
			    <svg class="opcion__log" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" >
                   <path d="M13 4C11.089844 4 9.542969 5.386719 9.15625 7.1875C6.824219 7.605469 5 9.550781 5 12C5 12.246094 5.027344 12.464844 5.0625 12.6875C4.417969 13.636719 4 14.753906 4 16C4 17.796875 4.894531 19.308594 6.15625 20.40625C6.066406 20.761719 6 21.117188 6 21.5C6 23.972656 8.027344 26 10.5 26C10.527344 26 10.539063 26 10.5625 26C11.144531 27.128906 12.152344 28 13.5 28C14.476563 28 15.363281 27.589844 16 26.9375C16.636719 27.589844 17.523438 28 18.5 28C19.847656 28 20.855469 27.128906 21.4375 26C21.460938 26 21.472656 26 21.5 26C23.847656 26 25.773438 24.171875 25.96875 21.875L26 21.875C26 21.8125 25.972656 21.75 25.96875 21.6875C25.972656 21.625 26 21.5625 26 21.5C26 21.128906 25.867188 20.8125 25.78125 20.46875C27.078125 19.367188 28 17.828125 28 16C28 14.753906 27.582031 13.636719 26.9375 12.6875C26.972656 12.464844 27 12.246094 27 12C27 9.550781 25.175781 7.605469 22.84375 7.1875C22.457031 5.386719 20.910156 4 19 4C17.800781 4 16.734375 4.558594 16 5.40625C15.265625 4.558594 14.199219 4 13 4 Z M 13 6C14.117188 6 15 6.882813 15 8L15 10C15 11.667969 13.667969 13 12 13L12 15C13.132813 15 14.160156 14.609375 15 13.96875L15 24.5C15 25.339844 14.339844 26 13.5 26C12.753906 26 12.15625 25.484375 12.03125 24.78125L11.84375 23.8125L10.875 23.96875C10.699219 23.996094 10.589844 24 10.5 24C9.109375 24 8 22.890625 8 21.5C8 21.191406 8.050781 20.902344 8.15625 20.625C8.164063 20.601563 8.179688 20.585938 8.1875 20.5625C8.496094 19.792969 9.167969 19.230469 10 19.0625L9.59375 17.09375C8.550781 17.304688 7.644531 17.859375 7 18.65625C6.371094 17.953125 6 17.023438 6 16C6 15.0625 6.320313 14.226563 6.875 13.53125L7.1875 13.15625L7.09375 12.65625C7.039063 12.421875 7 12.214844 7 12C7 10.332031 8.332031 9 10 9L11 9L11 8C11 6.882813 11.882813 6 13 6 Z M 19 6C20.117188 6 21 6.882813 21 8L21 9L22 9C23.667969 9 25 10.332031 25 12C25 12.214844 24.960938 12.421875 24.90625 12.65625L24.8125 13.15625L25.125 13.53125C25.679688 14.226563 26 15.0625 26 16C26 17.199219 25.488281 18.269531 24.65625 19C23.972656 18.394531 23.101563 18 22.125 18C21.179688 18 20.328125 18.335938 19.65625 18.90625L20.9375 20.4375C21.261719 20.164063 21.660156 20 22.125 20C23.089844 20 23.859375 20.722656 23.96875 21.65625C23.886719 22.972656 22.835938 24 21.5 24C21.410156 24 21.300781 23.996094 21.125 23.96875L20.15625 23.8125L19.96875 24.78125C19.84375 25.484375 19.246094 26 18.5 26C17.660156 26 17 25.339844 17 24.5L17 13.96875C17.839844 14.609375 18.867188 15 20 15L20 13C18.332031 13 17 11.667969 17 10L17 8C17 6.882813 17.882813 6 19 6Z"  />
                </svg>
				Psicología
			</a>
			<a class="opcion"  href="">
				<svg class="opcion__log" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" >
				<path d="M13.289062 4C10.828667 4 8.729687 4.7722013 7.2617188 6.1738281C5.7937505 7.5754549 5 9.5780425 5 11.833984C5 13.536726 5.6412623 14.871166 6.3007812 16.042969C6.9603003 17.214772 7.6354729 18.26302 7.9980469 19.572266C8.4334417 21.185126 8.7470427 23.10601 9.2539062 24.716797C9.5076328 25.523126 9.8022467 26.26143 10.273438 26.878906C10.744628 27.496383 11.507053 28 12.378906 28C13.213844 28 14.031969 27.566965 14.457031 26.90625C14.882094 26.245535 15 25.474191 15 24.634766C15 23.603099 14.9981 21.987186 15.21875 20.720703C15.329088 20.087461 15.506962 19.548628 15.677734 19.269531C15.848507 18.990434 15.861987 19 15.996094 19C16.130201 19 16.144957 18.992 16.316406 19.271484C16.487856 19.550947 16.666109 20.089448 16.777344 20.722656C16.999813 21.989072 17 23.6044 17 24.634766C17 25.474191 17.118153 26.243652 17.542969 26.904297C17.967784 27.564941 18.786423 28 19.621094 28C20.496527 28 21.256543 27.489915 21.726562 26.869141C22.196583 26.248366 22.490667 25.507826 22.744141 24.699219C23.250723 23.083165 23.567446 21.159253 24.001953 19.572266C24.364535 18.262992 25.037765 17.214868 25.697266 16.042969C26.355905 14.8726 26.994419 13.538986 26.996094 11.839844C27.044186 7.3059965 23.595833 4 19.068359 4C17.748752 4 16.189495 4.475542 15.941406 4.5488281C15.130735 4.2299386 14.245815 4 13.289062 4 z M 13.289062 6C15.604721 6 18.259766 8.4257812 18.259766 8.4257812L19.667969 7.0058594C19.667969 7.0058594 19.004034 6.4792157 18.544922 6.0957031C18.751518 6.0668971 18.933133 6 19.068359 6C22.688717 6 25.04053 8.2494615 25 11.822266L24.998047 11.828125L24.998047 11.833984C24.998047 12.638959 24.796911 13.315908 24.490234 14L21 14L21 11L11 11L11 14L7.5078125 14C7.2005569 13.316036 7 12.639346 7 11.833984C7 10.034927 7.5954996 8.6207638 8.6445312 7.6191406C9.693563 6.6175174 11.239459 6 13.289062 6 z M 13 13L19 13L19 16L23.427734 16C22.927435 16.873435 22.411107 17.822568 22.074219 19.039062L22.074219 19.041016C21.59821 20.778371 21.27449 22.700574 20.835938 24.099609C20.61666 24.799127 20.361855 25.359603 20.132812 25.662109C19.903818 25.964488 19.81616 26 19.621094 26C19.317765 26 19.325794 25.981574 19.224609 25.824219C19.123425 25.666863 19 25.25334 19 24.634766C19 23.615131 19.016374 21.913584 18.746094 20.375C18.610953 19.605708 18.416754 18.868897 18.021484 18.224609C17.626215 17.580322 16.880487 17 15.996094 17C15.111701 17 14.367103 17.58191 13.972656 18.226562C13.57821 18.871216 13.382084 19.607695 13.248047 20.376953C12.979972 21.91547 13 23.616432 13 24.634766C13 25.25334 12.876578 25.66498 12.775391 25.822266C12.674203 25.979551 12.682969 26 12.378906 26C12.180259 26 12.091153 25.964633 11.863281 25.666016C11.635409 25.367398 11.381133 24.813233 11.162109 24.117188C10.724062 22.725096 10.4006 20.801906 9.9257812 19.044922L9.9257812 19.041016L9.9238281 19.039062C9.5868813 17.822393 9.0701176 16.873506 8.5703125 16L13 16L13 13 z"  />
				</svg>
				Odontología
			</a>
			<a class="opcion"  href="salir">
			<svg class="opcion__log" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 13L16 11 7 11 7 8 2 12 7 16 7 13z"></path><path d="M20,3h-9C9.897,3,9,3.897,9,5v4h2V5h9v14h-9v-4H9v4c0,1.103,0.897,2,2,2h9c1.103,0,2-0.897,2-2V5C22,3.897,21.103,3,20,3z">
			</path></svg>
				Salir
			</a>
	</div>
</div>

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
                <a class="card" href="es-topico">
                    <div class="card__img"  >
                        <img class="card__port" src="public/img/topico.jpg" alt="">
                        <p href="#" class="card__enlace">Mis Consultas Topico</p>
                     </div>
                    
                </a>
                <a class="card"  href="es-medicina">
                    <div class="card__img">
                        <img class="card__port" src="public/img/medico.jpg" alt="">
                        <p  class="card__enlace">Mis Consultas Medico</p>
                     </div> 
                    
                </a>
                <a class="card" href="es-psicologia">
                    <div class="card__img">
                        <img class="card__port" src="public/img/psicologia.jpg" alt="">
                        <p class="card__enlace">Mis Consultas Psicologico</p>
                     </div>
                    
                </a>
                <a class="card"  href="es-odontologia">
                    <div class="card__img">
                       <img class="card__port" src="public/img/odontologia.jpg" alt="">
                       <p  class="card__enlace">Mis Consultas Odontologico</p>
                    </div> 

                </a>
            </div>

        </div>
</body>
</html>
	
';

printf(
    $templateEstudiante,
    $_SESSION['nombre'],
    $_SESSION['nombre'],
    $_SESSION['rol']

);

