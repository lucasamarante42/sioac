<?php
session_start();

//echo "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];

if (!isset ($_SESSION['usuario']) or $_SESSION['status'] != 'logado') {
   echo "<script> alert('Você não tem permissão de acessar a página solicitada!'); location.href = 'login.php'</script>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      
	<title>SIOAC - Sistema Interativo Online de Agendamento de Consultas</title>
    
	<meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo BASEURL; ?>kjcncss/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASEURL; ?>kjcncss/bootstrap-toggle.min.css"> 	

	
	<script src="<?php echo BASEURL; ?>ejcnjs/jquery-3.2.1.min.js"></script>
	<script src="<?php echo BASEURL; ?>ejcnjs/jquery.mask.min.js"/></script>
	<script src="<?php echo BASEURL; ?>ejcnjs/jquery.maskedinput.js"/></script>
	       
	<script src="<?php echo BASEURL; ?>ejcnjs/bootstrap-toggle.min.js"></script>
	
	<style>
        body {
            padding-top: 60px;
            padding-bottom: 20px;
        }
    </style>
    
    <link rel="stylesheet" href="<?php echo BASEURL; ?>kjcncss/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>kjcncss/font-awesome.min.css">
			
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          		  
          <a href="<?php echo BASEURL; ?>manager_all.php" class="navbar-brand">GERENCIAMENTO DE CONSULTAS</a>
        </div>
        
	<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">          
		  
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    PACIENTES <span class="caret"></span>
                </a>
                
				<ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>gjcnpacientes/mainall_pacientes.php">Gerenciar Pacientes</a></li>
                    <li><a href="<?php echo BASEURL; ?>gjcnpacientes/add_pacientes.php">Novo Paciente</a></li>
                </ul>
            </li>
			
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    PROFISSIONAIS DA SAÚDE <span class="caret"></span>
                </a>
                
				<ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>ijcnprofissionais/mainall_profissionais.php">Gerenciar Profissionais da Saúde</a></li>
                    <li><a href="<?php echo BASEURL; ?>ijcnprofissionais/add_profissionais.php">Novo Profissional da Saúde</a></li>
                </ul>
            </li>
			
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    AGENDAMENTOS <span class="caret"></span>
                </a>
                
				<ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>ajcnagendamentos/mainall_agendamentos.php">Gerenciar Agendamento Consultas</a></li>
                    <li><a href="<?php echo BASEURL; ?>ajcnagendamentos/add_agendamentos.php">Novo Agendamento Consulta</a></li>
                </ul>
            </li>
			
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    SOBRE <span class="caret"></span>
                </a>
                
				<ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>mjcnsobre/ajuda.php">Ajuda</a></li>
                </ul>
            </li>
			
			
          </ul>


	<ul class="nav navbar-nav navbar-right">
           <li><a href="<?php echo BASEURL; ?>logout.php"><span class="glyphicon glyphicon-log-out"></span>LOGOUT</a></li>
        </ul> 

        </div><!--/.navbar-collapse -->
         
         
      </div>
    </nav>

  <main class="container">  
