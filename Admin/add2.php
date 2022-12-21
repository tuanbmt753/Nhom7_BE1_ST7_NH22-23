<?php
require "../config.php";
require "../models/db.php";
require "../models/products.php ";
require "../models/protypes.php ";
require "../models/manufactures.php ";

$protypes = new Protypes();
if(isset($_POST['type_name'])){
    $type_name = $_POST['type_name'];
    var_dump("Hello");
    $protypes->addProtypes($type_name);
    header('location:protypes.php');
}
?>