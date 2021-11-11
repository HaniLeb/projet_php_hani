<?php
include "_bootstrap.php";
include "_navbar.php";
?>

<form action="_annonces.php" class="w-75 mx-auto p-5 mt-5 shadow rounded">
    <h2 class="text-center">Mon compte</h2>

    <section class="d-flex align-items-center">
        <div class="w-75">
            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" name="lastname">
            </div>
        
            <div class="mb-3">
                <label for="firstname" class="form-label">Prenom</label>
                <input type="text" class="form-control" name="firstname">
            </div>
        
            <div class="mb-3">
                <label for="adress" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adress">
            </div>
        
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
        
            <div class="d-flex justify-content-center my-4">
                <button type="submit" class="btn btn-primary w-25">Modifier</button>
            </div>
        </div>

        <div class="w-25 p-2">
            <div class="d-flex justify-content-end mb-5">
                <button type="submit" class="btn btn-primary">Publier une annonce</button>
            </div>
            <div class="d-flex justify-content-end mb-5">
                <button type="submit" class="btn btn-primary">Voir mes annonces</button>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Consulter mes réservations</button>
            </div>
        </div>
    </section>

    <a href="_annonces.php" class="btn btn-primary d-block mt-5 w-75 mx-auto">Retour aux annonces</a>
</form>

<?php
    include "_JSbootstrap.php";
?>