<?php
    // connexion à la base de donnée
    require_once(PATH_MODELS."connexion.php");
    //verification de l'existance de l'utilisateur et connexion a son compte
    require_once(PATH_MODELS."identification.php");
    if(isset($inconnu)and$inconnu){
       require_once(PATH_VIEWS."identification.php");
    }
    else{ 
        //importation des droits
	    require_once(PATH_MODELS."droits.php");
        //élaboration du chat
        require_once(PATH_MODELS."chat.php");
        require_once(PATH_VIEWS.'chat.php'); 
    }
    
    
   
?>