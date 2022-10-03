<?php 
//vérification de session création de la variable $_SESSION["mail"]
if (isset($_SESSION["mail"])){
    //gestion d'une action de formulaire
    if (isset($_POST['droit'])){
        $reponse=$bdd->prepare('UPDATE my_users SET droits=:droits WHERE email=:email');
        $reponse->execute(array(
            "droits" => htmlspecialchars($_POST['droit']),
            "email" => $_POST['user']));
    }
    if(isset($_SESSION['mail'])){
        //consulter la base de données pour récupérer toute les informations des users
        $reponse=$bdd->query('SELECT * FROM my_users');
    }
}
?>