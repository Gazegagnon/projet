<?php

include 'inc/fonction.php';

// RECUP DES MEMBRES
$requete = $pdo->prepare("SELECT * FROM membre");
$requete->execute();
$membres = $requete->fetchAll();


// INSERTION
if (isset($_POST['id_membre'])){

    $query = "INSERT INTO membre VALUES(NULL, :prenom, :nom, :login, :mdp, :tel, :email, :adresse, :cp, :ville, :statut, :date)";
$stmt = $pdo->prepare($query);

$stmt->execute([
"prenom" => $_POST['prenom'],
"nom" => $_POST['nom'],
"login" => $_POST['login'],
"mdp" => $_POST['mdp'],
"tel" => $_POST['tel'],
"email" => $_POST['email'],
"adresse" => $_POST['adresse'],
"cp" => $_POST['cp'],
"ville" => $_POST['ville'],
"statut" => $_POST['statut'],
"date" => $_POST['date_inscription']
]);
header("location: membre.php");
exit;

}else if(isset($_GET["action"])){
    $action = $_GET["action"];

    switch($action){
        case "update":
         $stmt = $pdo->prepare("SELECT * FROM membre WHERE id_membre = ?");
         $stmt->execute([$_GET['id_membre']]);
         $membreUp = $stmt->fetchAll();
        break;
        
        case "delete":
            $requete = $pdo->prepare("DELETE FROM membre WHERE id_membre = ?");
            $requete->execute([$_GET['id_membre']]);

            header("location: membre.php");
        exit;
    }
}



include 'inc/header.php';

include 'views/vueMembre.phtml';

include 'inc/footer.php';