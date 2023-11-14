<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <title>Liste des catégories</title>
    <link href="assets/css/nav.css" rel="stylesheet" type="text/css">
    <link href="assets/css/categories.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php include 'include/nav.php' ?>
<div class="container py-2">
<h2><b>Liste des catégories</b></h2>
<button class="ajouter">
  <span>
    <a href="ajouter_categorie.php">Ajouter catégorie</a>
  </span>
</button>
<table class="table table-striped">
    <thead>
       <tr>
             <th>#ID</th>
             <th>Libelle</th>
             <th>Description</th>
             <th>Icône</th>
             <th>Date</th>
             <th>Opérations</th>
       </tr>
    </thead> 
    <tbody>
     <?php
     require_once 'include/database.php';
     $categories = $pdo->query('SELECT *FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
     foreach ($categories as $categorie){
        ?>
     <tr>
           <td><?php echo $categorie['id']?></td>
           <td><?php echo $categorie['libelle']?></td>
           <td><?php echo $categorie['description']?></td>
           <td><i class="<?php echo $categorie['icone']?>"></i></td>
           <td><?php echo $categorie['date_creation']?></td>
           <td>
         <a href="modifier_categorie.php?id=<?php echo $categorie['id'] ?>" class="btn btn-primary">Modifier</a>
         <a href="supprimer_categorie.php?id=<?php echo $categorie['id'] ?>" onclick="return confirm('Voulez vous vraiment supprimer la catégorie <?php echo $categorie['libelle']?>')" class="btn btn-danger">Supprimer</a>
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