<?php
require "../config.php";
require "../models/db.php";
require "../models/products.php ";
require "../models/protypes.php ";
require "../models/manufactures.php ";
require "../models/user.php ";


$user = new User();

if(isset($_POST['user_name'])){
    $getAllLogin = $user->getAllLogin();

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];  
    $rold_id = $_POST['rold_id'];

    $check = true;

    foreach ($getAllLogin as $key => $value) {
      if($value['username'] == $user_name ){
        $check = false;
      }
    }

    if($check == false){
      var_dump("false");
      header('location:user.php');
    }
    else{
      var_dump("true");
      $user->addUser($user_name,$password,$rold_id);
      header('location:user.php');
    }
   
     
}
?>