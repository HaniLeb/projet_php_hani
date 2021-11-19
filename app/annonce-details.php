<?php
require "includes/config.php";
require "includes/connect.php";
include_once "_navbar.php";

require "_view-details.php"
?>
<section class="vh-100">
    <div class="card mt-5 w-75 mx-auto rounded shadow">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?php echo $annonce['image']; ?>" class="card-img" alt="<?php echo $annonce['title']; ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body d-flex justify-content-around">
                    <section class="w-75">
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
                    </section>
                    
                    <section class="border p-2 w-25 h-25 rounded shadow">
                        <h5 class="card-title bg-dark text-light text-center rounded p-2 w-100"> <?php echo $annonce['price']; ?> €</h5>
                        <button type="submit" class="btn btn-success w-100">Réserver</button>
                        <div class="mt-2">
                            <a href="edit-annonce.php?id=<?php echo $annonce['annonce_id']; ?>" class="btn btn-warning text-center w-100">Modifier</a>
                        </div>
                        <div class="mt-2">
                            <a href="delete-annonce.php?id=<?php echo $annonce['annonce_id']; ?>" class="btn btn-danger text-center w-100">Supprimer</a>
                        </div>
                    </section>

                    <input type="hidden" name="id" value="<?php echo $annonce['annonce_id']; ?>">
                </div>
                <div class="d-flex justify-content-center">
                    <a href="page-annonces.php?id=<?php echo $annonce['annonce_id']; ?>" class="btn btn-primary mb-3 w-50">Retourner aux annonces</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "_footer.php" ?>