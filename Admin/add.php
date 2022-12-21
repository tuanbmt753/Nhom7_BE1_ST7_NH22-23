<?php
require "../config.php";
require "../models/db.php";
require "../models/products.php ";
require "../models/protypes.php ";
require "../models/manufactures.php ";

$products = new Products();
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $manu_id = $_POST['manu_id'];
    $type_id = $_POST['type_id'];
    $price = $_POST['price'];
    $description = $_POST['description'];  
    $feature = isset($_POST['feature'])?1:0;
    $image = $_FILES['hinhanh']['name'];
    
    $products->addProduct($name,$manu_id,$type_id,$price,$image,$description,$feature);

    $target_dir = "../img/";
    $target_file = $target_dir.basename($_FILES['hinhanh']['name']);
    move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
    
    header('location:product.php');
}
?>