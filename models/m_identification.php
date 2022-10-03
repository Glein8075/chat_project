<?php
		//récupérer l'identifiant et la mdp du formulaire
        
		if(isset( $_POST["mail"])){
			// interrogation de la base de données
			$req=$bdd->prepare('select email, mdp, pseudo from my_users where email=:user_mail;');
			$req->execute(array(
				'user_mail' => $_POST['mail']));
            
			// vérification que l'utilisateur existe et donne le bon mdp
			if ($ligne=$req->fetch() and $ligne['mdp']==hash('md5',$_POST['mdp'])){
				//remplir les variables de session 
				$_SESSION['mail']=$ligne['email'];
				$_SESSION['user']=$ligne['pseudo'];
			}
			else{
				$inconnu=true;
			}
			$req->closeCursor();
		}
		?>