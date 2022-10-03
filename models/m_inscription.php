<?php
		//tester et réagir si on a poster un message
		if (isset($_POST["mail"])){
			// vérification de tous les champs
			$condition=true;
			if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail']) || empty($_POST['mdp']) || empty($_POST['login']))
			{
				echo "<script>alert(\"ERREUR : Tous les champs n'ont pas été renseignés.\")</script>";
				$condition=false;
			}
			else
			{
				
				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];
				$mail=$_POST['mail'];
				$mdp=$_POST['mdp'];
				$login=$_POST['login'];
				
				
			}	
			if ($condition) { // si toutes les conditions sont réunies :
				//inscription du nouvel utilisateur dans la BDD
				
				$reponse=$bdd->prepare('insert into my_users values (:mail, :pseudo, :mdp, "https://ucreate.ch/wp-content/uploads/2022/02/profil_vide.jpg",0)');
				
				$reponse->execute(array(
					"mail" => htmlspecialchars($mail),
					"pseudo" => htmlspecialchars($login),
					"mdp" => hash('md5',$mdp)));
				
				
					
			}
			
		}
		?>