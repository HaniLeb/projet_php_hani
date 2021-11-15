<?php
require "includes/config.php";
include "_head.php";

$alert = false;

if(isset($_GET["error"])){
    $alert = true;

    if($_GET['error'] == "missingInput"){
        $type = "warning";
        $message = "Le mot de passe et l'identifiant doivent être renseignés";
    }

    if($_GET['error'] == "passwordNotMatch"){
        $type = "danger";
        $message = "mot de passe ou identifiant incorrect";
    }
}
?>

<div class="card-header text-center">
    <h2 class="text-center">Connexion</h2>
</div>

<?php echo $alert ? "<div class='alert alert-{$type} mt-5 text-center w-25 mx-auto'>{$message}</div>" : ''; ?>

<section style="height: 500px;">
    <form action="sign-in-post.php" method="POST" class="w-25 mx-auto p-4 mt-5 shadow rounded" >
    
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
    
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
    
        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-primary">Connexion</button>
        </div>
    </form>
</section>

<?php include "_footer.php";?>