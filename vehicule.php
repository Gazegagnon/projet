<?php
include 'inc/fonction.php';

$requete = $pdo->prepare("SELECT * FROM vehicule");
$requete->execute();
$vehicules = $requete->fetchAll();

$stmt = $pdo->prepare("SELECT nom FROM agence");
$stmt->execute();
$agences = $stmt->fetchAll();


// INSERTION
if (isset($_POST['id_vehicule'])){

    $info = pathinfo($_FILES['image']['name']);

     $extension = $info['extension'];
     $fileName = $_POST['id_vehicule']. '.' . $extension;

     $extensions_autorisees = ["png", "jpg", "jpeg"];

     if(in_array($extension, $extensions_autorisees )){

         move_uploaded_file($_FILES['image']['tmp_name'], "img_V/" .$fileName);
    }

    $query = "INSERT INTO vehicule VALUES(NULL, :marque, :modele, :prix, :description, :agence, :img)";
$requete = $pdo->prepare($query);

$requete->execute([
    "marque" => $_POST['marque'],
    "modele" => $_POST['modele'],
    "prix" => $_POST['prix_journalier'],
    "description" => $_POST['description'],
    "agence" => $_POST['agence'],
    "img"  => $fileName
]);
header("location: vehicule.php");
exit;

}else if(isset($_GET["action"])){
    $action = $_GET["action"];

    switch($action){
        case "update":
            $requete = $pdo->prepare("SELECT * FROM vehicule WHERE id_vehicule = ?");
            $requete->execute([$_GET['id_vehicule']]);
            $vehiculeUp = $requete->fetch();

            break;
            case "delete":
                $stmt = $pdo->prepare("DELETE FROM vehicule WHERE id_vehicule = ?");
                $stmt->execute([$_GET['id_vehicule']]);

            header("location: vehicule.php");
            exit;
    }
}




include 'inc/header.php';

include 'views/vueVehicule.phtml';
include 'inc/footer.php';
