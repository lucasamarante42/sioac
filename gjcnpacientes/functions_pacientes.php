<?php
require_once('../config.php');
require_once(DBAPI);

$pacientes = null;
$paciente = null;

/*****************************************************************/
function index_paciente() {
	global $pacientes;
	$pacientes = find_all_paciente();	
	
}

/****************************************************************/
function interactview_paciente($valor = null) {
	global $pacientes;
			
	if (!empty($_POST['buscapac'])) {
		   
		$valor = $_POST['buscapac'];
	
	    $pacientes = especificview_paciente($valor);
	  
	}		
}
 
/****************************************************************/
function view_paciente($id = null) {
  global $paciente;
  $paciente = find_paciente($id);
}


/****************************************************************/
function add_paciente() {

      $pac_nome = isset($_POST['pac_nome']) ? $_POST['pac_nome'] : null;
 $pac_sobrenome = isset($_POST['pac_sobrenome']) ? $_POST['pac_sobrenome'] : null;
$pac_nascimento = isset($_POST['pac_nascimento']) ? $_POST['pac_nascimento'] : null;
        $pac_rg = isset($_POST['pac_rg']) ? $_POST['pac_rg'] : null;

$pac_endereco = isset($_POST['pac_endereco']) ? $_POST['pac_endereco'] : null;
  $pac_bairro = isset($_POST['pac_bairro']) ? $_POST['pac_bairro'] : null;
  $pac_cidade = isset($_POST['pac_cidade']) ? $_POST['pac_cidade'] : null;
  $pac_estado = isset($_POST['pac_estado']) ? $_POST['pac_estado'] : null;
     $pac_cep = isset($_POST['pac_cep']) ? $_POST['pac_cep'] : null;

  $pac_telefone = isset($_POST['pac_telefone']) ? $_POST['pac_telefone'] : null;
   $pac_celular = isset($_POST['pac_celular']) ? $_POST['pac_celular'] : null;
  $pac_convenio = isset($_POST['pac_convenio']) ? $_POST['pac_convenio'] : null;
$pac_observacao = isset($_POST['pac_observacao']) ? $_POST['pac_observacao'] : null;


if (!empty($pac_nome) || !empty($pac_sobrenome) || !empty($pac_nascimento) || !empty($pac_rg) || !empty($pac_endereco) || !empty($pac_bairro) || !empty($pac_cidade) || !empty($pac_estado) || !empty($pac_cep) ) {

  		
       save_paciente($pac_nome,$pac_sobrenome,$pac_nascimento,$pac_rg,$pac_endereco,$pac_bairro,$pac_cidade,$pac_estado,$pac_cep,$pac_telefone,$pac_celular,$pac_convenio,$pac_observacao);
    	
	$tipo_ss=$_SESSION['type'];
	
	$status_ok='success_insert';
	$status_not='danger_insert';
		
	if(strcmp($tipo_ss,$status_ok) == 0){
	   echo("<script type='text/javascript'> alert('Paciente cadastrado com sucesso !!'); location.href='mainall_pacientes.php';</script>");
	  
	}
    elseif(strcmp($tipo_ss,$status_not) == 0){
	  echo("<script type='text/javascript'> alert('Não foi possível realizar a operação. Verifique todos os campos preenchidos!'); location.href='#';</script>");
	  
 	}

	   
   } 
 }
   
  
/***************************************************************/
function edit_paciente() {
    
if (isset($_GET['id']) && preg_match('/^\d+$/', $_GET['id'])) {

  $id = (int)$_GET['id'];
	
  if(is_numeric($id)){
	 
      $pac_nome = isset($_POST['pac_nome']) ? $_POST['pac_nome'] : null;
 $pac_sobrenome = isset($_POST['pac_sobrenome']) ? $_POST['pac_sobrenome'] : null;
$pac_nascimento = isset($_POST['pac_nascimento']) ? $_POST['pac_nascimento'] : null;
        $pac_rg = isset($_POST['pac_rg']) ? $_POST['pac_rg'] : null;

$pac_endereco = isset($_POST['pac_endereco']) ? $_POST['pac_endereco'] : null;
  $pac_bairro = isset($_POST['pac_bairro']) ? $_POST['pac_bairro'] : null;
  $pac_cidade = isset($_POST['pac_cidade']) ? $_POST['pac_cidade'] : null;
  $pac_estado = isset($_POST['pac_estado']) ? $_POST['pac_estado'] : null;
     $pac_cep = isset($_POST['pac_cep']) ? $_POST['pac_cep'] : null;

  $pac_telefone = isset($_POST['pac_telefone']) ? $_POST['pac_telefone'] : null;
   $pac_celular = isset($_POST['pac_celular']) ? $_POST['pac_celular'] : null;
  $pac_convenio = isset($_POST['pac_convenio']) ? $_POST['pac_convenio'] : null;
$pac_observacao = isset($_POST['pac_observacao']) ? $_POST['pac_observacao'] : null;


    if (!empty($pac_nome) || !empty($pac_sobrenome) || !empty($pac_nascimento) || !empty($pac_rg) || !empty($pac_endereco) || !empty  ($pac_bairro) || !empty($pac_cidade) || !empty($pac_estado) || !empty($pac_cep) ) {


    update_paciente($id,$pac_nome,$pac_sobrenome,$pac_nascimento,$pac_rg,$pac_endereco,$pac_bairro,$pac_cidade,$pac_estado,$pac_cep,$pac_telefone,$pac_celular,$pac_convenio,$pac_observacao);
      		  
    $tipo_ss=$_SESSION['type'];
	
    $status_ok='success_edit';
    $status_not='danger_edit';
	
	
    if(strcmp($tipo_ss,$status_ok) == 0){
	echo("<script type='text/javascript'> alert('Paciente atualizado com sucesso !!'); location.href='mainall_pacientes.php';</script>");
    }
    elseif(strcmp($tipo_ss,$status_not) == 0){
	echo("<script type='text/javascript'> alert('Não foi possível realizar a operação. Verifique todos os campos preenchidos!'); location.href='#';</script>");
    }
   
	 	 
 } else {	 	 	
	global $paciente;	  	  	  
	$paciente = find_paciente($id);   
    }

   }		
  } else {    
       header('location: mainall_pacientes.php');
  }
}

/****************************************************************/
function delete_paciente($id = null) {
  global $paciente;

  $paciente = remove_paciente($id);

 $tipo_ss=$_SESSION['type'];
 $status_ok='success_delete';
 $status_not='danger_delete';

 if(strcmp($tipo_ss,$status_not) == 0){
   echo("<script type='text/javascript'> alert('Não foi possível realizar a operação.'); location.href='mainall_pacientes.php';</script>");
  }
 else{  
   header('location: mainall_pacientes.php');
  }

}





?>
