<?php
try {
    $id = htmlspecialchars(trim($_GET['id']));
    
    //? Version préparée : Elle contient des variables donc nécessaire
    $viewAnnonce = "SELECT * from annonce WHERE annonce_id = :annonce_id";
    $reqViewAnnonce = $connexion->prepare($viewAnnonce);
    $reqViewAnnonce->bindValue(':annonce_id',$id);
    $reqViewAnnonce->execute();
    $annonce = $reqViewAnnonce->fetch();
} catch (PDOException $e) {
    echo "ERROR : " . $e->getMessage();
}
?>