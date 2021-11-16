<?php
require "includes/config.php";
require "includes/connect.php";
include_once "_head.php";

include_once "_view-details.php"
?>
<section class="vh-100 my-5">
    <div class="card rounded shadow w-75 mx-auto p-3">

        <img src="<?php echo $annonce['image']; ?>" class="card-img-top" alt="<?php echo $annonce['title']; ?>">
        
        <div class="card-body">
            <h5 class="card-title"> <?php echo $annonce['title']; ?> </h5>
            <h5 class="card-title"> <?php echo $annonce['type']; ?> </h5>
            <p class="card-text"> <?php echo $annonce['description']; ?> </p>
            <h6 class="card-title"> 
                <?php echo $annonce['country']; ?> <br>
                <?php echo $annonce['town']; ?> <br>
                <?php echo $annonce['cp']; ?> 
            </h6>
            <!-- <h5 class="card-title bg"> <?php echo $annonce['price']; ?> </h5> -->
            <p class="card-title">
                Du: <?php echo $annonce['rentalStart']; ?> <br>
                Au: <?php echo $annonce['rentalEnd']; ?> 
            </p>
            <!-- <a href="annonce-details.php" class="btn btn-primary">Voir l'annonce</a> -->
        </div>
    </div>
</section>

<?php include_once "_footer.php" ?>