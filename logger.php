<?php
date_default_timezone_set('America/Sao_Paulo');
 
function logger($msg){
 
//pega o path completo de onde esta executanto
$caminho_atual = getcwd(); 
 
//muda o contexto de execução para a pasta logs
chdir('/opt/lampp/htdocs/flashview/logs/');
$usuario = $_SESSION['usuario'];

 
$data = date("d-m-y");
$hora = date("H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
 
//Nome do arquivo:
//$arquivo = "Logger_$data.txt";
$arquivo = 'Logger.txt';
 
//Texto a ser impresso no log:
$texto = "[$data][$hora][$ip]> $nome $sobrenome $msg \r\n";
//$quebra_linha = "\n\n";
 
$manipular = fopen("$arquivo", "a+t");
$conteudo = fread($manipular, filesize("$arquivo"));
fwrite($manipular, $texto);
fclose($manipular);
 
//Volta o contexto de execução para o caminho em que estava antes
chdir($caminho_atual);
 
}
?>
