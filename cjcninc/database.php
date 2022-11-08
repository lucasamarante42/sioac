<?php

function open_database() {

   try {
     $conn = new PDO('mysql:host=' .DB_HOST. ';dbname=' .DB_NAME,DB_USER,DB_PASSWORD);
    
     return $conn;

    } catch (PDOException $e) {
	 echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
	 die();
	}
}

function close_database($conn) {
   try {
	$conn = null;
     } catch (PDOException $e) {
	echo $e->getMessage();
     }
}


/*******************************************************************************************************/
function check_logar($usuario = null, $senha = null) {

   $db = open_database();
       
   try {
      if ($usuario) {
	  if ($senha) {
                   
	    $sql = "SELECT * FROM  tb_inicio WHERE tb_inicio_usuario = :usuario AND tb_inicio_senha = :senha";	
	   
	    $stmt = $db->prepare($sql);

	    $stmt->bindParam(':usuario',$usuario, PDO::PARAM_STR);
	    $stmt->bindParam(':senha',$senha, PDO::PARAM_STR);

	    $stmt->execute();
	    		
	    $resulta = $stmt->rowCount();
		
   	      if ($resulta > 0) {
			
		  $_SESSION['status'] = 'logado';
			                	
		   //include "logger.php";
		   //logger("efetuou login.");
		} else{
  		  unset ($_SESSION['usuario']);
		  $_SESSION['status'] = 'not_logado';
		}		
	   }
	  }
	  	  
   } catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
 
 close_database($db);
}

/************************************************************************************/
function find_paciente( $id = null ) {
     
	$db = open_database();
	$found = null;  

	try {
	  if ($id) {
	  
	    $sql = "SELECT * FROM tb_paciente WHERE tb_paciente_id = :id";
	    
            $stmt = $db->prepare($sql);
                
	    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
            
            $stmt->execute();   		     
    	   
	    if ($stmt->rowCount() > 0) {
	      $found = $stmt->fetch(PDO::FETCH_ASSOC);
	    }
	    
	    } else {
	  
	    	$sql = "SELECT * FROM tb_paciente WHERE tb_paciente_id > 1 ORDER BY tb_paciente_nome ASC";
	        
	       $stmt = $db->query($sql);
                   
    	       if ($stmt->rowCount() > 0) {
	         $found = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                	
	       }    
	   
	  }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($db);
	return $found;
}


/*******************************************************************************/
function find_all_paciente() {
  return find_paciente();
}


/******************************************************************************/
function especificview_paciente($valor = null){
    
    $db = open_database();
    $found = null;		
	
    try {
	  if ($valor) {
	  	  
	    $valor = '%' . $valor . '%';
	    $sql = "SELECT * FROM tb_paciente WHERE tb_paciente_nome LIKE :valor";
		
	    $stmt = $db->prepare($sql);

            $stmt->bindParam(':valor',$valor, PDO::PARAM_STR);
            
            $stmt->execute();  
			  			  
	    if ($stmt->rowCount() > 0) {
		 $found = $stmt->fetchAll(PDO::FETCH_ASSOC); 
	    }
	    $_SESSION['type'] = 'success_view';
				
	  } 
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }	
	close_database($db);
	return $found;
} 

/********************************************************************************/
function save_paciente($pac_nome=null,$pac_sobrenome=null,$pac_nascimento=null,$pac_rg=null,$pac_endereco=null,$pac_bairro=null,$pac_cidade=null,$pac_estado=null,$pac_cep=null,$pac_telefone=null,$pac_celular=null,$pac_convenio=null,$pac_observacao=null) {

  $db = open_database();
 
  try {

    $sql = "INSERT INTO tb_paciente (tb_paciente_nome,tb_paciente_sobrenome,tb_paciente_nascimento,tb_paciente_rg,tb_paciente_endereco,tb_paciente_bairro,tb_paciente_cidade,
tb_paciente_estado,tb_paciente_cep,tb_paciente_telefone,tb_paciente_celular,tb_paciente_tipo_convenio,tb_paciente_observacao)  VALUES (:pac_nome, :pac_sobrenome, :pac_nascimento, :pac_rg, :pac_endereco, :pac_bairro, :pac_cidade, :pac_estado, :pac_cep, :pac_telefone, 
:pac_celular, :pac_convenio, :pac_observacao)";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':pac_nome',$pac_nome, PDO::PARAM_STR);
    $stmt->bindParam(':pac_sobrenome',$pac_sobrenome, PDO::PARAM_STR);
    $stmt->bindParam(':pac_nascimento',$pac_nascimento, PDO::PARAM_STR);
    $stmt->bindParam(':pac_rg',$pac_rg, PDO::PARAM_INT);
    
    $stmt->bindParam(':pac_endereco',$pac_endereco, PDO::PARAM_STR);
    $stmt->bindParam(':pac_bairro',$pac_bairro, PDO::PARAM_STR);
    $stmt->bindParam(':pac_cidade',$pac_cidade, PDO::PARAM_STR);
    $stmt->bindParam(':pac_estado',$pac_estado, PDO::PARAM_STR);
    $stmt->bindParam(':pac_cep',$pac_cep, PDO::PARAM_INT);

    $stmt->bindParam(':pac_telefone',$pac_telefone, PDO::PARAM_STR);
    $stmt->bindParam(':pac_celular',$pac_celular, PDO::PARAM_STR);
    $stmt->bindParam(':pac_convenio',$pac_convenio, PDO::PARAM_STR);
    $stmt->bindParam(':pac_observacao',$pac_observacao, PDO::PARAM_STR);

    $result = $stmt->execute();
    
    if ($result){
     
       $_SESSION['type'] = 'success_insert';
		
    }else{
	$_SESSION['type'] = 'danger_insert';
	 //var_dump( $stmt->errorInfo() );
		
	 }	  
       	  
  } catch (Exception $e) {   
     
       $_SESSION['type'] = 'danger_insert';
	
  } 
  close_database($db);
}


/************************************************************************************/
function update_paciente($id = 0, $pac_nome=null,$pac_sobrenome=null,$pac_nascimento=null,$pac_rg=null,$pac_endereco=null,$pac_bairro=null,$pac_cidade=null,$pac_estado=null,$pac_cep=null,$pac_telefone=null,$pac_celular=null,$pac_convenio=null,$pac_observacao=null) {

  $db = open_database();


  try {

     $sql  = "UPDATE tb_paciente SET tb_paciente_nome= :pac_nome, tb_paciente_sobrenome= :pac_sobrenome, tb_paciente_nascimento= :pac_nascimento, tb_paciente_rg= :pac_rg, tb_paciente_endereco= :pac_endereco, tb_paciente_bairro= :pac_bairro, tb_paciente_cidade= :pac_cidade, tb_paciente_estado= :pac_estado, tb_paciente_cep= :pac_cep, tb_paciente_telefone= :pac_telefone, tb_paciente_celular= :pac_celular, tb_paciente_tipo_convenio= :pac_convenio, tb_paciente_observacao= :pac_observacao WHERE tb_paciente_id = :id";
        
    $stmt = $db->prepare($sql);
    
    $stmt->bindParam(':pac_nome',$pac_nome, PDO::PARAM_STR);
    $stmt->bindParam(':pac_sobrenome',$pac_sobrenome, PDO::PARAM_STR);
    $stmt->bindParam(':pac_nascimento',$pac_nascimento, PDO::PARAM_STR);
    $stmt->bindParam(':pac_rg',$pac_rg, PDO::PARAM_INT);
    
    $stmt->bindParam(':pac_endereco',$pac_endereco, PDO::PARAM_STR);
    $stmt->bindParam(':pac_bairro',$pac_bairro, PDO::PARAM_STR);
    $stmt->bindParam(':pac_cidade',$pac_cidade, PDO::PARAM_STR);
    $stmt->bindParam(':pac_estado',$pac_estado, PDO::PARAM_STR);
    $stmt->bindParam(':pac_cep',$pac_cep, PDO::PARAM_INT);

    $stmt->bindParam(':pac_telefone',$pac_telefone, PDO::PARAM_STR);
    $stmt->bindParam(':pac_celular',$pac_celular, PDO::PARAM_STR);
    $stmt->bindParam(':pac_convenio',$pac_convenio, PDO::PARAM_STR);
    $stmt->bindParam(':pac_observacao',$pac_observacao, PDO::PARAM_STR);
 
    $stmt->bindParam(':id',$id, PDO::PARAM_INT); 

    $result = $stmt->execute();
    
    if ($result){
     
       $_SESSION['type'] = 'success_edit';
		
    }else{
	$_SESSION['type'] = 'danger_edit';
	 //var_dump( $stmt->errorInfo() );
		
	 }
  	
		
  } catch (Exception $e) { 
    
    $_SESSION['type'] = 'danger_edit';
	
  } 
  close_database($db);
}


/**************************************************************************************/
function remove_paciente($id = null) {
  
  $db = open_database();
	
  try {
    if ($id) {

      $sql = "DELETE FROM tb_paciente WHERE tb_paciente_id = :id";
      
      $stmt = $db->prepare($sql);
    
      $stmt->bindParam(':id',$id, PDO::PARAM_INT); 

      $result = $stmt->execute();
    
      if ($result){
     
         $_SESSION['type'] = 'success_delete';
		
    }else{
	 $_SESSION['type'] = 'danger_delete';
	 //var_dump( $stmt->errorInfo() );
		
	 } 	  
     
    }
  } catch (Exception $e) { 
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger_delete';

  }

	
  close_database($db);
}

/************************************************************************************************************************************/

/************************************************************************************************************************************/


/***************************************************************/
function find_profissional( $id = null ) {
  
	$db = open_database();
	$found = null;
	
	try {
	   if ($id) {
	   
             $sql = "SELECT * FROM tb_profissional_saude WHERE tb_profissional_id = :id";
 
             $stmt = $db->prepare($sql);

             $stmt->bindParam(':id',$id, PDO::PARAM_INT);
            
             $stmt->execute();   		     
    	   
	      if ($stmt->rowCount() > 0) {
	        $found = $stmt->fetch(PDO::FETCH_ASSOC);
	      }
	   
	    
	  } else {
	  
               $sql = "SELECT * FROM tb_profissional_saude WHERE tb_profissional_id > 1 ORDER BY tb_profissional_nome ASC";
	        
	       $stmt = $db->query($sql);
                   
    	       if ($stmt->rowCount() > 0) {
	         $found = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                	
	       }	    

	  }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($db);
	return $found;
}


/*******************************************************************************/
function find_all_profissional() {
  return find_profissional();
}


/******************************************************************************/
function especificview_profissional($valor = null){
    
    $db = open_database();
    $found = null;		
	
    try {
	  if ($valor) {
	  	  
	    $valor = '%' . $valor . '%';
	    $sql = "SELECT * FROM tb_profissional_saude WHERE tb_profissional_nome LIKE :valor";
		
	    $stmt = $db->prepare($sql);

            $stmt->bindParam(':valor',$valor, PDO::PARAM_STR);
            
            $stmt->execute();  
			  			  
	    if ($stmt->rowCount() > 0) {
		 $found = $stmt->fetchAll(PDO::FETCH_ASSOC); 
	    }
	    $_SESSION['type'] = 'success_view';
				
	  } 
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }	
	close_database($db);
	return $found;
} 
/******************************************************************************/
function save_profissional($prof_nome=null,$prof_sobrenome=null,$prof_registro=null,$prof_sala=null,$prof_telefone=null,$prof_celular=null,$prof_observacao=null) {

  $db = open_database();
 
   try {
 
   $sql = "INSERT INTO tb_profissional_saude (tb_profissional_nome,tb_profissional_sobrenome,tb_profissional_registro,tb_profissional_sala,tb_profissional_telefone,
tb_profissional_celular,tb_profissional_observacao)  VALUES (:prof_nome, :prof_sobrenome, :prof_registro, :prof_sala, :prof_telefone, :prof_celular, :prof_observacao)";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':prof_nome',$prof_nome, PDO::PARAM_STR);
    $stmt->bindParam(':prof_sobrenome',$prof_sobrenome, PDO::PARAM_STR);
    $stmt->bindParam(':prof_registro',$prof_registro, PDO::PARAM_STR);
    $stmt->bindParam(':prof_sala',$prof_sala, PDO::PARAM_STR);

    $stmt->bindParam(':prof_telefone',$prof_telefone, PDO::PARAM_STR);
    $stmt->bindParam(':prof_celular',$prof_celular, PDO::PARAM_STR);
    $stmt->bindParam(':prof_observacao',$prof_observacao, PDO::PARAM_STR);

    $result = $stmt->execute();
    
    if ($result){
     
       $_SESSION['type'] = 'success_insert';
		
    }else{
	$_SESSION['type'] = 'danger_insert';
	 //var_dump( $stmt->errorInfo() );
		
	 }
   	  
   } catch (Exception $e) {   
   
     $_SESSION['type'] = 'danger_insert';
	
  }
    
  close_database($db);
}

/************************************************************************************/
function update_profissional($id = 0, $prof_nome=null,$prof_sobrenome=null,$prof_registro=null,$prof_sala=null,$prof_telefone=null,$prof_celular=null,$prof_observacao=null) {
  
   $db = open_database();
      
 try {
  
   $sql = "UPDATE tb_profissional_saude SET tb_profissional_nome= :prof_nome, tb_profissional_sobrenome= :prof_sobrenome, tb_profissional_registro= :prof_registro, tb_profissional_sala= :prof_sala, tb_profissional_telefone= :prof_telefone,
tb_profissional_celular= :prof_celular, tb_profissional_observacao= :prof_observacao WHERE tb_profissional_id= :id";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':prof_nome',$prof_nome, PDO::PARAM_STR);
    $stmt->bindParam(':prof_sobrenome',$prof_sobrenome, PDO::PARAM_STR);
    $stmt->bindParam(':prof_registro',$prof_registro, PDO::PARAM_STR);
    $stmt->bindParam(':prof_sala',$prof_sala, PDO::PARAM_STR);

    $stmt->bindParam(':prof_telefone',$prof_telefone, PDO::PARAM_STR);
    $stmt->bindParam(':prof_celular',$prof_celular, PDO::PARAM_STR);
    $stmt->bindParam(':prof_observacao',$prof_observacao, PDO::PARAM_STR);

    $stmt->bindParam(':id',$id, PDO::PARAM_INT);

    $result = $stmt->execute();
   
    if ($result){
     
       $_SESSION['type'] = 'success_edit';
		
    }else{
	$_SESSION['type'] = 'danger_edit';
	 //var_dump( $stmt->errorInfo() );
		
	 }
		
  } catch (Exception $e) { 
    
    $_SESSION['type'] = 'danger_edit';
	
  } 
  close_database($db);
}


/**************************************************************************************/
function remove_profissional( $id = null ) {
  
  $db = open_database();
	
  try {
    if ($id) {
      $sql = "DELETE FROM tb_profissional_saude WHERE tb_profissional_id = :id";
    
      
      $stmt = $db->prepare($sql);
    
      $stmt->bindParam(':id',$id, PDO::PARAM_INT); 

      $result = $stmt->execute();
    
      if ($result){
     
         $_SESSION['type'] = 'success_delete';
		
    }else{
	 $_SESSION['type'] = 'danger_delete';
	 //var_dump( $stmt->errorInfo() );
		
	 }	  	  
     
    }
  } catch (Exception $e) { 
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger_delete';

  }
  close_database($db);
}

/************************************************************************************************************************************/

/************************************************************************************************************************************/


/***************************************************************/
function find_agendamento( $id = null ) {
  
	$db = open_database();
	$found = null;
	
	try {
	  if ($id) {
	    $sql = "SELECT * FROM tb_agendamento AS a INNER JOIN tb_paciente AS p ON a.tb_agendamento_id_paciente = p.tb_paciente_id 
		INNER JOIN tb_profissional_saude AS ps ON a.tb_agendamento_id_profissional = ps.tb_profissional_id WHERE a.tb_agendamento_id = :id";

				
	    $stmt = $db->prepare($sql);
                
	    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
            
            $stmt->execute();   		     
    	   
	    if ($stmt->rowCount() > 0) {
	      $found = $stmt->fetch(PDO::FETCH_ASSOC);
	    }
	    
	  } else {
	  	    	  
	    $sql = "SELECT * FROM tb_agendamento AS a INNER JOIN tb_paciente AS p ON a.tb_agendamento_id_paciente = p.tb_paciente_id
                INNER JOIN tb_profissional_saude AS ps ON a.tb_agendamento_id_profissional = ps.tb_profissional_id ORDER BY          	a.tb_agendamento_data, a.tb_agendamento_hora ASC";
		
	       $stmt = $db->query($sql);
                   
    	       if ($stmt->rowCount() > 0) {
	         $found = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                	
	       }

	  }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($db);
	return $found;
}

/***************************************************************/
function find_telao_agendamento( $idp = null, $idpr = null ) {
  
	$db = open_database();
	$found = null;
	
	try {
	  if ($idp and $idpr) {
	    $sql = "SELECT * FROM tb_agendamento AS a INNER JOIN tb_paciente AS p ON a.tb_agendamento_id_paciente = p.tb_paciente_id 
		INNER JOIN tb_profissional_saude AS ps ON a.tb_agendamento_id_profissional = ps.tb_profissional_id WHERE p.tb_paciente_id = :idp AND ps.tb_profissional_id = :idpr";
				
	    $stmt = $db->prepare($sql);
                
	    $stmt->bindParam(':idp',$idp, PDO::PARAM_INT);
	    $stmt->bindParam(':idpr',$idpr,PDO::PARAM_INT);            

            $stmt->execute();   		     
    	   
	    if ($stmt->rowCount() > 0) {
	      $found = $stmt->fetch(PDO::FETCH_ASSOC);
	    }
	    
	  } 
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($db);
	return $found;
}


/*******************************************************************************/
function find_all_agendamento() {
  return find_agendamento();
}

/******************************************************************************/
function especificview_agendamento($valor = null){
  
    $db = open_database();
    $found = null;		
	
    try {
	if ($valor) {
	
           $valor = '%' . $valor . '%';
  	  
	   $sql = "SELECT * FROM tb_agendamento AS a INNER JOIN tb_paciente AS p ON a.tb_agendamento_id_paciente = p.tb_paciente_id
                INNER JOIN tb_profissional_saude AS ps ON a.tb_agendamento_id_profissional = ps.tb_profissional_id WHERE a.tb_agendamento_data LIKE :valor";
						
            $stmt = $db->prepare($sql);

            $stmt->bindParam(':valor',$valor, PDO::PARAM_STR);
            
            $stmt->execute();  
			  			  
	    if ($stmt->rowCount() > 0) {
		 $found = $stmt->fetchAll(PDO::FETCH_ASSOC); 
	    }
	    $_SESSION['type'] = 'success_view';
				
	  } 
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }	
	close_database($db);
	return $found;
}


/******************************************************************************/
function find_pordata_agendamento($datahoje = null){
    
    $db = open_database();
    $found = null;		
			
    try {
	  if ($datahoje) {
	  	  
	    $sql = "SELECT * FROM tb_agendamento AS a INNER JOIN tb_paciente AS p ON a.tb_agendamento_id_paciente = p.tb_paciente_id INNER JOIN tb_profissional_saude AS ps ON a.tb_agendamento_id_profissional = ps.tb_profissional_id WHERE :datahoje = a.tb_agendamento_data AND a.tb_agendamento_status = 'OK' ORDER BY a.tb_agendamento_data, a.tb_agendamento_hora ASC";			
						
	  $stmt = $db->prepare($sql);
	
          $stmt->bindParam(':datahoje',$datahoje, PDO::PARAM_STR);            

          $stmt->execute(); 
        
    	   if ($stmt->rowCount() > 0) {
	         $found = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                	
	   }          
			  		
	    $_SESSION['type'] = 'success_view';
				
	  } 
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }	
	close_database($db);
	return $found;
}

/************************************************************************************/
function update_liberar_agendamento($id = 0, $udatahoje = null) {
  
  $db = open_database();
	 	 
  try {
  
    if ($udatahoje) {
	
	$sql  = "UPDATE tb_agendamento AS ag INNER JOIN tb_paciente AS p ON ag.tb_agendamento_id_paciente = p.tb_paciente_id SET tb_agendamento_pac_liberado = 'Liberado' WHERE p.tb_paciente_id= :id AND :udatahoje = ag.tb_agendamento_data";   
	    
	
      $stmt = $db->prepare($sql);

      $stmt->bindParam(':id',$id, PDO::PARAM_INT);
      $stmt->bindParam(':udatahoje',$udatahoje, PDO::PARAM_STR);    

      $result = $stmt->execute();
 
      if ($result){
 
       $_SESSION['type'] = 'success_edit';
		
    }else{
	$_SESSION['type'] = 'danger_edit';
	 //var_dump( $stmt->errorInfo() );
		
	 } 
    
	
    }	
  } catch (Exception $e) { 
    
    $_SESSION['type'] = 'danger_edit';
	
  }
  close_database($db);
}


/********************************************************************************/
function save_agendamento($agend_data=null,$agend_hora=null,$agend_id_pac=null,$agend_id_prof=null,$agend_tipo=null) {
 
 
 $db = open_database();

  try {
   
     $sql = "INSERT INTO tb_agendamento (tb_agendamento_data,tb_agendamento_hora,tb_agendamento_id_paciente,tb_agendamento_id_profissional,tb_agendamento_tipo) VALUES (:agend_data, :agend_hora, :agend_id_pac, :agend_id_prof, :agend_tipo)";
  
  
  $stmt = $db->prepare($sql);

    $stmt->bindParam(':agend_data',$agend_data, PDO::PARAM_STR);
    $stmt->bindParam(':agend_hora',$agend_hora, PDO::PARAM_STR);
    $stmt->bindParam(':agend_id_pac',$agend_id_pac, PDO::PARAM_INT);
    $stmt->bindParam(':agend_id_prof',$agend_id_prof, PDO::PARAM_INT);
    
    $stmt->bindParam(':agend_tipo',$agend_tipo, PDO::PARAM_STR);

    $result = $stmt->execute();
    
    if ($result){
     
       $_SESSION['type'] = 'success_insert';
		
    }else{
	$_SESSION['type'] = 'danger_insert';
	 //var_dump( $stmt->errorInfo() );
		
	 }


        	  
  } catch (Exception $e) {   
    
       $_SESSION['type'] = 'danger_insert';
	
  } 
  close_database($db);
}

/************************************************************************************/
function update_agendamento($id = 0, $agend_data=null,$agend_hora=null,$agend_id_pac=null,$agend_id_prof=null,$agend_tipo=null) {
  
  $db = open_database();
  
  try {
  
  $sql  = "UPDATE tb_agendamento SET tb_agendamento_data= :agend_data, tb_agendamento_hora= :agend_hora, tb_agendamento_id_paciente= :agend_id_pac, tb_agendamento_id_profissional= :agend_id_prof, tb_agendamento_tipo= :agend_tipo WHERE tb_agendamento_id= :id";
      
  
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':agend_data',$agend_data, PDO::PARAM_STR);
    $stmt->bindParam(':agend_hora',$agend_hora, PDO::PARAM_STR);
    $stmt->bindParam(':agend_id_pac',$agend_id_pac, PDO::PARAM_INT);
    $stmt->bindParam(':agend_id_prof',$agend_id_prof, PDO::PARAM_INT);
    
    $stmt->bindParam(':agend_tipo',$agend_tipo, PDO::PARAM_STR);

    $stmt->bindParam(':id',$id, PDO::PARAM_INT); 

    $result = $stmt->execute();
    
    if ($result){
     
       $_SESSION['type'] = 'success_edit';
		
    }else{
	$_SESSION['type'] = 'danger_edit';
	 //var_dump( $stmt->errorInfo() );
		
	 }
		
  } catch (Exception $e) { 
 
    $_SESSION['type'] = 'danger_edit';
	
  } 
  close_database($db);
}


/************************************************************************************/
function update_desmarca_agendamento($id = 0) {
  
  $db = open_database();
      
	 	 
  try {
  
    if ($id) {
	
      $sql  = "UPDATE tb_agendamento SET tb_agendamento_status = 'Desmarcado' WHERE tb_agendamento_id= :id";   
      
      $stmt = $db->prepare($sql);

      $stmt->bindParam(':id',$id, PDO::PARAM_INT);
      
      $result = $stmt->execute();
 
      if ($result){
 
       $_SESSION['type'] = 'success_desm';
		
    }else{
	$_SESSION['type'] = 'danger_desm';
	 //var_dump( $stmt->errorInfo() );
		
	 }	
   	
    }	
  } catch (Exception $e) { 
    
        $_SESSION['type'] = 'danger_desm';
	
  }
  close_database($db);
}


?>
