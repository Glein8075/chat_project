<!doctype html>
<?php session_start(); ?>
<html lang="fr">
	<head>
		<meta charset="utf8" />
		<title> claviardage </title>
		<link href= "<?= PATH_CSS ?>chat_style.css" rel="stylesheet">
	</head>
	<body>
		<?php
		
		//importation du menu 
		require_once(PATH_MENU);
		//tester et réagir si on a poster un message
		if ($droits>0 and isset($_POST['message'])){
			
			$req=$bdd->prepare('insert into my_message (corp, id_user) values (:nv_message,:nv_auteur)');
			$req->execute(array(
				'nv_message' => $_POST['message'],
				'nv_auteur' => $_SESSION['mail'],
			));
		}
		//tester et réagir si on a supprimé un message
		if (isset($_POST['id_message'])){
			$suppr_ok=false;
			if ($droits==2){
				$suppr_ok=true;
			}
			else if ($droits==1){
				//chercher l'auteur du message dans la bdd
				$req=$bdd->prepare('select id_user FROM my_message where id=:id_message');
				$req->execute(array(
					'id_message' => $_POST['id_message']));
				//comparer auteur et utilisateur 
				if ($ligne=$req->fetch() and $ligne['id_user']==$_SESSION['mail']){
					$suppr_ok=true;
				}
			}
			//action
			if($suppr_ok){
			$req=$bdd->prepare('DELETE FROM my_message where id=:id_message');
			$req->execute(array(
			'id_message' => $_POST['id_message']));
			}
        }
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
