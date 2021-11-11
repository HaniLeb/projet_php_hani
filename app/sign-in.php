<?php
    include "_bootstrap.php";
    include "_navbar.php";
?>

<form action="_annonces.php" class="w-50 mx-auto p-4 mt-5 shadow rounded">
    <h2 class="text-center">Connexion</h2>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="d-flex justify-content-center mt-5">
        <button type="submit" class="btn btn-primary">Connexion</button>
    </div>
</form>

<?php
    include "_JSbootstrap.php";
?>