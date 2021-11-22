<?php
require "includes/config.php";
require "includes/connect.php";
include_once "_navbar.php";
include_once "_header.php";
?>

<main class="my-5 py-5">
    <?php
    if (empty($_SESSION)) {
    ?>
    <div class="d-grid gap-2 w-50 mx-auto">
        <a class="bg-primary p-2 fs-1 text-light text-center text-decoration-none" href="sign-up.php">Inscrivez-vous pour consulter les annonces</a>
    </div>
    <?php }else{?>
    <div class="d-grid gap-2 w-50 mx-auto">
        <span class="bg-success p-2 fs-1 text-light text-center">Vous pouvez consulter toutes les annonces !</span>
    </div>
    <?php }?>
    
</main>

<?php include_once "_footer.php";?>