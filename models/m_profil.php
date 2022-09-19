<?php
//debut de la page 
		//vérification de session création de la variable $_SESSION["mail"]
		if (isset($_SESSION["mail"])){
			//importation du menu 
			require_once(PATH_MENU);
			//gestion d'une action de formulaire
			if (isset($_POST['Pseudo'])){
				$reponse=$bdd->prepare('UPDATE my_users SET pseudo=:Pseudo WHERE email=:email');
				$reponse->execute(array(
					"Pseudo" => htmlspecialchars($_POST['Pseudo']),
					"email" => $_SESSION['mail']));
			}
			if (isset($_POST['URL'])){
				$reponse=$bdd->prepare('UPDATE my_users SET url=:url WHERE email=:email');
				$reponse->execute(array(
					"url" => htmlspecialchars($_POST['URL']),
					"email" => $_SESSION['mail']));
			}
        }					
?>