<?php 
session_start();
  require_once '../include/database.php';
  $id = $_GET['id'];
  $sqlState = $pdo->prepare('SELECT * FROM categorie WHERE id=?');
  $sqlState->execute([$id]);
  $categorie = $sqlState->fetch(PDO::FETCH_ASSOC);
  $sqlState = $pdo->prepare('SELECT * FROM produit WHERE id_categorie=?');
  $sqlState->execute([$id]);
  $produits = $sqlState->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="../assets/css/produit.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <title>Categorie | <?php echo $categorie ['libelle'] ?></title>
    <link href="../assets/css/nav.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/produit_flen.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php include '../include/nav_front.php'?>
<div class="container py-2">
  <h4><?php echo $categorie ['libelle'] ?> <span class="<?php echo $categorie['icone']?>"></span></h4>
  <div class="container">
    <div class="row">
<?php
foreach ($produits as $produit){
  $idProduit = $produit->id;
  ?>
    <div class="card mb-3 col-md-4 p-0 m-1">
  <img class="card-img-top w-50 mx-auto"  src="../upload/produit/<?= $produit->image ?>" width="200%" height="300" class="card-img-top" alt="...">
  <div class="card-body">
    <a href="produit.php?id=<?php echo $idProduit?>" class="btn stretched-link">Afficher détails</a>
    <h5 class="card-title"><?= $produit->libelle ?></h5>
    <p class="card-text"><?= $produit->description ?></p>
    <p class="card-text"><?= $produit->prix ?> DT</p>
    <p class="card-text"><small class="text-body-secondary">Ajouté le :<?= date_format(date_create($produit->date_creation),'Y/m/d') ?></small></p>
  </div>
  <div class="card-footer" style="z-index: 10;" >
   <?php include '../include/front/counter.php' ?>
  </div>
</div>
  <?php
}
if(empty($produits)){
  echo "<div class='alert alert-info' role='alert'>
          Pas de produits pour l'instant.
         </div>";
}
?>
    </div>
  </div>
</div>
<script src="../assets/js/produit/counter.js"></script>
</body>

</html>