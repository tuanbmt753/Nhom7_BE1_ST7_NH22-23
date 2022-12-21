<?php
require "../config.php";
require "../models/db.php";
require "../models/products.php ";
require "../models/protypes.php ";
require "../models/manufactures.php ";

$manufactures = new Manufactures();
if(isset($_POST['manu_name'])){
    $manu_name = $_POST['manu_name'];

    $kq = $manufactures->addManufactures($manu_name);
    var_dump($kq);
    header('location:manufactures.php');
}
?>