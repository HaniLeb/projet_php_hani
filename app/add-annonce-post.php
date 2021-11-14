<?php
$auth = true;

require 'includes/config.php';
require 'includes/connect.php';

echo '<pre>';
var_dump($_POST);
echo '</pre>';

echo '<pre>';
var_dump($_FILES);
echo'</pre>';

// Vérification de la validité du formulaire
if (in_array('', $_POST)) {
    header('Location:add-annonce.php?error=missingInput');
    exit();
}else{
    // Si valide, initialisation des variables avec assainissement via trim et htmlspecialchars. On utilise floatval sur le prix, pour s'assurer d'avoir un prix décimal.

    $title = htmlspecialchars(trim($_POST['title']));
    $type = htmlspecialchars(trim($_POST['type']));
    $description = htmlspecialchars(trim($_POST['description']));
    $country = htmlspecialchars(trim($_POST['country']));
    $town = htmlspecialchars(trim($_POST['town']));
    $cp = htmlspecialchars(trim($_POST['cp']));
    $price = htmlspecialchars(floatval($_POST['price']));
    $rentalStart = htmlspecialchars(trim($_POST['rentalStart']));
    $rentalEnd = htmlspecialchars(trim($_POST['rentalEnd']));

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

    $image = $_FILES['image'] ?? 'public/uploads/noimg.png';
}

if($rentalStart !== null && $rentalStart > $rentalEnd){
    header('Location:add-annonce.php?error=rentalDates');
    exit();
}

if($image){
    if($image['size'] > 10000000){
        header('Location:add-annonce.php?error=imageTooBig');
        exit();
    }

    $valid_ext = ['jpg','jpeg','png'];
    $check_ext = strtolower(substr(strrchr($image['title'], '.'),1));

    if(!in_array($check_ext,$valid_ext)){
        header('Location:add-annonce.php?error=wrongFormat');
        exit();
    }

    $imagePath = 'public/uploads/'.uniqid().'/'.$image['title'];

    mkdir(dirname($imagePath));

    if(!move_uploaded_file($image['tmp_name'],$imagePath)){
        if(!in_array($check_ext,$valid_ext)){
            header('Location:add-annonce.php?error=unknownError');
            exit();
        }
    }
}

$insertAnnonce = "INSERT INTO annonce (title, type, description, country, town, cp, price, image, rentalStart, rentalEnd) VALUES(:title, :type, :description, :country, :town, :cp, :price, :image, :rentalStart, :rentalEnd)";
$reqInsertAnnonce = $connexion->prepare($insertAnnonce);
$reqInsertAnnonce->bindValue(':title',$title,PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':type',$type,PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':description',$description,PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':country',$country);
$reqInsertAnnonce->bindValue(':town',$town);
$reqInsertAnnonce->bindValue(':cp',$cp);
$reqInsertAnnonce->bindValue(':price',$price);
$reqInsertAnnonce->bindValue(':image',$imagePath,PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':rentalStart',$rentalStart,PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':rentalEnd',$rentalEnd,PDO::PARAM_STR);

if($reqInsertAnnonce->execute()){
    header('Location:index.php?success=addedAnnonce');
    exit();
}else{
    header('Location:add-annonce.php?error=unknownError');
    exit();
}
?>