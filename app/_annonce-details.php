<?php

$id = $_GET['id'];

//? Version préparée : Elle contient des variables donc nécessaire
$viewAnnonce = "SELECT * from annonce WHERE annonce_id = :annonce_id";
$reqViewAnnonce = $connexion->prepare($viewAnnonce);
$reqViewAnnonce->bindValue(':annonce_id', $id);
$reqViewAnnonce->execute();

if (empty($annonce)) {
    echo "Erreur";
    echo '<meta http-equiv="refresh" content="0;URL=index.php?error=noId">';
    exit();
}
?>

<!-- <section class="my-5">
    <h2 class="text-center">Annonce sélectionnée:</h2>

    <div class="card mt-5 p-3 mx-auto shadow" style="max-width: 70%;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./assets/klim-musalimov.jpg" class="img-fluid rounded" alt="...">
            </div>
            
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">T1 Bis au centre de bordeaux</h5>

                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis fugit neque unde omnis dolorem repudiandae aliquid quae pariatur rerum error qui, rem eveniet optio aliquam cupiditate asperiores ea temporibus animi quis magni adipisci. Voluptatem assumenda doloribus perferendis recusandae dolor, inventore, aperiam ut ratione similique quo commodi deserunt iusto nihil officia laborum animi? Aliquid, non velit laudantium accusamus animi eius accusantium? Sunt aperiam voluptates eos! Quas quasi placeat aliquid! Repellat distinctio excepturi laboriosam debitis quia. Blanditiis, dolor? Tempora rerum laudantium et sunt delectus, officia nisi repudiandae, numquam vel voluptatibus quos ab molestiae ipsam autem. Eos iusto perferendis architecto tempore, quae fuga!
                    </p>

                    <p class="badge bg-success text-wrap p-4">50€</p>

                    <div class="mt-5">
                        <a href="#" class="btn btn-primary p-3 fw-bold fs-3">Réserver</a>
                    </div>
                </div>
            </div>    
        </div>

        <a href="_page-annonces.php" class="btn btn-primary d-block fs-4 mt-3 w-50 mx-auto">Retour aux annonces</a>
    </div>

</section> -->