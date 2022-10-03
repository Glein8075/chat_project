<?php require_once(PATH_VIEWS.'header.php');?>
    <body>
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

