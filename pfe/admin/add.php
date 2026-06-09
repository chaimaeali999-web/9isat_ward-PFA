<?php

session_start();
  
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

require "../db.php";

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nom = trim($_POST['nom']);
    $prix = trim($_POST['prix']);
    $size = trim($_POST['size']);
    $couleur = trim($_POST['couleur']);

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

        if(!is_dir("../uploads")){
            mkdir("../uploads");
        }

        $imageName =
        time() . "_" .
        basename($_FILES['image']['name']);

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "../uploads/" . $imageName
        );

        $sql = "
        INSERT INTO fleurs
        (nom,prix,size,couleur,image)
        VALUES(?,?,?,?,?)
        ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $nom,
            $prix,
            $size,
            $couleur,
            $imageName
        ]);

        header("Location: dashboard.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ajouter Fleur</title>
<link rel="stylesheet" href="../css/admin_form.css">
</head>
<body>

<h1>Ajouter Fleur</h1>

<?php foreach($errors as $error): ?>

<p style="color:red;">
<?= $error ?>
</p>

<?php endforeach; ?>

<form method="POST" enctype="multipart/form-data">

<p>Nom</p>
<input type="text" name="nom">

<br><br>

<p>Prix</p>
<input type="number" step="0.01" name="prix">

<br><br>

<p>Couleur</p>
<input type="text" name="couleur">

<br><br>

<p>Nombre de Roses</p>
<input type="number" name="size">

<br><br>

<p>Image</p>
<input type="file" name="image">

<br><br>

<button type="submit">
Ajouter
</button>

</form>

<br>

<a href="dashboard.php">
Retour
</a>

</body>
</html>