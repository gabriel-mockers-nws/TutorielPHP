</main>

<footer>
  <hr>
  <div class ="row">
      <div class="col-md-4">
        <?php
        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'DoubleCompteur.php';
        $compteur = new DoubleCompteur(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur');
        $compteur->incrementer();
        $vues = $compteur->recuperer();
        ?>
        Il y a <?= $vues ?> visite<?php if ($vues > 1): ?>s<?php endif; ?> sur le site
      </div>
      <div class="col-md-4">
        <form action="/newsletter.php" method="post" class="form-inline">
            <div class="form-group">
                <input type="email" name="email" placeholder="Entrez votre email" required class="form-control" value="<?= htmlentities($email ?? '') ?>">
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
      </div>
      <div class="col-md-4">
          <h5>Navigation</h5>
          <ul class="list-unstyled text-small">
              <?= nav_menu(); ?>
          </ul>
      </div>
  </div>
</footer>

<footer class="footer mt-auto py-3 bg-body-tertiary">
  <div class="container">
    <span class="text-body-secondary">OwO</span>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>