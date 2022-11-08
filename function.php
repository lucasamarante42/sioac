<?php
require_once('config.php');
require_once(DBAPI);
require_once('validate.php');

require_once ('securimage/securimage.php'); 

function logar() {
 
 session_start();

 $securimage = new Securimage();
 unset($_SESSION['codv']);

 if(isset ($_SESSION['usuario'])){
    unset($_SESSION['usuario']);
    unset($_SESSION['status']);
   
  }

    if(isset($_POST['usuario']) && isset ($_POST['senha'])) {
       $usuario = $_POST['usuario'];
         $senha = $_POST['senha'];


        $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
	  $senha = filter_var($senha, FILTER_SANITIZE_STRING);

         if (preg_match('/(from|select|insert|delete|where|drop table|drop database|show tables|#|\*|)/',$usuario)  && preg_match('/(from|select|insert|delete|where|drop table|drop database|show tables|#|\*|)/',$senha)){

  	    $usuario = preg_replace('/(from|select|insert|delete|where|drop table|drop database|show tables|#|\*|)/','',$usuario);
	      $senha = preg_replace('/(from|select|insert|delete|where|drop table|drop database|show tables|#|\*|)/','',$senha);
	 } 

  
           if (preg_match("/^[a-zA-Z0-9]+$/", $usuario) && preg_match("/^[a-zA-Z0-9]+$/", $senha) && ($securimage->check($_POST['captcha_code']) == true)) {
         
               check_logar($usuario, $senha);
    
               $tipo_ss=$_SESSION['status'];
	
               $status_ok='logado';
               $status_not='not_logado';

	       $_SESSION['codv'] = 'ok_captcha';		
	
       	       if(strcmp($tipo_ss,$status_ok) == 0){
		
	           $_SESSION['usuario'] = $usuario;
	           echo("<script type='text/javascript'> alert('Bem vindo ao Sistema de Agendamento de Consultas Online!'); location.href='manager_all.php';</script>");
	   
	       }
               elseif(strcmp($tipo_ss,$status_not) == 0){
	          
                  unset ($_SESSION['usuario']);
	          unset ($_SESSION['status']);
	          echo("<script type='text/javascript'> alert('Usuário/Senha incorretos!'); location.href='login.php';</script>");
	  
 	       }
	   
	  }
            else {
		
               $_SESSION['codv'] = 'error_captcha';
               echo("<script type='text/javascript'> alert('Usuário/Senha/Código incorretos!'); location.href='login.php';</script>");  
           }       
    

    } 

}






?>
