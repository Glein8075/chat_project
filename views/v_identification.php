<!DOCTYPE html>
<?php session_start();?>
<html>
    <head>
        <title>accueil</title>
        <meta charset="utf-8" />
        <link href= "<?= PATH_CSS ?>chat_style.css" rel="stylesheet">
    </head>
    <body><?php
		//reccupérer l'identifiant et la mdp du formulaire
		if( isset( $_POST["mail"])){
			echo '<br/>présence formulaire identification ';
			echo $_POST["mdp"].'<br/>';
			echo $_POST["mail"].'<br/>';
			// interrogation de la base de données
			$req=$bdd->prepare('select email, mdp, pseudo from my_users where email=:user_mail;');
			$req->execute(array(
				'user_mail' => $_POST['mail']));
			// vérification que l'utilisateur existe et donne le bon mdp
			if ($ligne=$req->fetch() and $ligne['mdp']==hash('md5',$_POST['mdp'])){
				//remplir les variables de session 
				$_SESSION['mail']=$ligne['email'];
				$_SESSION['user']=$ligne['pseudo'];
				//rediriger vers la page de chat
				$req->closeCursor();
				
			}
			$req->closeCursor();
		}
		?>
		<!-- formulaire d'identification -->
	<div class="connexion">
		<form action="index.php?page=chat" method="POST" id="element">
				<fieldset>

					<p><input type="email" name="mail" placeholder="Adresse E-mail" /></p>
					
					<p><input type="password" name="mdp" placeholder="Mot de passe" /></p>
					
					<input type="submit" class="btn" value="Valider" />
					<input type="reset" class="btn" value="Rétablir" />
				</fieldset>
			</form>
		<p>si vous n'avez pas de compte, </p><a href="index.php?page=inscription">inscrivez-vous !</a>
		
	</div>
    </body>
</html>
