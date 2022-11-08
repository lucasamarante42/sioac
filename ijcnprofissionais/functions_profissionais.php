<?php
require_once('../config.php');
require_once(DBAPI);

$profissionais = null;
$profissional = null;

/*****************************************************************/
function index_profissional() {
	global $profissionais;
	$profissionais = find_all_profissional();	
	
}

/****************************************************************/
function interactview_profissional($valor = null) {
	global $profissionais;
			
	if (!empty($_POST['buscaprof'])) {
		   
		$valor = $_POST['buscaprof'];
	
	    $profissionais = especificview_profissional($valor);
	  
	}		
}
 

/****************************************************************/
function view_profissional($id = null) {
  global $profissional;
  $profissional = find_profissional($id);
}


/****************************************************************/
function add_profissional() {

      $prof_nome = isset($_POST['prof_nome']) ? $_POST['prof_nome'] : null;
 $prof_sobrenome = isset($_POST['prof_sobrenome']) ? $_POST['prof_sobrenome'] : null;
$prof_registro = isset($_POST['prof_registro']) ? $_POST['prof_registro'] : null;
    $prof_sala = isset($_POST['prof_sala']) ? $_POST['prof_sala'] : null;

$prof_telefone = isset($_POST['prof_telefone']) ? $_POST['prof_telefone'] : null;
 $prof_celular = isset($_POST['prof_celular']) ? $_POST['prof_celular'] : null;
$prof_observacao = isset($_POST['prof_observacao']) ? $_POST['prof_observacao'] : null;
 


if (!empty($prof_nome) || !empty($prof_sobrenome) || !empty($prof_registro) || !empty($prof_sala) ) {
  	
  save_profissional($prof_nome,$prof_sobrenome,$prof_registro,$prof_sala,$prof_telefone,$prof_celular,$prof_observacao);

    
	$tipo_ss=$_SESSION['type'];
	
	$status_ok='success_insert';
	$status_not='danger_insert';
		
	if(strcmp($tipo_ss,$status_ok) == 0){
	   echo("<script type='text/javascript'> alert('Profissional da Saúde cadastrado com sucesso !!'); location.href='mainall_profissionais.php';</script>");
	   
	}
    elseif(strcmp($tipo_ss,$status_not) == 0){
	  echo("<script type='text/javascript'> alert('Não foi possível realizar a operação. Verifique todos os campos preenchidos!'); location.href='#';</script>");
	  
 	}
	   
   }
 }
   
  
/***************************************************************/
function edit_profissional() {
    
  if (isset($_GET['id']) && preg_match('/^\d+$/', $_GET['id'])) {
      
      $id = (int)$_GET['id'];
	  	  
     if(is_numeric($id)){
	  	        	 
	
          $prof_nome = isset($_POST['prof_nome']) ? $_POST['prof_nome'] : null;
          $prof_sobrenome = isset($_POST['prof_sobrenome']) ? $_POST['prof_sobrenome'] : null;
          $prof_registro = isset($_POST['prof_registro']) ? $_POST['prof_registro'] : null;
          $prof_sala = isset($_POST['prof_sala']) ? $_POST['prof_sala'] : null;

          $prof_telefone = isset($_POST['prof_telefone']) ? $_POST['prof_telefone'] : null;
          $prof_celular = isset($_POST['prof_celular']) ? $_POST['prof_celular'] : null;
          $prof_observacao = isset($_POST['prof_observacao']) ? $_POST['prof_observacao'] : null;
 

         if (!empty($prof_nome) || !empty($prof_sobrenome) || !empty($prof_registro) || !empty($prof_sala) ) {
  	
             update_profissional($id,$prof_nome,$prof_sobrenome,$prof_registro,$prof_sala,$prof_telefone,$prof_celular,$prof_observacao);

    	     $tipo_ss=$_SESSION['type'];
	
	     $status_ok='success_edit';
	     $status_not='danger_edit';
		
	     if(strcmp($tipo_ss,$status_ok) == 0){
		echo("<script type='text/javascript'> alert('Profissional da Saúde atualizado com sucesso !!'); location.href='mainall_profissionais.php';</script>");
		}
	     elseif(strcmp($tipo_ss,$status_not) == 0){
		echo("<script type='text/javascript'> alert('Não foi possível realizar a operação. Verifique todos os campos preenchidos!'); location.href='#';</script>");
		}
	 	 
	       } else {	 	 	
		   global $profissional;	  	  	  
		   $profissional = find_profissional($id); 		          
		  } 
                }
              } else {
                 header('location: mainall_profissionais.php');
  }
}

/****************************************************************/
function delete_profissional($id = null) {
  global $profissional;
  
  $profissional = remove_profissional($id);
  
  $tipo_ss=$_SESSION['type'];
  $status_ok='success_delete';
  $status_not='danger_delete';

  if(strcmp($tipo_ss,$status_not) == 0){
    echo("<script type='text/javascript'> alert('Não foi possível realizar a operação.'); location.href='mainall_profissionais.php';</script>");
   }
  else{  
    header('location: mainall_profissionais.php');
   }

  
}





?>
