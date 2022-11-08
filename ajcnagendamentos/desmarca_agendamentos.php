<?php 
  require_once('functions_agendamentos.php'); 
  
  if (isset($_GET['id'])){
  
	$id = $_GET['id'];
	
	if(is_numeric($id)){  
	   desmarca_agendamento($id);
	}
  
  } else {
    die("ERRO: ID não definido.");
  }
?>
