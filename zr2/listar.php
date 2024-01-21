<?php 
session_start();
if(!empty($_SESSION['logado']))
{
	
	
	
	
?>

<?php include 'view/cabecalho.php' ?>

<!--Corpo-->



<!--Corpo-->
<?php include 'view/rodape.php' ?>


<?php
//session
 }else{
	 header('Location: index.php?msg=erroacesso');
}
?>

