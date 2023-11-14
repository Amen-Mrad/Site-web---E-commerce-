<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Ajouter produit</title>
    <link href="assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="assets/css/nav.css" rel="stylesheet" type="text/css">
    <link href="assets/css/ajouter_categorie.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
 require_once 'include/database.php';
 include 'include/nav.php' ?>
<div class="container py-2">
<?php 
if(isset($_POST['ajouter'])){

    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $discount = $_POST['discount'];
    $categorie = $_POST['categorie'];
    $description= $_POST['description'];
    $date = date('Y-m-d');

 
$filename='produit.png';
if(!empty($_FILES['image']['name'])){
    $image = $_FILES['image']['name'];
    $filename= uniqid().$image;
    move_uploaded_file($_FILES['image']['tmp_name'],'upload/produit/'.$filename);
}
if(!empty($libelle) && !empty($prix) && !empty($categorie)){
    $sqlState = $pdo->prepare('INSERT INTO produit VALUES(null,?,?,?,?,?,?,?)');
    $sqlState->execute([$libelle,$prix,$discount,$categorie,$date,$description,$filename]);
    header('Location: produits.php');
}else{
    ?>
    <div class="alert alert-danger" role="alert">
        Libelle , prix , catégorie sont obligatoires.
    </div>
    <?php
}
}
?>
<div class="form-container">
<form method="post" class="form" enctype="multipart/form-data">
<div class="form-group">
 <label class="form-label" >Libelle</label>
 <input type="text" class="form-control" name="libelle">
</div>

<div class="form-group">
 <label class="form-label" >Prix</label>
 <input type="number" class="form-control" step="0.1" name="prix" min="0">
</div>

<div class="form-group">
 <label class="form-label" >Discount</label>
 <input type="range" value="0" class="form-control" name="discount" min="0" max="90" >
</div>

<div class="form-group">
 <label class="form-label" >Description</label>
 <textarea class="form-control" name="description" ></textarea>
</div>

<div class="form-group">
 <label class="form-label" >Image</label>
 <input type="file" class="form-control" name="image">
</div>

<?php
  $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="form-group">
<label class="form-label">Catégorie</label>
 <select name="categorie" class="form-control">
    <option value="">Choisissez une catégorie</option>
    <?php
    foreach($categories as $categorie){
        echo "<option value='".$categorie['id']."'>".$categorie['libelle']."</option>";
    }
    ?>
 </select>
  </div>

 <input type="submit" value="Ajouter produit" class="form-submit-btn" name="ajouter"> 

</form>
</div>

</div>
</body>

</html>