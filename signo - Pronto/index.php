<?php include 'includes/cabecalho.php';?>  


 <!-- CONTEUDO -->
<div class="container">
 	<div class="row">
 		<div class="col-sm-12">
        	<?php
			//codigo para buscar pagina HOME////////// 
			$pagina = 'home';
			if(!empty($_GET['pagina']))
			{
				$pagina = $_GET['pagina'];
			}
			if(file_exists("$pagina.php"))
			{
				include("$pagina.php");	
			}
			else
			{
				?>Pagina não encontrada <?php  
			}
			//codigo para buscar pagina////////////////////////
			?>
         </div>
    </div>
</div>

<!-- CONTEUDO -->
 <?php include 'includes/rodape.php';?>     
    
    
    
    
   























    
    
