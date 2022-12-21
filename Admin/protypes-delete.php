<?php
require "../config.php";
require "../models/db.php";
require "../models/products.php ";
require "../models/protypes.php ";
require "../models/manufactures.php ";

$protypes = new Protypes();
$products = new Products();



if(isset($_GET['id'])){
    $id= $_GET['id'];   
   
    $getProductById = $products->getProductByType_id($id);
    $dem = 0;
    foreach ($getProductById as $key => $value) {
        $dem = $dem +1;
    }

    if($dem != 0){
        header('location:protypes.php');
    }
    else{    
         $kq = $protypes->deleteProtypes($id);
        header('location:protypes.php');
    }
}
?>
