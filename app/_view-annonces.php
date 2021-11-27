<?php
try {
    // Version non préparée : Dans des requêtes sans variables on peut utiliser query() plutot que prepare() car il n'y a pas de variables à echapper.
    $viewAnnonces = "SELECT * from annonce";
    $reqViewAnnonces = $connexion->query($viewAnnonces);
    $annonces = $reqViewAnnonces->fetchAll();
} catch (PDOException $e) {
    echo "ERROR : " . $e->getMessage();
}
?>