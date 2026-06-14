<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

require "../db.php";
require "../functions.php";

$fleurs = getAllFleurs($pdo);

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<style>

table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

img{
    width:80px;
    height:80px;
    object-fit:cover;
}

.add{
    background:green;
    color:white;
    padding:10px;
    text-decoration:none;
}

</style>
<link rel="stylesheet" href="../css/admin_dashboard.css">
</head>

<body>
<?php 
    require_once "../includes/header.php";
?>
<h1>Espace Administrateur</h1>

<p>
    Bienvenue :
<?= $_SESSION['admin'] ?>
</p>

<a class="add" href="add.php">
    Ajouter un Bouquet
</a>

<br><br>

<table>

<tr>

<th>Image</th>
<th>Nom</th>
<th>Prix</th>
<th>Couleur</th>
<th>Size</th>
<th>Actions</th>

</tr>

<?php foreach($fleurs as $fleur): ?>

<tr>

<td>

<img
    src="../uploads/<?= $fleur['image'] ?>"
>

</td>

<td>
   <?= $fleur['nom'] ?>
</td>

<td>
    <?= $fleur['prix'] ?> DH
</td>

<td>
    <?= $fleur['couleur'] ?>
</td>

<td>
    <?= $fleur['size'] ?>
</td>

<td>

<a href="edit.php?id=<?= $fleur['id'] ?>">
   Modifier
</a>



<a
href="delete.php?id=<?= $fleur['id'] ?>"
onclick="return confirm('Voulez-vous supprimer cette fleur ?')"
>
  Supprimer
</a>

</td>

</tr>

<?php endforeach; ?>

</table>

<br>

<a href="logout.php">Déconnexion</a>

</body>
</html>