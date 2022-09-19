<?php require_once(PATH_VIEWS.'header.php');?>
    <body>
	<?php 	
		//reste de la page
		//consulter la base de données pour réccupérer toute les informations des users
		if (isset($_SESSION["mail"])){
				$reponse=$bdd->query('SELECT * FROM my_users WHERE email= "'.$_SESSION["mail"].'"');
				if ($ligne= $reponse->fetch()){
					echo '<table>';
					echo '<tr><td>'.$ligne["email"].'<td><td>'.$ligne["pseudo"].'<td><td>'.$ligne["droits"].'<td>';
					echo '</table>';
					echo'<input type="hidden" name="id" value="'.$ligne['email'].'" />'?>
					<img src="<?php echo $ligne['url']; ?>" class="img_profil"/>
					<form action="index.php?page=profil" method="post">
						<label> changer de pseudo</label><input type="text" name="Pseudo" value="<?php echo $ligne['pseudo']; ?>" />
						<input type="submit" value="Changer Pseudo"/>
					</form>
					<form action="index.php?page=profil" method="post">
						<label> url de l'image de profile</label><input type="text" name="URL" value="<?php echo $ligne['url']; ?>" />
						<input type="submit" value="Changer photo de profile"/>
					</form>
				
				<?php }
		 }?>		
	</body>
</html>
