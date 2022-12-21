<?php
require "../config.php";
require "../models/db.php";
require "../models/products.php ";
require "../models/protypes.php ";
require "../models/manufactures.php ";

$manufactures = new Manufactures();
if(isset($_POST['manu_name'])){
    $manu_name = $_POST['manu_name'];
    $manu_id = $_POST['manu_id'];
    $kq = $manufactures->editManufactures($manu_name,$manu_id);
    var_dump($kq);
    header('location:manufactures.php');
}
?>