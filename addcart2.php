<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     if(isset($_GET['id'])){	
        $id = $_GET['id'];
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id] = $_SESSION['cart'][$id] +1;
        }
        else{
            $_SESSION['cart'][$id] = 1;
        }
        header('location:index.php');
    }
    if(isset($_GET['id2'])){	
        $id = $_GET['id2'];
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id] = $_SESSION['cart'][$id] +1;
        }
        else{
            $_SESSION['cart'][$id] = 1;
        }
        header('location:product.php');
    }
    if(isset($_GET['id3'])){	
        $id = $_GET['id3'];
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id] = $_SESSION['cart'][$id] +1;
        }
        else{
            $_SESSION['cart'][$id] = 1;
        }
        header('location:result.php');
    }
   
    ?>
</body>
</html>