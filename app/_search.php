<?php
require "includes/connect.php";

try {
    $search = null;

    $annonces = $connexion->query('SELECT * FROM rentalweb.annonce')->fetchAll();

    if (isset($_GET['search'])) {
        $search = htmlspecialchars(trim($_GET['search']));
        $sql = 'SELECT * FROM rentalweb.annonce WHERE title LIKE :search OR type LIKE :search OR country LIKE :search OR town LIKE :search OR cp LIKE :search';
        $reqLines = $connexion->prepare($sql);
        $reqLines->bindValue(':search', "%$search%");
        $reqLines->execute();
        $annonces = $reqLines->fetchAll();
    }
} catch (PDOException $e) {
    echo "ERROR : " . $e->getMessage();
}
?>