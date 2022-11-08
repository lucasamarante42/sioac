<?php 
	require_once('functions_agendamentos.php'); 
	viewonly_telao_agendamento($_GET['idp'],$_GET['idpr']);
?>

<?php require(HEADER_TEMPLATE); ?>

<h2>Paciente <?php echo $agendamento['tb_paciente_id']; ?></h2>

<hr>

 
 <script type="text/javascript">
function piscando(){
               
      var tempo = 3000; //1000 = 1s      
               
      blinks = document.getElementsByTagName("blink");    
       for(var i=0;i<blinks.length;i++){
         if(blinks[i].getAttribute("style")=="VISIBILITY: hidden"){                              
            blinks[i].setAttribute("style", "VISIBILITY: visible");                         
         }else{                   
            blinks[i].setAttribute("style", "VISIBILITY: hidden");                       
          }
        }                             
      setTimeout('piscando()', tempo);            
}
</script>
 
 <body onload="piscando();"> 

 <blink>
   
<h1> <u> LIBERADO - PROSSIGA ATÉ A SALA DE CONSULTA </u>  </h1>
<div class="row">

    <div class="form-group col-md-4">      
	  <h1>NOME</h1> 
      <h1><?php echo $agendamento['tb_paciente_nome']; echo ' '; echo $agendamento['tb_paciente_sobrenome'];?></h1>
    </div>

    <div class="form-group col-md-5">
      <h1>PROF. SAÚDE</h1>
      <h1><?php echo 'Dr(a). ';echo $agendamento['tb_profissional_nome']; echo ' '; echo $agendamento['tb_profissional_sobrenome']; ?></h1>
    </div>

	<div class="form-group col-md-3">
      <h1>SALA </h1>
      <h1><?php echo $agendamento['tb_profissional_sala']; ?></h1>
    </div>
	
    	
</div>

</blik>



<?php require(FOOTER_TEMPLATE); ?>
