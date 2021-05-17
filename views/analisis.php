<?php 
$template = '

<div class="gestion">
            <div class="gestion__nombre">
                <h2 class="no-margin gestion__titulo">TABLERO INFORMATIVO</h2>
            </div>

            <div class="gestion__cuerpo">
        
                <form method="POST" >
                    <div class="card" >
                        <input type="hidden" name="r" value="topico-estadis">
                        <input class="dash" type="submit" value="">
                      
                    </div>
                    <p class=" graf">Tablero informatívo Tópico</p> 
                </form> 

                <form method="POST" >
                    <div class="card" >
                        <input type="hidden" name="r" value="medicina-estadis">
                        <input class="dash" type="submit" value="">
                    
                    </div>
                    <p class=" graf">Tablero informatívo Medico</p> 
                </form> 

                <form method="POST" >
                    <div class="card" >
                        <input type="hidden" name="r" value="odontologia-estadis">
                        <input class="dash" type="submit" value="">
                    
                    </div>
                    <p class=" graf">Tablero informatívo Odontologico</p> 
                </form> 

                <form method="POST" >
                    <div class="card" >
                        <input type="hidden" name="r" value="psicologia-estadis">
                        <input class="dash" type="submit" value="">
                    
                    </div>
                    <p class=" graf">Tablero informatívo Psicologico</p> 
                </form> 


               
            </div>

        </div>


</body>
</html>
	
';

printf(
	$template,
    $_SESSION['Paciente'],
    $_SESSION['Paciente'],
    $_SESSION['ROL']

);