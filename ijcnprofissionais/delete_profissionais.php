<?php 
  require_once('functions_profissionais.php'); 
  
  if (isset($_GET['id'])){
  
	$id = (int)$_GET['id'];
	
	if(is_numeric($id)){  
		delete_profissional($id);
	}
  
  } else {
    die("ERRO: ID não definido.");
  }
?>
