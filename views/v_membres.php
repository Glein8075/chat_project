<!DOCTYPE html>
<?php session_start();?>
<html>
    <head>
        <title>membres</title>
        <meta charset="utf-8" />
        <link href="chat_style.css" rel="stylesheet">
    </head>
    <body>
	
		<!-- debut de la page -->
		<!-- vérification de session création de la variable $_SESSION["mail"]-->
		<?php if (isset($_SESSION["mail"])){?>
			<!--connexion à la base de données création de la variable $bdd-->
			<?php require "connexion.php"; ?>
			<!--clacul des droits création de la variable $droits-->
			<?php include "droits.php"; ?>
			<!-- menu -->
			<?php include "menu.php"; ?>
			<!-- gestion d'une action de formulaire-->
			<?php if (isset($_POST['droit'])){
				$reponse=$bdd->prepare('UPDATE my_users SET droits=:droits WHERE email=:email');
				$reponse->execute(array(
					"droits" => htmlspecialchars($_POST['droit']),
					"email" => $_POST['user']));
			} ?>
			<!-- reste de la page-->
			<div>
				<table><tr><td>pseudo</td><td>droits</td><td></td</tr>
				<?php
				//consulter la base de données pour réccupérer toute les informations des users
				$reponse=$bdd->query('SELECT * FROM my_users');
				while ($ligne = $reponse->fetch()){
					//affichage pour chaque user
					//version php
					echo '<tr><td>'.$ligne['pseudo'].'</td><td>'.$ligne['droits'].'</td>';
					if ($droits==2){ ?>
						
						<td><label>Changer les droits:</label>
						<form action="membres.php" method="POST" ">
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
		else {
			//redirection vers index.php
			header('Location: index.php');
			exit();
		}?>
    </body>
</html>
