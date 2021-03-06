<?php
$auth = true;
require "includes/config.php";
include_once "_navbar.php";
include_once "_alerts.php";
?>

<section class="vh-100">
    <form action="add-annonce-post.php" method="POST" class="w-50 mx-auto p-4 mt-5 shadow rounded" enctype="multipart/form-data">
    
        <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
        
        <section class="d-flex">
            <div class="mb-3 w-50 me-2">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" placeholder="Studio pour jeune étudiant" name="title" required>
            </div>
            <div class="mb-3 w-50">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" placeholder="T3" name="type" required>
            </div>
        </section>
    
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" rows="3" name="description" maxlength="1500" required></textarea>
        </div>
    
        <section class="d-flex">
            <div class="mb-3 w-50 me-2">
                <label for="country" class="form-label">Pays</label>
                <input type="text" class="form-control" placeholder="France" name="country" required>
            </div>
            <div class="mb-3 w-5 me-2">
                <label for="town" class="form-label">Ville</label>
                <input type="text" class="form-control" placeholder="Bordeaux" name="town" required>
            </div>
            <div class="mb-3 w-50">
                <label for="cp" class="form-label">Code Postal</label>
                <input type="number" class="form-control" placeholder="33400" name="cp" required>
            </div>
        </section>
    
        <section class="d-flex">
            <div class="mb-3 w-50 me-2">
                <label for="price" class="form-label">Prix</label>
                <input type="number" class="form-control" placeholder="125" name="price" required>
            </div>
            <div class="mb-3 w-50">
                <label for="formFile" class="form-label">Images</label>
                <input class="form-control" type="file" id="formFile" accept=".png,.jpg,.jpeg" name="image">
            </div>
        </section>
        
        <div class="mb-3 d-flex justify-content-between">
            <div class="w-50 me-2">
                <label for="rentalStart" class="form-label">Du: </label>
                <input type="date" class="form-control" placeholder="01-01-2050" name="rentalStart">
            </div>
    
            <div class="w-50">
                <label for="rentalEnd" class="form-label">Au: </label>
                <input type="date" class="form-control" placeholder="01-01-2050" name="rentalEnd">
            </div>
        </div>
    
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success btn-lg">Poster l'annonce</button>
        </div>
    </form>
</section>

<?php include "_footer.php"?>
