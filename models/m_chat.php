<?php
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
?>