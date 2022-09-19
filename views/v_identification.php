<?php require_once(PATH_VIEWS.'header.php');?>
    <body>
		<!-- formulaire d'identification -->
	<div class="connexion">
		<form action="index.php?page=identification" method="POST" id="element">
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
