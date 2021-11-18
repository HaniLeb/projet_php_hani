<?php
require "includes/config.php";
require "includes/connect.php";
include_once "_head.php";

require "_view-annonces.php";
?>

<section class="vh-100 my-5">
    <div class="d-flex flex-wrap gap-3 justify-content-center">
        <?php
        foreach($annonces as $annonce){
        ?>
            <div class="card rounded shadow w-25">
                <img src="<?php echo $annonce['image']; ?>" class="card-img-top" style="height: 55%; object-fit: cover;" alt="<?php echo $annonce['title']; ?>">

                <div class="card-body">
                    <h5 class="card-title"> <?php echo $annonce['title']; ?> </h5>
                    <h5 class="card-title"> <?php echo $annonce['type']; ?> </h5>

                    <a href="annonce-details.php?id=<?php echo $annonce['annonce_id']; ?>" class="btn btn-primary">Voir l'annonce</a>
                </div>
            </div>
        <?php }?>
    </div>

    <?php include_once "_footer.php" ?>
</section>