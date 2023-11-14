<?php 
session_start();
  require_once '../include/database.php';
  $id = $_GET['id'];
  $sqlState = $pdo->prepare("SELECT * FROM produit WHERE id=?");
  $sqlState->execute([$id]);
  $produit = $sqlState->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="../assets/css/produit.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <title>Produit | <?php echo $produit['libelle'] ?></title>
    <link href="../assets/css/nav.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/produit_flen.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include '../include/nav_front.php'?>

<div id="prod" class="container py-2">
  <h4><?php echo $produit['libelle']?></h4>
  <div class="container">
    <div class="row">
        <div class="col-md-6">
            <img class="img img-fluid w-75" src="../upload/produit/<?php echo $produit['image'] ?>"
             alt="<?php $produit['libelle']?>" >
        </div>
        <div class="col-md-6">
            <?php 
                        $discount = $produit['discount'];
                        $prix = $produit['prix'];
            ?>
            <div class="d-flex align-items-center">

          
            <h1 class="w-100"><?php echo $produit['libelle']?></h1>
                       
    
        
            <?php if(!empty($discount)){
                ?>
                  
                    <span class="badge text-bg-success">- <?php echo $discount?> %</span>
                  
                <?php
            }
                ?>
  </div>
  <hr>
  <p class="text-justify">
  <?php echo $produit['description'] ?>

            </p>
            <hr>
          <div class="d-flex">
            <?php
            if(!empty($discount)){
                $total = $prix - (($prix*$discount)/100);?>
               <h5 class="mx-1">
                 <span class="badge text-bg-danger"><strike><?php echo $prix?> DT</strike></span>
                </h5>
                <h5 class="mx-1">
                 <span class="badge text-bg-success"><?php echo $total?> DT</span>
                </h5>
                <?php
            }else {
                $total = $prix;
                ?>
              <h5>
                 <span  class="badge text-bg-success"><?php echo $total?> DT</span>
                </h5>
                <?php
            }
          ?>
            </div>
            <hr>
   <?php
   $idProduit = $produit['id'];
   include '../include/front/counter.php' ?>
<hr>
        </div>
    </div>
  </div>
</div>
<script src="../assets/js/produit/counter.js"></script>
</body>

</html>