<?php
require "includes/config.php";
require "includes/connect.php";
include_once "_head.php";
include_once "_header.php";
$alert = false;

if (isset($_GET['success'])) {
    $alert = true;
    if ($_GET['success'] == "addedAnnonce") {
        $type = "success";
        $message = "votre produit a bien été ajouté";
    }
}

if($connexion){
include "_page-annonces.php";
}
?>

<main class="my-5">
    <div class="d-grid gap-2 w-50 mx-auto">
        <a class="bg-primary p-2 fs-1 text-light text-center text-decoration-none" href="sign-up.php">Inscrivez-vous pour consulter les annonces</a>
    </div>
</main>

<?php include_once "_footer.php";?>