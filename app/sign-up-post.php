<?php
require "includes/connect.php";

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// Je vérifie que tous les champs ne sont pas vides
// if(in_array('', $_POST)){
//     header('Location:sign-up.php?error=missingInput');
//     exit();
// }

if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirmpassword'])){
    header('Location:sign-up.php?error=missingInput');
    exit();
} else{

    // Si tous les champs sont remplis alors j'assigne les données reçues à des variables auquel j'applique htmlspecialchars. htmlspecialchars est une fonction qui permet de virer l'ensemble des balises HTML.

    $username = htmlspecialchars(trim($_POST['username']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $adress = htmlspecialchars(trim($_POST['adress']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars($_POST['password']);
    $confirmpassword = htmlspecialchars($_POST['confirmpassword']);
}

// Il est possible d'utiliser un select (sans count) si vous utilisez la méthode fetchColumn() ensuite. Le temps d'exécution est légèrement plus élevé.
// $verifUsername = "SELECT * FROM user WHERE username = :username";

$verifUsername = "SELECT COUNT(*) FROM user WHERE username = :username";
$reqVerifUsername = $connexion->prepare($verifUsername);
$reqVerifUsername->bindValue(':username', $username, PDO::PARAM_STR);
$reqVerifUsername->execute();

$resultatVerifUsername = $reqVerifUsername->fetchColumn();

// Je compte le nom d'utilisateur qui possède l'username souhaité
if ($resultatVerifUsername > 0) {
    header('Location:sign-up.php?error=usernameExists');
    exit();
}

$verifEmail = "SELECT COUNT(*) FROM user WHERE email = :email";
$reqVerifEmail = $connexion->prepare($verifEmail);
$reqVerifEmail->bindValue(':email', $email, PDO::PARAM_STR);
$reqVerifEmail->execute();

$resultatVerifEmail = $reqVerifEmail->fetchColumn();

// Je compte le mail de l'utilisateur qui possède l'email souhaité
if ($resultatVerifEmail > 0) {
    header('Location:sign-up.php?error=emailExists');
    exit();
}

// Je vérifie que les mots de passe correspondent
if ($password !== $confirmpassword) {
    header('Location:sign-up.php?error=differentPasswords');
    exit();
}

// Cryptage (hashage) du mot de passe
$password = password_hash($password, PASSWORD_DEFAULT);

// Requête préparée d'insertion dans la BDD
try {
    $insertUser = "INSERT INTO user (username, lastname, firstname, adress, email, password) VALUES (:username, :lastname, :firstname, :adress, :email, :password)";
    
    $reqInsertUser = $connexion->prepare($insertUser);
    
    $reqInsertUser->bindValue(':username', $username, PDO::PARAM_STR);
    $reqInsertUser->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $reqInsertUser->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $reqInsertUser->bindValue(':adress', $adress, PDO::PARAM_STR);
    $reqInsertUser->bindValue(':email', $email, PDO::PARAM_STR);
    $reqInsertUser->bindValue(':password', $password, PDO::PARAM_STR);
    
    $resultatInsertUser = $reqInsertUser->execute();
    
    if ($resultatInsertUser) {
        header('Location:sign-up.php?success=loginSuccessful');
        exit();
    }
} catch (PDOException $e) {
    echo "ERROR : " . $e->getMessage();
}

?>

