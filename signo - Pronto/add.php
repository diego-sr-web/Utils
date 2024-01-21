<h4>Cadastro</h4>
<a href="?pagina=home&action=add" class="btn btn-outline-warning"> Cadastrar </a>
<a href="?pagina=home" class="btn btn-outline-warning"> Lista </a>


<hr>

<?php 
//Pucha o codigo pela action para economizar espaço.
$action = '';
if(!empty($_GET['action']))
	{
		$action = $_GET['action'];
	}
//FORMULARIO DE CADASTRO VIA URL
//http://localhost/signo/?pagina=home&action=add
if($action == 'add')
	{?>
		
	<?php }
?>