<?php 
try{
	$bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8','root','$va38SE26$');
	}
catch(Exception $e) {
	die('Erreur : ' .$e->getMessage());
	}?>
