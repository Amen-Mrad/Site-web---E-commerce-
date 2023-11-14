<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Ajouter categorie</title>
    <link href="assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="assets/css/nav.css" rel="stylesheet" type="text/css">
    <link href="assets/css/ajouter_categorie.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php include 'include/nav.php' ?>
<div class="container py-2">
<?php 
if(isset($_POST['ajouter'])){
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $icone = $_POST['icone'];

    if(!empty($libelle) && !empty($description)){
        require_once 'include/database.php';
        $sqlState = $pdo->prepare('INSERT INTO categorie(libelle,description,icone) VALUES (?,?,?)');
        $sqlState->execute([$libelle,$description,$icone]);
        header ('location: categories.php');
        ?>
        <div class="alert alert-success" role="alert">
         La catégorie <?php echo $libelle ?> est bien ajoutée
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger" role="alert">
         Libelle , description sont obligatoires
        </div>
        <?php
    }
}
?>
  <div class="form-container">
<form method="post"  class="form" enctype="multipart/form-data">
<div class="form-group">
 <label class="form-label" >Libelle</label>
 <input type="text" class="form-control" name="libelle">
 </div>

 <div class="form-group">
 <label class="form-label" >Description</label>
 <textarea class="form-control" name="description" ></textarea>
</div>

<div class="form-group">
 <label class="form-label">Icône</label>
 <input type="text" class="form-control" name="icone">
</div>

 <input class="form-submit-btn" type="submit" value="Ajouter catégorie" name="ajouter"> 
</form>
</div>

</div>
</body>

</html>