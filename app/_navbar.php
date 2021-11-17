<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Rental Web</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                
            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse fw-bold" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                </li>
                
                <?php
                if(!empty($_SESSION)){
               ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="page-annonces.php">Annonces</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="_account.php">Mon compte</a>
                    </li>
                    <li class="nav-item border rounded">
                        <a class="nav-link active" aria-current="page" href="?logout">Logout</a>
                    </li>
                <?php }else{?>
                    <li class="nav-item border rounded me-2">
                        <a class="nav-link active" aria-current="page" href="sign-up.php">Sign up</a>
                    </li>
                    <li class="nav-item border rounded me-2">
                        <a class="nav-link active" aria-current="page" href="sign-in.php">Sign In</a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>