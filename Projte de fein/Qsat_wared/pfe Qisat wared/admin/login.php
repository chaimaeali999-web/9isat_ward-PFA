<?php

session_start();

require "../db.php";

$error = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM admins
            WHERE email = ?
            AND password = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $email,
        $password
    ]);

    $admin = $stmt->fetch();

    if($admin){

        $_SESSION['admin'] = $admin['email'];
        $_SESSION['admin_id'] = $admin['id'];

        header("Location: dashboard.php");
        exit();

    }else{

        $error = "Email ou mot de passe incorrect";

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin - Qisat_Ward</title>
    <link rel="stylesheet" href="../css/admin_form.css">
</head>
<body>

    <?php require "../includes/header.php"; ?>

    <div class="form-container login-container">
        <h1>Connexion Admin</h1>

        <?php if(!empty($error)): ?>
            <div class="error-message"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="votre@email.com" required>
            </div>
            
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit">Se connecter</button>
        </form>
    </div>

    <?php require_once "../includes/footer.php"; ?>

</body>
</html>