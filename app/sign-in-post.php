<?php
require "includes/config.php";
require "includes/connect.php";

echo '<pre>';
print_r($_POST);
echo '</pre>';

// Je vérifie que les champs en question du formulaire sont rempli
if(in_array('', $_POST)){
header('Location:sign-up.php?error=missingInput');
exit();
} else{
    // S'ils sont rempli, j'initialise les variables en les assainissant
    $username = htmlspecialchars(trim($_POST['username']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $adress = htmlspecialchars(trim($_POST['adress']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars($_POST['password']);
    $confirmpassword = htmlspecialchars($_POST['confirmpassword']);
}

try {
    // Requête préparée de récupération de l'utilisateur
    // Dans le cas d'un champ unique qui serait utilisable avec l'username ou l'email on écrirait la requête de cette façon.
    // $verifUsername = "SELECT * FROM user WHERE username = :username OR email = :email";

    $verifUsername = "SELECT * FROM user WHERE username = :username LIMIT 1";
    $reqVerifUsername = $connexion->prepare($verifUsername);
    $reqVerifUsername->bindValue(':username', $username, PDO::PARAM_STR);
    $reqVerifUsername->execute();

    $user = $reqVerifUsername->fetch();

} catch (PDOException $e) {
    $connexion = null;
    echo "Erreur : " . $e->getMessage();
}

if ($user) {
    echo '<pre>';
    print_r($user);
    echo '</pre>';

    if (!password_verify($password, $user['password'])) {
        header('Location:sign-in.php?error=passwordNotMatch');
        exit();
    } else{
        $_SESSION['user'] = $user["username"];
        header('Location:index.php');
    }
}

?>