<?php
$auth = true;
require 'includes/config.php';
include_once "_head.php";

$alert = false;

if (isset($_GET["error"])) {
    $alert = true;

    if ($_GET['error'] == "missingInput") {
        $type = "danger";
        $message = "Les champs requis sont vides";
    }
    if ($_GET['error'] == "rentalDates") {
        $type = "warning";
        $message = "La date début ne peut pas être supérieur à la date de fin de la location ! ";
    }
    if ($_GET['error'] == "unknownError") {
        $type = "warning";
        $message = "Une erreur s'est produite, réessayer ultérieurement.";
    }
    if ($_GET['error'] == "tooBig") {
        $type = "warning";
        $message = "L'image est trop lourde , elle doit être < 10Mo";
    }
    if ($_GET['error'] == "wrongFormat") {
        $type = "warning";
        $message = "L'image est au mauvais format : Les formats acceptés sont jpg,png,jpeg";
    }
}
?>

<form action="add-annonce-post.php" method="POST" enctype="multipart/form-data" class="w-50 mx-auto p-4 mt-2 shadow rounded">
    
    <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>

    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" class="form-control" name="type">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" rows="3" name="description" required></textarea>
    </div>

    <div class="mb-3">
        <label for="country" class="form-label">Pays</label>
        <input type="text" class="form-control" name="country">
    </div>

    <div class="mb-3">
        <label for="town" class="form-label">Ville</label>
        <input type="text" class="form-control" name="town">
    </div>

    <div class="mb-3">
        <label for="cp" class="form-label">Code postale</label>
        <input type="number" class="form-control" name="cp">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Prix</label>
        <input type="number" class="form-control" name="price">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Image du produit</label>
        <input class="form-control" type="file" id="formFile" accept=".png,.jpg,.jpeg" name="image">
    </div>
    
    <div class="mb-3">
        <label for="rentalStart" class="form-label">Du:</label>
        <input type="date" class="form-control" placeholder="01-01-2022" name="rentalStart">
    </div>

    <div class="mb-3">
        <label for="rentalEnd" class="form-label">Au:</label>
        <input type="date" class="form-control" placeholder="01-01-2050" name="rentalEnd">
    </div>

    <div class="mt-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-outline-success btn-lg mx-auto">Ajouter produit</button>
    </div>
</form>

<?php include_once "_footer.php"?>