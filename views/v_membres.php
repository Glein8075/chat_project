<?php require_once(PATH_VIEWS.'header.php');?>
    </head>
    <body>
	<?php require_once(PATH_MENU);?>
			<!-- reste de la page-->
			<div>
				<table><tr><td>pseudo</td><td>droits</td><td></td</tr>
				<?php
				
				if(isset($_SESSION['mail'])){
				//consulter la base de données pour récupérer toute les informations des users
				$reponse=$bdd->query('SELECT * FROM my_users');
				while ($ligne = $reponse->fetch()){
					//affichage pour chaque user
					//version php
					echo '<tr><td>'.$ligne['pseudo'].'</td><td>'.$ligne['droits'].'</td>';
					if ($droits==2){ ?>
						
						<td><label>Changer les droits:</label>
						<form action="index.php?page=membres" method="POST" ">
						<select name="droit">
							<option value="0"> inscrit </option>
							<option value="1"> rédacteur </option>
							<option value="2"> admin </option>
						</select>
						<input type="hidden" name="user" value="<?php echo $ligne['email']; ?>" />
						<input type=submit name="submit" value="valider"/>
						</form></td>
						
					<?php }	
					echo '</tr>';
				}
				?>
				</table>
			</div>
        <?php } //fin du if isset session mail
		// else {
		// 	//redirection vers index.php
		// 	header('Location: index.php?page=interdiction');
		// 	exit();
		// }?>
    </body>
</html>
