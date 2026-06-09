<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

require "../db.php";
require "../functions.php";

$id = $_GET['id'] ?? 0;

$fleur = getFleurById($pdo, $id);

if(!$fleur){
    die("Fleur introuvable");
}

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nom = trim($_POST['nom']);
    $prix = trim($_POST['prix']);
    $couleur = trim($_POST['couleur']);
    $size = trim($_POST['size']);

    $imageName = $fleur['image'];

    if(!empty($_FILES['image']['name'])){

        $imageName =
        time() . "_" .
        basename($_FILES['image']['name']);

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "../uploads/" . $imageName
        );
    }

    $stmt = $pdo->prepare(
        "UPDATE fleurs
        SET nom=?,
            prix=?,
            couleur=?,
            size=?,
            image=?
        WHERE id=?"
    );

    $stmt->execute([
        $nom,
        $prix,
        $couleur,
        $size,
        $imageName,
        $id
    ]);

    header("Location: dashboard.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Modifier Fleur</title>
<link rel="stylesheet" href="../css/admin_form.css">
</head>
<body>

<h1>Modifier Fleur</h1>

<form method="POST" enctype="multipart/form-data">

<p>Nom</p>
<input
type="text"
name="nom"
value="<?= htmlspecialchars($fleur['nom']) ?>"
>

<br><br>

<p>Prix</p>
<input
type="number"
step="0.01"
name="prix"
value="<?= $fleur['prix'] ?>"
>

<br><br>

<p>Couleur</p>
<input
type="text"
name="couleur"
value="<?= htmlspecialchars($fleur['couleur']) ?>"
>

<br><br>

<p>Nombre de Roses</p>
<input
type="number"
name="size"
value="<?= $fleur['size'] ?>"
>

<br><br>

<p>Image actuelle</p>

<img
src="../uploads/<?= $fleur['image'] ?>"
width="150"
>

<br><br>

<input
type="file"
name="image"
>

<br><br>

<button type="submit">
Modifier
</button>

</form>

<br>

<a href="dashboard.php">
Retour
</a>

</body>
</html>