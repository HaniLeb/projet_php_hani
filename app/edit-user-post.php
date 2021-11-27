<?php
$auth = true;
require 'includes/config.php';
require 'includes/connect.php';
require "_view-user.php";

echo '<pre>';
var_dump($_POST);
echo '</pre>';


if(in_array('', $_POST)){
    header("Location:account.php?error=missingInput");
    exit();
}else{
    $username = htmlspecialchars(trim($_POST['username']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $adress = htmlspecialchars(trim($_POST['adress']));
    $email = htmlspecialchars(trim($_POST['email']));
}

if ($user['email'] != $email || $user['username'] != $username) {
    $verifConnexion = "SELECT count(*) FROM user WHERE email = :email OR username = :username";
    $reqVerif = $connexion->prepare($verifConnexion);
    $reqVerif->bindValue(':email', $email, PDO::PARAM_STR);
    $reqVerif->bindValue(':username', $username, PDO::PARAM_STR);
    $reqVerif->execute();
    
    $resultatVerif = $reqVerif->fetchColumn();
    
    if ($resultatVerif > 0) {
        header('Location:account.php?error=emailExists');
        exit();
    }
}

$id = $_SESSION['id'];

try {
    // Modif des infos dans la BDD
    $editUser = 'UPDATE user SET username=:username, lastname=:lastname, firstname=:firstname, adress=:adress, email=:email WHERE id=:id';

    $reqEditUser = $connexion->prepare($editUser);
    $reqEditUser->bindValue(':username', $username, PDO::PARAM_STR);
    $reqEditUser->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $reqEditUser->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $reqEditUser->bindValue(':adress', $adress, PDO::PARAM_STR);
    $reqEditUser->bindValue(':email', $email, PDO::PARAM_STR);
    $reqEditUser->bindValue(':id', $id);

    $reqEditUser->execute();
    header("Location:account.php?success=modifUser");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>