<?php
require "includes/config.php";
include "_head.php";
?>

<section style="height: 500px;">
    <form action="sign-in-post.php" method="POST" class="w-25 mx-auto p-4 mt-5 shadow rounded" >
        <h2 class="text-center">Connexion</h2>
    
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