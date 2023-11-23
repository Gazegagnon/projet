
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Projet Sira</title>
</head>
<body>

<header>
<?php if(isset($_SESSION['membre']['statut']) == "ADMIN" && is_string($_SESSION['membre']['statut']) && $_SESSION['membre']['statut'] == "ADMIN" ): ?>
 
   <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
       <div class="container-fluid">                    
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav">
               <?php if( $_SESSION['membre']['statut'] == "client" ): ?> 
                    <li class="nav-item">
                        <a class="nav-link" href=".">Accueil</a>
                   </li>
                <?php endif;?>

                   <li class="nav-item dropdown">
                                   <button class="nav-link dropdown-toggle border-0" data-bs-toggle="dropdown" style="color: #9B9CA0; background-color: #212429;">Services</button>
                                   <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="agence.php">Agences</a></li>
                                        <li><a class="dropdown-item" href="membre.php">Membres</a></li>
                                        <li><a class="dropdown-item" href="vehicule.php">Véhicules</a></li>

                                        
                                   </ul>
                    </li>
               <?php if ( $_SESSION['membre']['statut'] == "client" ): ?>
                              <li class="nav-item">
                               <a class="nav-link" href=".">Accueil</a>
                             </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#">Location</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#">Contact</a>
                              </li>
                </ul>
          </div>
                    <form class="d-flex" role="search">
                      <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Chercher</button>
                    </form>
               </div>
               <?php endif; ?>
               
     <?php endif; ?>

              
    </nav>
</header>




</body>
</html>
