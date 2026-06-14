<?php

require "db.php";

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nom = trim($_POST['nom'] ?? '');
    $prix = trim($_POST['prix'] ?? '');
    $size = trim($_POST['size'] ?? '');
    $couleur = trim($_POST['couleur'] ?? '');

    if(empty($nom)){
        $errors[] = "Nom obligatoire";
    }

    if(empty($prix)){
        $errors[] = "Prix obligatoire";
    }

    if(empty($size)){
        $errors[] = "Size obligatoire";
    }

    if(empty($couleur)){
        $errors[] = "Couleur obligatoire";
    }

    if(empty($_FILES['image']['name'])){
        $errors[] = "Image obligatoire";
    }

    if(empty($errors)){

        $imageName = time() . "_" . $_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "uploads/" . $imageName
        );

        $sql = "INSERT INTO fleurs
        (nom,prix,size,couleur,image)
        VALUES(?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $nom,
            $prix,
            $size,
            $couleur,
            $imageName
        ]);

        header("Location: index.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Ajouter Fleur</title>

<link rel="stylesheet" href="css/add.css">

</head>

<body>

<div class="form-container">

<h1>Ajouter Fleur</h1>

<?php if(!empty($errors)): ?>

<div class="error">

<?php foreach($errors as $error): ?>

<p><?= $error ?></p>

<?php endforeach; ?>

</div>

<?php endif; ?>

<form method="POST" enctype="multipart/form-data">

<input
type="text"
name="nom"
placeholder="Nom du bouquet"
>

<input
type="number"
name="prix"
placeholder="Prix"
>

<input
type="number"
name="size"
placeholder="Nombre de roses"
>

<input
type="text"
name="couleur"
placeholder="Couleur"
>

<input
type="file"
name="image"
>

<button type="submit">
Ajouter
</button>

</form>

<a href="index.php">
Retour
</a>

</div>

</body>
</html>