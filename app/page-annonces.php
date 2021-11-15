<?php
require "includes/config.php";
require "includes/connect.php";
include_once "_head.php";

if($user){
    include "_view-annonces.php";
?>

    <section class="vh-100 my-5">
        <div class="row">
            <?php
            foreach($annonces as $annonce){
            ?>
                <div class="card rounded shadow" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $annonce['title']; ?> </h5>
                        <p class="card-text"> <?php echo $annonce['description']; ?> </p>
                        <a href="#" class="btn btn-primary">Voir l'annonce</a>
                    </div>
                </div>
            <?php }?>
        </div>
    </section>

<?php }?>

<?php include_once "_footer.php" ?>