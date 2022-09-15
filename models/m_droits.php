<?php
// préparation de requete à partir de $_SESSION['mail'] chercher les droits de l'utilisateur
$reponse=$bdd->prepare('select droits from my_users where my_users.email=:email');
$reponse->execute(array(
"email" => $_SESSION['mail']));
// extraire l'information de la réponse et la placer dans $droit 
if ($ligne = $reponse->fetch()){
	
	$droits=$ligne['droits'];
}
?>
