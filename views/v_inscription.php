 <!DOCTYPE html>
 <html>
    <head>
        <title>Inscription</title>
        <meta charset="utf-8" />
        <link href="chat_style.css" rel="stylesheet">
    </head>
    <body>
		<!-- debut de la page -->
		<!-- connexion à la base de données-->
		<?php require "connexion.php"; ?>
		<!-- gestion d'une action de formulaire-->
		<?php if (isset($_POST["mail"])){
			// vérification de tous les champs
			$condition=true;
			if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail']) || empty($_POST['mdp']) || empty($_POST['login']))
			{
				echo "ERREUR : Tous les champs n'ont pas été renseignés.";
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
				//echo 'préparation requete<br/>';
				$reponse=$bdd->prepare('insert into my_users values (:mail, :pseudo, :mdp, "https://ucreate.ch/wp-content/uploads/2022/02/profil_vide.jpg",0)');
				//echo 'execution    ';
				$reponse->execute(array(
					"mail" => htmlspecialchars($mail),
					"pseudo" => htmlspecialchars($login),
					"mdp" => hash('md5',$mdp)));
				//redirection index pour se connecter
				header('Location: http://localhost/projet-chat/index.php');
					
			}
			
		}
		?>
		<!-- reste de la page-->
		<div>
			<!--formulaire d'inscription-->
			<form action="inscription.php" method="POST" id="element">
				<fieldset>
					<p><input type="text" name="nom" placeholder="Nom"/></p>
					<p><input type="text" name="prenom" placeholder="Prénom" /></p>
					<p><input type="text" name="login" placeholder="Nom d'utilisateur" /></p>
					<p><input type="email" name="mail" placeholder="Adresse E-mail" /></p>
					<p><input type="password" name="mdp" placeholder="Mot de passe" /></p>
					<input type="submit" class="btn" value="Valider" />
					<input type="reset" class="btn" value="Rétablir" />
				</fieldset>
			</form>
			
		</div>
		
		<footer> En cas de problème, <a href="">contactez</a> l'administrateur du forum chat </footer>
        
    </body>
		
</html>

