<?php
$auth = true;
require "includes/config.php";
require "includes/connect.php";
include_once "_navbar.php";
include_once "_alerts.php";

require "_view-user.php";
?>

<section class="vh-100">
    <form action="edit-user-post.php" method="POST" class="w-75 mx-auto p-5 mt-5 shadow rounded">
        <h2 class="text-center">Mon compte</h2>

        <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
    
        <section class="d-flex align-items-center">
            <div class="w-75">
                <div class="mb-3">
                    <label for="username" class="form-label">User name</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $user['username']?>">
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="lastname" value="<?php echo $user['lastname']?>">
                </div>
            
                <div class="mb-3">
                    <label for="firstname" class="form-label">Prenom</label>
                    <input type="text" class="form-control" name="firstname" value="<?php echo $user['firstname']?>">
                </div>
            
                <div class="mb-3">
                    <label for="adress" class="form-label">Adresse</label>
                    <input type="text" class="form-control" name="adress" value="<?php echo $user['adress']?>">
                </div>
            
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $user['email']?>">
                </div>
            
                <div class="d-flex justify-content-center my-4">
                    <button type="submit" class="btn btn-primary w-25">Modifier</button>
                </div>
            </div>
    
            <div class="w-25 p-2">
                <div class="d-flex justify-content-end mb-5">
                    <a href="add-annonce.php" class="bg-primary p-2 text-light text-center text-decoration-none rounded">Publier une annonce</a>    
                </div>
                <div class="d-flex justify-content-end mb-5">
                    <a href="#" class="bg-primary p-2 text-light text-center text-decoration-none rounded">Voir mes annonces</a> 
                </div>
                <div class="d-flex justify-content-end">
                    <a href="#" class="bg-primary p-2 text-light text-center text-decoration-none rounded">Consulter mes réservations</a> 
                </div>
            </div>
        </section>
    
        <a href="page-annonces.php" class="btn btn-primary d-block mt-5 w-75 mx-auto">Retour aux annonces</a>
    </form>
</section>

<?php include "_footer.php";?>