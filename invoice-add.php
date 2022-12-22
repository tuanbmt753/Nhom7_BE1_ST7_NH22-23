<?php
session_start();

require "config.php";
require "models/db.php";
require "models/products.php ";
require "models/protypes.php ";
require "models/invoice.php ";

$products = new Products();
$protypes = new Protypes();
$invoice = new Invoice();

$cart ="";
$sum =0;
$getAllProduct = $products->getAllProducts();
foreach ($getAllProduct as $key => $value) {
	if(isset($_SESSION['cart'][$value['id']])){
		$sl = $_SESSION['cart'][$value['id']];
		$cart = $cart."".$sl."x ".$value['name']."<br>";
		$sum = $sum + $value['price'];
	}
}
echo $cart;
echo $sum."<br>";
if($sum != 0){
	if(isset($_POST['name'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$country = $_POST['country'];
		$tel = $_POST['tel'];
		var_dump($tel);

		$kq = $invoice->addInvoice($name, $email, $address, $country, $tel, $cart, $sum);
		var_dump($kq);

		if($kq == true){
			foreach ($getAllProduct as $key => $value) {
				if(isset($_SESSION['cart'][$value['id']])){
					unset($_SESSION['cart'][$value['id']]);
				}
			}
			header('location:invoice.php');
		}

	}
}

