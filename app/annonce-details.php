<?php
require "includes/config.php";
require "includes/connect.php";
include_once "_head.php";

include_once "_view-details.php"
?>
<section class="vh-100 my-5">
    <div class="card mb-3 w-75 mx-auto rounded shadow">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?php echo $annonce['image']; ?>" class="card-img" alt="<?php echo $annonce['title']; ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $annonce['type']; ?> </h5>
                    <h5 class="card-title"> <?php echo $annonce['title']; ?> </h5>
                    <p class="card-text"> <?php echo $annonce['description']; ?> </p>
                    <h6 class="card-title"> 
                        <?php echo $annonce['country']; ?> <br>
                        <?php echo $annonce['town']; ?> <br>
                        <?php echo $annonce['cp']; ?> 
                    </h6>
                    
                    <p class="card-text">
                        Du: <?php echo $annonce['rentalStart']; ?> <br>
                        Au: <?php echo $annonce['rentalEnd']; ?> 
                    </p>
                    <h5 class="card-title bg-dark text-light text-center w-25 rounded p-2"> <?php echo $annonce['price']; ?> €</h5>
                    <button type="submit" class="btn btn-success w-25">Réserver</button>
                    <div class="mt-2">
                        <a href="edit-annonce.php?id=<?php echo $product['product_id']; ?>" class="btn btn-warning w-25 text-center">Modifier annonce</a>
                    </div>
                </div>
                
                <a href="page-annonces.php?id=<?php echo $annonce['annonce_id']; ?>" class="btn btn-primary mb-3 w-50">Retourner aux annonces</a>
            </div>
        </div>
    </div>
</section>

<?php include_once "_footer.php" ?>