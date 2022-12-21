<?php
require "../config.php";
require "../models/db.php";
require "../models/products.php ";
require "../models/protypes.php ";
require "../models/manufactures.php ";

$protypes = new Protypes();
if(isset($_POST['id'])){
    $id= $_POST['id'];   
    $type_name = $_POST['type_name'];
    var_dump($protypes->editProtypes($type_name,$id));
    header('location:protypes.php');
}
?>
