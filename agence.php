<?php

include 'inc/fonction.php';

// RECUP DES MEMBRES
$requete = $pdo->prepare("SELECT * FROM agence");
$requete->execute();
$agences = $requete->fetchAll();


// INSERTION
if (isset($_POST['id_agence'])){

    $info = pathinfo($_FILES['image']['name']);

     $extension = $info['extension'];
     $fileName = $_POST['id_agence']. '.' . $extension;

     $extensions_autorisees = ["png", "jpg", "jpeg"];

     if(in_array($extension, $extensions_autorisees )){

          move_uploaded_file($_FILES['image']['tmp_name'], "img_A/" .$fileName);
    }

    $query = "INSERT INTO agence VALUES(NULL, :nom, :tel, :email, :adresse, :cp, :ville, :img)";
$stmt = $pdo->prepare($query);

$stmt->execute([
"nom" => $_POST['nom'],
"tel" => $_POST['tel'],
"email" => $_POST['email'],
"adresse" => $_POST['adresse'],
"cp" => $_POST['cp'],
"ville" => $_POST['ville'],
"img"  => $fileName
]);
header("location: agence.php");
exit;

}else if(isset($_GET["action"])){
    $action = $_GET["action"];

    switch($action){
        case "update":
            $requete = $pdo->prepare("SELECT * FROM agence WHERE id_agence = ?");
            $requete->execute([$_GET['id_agence']]);
            $agenceUp = $requete->fetch();

            break;
            case "delete":
                $stmt = $pdo->prepare("DELETE FROM agence WHERE id_agence = ?");
                $stmt->execute([$_GET['id_agence']]);

            header("location: agence.php");
            exit;
    }
}



include 'inc/header.php';

include 'views/vueAgence.phtml';

include 'inc/footer.php';