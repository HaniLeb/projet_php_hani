<?php
//? Version préparée : Elle contient des variables donc nécessaire
$viewAnnonce = "SELECT * from annonce WHERE annonce_id = :annonce_id";
$reqViewAnnonce = $connexion->prepare($viewAnnonce);
$reqViewAnnonce->bindValue(':annonce_id',$id);
$reqViewAnnonce->execute();
$annonce = $reqViewAnnonce->fetch();

if(empty($annonce)){
    echo "Erreur";
    echo '<meta http-equiv="refresh" content="0;URL=page-annonces.php?error=noId">';
    exit();
}
?>