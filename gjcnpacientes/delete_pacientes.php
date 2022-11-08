<?php 
  require_once('functions_pacientes.php'); 
  
  if (isset($_GET['id'])){
  
	$id = (int)$_GET['id'];
	
	if(is_numeric($id)){
    	  delete_paciente($id);
	}
  
  
  } else {
    die("ERRO: ID não definido.");
  }
?>
