<?php
$auth = true;
require 'includes/config.php';
require 'includes/connect.php';

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';


if(empty($_POST['title']) || empty($_POST['type']) || empty($_POST['description']) || empty($_POST['country']) || empty($_POST['town']) || empty($_POST['cp']) || empty($_POST['price'])){
    header("Location:add-annonce.php?id=$getId&error=missingInput");
    exit();
}else{
    $title = htmlspecialchars(trim($_POST['title']));
    $type = htmlspecialchars(trim($_POST['type']));
    $description = htmlspecialchars(trim($_POST['description']));
    $country = htmlspecialchars(trim($_POST['country']));
    $town = htmlspecialchars(trim($_POST['town']));
    $cp = htmlspecialchars(trim($_POST['cp']));
    $price = htmlspecialchars(floatval($_POST['price']));
    $id = intval($_POST['id']);
    
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
        header("Location:add-annonce.php?id=$getId&error=imageTooBig");
        exit();
    }
    
    $valid_ext = ['jpg', 'jpeg', 'png'];
    $check_ext = strtolower(substr(strrchr($image['name'], '.'), 1));
    
    if (!in_array($check_ext, $valid_ext)) {
        header("Location:add-annonce.php?id=$getId&error=wrongFormat");
        exit();
    }
    
    $imagePath = 'public/uploads/'.uniqid().'/'.$image['name'];
    
    mkdir(dirname($imagePath));
    
    if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
        if (!in_array($check_ext, $valid_ext)) {
            header("Location:add-annonce.php?id=$getId&error=unknownError");
            exit();
        }
    }
}

// Check date
if (null !== $rentalStart && null !== $rentalEnd && $rentalStart > $rentalEnd) {
    header("Location:add-annonce.php?id=$getId&error=dateError");
    exit();
}
$getId = explode('=', $_SERVER['HTTP_REFERER'])[1];
// $altGetId = substr(strchr($_SERVER['HTTP_REFERER'], 'id'), 3);

// echo '<pre>';
// var_dump($getId);
// var_dump($altGetId);
// echo '</pre>';

if (!($getId == $_POST['id'])) {
    header("Location:edit-annonce.php?id=$getId&error=malformedInput");
    exit();
}

try {
    // Modif des infos dans la BDD
    $editAnnonce = 'UPDATE annonce SET title=:title, type=:type, description=:description, country=:country, town=:town, cp=:cp, price=:price, image=:image, rentalStart=:rentalStart, rentalEnd=:rentalEnd WHERE annonce_id=:id';

    $reqEditAnnonce = $connexion->prepare($editAnnonce);
    $reqEditAnnonce->bindValue(':title', $title, PDO::PARAM_STR);
    $reqEditAnnonce->bindValue(':type', $type, PDO::PARAM_STR);
    $reqEditAnnonce->bindValue(':description', $description, PDO::PARAM_STR);
    $reqEditAnnonce->bindValue(':country', $country, PDO::PARAM_STR);
    $reqEditAnnonce->bindValue(':town', $town, PDO::PARAM_STR);
    $reqEditAnnonce->bindValue(':cp', $cp);
    $reqEditAnnonce->bindValue(':price', $price);
    $reqEditAnnonce->bindValue(':image', $imagePath, PDO::PARAM_STR);
    $reqEditAnnonce->bindValue(':rentalStart', $rentalStart, PDO::PARAM_STR);
    $reqEditAnnonce->bindValue(':rentalEnd', $rentalEnd, PDO::PARAM_STR);
    $reqEditAnnonce->bindValue(':id', $id, PDO::PARAM_INT);

    $reqEditAnnonce->execute();
    header("Location:edit-annonce.php?id=$getId&success=modifAnnonce");
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>