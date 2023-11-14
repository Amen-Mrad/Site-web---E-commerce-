
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <button>  <a class="navbar-brand" href="#">E-commerce</a></button>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        <button><a class="nav-link active" aria-current="page" href="index.php">Liste des catégories</a></button>
        </li>
      </ul>
    </div>
    <?php
    $idUtilisateur = $_SESSION['utilisateur']['id'];
   ?>
    <a class="btn float-end" href="panier.php"><i class="fa-solid fa-cart-shopping"></i></a>
  </div>
</nav>