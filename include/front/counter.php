<div class="counter d-flex w-50 mx-auto">
<?php 
   $idUtilisateur = $_SESSION['utilisateur']['id'];
   $qty = $_SESSION ['panier'][$idUtilisateur][$idProduit] ?? 0;
   $button = $qty == 0 ? 'Ajouter' : 'Modifier';
   ?>
    <form method="post" class="counter d-flex" action="ajouter_panier.php" >

    <button onclick="return false;" class="btn btn-primary mx-2 counter-moins">-</button>

    <input type="hidden" name="id" value="<?php echo $idProduit ?>">
    <input class="form-control" type="number" value="<?php echo $qty ?>" name="qty" id="qty" max="99">

    <button onclick="return false;" class="btn btn-primary mx-2 counter-plus">+</button>

    <input class="btn btn-success" type="submit" value="<?php echo $button; ?>" name="ajouter">
    
    </form>
</div>

