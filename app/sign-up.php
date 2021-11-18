<?php
    include_once "_navbar.php";

    $alert = false;

    if(isset($_GET["error"])){
        $alert = true;

        if($_GET['error'] == "missingInput"){
            $type = "danger";
            $message = "Tous les champs avec une * sont requis";
        }
        if($_GET['error'] == "usernameExists"){
            $type = "warning";
            $message = "Ce nom d'utilisateur existe déja";
        }
        if($_GET['error'] == "emailExists"){
            $type = "warning";
            $message = "Cette email est déjà utilisé";
        }
        if($_GET["error"] == "differentPasswords"){
            $type = 'warning';
            $message = "Les mots de passe sont différent";
        }
    }

    if (isset($_GET['success'])) {
        $alert = true;
        $type = "success";
        $message = "Votre inscription s'est bien passée !";
    }
?>

<div class="card-header text-center">
    <h2 class="text-center">Inscription</h2>
</div>

<?php echo $alert ? "<div class='alert alert-{$type} mt-5 text-center w-50 mx-auto'>{$message}</div>" : ''; ?>

<form action="sign-up-post.php" method="POST" class="w-50 mx-auto p-4 mt-5 shadow rounded">
    

    <div class="mb-3">
        <label for="username" class="form-label">Username *</label>
        <input type="text" class="form-control" name="username">
    </div>

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
        <label for="email" class="form-label">Email *</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password *</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="mb-3">
        <label for="confirmpassword" class="form-label">Confirm Password *</label>
        <input type="password" class="form-control" name="confirmpassword">
    </div>

    <div class="d-flex justify-content-center mt-5">
        <button type="submit" class="btn btn-primary w-25">Valider</button>
    </div>
</form>

<?php include "_footer.php";?>