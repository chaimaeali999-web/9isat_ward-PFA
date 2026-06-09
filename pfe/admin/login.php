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
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/admin_login.css"> <!-- -->
</head>
<body>

    <?php require "../includes/header.php"; ?> <!-- -->

    <!-- Container central dynamic -->
    <div class="login-container">
        <h1>Connexion Admin</h1>

        <?php if(!empty($error)): ?>
            <p class="error-message"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
<?php
     require_once "../includes/footer.php";
?>

</body>
</html>