<?php 
session_start();
$connecte =false;
if(isset($_SESSION['utilisateur'])){
   $connecte=true;
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

    <a class="navbar-brand" id="ec" href="index.php">E-commerce</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">

         <button> <a class="nav-link active" aria-current="page" href="index.php">Ajouter utilsiateur</a></button>

        </li>
     <?php
     if($connecte){
     ?>
      <li class="nav-item">

      <button>   <a class="nav-link " aria-current="page" href="categories.php">Liste des catégories</a></button>

        </li>
        <li class="nav-item">

        <button> <a class="nav-link " aria-current="page" href="produits.php">Liste des produits</a></button>

        </li>
        <li class="nav-item">

        <button>  <a class="nav-link " aria-current="page" href="ajouter_categorie.php">Ajouter catégorie</a></button>

        </li>
        <li class="nav-item">

        <button>  <a class="nav-link " aria-current="page" href="ajouter_produit.php">Ajouter produit</a></button>

        </li>
        <li class="nav-item">

        <button>  <a class="nav-link " aria-current="page" href="deconnexion.php">Deconnexion</a></button>
          
        </li>

     <?php
     }else {
      ?>
      <li class="nav-item">
         <button> <a class="nav-link" href="connexion.php">Connexion</a></button>
        </li>
      <?php
     }
     ?>     
      </ul>
    </div>
  </div>
</nav>