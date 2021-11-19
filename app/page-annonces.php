<?php
require "includes/config.php";
require "includes/connect.php";
include_once "_navbar.php";

require "_view-annonces.php";
require "_search.php";
?>

<form class="form w-25 mx-auto mt-3" action="" method="get">
    <div class="d-flex align-items-center">
        <input class="form-control me-2" type="text" placeholder="Search" id="search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </div>

    <?php 
    if(!empty($search)){
        echo "<h3>Résultats de la recherche : $search</h3>";
        if (empty($annonces)) {
            echo 'Aucun résultat trouvé !';
        }    
        echo "<a href='page-annonces.php'>Retourner aux annonces</a>";
    }
    ?>
</form>
<section class="mt-5">

    <div class="d-flex flex-wrap gap-3 justify-content-center">
        <?php
        foreach($annonces as $annonce){
        ?>
            <div class="card rounded shadow" style="width: 20rem;">
                <img src="<?php echo $annonce['image']; ?>" class="card-img-top" style="object-fit: cover; height: 15rem;" alt="<?php echo $annonce['name']; ?>" >
                <div class="card-body bg-light">
                    <h5 class="card-title"><?php echo $annonce['title']; ?></h5>
                    <h5 class="card-title"> <?php echo $annonce['type']; ?> </h5>

                    <a href="annonce-details.php?id=<?php echo $annonce['annonce_id']; ?>" class="btn btn-success">Voir l'annonce</a>
                </div>
            </div>
        <?php }?>
    </div>

</section>
<?php include_once "_footer.php" ?>