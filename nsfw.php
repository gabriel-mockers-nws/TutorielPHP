<?php

$age = null;

if (!empty($_POST['birthday'])) {
    setcookie('birthday', $_POST['birthday']);
    $_COOKIE['birthday'] = $_POST['birthday'];
}

if (!empty($_COOKIE['birthday'])) {
    $birthday = (int)$_COOKIE['birthday'];
    $age = (int)date('Y') - $birthday;
}

require 'elements/header.php'; 
?> 

<div class="container">
    <?php if ($age >= 18): ?>
        <h1>Du contenue reservé aux adultes</h1>
    <?php elseif ($age !== null): ?>
        <div class="alert alert-danger">Vous n'avez pas l'age requis pour voir le contenu</div>
    <?php else: ?> 
    <form action="" method="post" class="form-inline">
        <div class="form-group">
            <label for="birthday">Section reservée pour les adultes, entrer votre année de naissance : </label>
            <select name="birthday" class="form-control">
                <?php for($i = 2010; $i > 1919 - 1; $i--): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <?php endif ?> 
</div>

<?php require 'elements/footer.php' ?>
