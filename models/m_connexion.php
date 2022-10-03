<?php 
session_start();
try{
	$bdd = new PDO('mysql:host='.BD_HOST.';dbname='.BD_DBNAME.';charset=utf8',BD_USER,BD_PWD);
	}
catch(Exception $e) {
	die('Erreur : ' .$e->getMessage());
	}?>
