<?php
require "../config.php";
require "../models/db.php";
require "../models/products.php ";
require "../models/protypes.php ";
require "../models/manufactures.php ";

$products = new Products();

if(isset($_GET['id'])){
   $id = $_GET['id'];
   $products->removeProduct($id);

   header('location:product.php');
}
?>
