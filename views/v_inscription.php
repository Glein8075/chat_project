<?php require_once(PATH_VIEWS.'header.php');?>
    <body>
		<!-- debut de la page -->
		<?php
		
		// connexion à la base de donnée
		require_once(PATH_MODELS."connexion.php");
		//tester et réagir si on a poster un message
		if (isset($_POST["mail"])){
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
				
				$reponse=$bdd->prepare('insert into my_users values (:mail, :pseudo, :mdp, "https://ucreate.ch/wp-content/uploads/2022/02/profil_vide.jpg",0)');
				
				$reponse->execute(array(
					"mail" => htmlspecialchars($mail),
					"pseudo" => htmlspecialchars($login),
					"mdp" => hash('md5',$mdp)));
				
				
					
			}
			
		}
		?>
		<!-- reste de la page-->
		<div>
			<!--formulaire d'inscription-->
			<form action="index.php" method="POST" id="element">
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

