<?php
$id = htmlspecialchars(trim($_GET['id']));

try {
    //? Version préparée : Elle contient des variables donc nécessaire
    $viewUser = "SELECT * from user WHERE id=:id";
    $reqViewUser = $connexion->prepare($viewUser);
    $reqViewUser->bindValue(':id',$id);
    $reqViewUser->execute();
    $user = $reqViewUser->fetch();
    
} catch (PDOException $e) {
    echo 'ERROR :' . $e->getMessage();
}
?>