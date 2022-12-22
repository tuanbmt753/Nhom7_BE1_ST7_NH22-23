<?php
session_start();

require "config.php";
require "models/db.php";
// require "models/products.php ";
// require "models/protypes.php ";
require "models/invoice.php ";

// $products = new Products();
// $protypes = new Protypes();
$invoice = new Invoice();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;

   $kq =  $invoice->deleteInvoice($id);
   header('location:invoice.php');
}


