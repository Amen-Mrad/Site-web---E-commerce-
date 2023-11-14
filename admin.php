<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Admin</title>
    <link href="assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="assets/css/nav.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php include 'include/nav.php' ?>
<div class="container py-2">
<?php 
  
   if (!isset($_SESSION['utilisateur'])){
    header('location:connexion.php');
   }
?>
  <h1>Welcome  <?php echo $_SESSION['utilisateur']['login']; ?>, <a href="front/index.php"> Click ici pour faire des achats à domicile  </a></h3>
</div>
</body>

</html>