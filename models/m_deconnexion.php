<?php
//démarrer la session
session_start();
//vidange de la variable session
$_SESSION= array();
//redirection vers index
header('Location: index.php');
?>