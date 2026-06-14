<?php

session_start();
  
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

// يمكنك إبقاء الـ var_dump للتأكد ثم حذفه لاحقاً
// var_dump($_SESSION['admin']);

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

        $imageName = time() . "_" . basename($_FILES['image']['name']);

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "../uploads/" . $imageName
        );

        // تعديل السطر هنا: حذفت admin_id لتفادي الـ Fatal Error
        // إذا قمت بإضافته لاحقاً في قاعدة البيانات يمكنك إرجاعه
        $sql = "
            INSERT INTO fleurs 
            (nom, prix, size, couleur, image) 
            VALUES (:nom, :prix, :size, :couleur, :image)
            ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nom' => $nom,
            ':prix' => $prix,
            ':size' => $size,
            ':couleur' => $couleur,
            ':image' => $imageName
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
<title>Ajouter Fleur - Qisat_Ward</title>
<link rel="stylesheet" href="../css/admin_form.css">
</head>
<body>

<?php require "../includes/header.php"; ?>

<div class="form-container">
    <h1>Ajouter une Fleur</h1>

    <?php if(!empty($errors)): ?>
        <ul class="error-message">
            <?php foreach($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nom de la fleur</label>
            <input type="text" name="nom" placeholder="Ex: Bouquet de Roses Rouges">
        </div>

        <div class="form-group">
            <label>Prix (DH)</label>
            <input type="number" step="0.01" name="prix" placeholder="0.00">
        </div>

        <div class="form-group">
            <label>Couleur</label>
            <input type="text" name="couleur" placeholder="Ex: Rouge, Rose, Blanc">
        </div>

        <div class="form-group">
            <label>Nombre de Roses</label>
            <input type="number" name="size" placeholder="Nombre total">
        </div>

        <div class="form-group">
            <label>Image du produit</label>
            <input type="file" name="image">
        </div>

        <button type="submit">Ajouter au catalogue</button>
    </form>

    <a href="dashboard.php" class="back-link">← Retour au tableau de bord</a>
</div>

<?php require "../includes/footer.php"; ?>

</body>
</html>