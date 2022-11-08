<?php 
   require_once('config.php'); 
   require_once('function.php'); 
   require_once DBAPI; 
   
   logar();


?>


<!DOCTYPE html>
<html>

<div class="container">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>SIOAC</title>

  <link rel="stylesheet" href="<?php echo BASEURL; ?>kjcncss/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo BASEURL; ?>kjcncss/bootstrap-toggle.min.css">
  

  <script src="<?php echo BASEURL; ?>ejcnjs/jquery-3.2.1.min.js"></script> 	
  <script src="<?php echo BASEURL; ?>ejcnjs/bootstrap-toggle.min.js"></script>

  <link rel="stylesheet" href="<?php echo BASEURL; ?>kjcncss/style.css">
  <link rel="stylesheet" href="<?php echo BASEURL; ?>kjcncss/font-awesome.min.css">

  <style>
    body {
        padding-top: 50px;
        padding-bottom: 20px;
        }
  </style>

 
</head>	

  
	
<body>
 <div class="container">

 <div class="row" align="center">
    <h1>Sistema Interativo Online de Agendamento de Consultas</h1>
 </div>
 <br>
  <div class="row">
     <div class="col-md-4 col-md-offset-4">
		 
	<div class="login-panel panel panel-default">
	   
	    <div class="panel-body">
		<form action="login.php" method="POST">
		 <fieldset>
		  <div class="form-group">
		   <input class="form-control" name="usuario" type="text" autofocus required placeholder="Usuário" maxlength="15" pattern="[a-zA-Z0-9]+">
		  </div>
		
		  <div class="form-group">
		   <input class="form-control" name="senha" type="password" required placeholder="Senha" maxlength="15" pattern="[a-zA-Z0-9]+">
		  </div>
		  
                   <div class="form-group">
		    <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
		    <input type="text" name="captcha_code" size="10" maxlength="6" required placeholder="Código" />

		    <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[Trocar imagem]</a>

                   </div>
		   <br>
		  <button class="btn btn-lg btn-primary btn-block">Login</button><br>
							
	         </fieldset>
		</form>
  	     </div>
	  </div>
	</div>
      </div>
    </div>

</div>


