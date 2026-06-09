<?php

require "db.php";
require "functions.php";

$search = $_GET['search'] ?? '';
$couleur = $_GET['couleur'] ?? '';
$size = $_GET['size'] ?? '';

$sql = "SELECT * FROM fleurs WHERE 1=1";

$params = [];

if(!empty($search)){
    $sql .= " AND nom LIKE ?";
    $params[] = "%$search%";
}

if(!empty($couleur)){
    $sql .= " AND couleur LIKE ?";
    $params[] = "%$couleur%";
}

if(!empty($size)){
    $sql .= " AND size = ?";
    $params[] = $size;
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$fleurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title> Qisat_Ward </title>

<link rel="stylesheet" href="css/index.css">

</head>

<body>
<?php 
    require_once "includes/header.php";
?>
<h1> Qisat_Ward </h1>


<form method="GET" class="search-box">

    <input
        type="text"
        name="search"
        placeholder="Nom..."
        value="<?= htmlspecialchars($search) ?>"
    >

    <input
        type="text"
        name="couleur"
        placeholder="Couleur..."
        value="<?= htmlspecialchars($couleur) ?>"
    >

    <input
        type="number"
        name="size"
        placeholder="Nombre de roses"
        value="<?= htmlspecialchars($size) ?>"
    >

    <button type="submit">
        Rechercher
    </button>

</form>

<div class="container">

<?php foreach($fleurs as $fleur): ?>

<div class="card">

<img
src="uploads/<?= htmlspecialchars($fleur['image']) ?>"
alt=""
>

<h2>
<?= htmlspecialchars($fleur['nom']) ?>
</h2>

<p>
Prix :
<?= $fleur['prix'] ?>
DH
</p>

<p>
Couleur :
<?= htmlspecialchars($fleur['couleur']) ?>
</p>

<p>
<?= $fleur['size'] ?>
 Roses
</p>

<a
class="whatsapp"
target="_blank"
href="https://wa.me/212645048485?text=Bonjour, je suis intéressé(e) par <?= urlencode($fleur['nom']) ?>"
>
WhatsApp
</a>

</div>

<?php endforeach; ?>

</div>
<?php
  require "includes/footer.php";
?>
</body>

</html>