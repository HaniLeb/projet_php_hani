<?php
$auth = true;
require "includes/config.php";
require 'includes/connect.php';
include_once '_head.php';

include_once "_view-details.php";

$alert = false;

if(isset($_GET["error"])){
    $alert = true;

    if($_GET['error'] == "missingInput"){
        $type = "danger";
        $message = "Tous les champs sont requis";
    }
    if($_GET['error'] == "dateError"){
        $type = "danger";
        $message = "La date de début ne peut pas être supérieur à la date de fin de location ";
    }
    if($_GET['error'] == "unknownError"){
        $type = "warning";
        $message = "Une erreur s'est produite, réessayer ultérieurement.";
    }
    if($_GET['error'] == "tooBig"){
        $type = "warning";
        $message = "L'image est trop lourde , elle doit être < 10Mo";
    }
    if($_GET['error'] == "wrongFormat"){
        $type = "warning";
        $message = "L'image est au mauvais format : Les formats acceptés sont jpg,png,jpeg";
    }
}

if (isset($_GET['success'])) {
    $alert = true;
    if ('modifAnnonce' == $_GET['success']) {
        $type = 'success';
        $message = 'Votre annonce a bien été modifier';
    }
}
?>

<form action="edit-annonce-post.php" method="POST" class="w-50 mx-auto p-4 mt-5 shadow rounded" enctype="multipart/form-data">

    <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>

    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" class="form-control" placeholder="Studio pour jeune étudiant" name="title" value="<?php echo $annonce['title']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" class="form-control" placeholder="T3" name="type" value="<?php echo $annonce['type']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" rows="3" name="description" required><?php echo $annonce['description']; ?></textarea>
    </div>

    <div class="mb-3">
        <label for="country" class="form-label">Pays</label>
        <input type="text" class="form-control" placeholder="France" name="country" value="<?php echo $annonce['country']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="town" class="form-label">Ville</label>
        <input type="text" class="form-control" placeholder="Bordeaux" name="town" value="<?php echo $annonce['town']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="cp" class="form-label">Code Postal</label>
        <input type="number" class="form-control" placeholder="33400" name="cp" value="<?php echo $annonce['cp']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Prix</label>
        <input type="number" min="0.01" step="0.01" class="form-control" placeholder="125" name="price" value="<?php echo $annonce['price']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Images</label>
        <input class="form-control" type="file" id="formFile" accept=".png,.jpg,.jpeg" name="image" value="<?php echo $annonce['image']; ?>">
    </div>
    <div class="mb-3">
        <label for="rentalStart" class="form-label">Du</label>
        <input type="date" class="form-control" placeholder="01-01-2050" name="rentalStart" value="<?php echo $annonce['rentalStart']; ?>">
    </div>
    <div class="mb-3">
        <label for="rentalEnd" class="form-label">Au</label>
        <input type="date" class="form-control" placeholder="01-01-2050" name="rentalEnd" value="<?php echo $annonce['rentalEnd']; ?>">
    </div>

    <input type="hidden" name="id" value="<?php echo $annonce['annonce_id']; ?>">

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-outline-warning btn-lg">Modifier l'annonce</button>
    </div>
</form>

<?php include "_footer.php"?>
