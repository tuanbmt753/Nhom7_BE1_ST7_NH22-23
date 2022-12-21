<?php
require "../config.php";
require "../models/db.php";
require "../models/products.php ";
require "../models/protypes.php ";
require "../models/manufactures.php ";
$products = new Products();
$manufactures = new Manufactures();
if(isset($_GET['manu_id'])){
    $manu_id = $_GET['manu_id'];

    $getProduct = $products->getProductByManu_id($manu_id);
    $dem = 0;
    foreach ($getProduct as $key => $value) {
        $dem = $dem +1;
    }
    if($dem == 0){
      $kq = $manufactures->deleteManufactures($manu_id);
      header('location:manufactures.php');
    }
    else{
      header('location:manufactures.php');
    }
   
}
?>