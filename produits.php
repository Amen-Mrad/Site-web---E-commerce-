<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Liste des produits</title>
    <link href="assets/css/nav.css" rel="stylesheet" type="text/css">
    <link href="assets/css/categories.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include 'include/nav.php' ?>
<div class="container py-2">
<h2>Liste des produits</h2>
<button class="ajouter">
  <span>
    <a href="ajouter_produit.php">Ajouter produit</a>
  </span>
</button>
<table class="table table-striped">
    <thead>
       <tr>
             <th>#ID</th>
             <th>Libelle</th>
             <th>Prix</th>
             <th>Discount</th>
             <th>Catégorie</th>
             <th>Image</th>
             <th>Date de création</th>
             <th>Opérations</th>
       </tr>
    </thead> 
    <tbody>
     <?php
     require_once 'include/database.php';
     $categories = $pdo->query('SELECT produit.*,categorie.libelle as "categorie_libelle" FROM produit INNER JOIN categorie ON produit.id_categorie = categorie.id ')->fetchAll(PDO::FETCH_ASSOC);
     foreach ($categories as $produit){        
        ?>
     <tr>
           <td><?= $produit['id']?></td>
           <td><?= $produit['libelle']?></td>
           <td><?= $produit['prix']?> TND</td>
           <td><?= $produit['discount']?> %</td>
           <td><?= $produit['categorie_libelle']?></td>
           <td><img width="100px" class="img img-fluid" src="upload/produit/<?= $produit['image']?>" alt="<?= $produit['libelle']?>" ></td>
           <td><?= $produit['date_creation']?></td>
           <td>
         <a class="btn btn-primary"  href="modifier_produit.php?id=<?php echo $produit['id'] ?>">Modifier</a>
         <a class="btn btn-danger" href="supprimer_produit.php?id=<?php echo $produit['id']  ?> " onclick="return confirm('Voulez vous vraiment supprimer le produit <?php echo $produit['libelle']?>')">Supprimer</a>
           </td>
     </tr>
     <?php
     }
     ?>
    </tbody>
</table>
</div>
</body>

</html>