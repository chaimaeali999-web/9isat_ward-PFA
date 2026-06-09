<?php

require "../db.php";

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare(
    "SELECT * FROM fleurs WHERE id=?"
);

$stmt->execute([$id]);

$fleur = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$fleur){
    die("Produit introuvable");
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>
<?= htmlspecialchars($fleur['nom']) ?>
</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="details-container">

<div class="details-image">

<img
src="../uploads/<?= htmlspecialchars($fleur['image']) ?>"
alt=""
>

</div>

<div class="details-info">

<h1>
<?= htmlspecialchars($fleur['nom']) ?>
</h1>

<h2>
<?= $fleur['prix'] ?> DH
</h2>

<p>
<strong>Couleur :</strong>
<?= htmlspecialchars($fleur['couleur']) ?>
</p>

<p>
<strong>Nombre de roses :</strong>
<?= $fleur['size'] ?>
</p>

<a
class="whatsapp"
target="_blank"
href="https://wa.me/212XXXXXXXXX?text=Bonjour, je souhaite commander :

Nom : <?= urlencode($fleur['nom']) ?>

Prix : <?= urlencode($fleur['prix']) ?> DH

Couleur : <?= urlencode($fleur['couleur']) ?>

Nombre de roses : <?= urlencode($fleur['size']) ?>
"
>
Commander sur WhatsApp
</a>

<br><br>

<a href="index.php">
← Retour
</a>

</div>

</div>

</body>
</html>