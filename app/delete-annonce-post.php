<?php
require 'includes/connect.php';

echo '<pre>';
var_dump($_POST);
echo '</pre>';

$id = intval($_POST['id']);
    
$getId = explode('=', $_SERVER['HTTP_REFERER'])[1];

if (!($getId == $_POST['id'])) {
    header("Location:delete-products.php?id=$getId&error=malformedInput");
    exit();
}

try {
    // Modif des infos dans la BDD
    $deleteAnnonce = 'DELETE FROM annonce WHERE annonce_id=:id';

    $reqDeleteAnnonce = $connexion->prepare($deleteAnnonce);
    $reqDeleteAnnonce->bindValue(':id', $id, PDO::PARAM_INT);

    $reqDeleteAnnonce->execute();
    header("Location:delete-annonce.php?success=delete");
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>