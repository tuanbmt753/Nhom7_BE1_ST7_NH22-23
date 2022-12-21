<?php
require "../config.php";
require "../models/db.php";
require "../models/products.php ";
require "../models/protypes.php ";
require "../models/manufactures.php ";
require "../models/user.php ";


$user = new User();

if(isset($_POST['user_name'])){
    
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];  
    $rold_id = $_POST['rold_id'];

    $getAllLogin = $user->getAllLogin2($user_id);

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
      $kq = $user->editUser($user_name, $password, $rold_id, $user_id);    
      // echo "Hello".$password;
      // var_dump(md5($password));
      header('location:user.php');
    }       
}
?>