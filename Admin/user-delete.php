<?php
require "../config.php";
require "../models/db.php";
require "../models/products.php ";
require "../models/protypes.php ";
require "../models/manufactures.php ";
require "../models/user.php ";


$user = new User();

if(isset($_GET['id'])){  
    $user_id = $_GET['id'];
    var_dump($user_id);
    $user->deleteUser($user_id);
    header('location:user.php');   
}
?>