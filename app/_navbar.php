<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Rental</title>
    </head>

    <body>
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
                                <a class="nav-link active" aria-current="page" href="account.php">Mon compte</a>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>