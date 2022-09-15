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
			<?php if (isset($_POST['Pseudo'])){
				$reponse=$bdd->prepare('UPDATE my_users SET pseudo=:Pseudo WHERE email=:email');
				$reponse->execute(array(
					"Pseudo" => htmlspecialchars($_POST['Pseudo']),
					"email" => $_SESSION['mail']));
			}
			if (isset($_POST['URL'])){
				echo 'il y a un post url';
				$reponse=$bdd->prepare('UPDATE my_users SET url=:url WHERE email=:email');
				$reponse->execute(array(
					"url" => htmlspecialchars($_POST['URL']),
					"email" => $_SESSION['mail']));
			}					
			?>
			<!-- reste de la page-->
			
				<?php
				//consulter la base de données pour réccupérer toute les informations des users
				$reponse=$bdd->query('SELECT * FROM my_users WHERE email= "'.$_SESSION["mail"].'"');
				if ($ligne= $reponse->fetch()){
					echo '<table>';
					echo '<tr><td>'.$ligne["email"].'<td><td>'.$ligne["pseudo"].'<td><td>'.$ligne["droits"].'<td>';
					echo '</table>';
					echo'<input type="hidden" name="id" value="'.$ligne['email'].'" />'?>
					<img src="<?php echo $ligne['url']; ?>" class="img_profil"/>
					<form action="profile.php" method="post">
						<label> changer de pseudo</label><input type="text" name="Pseudo" value="<?php echo $ligne['pseudo']; ?>" />
						<input type="submit" value="Changer Pseudo"/>
					</form>
					<form action="profile.php" method="post">
						<label> url de l'image de profile</label><input type="text" name="URL" value="<?php echo $ligne['url']; ?>" />
						<input type="submit" value="Changer photo de profile"/>
					</form>
				
				<?php }
		 }?>		
	</body>
</html>
