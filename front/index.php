<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <title>E-commerce</title>
    <link href="../assets/css/nav.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/front_index.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php include '../include/nav_front.php'?>
 <div class="container py-2">
  <h4><i class="fa fa-sharp fa-light fa-list"></i> Liste des catégories</h4>
<?php 
  require_once '../include/database.php';
  $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_OBJ);
?>
<ul id="ul" class="list-group list-group-flush w-25">
    <?php
     foreach($categories as $categorie){
        ?>
         <li class="list-group-item">
            <a class="btn btn-light" href="categorie.php?id=<?php echo $categorie->id?>">
              <i class="<?php echo $categorie->icone ?>"></i> <?php echo $categorie->libelle ?>
            </a>
         </li>
        <?php
     }
    ?>
</ul>
</div>
</body>

</html>