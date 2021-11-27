<?php
$auth = true;
require "includes/config.php";
require 'includes/connect.php';

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';

if(empty($_POST['title']) || empty($_POST['type']) || empty($_POST['description']) || empty($_POST['country']) || empty($_POST['town']) || empty($_POST['cp']) || empty($_POST['price'])){
    header('Location:add-annonce.php?error=missingInput');
    exit();
}else{
    $title = htmlspecialchars(trim($_POST['title']));
    $type = htmlspecialchars(trim($_POST['type']));
    $description = htmlspecialchars(trim($_POST['description']));
    $country = htmlspecialchars(trim($_POST['country']));
    $town = htmlspecialchars(trim($_POST['town']));
    $cp = htmlspecialchars(trim($_POST['cp']));
    $price = htmlspecialchars(trim($_POST['price']));

    if(empty($_FILES['image']['name'])){
        $imagePath = 'public/uploads/noimg.png';
        $image = null;
    }else{
        $image = $_FILES['image'];
    }

    if(!empty($_POST['rentalStart'])){
        $rentalStart = htmlspecialchars(trim($_POST['rentalStart']));
    }else{
        $rentalStart = null;
    }
    if(!empty($_POST['rentalEnd'])){
        $rentalEnd = htmlspecialchars(trim($_POST['rentalEnd']));
    }else{
        $rentalEnd = null;
    }
}

// Upload d'image
if ($image) {
    if ($image['size'] > 10000000) {
        header('Location:add-annonce.php?error=imageTooBig');
        exit();
    }

    $valid_ext = ['jpg', 'jpeg', 'png'];
    $check_ext = strtolower(substr(strrchr($image['name'], '.'), 1));

    if (!in_array($check_ext, $valid_ext)) {
        header('Location:add-annonce.php?error=wrongFormat');
        exit();
    }

    $imagePath = 'public/uploads/'.uniqid().'/'.$image['name'];

    mkdir(dirname($imagePath));

    if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
        header('Location:add-annonce.php?error=unknownError');
        exit();
    }
}

// Check date
if (null !== $rentalStart && null !== $rentalEnd && $rentalStart > $rentalEnd) {
    header('Location:add-annonce.php?error=dateError');
    exit();
}
try {
    // Ajout des infos dans la BDD
    $insertAnnonce = 'INSERT INTO annonce (title, type, description, country, town, cp, price, image, rentalStart, rentalEnd) VALUES(:title, :type, :description, :country, :town, :cp, :price, :image, :rentalStart, :rentalEnd)';
    $reqInsertAnnonce = $connexion->prepare($insertAnnonce);
    $reqInsertAnnonce->bindValue(':title', $title, PDO::PARAM_STR);
    $reqInsertAnnonce->bindValue(':type', $type, PDO::PARAM_STR);
    $reqInsertAnnonce->bindValue(':description', $description, PDO::PARAM_STR);
    $reqInsertAnnonce->bindValue(':country', $country, PDO::PARAM_STR);
    $reqInsertAnnonce->bindValue(':town', $town, PDO::PARAM_STR);
    $reqInsertAnnonce->bindValue(':cp', $cp);
    $reqInsertAnnonce->bindValue(':price', $price);
    $reqInsertAnnonce->bindValue(':image', $imagePath, PDO::PARAM_STR);
    $reqInsertAnnonce->bindValue(':rentalStart', $rentalStart, PDO::PARAM_STR);
    $reqInsertAnnonce->bindValue(':rentalEnd', $rentalEnd, PDO::PARAM_STR);
    
    if ($reqInsertAnnonce->execute()) {
        header('Location:add-annonce.php?success=addedAnnonce');
        exit();
    }else{
        echo 'ok';
        header('Location:add-annonce.php?error=unknownError');
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>