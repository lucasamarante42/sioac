<?php
require_once('../config.php');
require_once(DBAPI);

$agendamentos = null;
$agendamento = null;

/*****************************************************************/
function index_agendamento() {
	global $agendamentos;
	$agendamentos = find_all_agendamento();	
	
}


/*****************************************************************/
function view_agend_paciente() {
	global $agendamentos_pac;
	$agendamentos_pac = find_all_paciente();	
	
}


/*****************************************************************/
function view_agend_profissional() {
	global $agendamentos_prof;
	$agendamentos_prof = find_all_profissional();	
	
}


/*****************************************************************/
function dataview_agendamento($datahoje = null) {
	global $agendamentos;
	
        date_default_timezone_set('America/Sao_Paulo');
	$datahoje = date("Y-m-d");
		
	$agendamentos = find_pordata_agendamento($datahoje);

}


/****************************************************************/
function interactview_agendamento($valor = null) {
	global $agendamentos;
			
	if (!empty($_POST['buscaagen'])) {
		   
		$valor = $_POST['buscaagen'];
	
	    $agendamentos = especificview_agendamento($valor);
	  
	}		
}

/****************************************************************/
function view_agendamento($id = null) {

  global $agendamento;
  $agendamento = find_agendamento($id);
}
 

/****************************************************************/
function viewonly_telao_agendamento($idp = null, $idpr = null) {

  global $agendamento;
  $agendamento = find_telao_agendamento($idp, $idpr);
}


/****************************************************************/
function add_agendamento() {
  
 $agend_id_pac = isset($_POST['agend_id_pac']) ? $_POST['agend_id_pac'] : null;
$agend_id_prof = isset($_POST['agend_id_prof']) ? $_POST['agend_id_prof'] : null;

$agend_data = isset($_POST['agend_data']) ? $_POST['agend_data'] : null;
$agend_hora = isset($_POST['agend_hora']) ? $_POST['agend_hora'] : null;

$agend_tipo = isset($_POST['agend_tipo']) ? $_POST['agend_tipo'] : null;


if (!empty($agend_id_pac) || !empty($agend_id_prof) || !empty($agend_data) || !empty($agend_hora) || !empty($agend_tipo)) {

  		
  save_agendamento($agend_data,$agend_hora,$agend_id_pac,$agend_id_prof,$agend_tipo);
   
	$tipo_ss=$_SESSION['type'];
	
	$status_ok='success_insert';
	$status_not='danger_insert';
		
	if(strcmp($tipo_ss,$status_ok) == 0){
	   echo("<script type='text/javascript'> alert('Agendamento cadastrado com sucesso !!'); location.href='mainall_agendamentos.php';</script>");
	   
	}
    elseif(strcmp($tipo_ss,$status_not) == 0){
	  echo("<script type='text/javascript'> alert('Não foi possível realizar a operação. Verifique todos os campos preenchidos!'); location.href='#';</script>");
	  
 	}
	   
   }
 }
   
  
/***************************************************************/
function edit_agendamento() { 
   
  if (isset($_GET['id']) && preg_match('/^\d+$/', $_GET['id']) ) {

      $id = (int)$_GET['id'];
	  	  
	 if(is_numeric($id)){
	  	        	 
	   $agend_id_pac = isset($_POST['agend_id_pac']) ? $_POST['agend_id_pac'] : null;
           $agend_id_prof = isset($_POST['agend_id_prof']) ? $_POST['agend_id_prof'] : null;

           $agend_data = isset($_POST['agend_data']) ? $_POST['agend_data'] : null;
           $agend_hora = isset($_POST['agend_hora']) ? $_POST['agend_hora'] : null;

           $agend_tipo = isset($_POST['agend_tipo']) ? $_POST['agend_tipo'] : null;
  		
           if (!empty($agend_id_pac) || !empty($agend_id_prof) || !empty($agend_data) || !empty($agend_hora) || !empty($agend_tipo)) {

              update_agendamento($id, $agend_data,$agend_hora,$agend_id_pac,$agend_id_prof,$agend_tipo);
      		  
   	      $tipo_ss=$_SESSION['type'];
	  
              $status_ok='success_edit';
	      $status_not='danger_edit';
		
	      if(strcmp($tipo_ss,$status_ok) == 0){
	        echo("<script type='text/javascript'> alert('Agendamento atualizado com sucesso !!'); location.href='mainall_agendamentos.php';</script>");
	       }
	      elseif(strcmp($tipo_ss,$status_not) == 0){
	        echo("<script type='text/javascript'> alert('Não foi possível realizar a operação. Verifique todos os campos preenchidos!'); location.href='#';</script>");
	       }
	 	 
	     } else {	 	 	
		global $agendamento;	  	  	  
		  $agendamento = find_agendamento($id);   
                          
			//print_r($agendamento);	 	  
		  } 
     }
   } else {
       header('location: mainall_agendamentos.php');
  }
}


/***************************************************************/
function edit_liberar_agendamento() {
    
  $udatahoje = date("Y-m-d");	
	
  if (isset($_GET['id']) && preg_match('/^\d+$/', $_GET['id'])) {
      $id = (int)$_GET['id'];
	  	 		  
	 if(is_numeric($id)){
	  	        	 
		update_liberar_agendamento($id, $udatahoje);  
				 	 
		}  
     
	 } 
   }




/****************************************************************/
function desmarca_agendamento($id = null) {
  global $agendamento;
  
  $agendamento = update_desmarca_agendamento($id);
  
  header('location: mainall_agendamentos.php');
}





?>
