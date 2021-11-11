<?php
    include "_bootstrap.php";
    include "_navbar.php";
?>

<form action="sign-in.php" class="w-75 mx-auto p-4 mt-5 shadow rounded">
    
    <h2 class="text-center">Inscription</h2>

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

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="mb-3">
        <label for="confirmpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="confirmpassword">
    </div>

    <div class="d-flex justify-content-center mt-5">
        <button type="submit" class="btn btn-primary w-25">Valider</button>
    </div>
</form>

<?php
    include "_JSbootstrap.php";
?>