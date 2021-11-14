<?php
require "includes/config.php";
require "includes/connect.php";
include_once "_head.php";

include_once "_annonce-details.php";
?>

<section class="vh-100 m-5">

  <div class="card shadow" style="width: 18rem;">
    <img class="card-img-top" src="<?=$annonce['image']?>" alt="<?=$annonce['title']?>">
  
    <div class="card-body">
      <h5 class="card-title"><?=$annonce['type']?> <?=$annonce['title']?></h5>
      <p class="card-text"><?=$annonce['description']?></p>
      <div>
          <p class="card-text">
              <?=$annonce['country']?>
              <?=$annonce['town']?>
              <?=$annonce['cp']?>
          </p>
      </div>

      <p class="badge bg-success text-wrap p-4"><?=$annonce['price'] ?> €</p>
      
      <p class="card-text">Du: <?=$annonce['rentalStart']?> Au: <?=$annonce['rentalEnd']?></p>

      <div>
          <a href="_annonce-details.php" class="btn btn-primary">Voir l'annonce</a>
      </div>
    </div>
  </div>

</section>