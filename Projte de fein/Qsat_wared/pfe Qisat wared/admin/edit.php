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
<title>Modifier Fleur - Qisat_Ward</title>
<link rel="stylesheet" href="../css/admin_form.css">
</head>
<body>

<?php require "../includes/header.php"; ?>

<div class="form-container">
    <h1>Modifier la Fleur</h1>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nom de la fleur</label>
            <input type="text" name="nom" value="<?= htmlspecialchars($fleur['nom']) ?>">
        </div>

        <div class="form-group">
            <label>Prix (DH)</label>
            <input type="number" step="0.01" name="prix" value="<?= $fleur['prix'] ?>">
        </div>

        <div class="form-group">
            <label>Couleur</label>
            <input type="text" name="couleur" value="<?= htmlspecialchars($fleur['couleur']) ?>">
        </div>

        <div class="form-group">
            <label>Nombre de Roses</label>
            <input type="number" name="size" value="<?= $fleur['size'] ?>">
        </div>

        <div class="form-group">
            <label>Image actuelle</label>
            <img src="../uploads/<?= $fleur['image'] ?>" width="150" class="current-image">
            <p style="font-size: 12px; color: #666; margin-top: 5px;">Laissez vide pour conserver l'image actuelle</p>
            <input type="file" name="image">
        </div>

        <button type="submit">Mettre à jour la fleur</button>
    </form>

    <a href="dashboard.php" class="back-link">← Retour au tableau de bord</a>
</div>

<?php require "../includes/footer.php"; ?>

</body>
</html>