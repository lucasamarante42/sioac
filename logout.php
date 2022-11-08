<?php 

unset ($_SESSION['usuario']);
unset ($_SESSION['status']);

session_unset();
session_destroy();

header('location: login.php');

?>
