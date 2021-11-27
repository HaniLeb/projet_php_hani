<?php
    $alert = false;

    if(isset($_GET["error"])){
        $alert = true;

        if($_GET['error'] == "missingInput"){
            $type = "danger";
            $message = "Tous les champs avec une * sont requis";
        }    
        if($_GET['error'] == "passwordNotMatch"){
        $type = "danger";
        $message = "mot de passe ou identifiant incorrect";
        }
        if($_GET['error'] == "usernameExists"){
            $type = "warning";
            $message = "Ce nom d'utilisateur existe déja";
        }
        if($_GET['error'] == "emailExists"){
            $type = "warning";
            $message = "Cette email est déjà utilisé";
        }
        if($_GET["error"] == "differentPasswords"){
            $type = 'warning';
            $message = "Les mots de passe sont différent";
        }
        if($_GET['error'] == "dateError"){
            $type = "danger";
            $message = "La date de début ne peut pas être supérieur à la date de fin de location";
        }
        if($_GET['error'] == "malformedInput"){
            $type = "danger";
            $message = "Erreur id";
        }
        if($_GET['error'] == "unknownError"){
            $type = "warning";
            $message = "Une erreur s'est produite, réessayer ultérieurement.";
        }
        if($_GET['error'] == "tooBig"){
            $type = "warning";
            $message = "L'image est trop lourde , elle doit être < 10Mo";
        }
        if($_GET['error'] == "wrongFormat"){
            $type = "warning";
            $message = "L'image est au mauvais format : Les formats acceptés sont jpg,png,jpeg";
        }
    }

    if (isset($_GET['success'])) {
        $alert = true;
        if ('loginSuccessful' == $_GET['success']) {
            $type = "success";
            $message = "Votre inscription s'est bien passée !";
        }
        if ('modifAnnonce' == $_GET['success']) {
            $type = 'success';
            $message = 'Votre annonce a bien été modifier';
        }
        if ('delete' == $_GET['success']) {
            $type = 'success';
            $message = 'Votre annonce a bien été supprimer';
        }
        if ('addedAnnonce' == $_GET['success']) {
            $type = 'success';
            $message = 'Votre annonce a bien été ajouté';
        }
        if ('modifUser' == $_GET['success']) {
            $type = 'success';
            $message = 'Vos infos ont bien été modifier';
        }
    }
?>