<?php

include "inc/fonction.php";


if( !empty($_POST['login']) ) {
     $query = "SELECT * FROM membre WHERE login = ?";

     $stmt = $pdo->prepare($query);
     $stmt->execute([$_POST['login']]);

    
     if( $stmt->rowCount() != 0 ){
          $user = $stmt->fetch();
        
        
          if( password_verify($_POST['mdp'], $user['mdp']) ){
             
               $_SESSION['membre'] = $user;
                var_dump($_SESSION['membre'] );
               header("location: .");
               exit;
          }
          
     }

}elseif( isset($_GET['action'])  AND $_GET['action'] == "logout" ){
     session_destroy();
     header("location: .");
     exit;
}

include 'inc/header.php';

include 'views/vueConnexion.phtml';

include 'inc/footer.php';