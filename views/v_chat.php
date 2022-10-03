	<?php require_once(PATH_VIEWS.'header.php');?>
	<body>
		<?php
		
		//importation du menu 
		require_once(PATH_MENU);
		//formulaire pour poster un message
		?>
		<form action="index.php?page=chat" method="post">
			<input type="text" name="message" />
			<input type="submit" value="Envoyer"/>
		</form>
		<?php
		//requete vers la base de données
		$reponse=$bdd->query('SELECT * FROM my_message JOIN my_users ON my_message.id_user=my_users.email ORDER BY id DESC');
		// affichage de la réponse
		//ligne de tableau HTML
		echo '<table>';
		//lecture ligne apres ligne de la réponse
		while ($ligne = $reponse->fetch()){
			//écriture des donnes dans le code html
			echo '<tr><td>'.$ligne['corp'].'</td><td>'.$ligne['pseudo'].'</td><td>'.$ligne['msg_time'].'</td><td><img src="'.$ligne['url'].'" class="img_profil"/></td>';
			//verifier que cest un admin ou propriétaire du message 
			if ($droits==2 or $ligne['id_user']==$_SESSION['mail']) { ?> 
				<td>
					<form action="index.php?page=chat" method="post">
						<input type="hidden" name="id_message" value=<?php echo $ligne['id'];?> >
						<input type="submit" value="delete">
					</form>
				</td>
			<?php }
			echo '</tr>';
		}
		//fermeture du tableau html
		echo '</table>';
		?>
	</body>
</html>
