<?php
//? Version non préparée : Dans des requêtes sans variables on peut utiliser query() plutot que prepare() car il n'y a pas de variables à echapper.
$viewAnnonce = "SELECT * from annonce";
$reqViewAnnonce = $connexion->query($viewAnnonce);
$annonce = $reqViewAnnonce->fetchAll();
?>