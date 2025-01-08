<?php
$erreur = null;
$password = '$2y$12$kd8RL5Sw08BiczaOiJzFNe.2opNXK8Q7rvERb2/8X/mZS/hw7oAEm';
if(!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) {
    if ($_POST['pseudo'] === 'Legiolf' && password_verify($_POST['motdepasse'], $password)) {
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: /dashboard.php');
    } else {
        $erreur = "Identifiants incorrects"; 
    }
}

require_once 'functions/auth.php';
if (est_connecte()) {
    header('Location: /dashboard.php');
    exit(); 
}

require_once 'elements/header.php'; 
?> 

<div class="container">
    <?php if ($erreur): ?> 
    <div class="alert alert-danger">
        <?= $erreur ?> 
    </div>
    <?php endif ?>
</div>

<div class="container">
    <form action="" method="post">
        <div class="form-group" style="margin-bottom: 15px;">
            <input class="form-control" type="text" name="pseudo" placeholder="Nom d'utilisateur">
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <input class="form-control" type="password" name="motdepasse" placeholder="Votre mot de passe">
        </div>
        <button type="submit" class="btn btn-primary">Se Connecter</button>
    </form>
</div>

<?php require_once 'elements/footer.php' ?>