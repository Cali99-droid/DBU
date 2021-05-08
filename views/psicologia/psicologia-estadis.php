<?php 

//require("C:/wamp64/www/Proyectos/DBU/controllers/PsiController.php");

	$template_psicologia = '
	

    <iframe width="1200" height="650" 
     src="https://app.powerbi.com/view?r=eyJrIjoiMmQzNDk4NDUtMTRkYi00ZjNjLTk3NjYtNWYwNWYzNTkwZGFiIiwidCI6ImM1ZDIzYjA5LWFmMDEtNGFlYy1hYjc0LTdhNWQxZGEwMTA4NCJ9" 
      frameborder="0" allowFullScreen="true"></iframe>
		'; 		

		$template_psicologia  .= '
				    
	</body>
</main>

  </html>

	';

	printf($template_psicologia);
