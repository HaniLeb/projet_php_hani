<?php
require "includes/config.php";
require "includes/connect.php";
include_once "_navbar.php";

require "_view-details.php";
?>

<section class="vh-100">
    <div class="card mt-5 p-3 w-50 mx-auto rounded shadow">
        <h2 class="text-center mb-5">Voulez-vous supprimer cet élément ?</h2>

        <section class="d-flex justify-content-around align-items-center">
            <div class="col-md-5">
                <img src="<?php echo $annonce['image']; ?>" class="card-img" alt="<?php echo $annonce['title']; ?>">
            </div>
            <div class="col-md-5">
                <h5 class="card-title"> <?php echo $annonce['type']; ?> </h5>
                <h5 class="card-title"> <?php echo $annonce['title']; ?> </h5>
                <h6 class="card-title"> 
                    <?php echo $annonce['country']; ?> <br>
                    <?php echo $annonce['town']; ?> <br>
                    <?php echo $annonce['cp']; ?> 
                </h6>
                
                <p class="card-text">
                    Du: <?php echo $annonce['rentalStart']; ?> <br>
                    Au: <?php echo $annonce['rentalEnd']; ?> 
                </p>
                <p class="card-text"> <?php echo $annonce['description']; ?> </p>
            </div>
        </section>

        <!-- On aura besoin uniquement d'un formulaire qui contient l'id et un bouton submit -->
        <form action="delete-annonce-post.php" method="POST" class="mx-auto mt-5">
            <input type="hidden" name="id" value="<?php echo $annonce['annonce_id']; ?>">
            <button type="submit" class="btn btn-danger">Confirmer</button>
            <a href="annonce-details.php?id=<?php echo $annonce['annonce_id']; ?>" class="btn btn-success">Annuler</a>
        </form>
        <!-- Notre formulaire sera envoyé sur une page _post -->
    </div>
</section>

<?php include_once "_footer.php" ?>



