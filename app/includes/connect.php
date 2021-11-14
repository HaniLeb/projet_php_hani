<?php
require "dev.env.php";

//? Méthode chaine complète (ne surtout pas push sur GitHub avec des variables de prod)
// $connexion_string = "mysql:dbname=nomDeLaBDD;host=nomDuServeur";
$connexion_string = "mysql:dbname=" . DATABASE . ";host=" . SERVER;

try{
    // PDO = PHP DATA OBJECT - Permet d'accéder à une base de données depuis php
    $connexion = new PDO($connexion_string, USER, PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch(PDOException $e){
    $connexion = null;
    echo 'ERREUR : ' . $e->getMessage();
}

?>