<?php
include 'inc/fonction.php';
include 'inc/header.php';

$stmt = $pdo->prepare("SELECT * FROM vehicule");

$stmt->execute();
$vehicules = $stmt->fetchAll();

$user = $stmt->fetch();
$_SESSION['membre'] = $user;

include 'views/acceuil.phtml';

include 'inc/footer.php';
?>