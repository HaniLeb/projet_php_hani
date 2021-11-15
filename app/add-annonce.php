<?php
require "includes/config.php";
include_once '_head.php';
?>

<form action="#" method="POST" class="w-50 mx-auto p-4 mt-5 shadow rounded" enctype="multipart/form-data">

    <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
    
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" class="form-control" placeholder="Beau studio" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" rows="3" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prix</label>
        <input type="number" min="0.01" step="0.01" class="form-control" placeholder="125" name="price" required>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Images</label>
        <input class="form-control" type="file" id="formFile" accept=".png,.jpg,.jpeg" name="image">
    </div>
    <div class="mb-3">
        <label for="rentalStart" class="form-label">Du</label>
        <input type="date" class="form-control" placeholder="01-01-2050" name="rentalStart">
    </div>
    <div class="mb-3">
        <label for="rentalEnd" class="form-label">Au</label>
        <input type="date" class="form-control" placeholder="01-01-2050" name="rentalEnd">
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-outline-success btn-lg">Poster l'annonce</button>
    </div>
</form>

<?php include "_footer.php"?>
