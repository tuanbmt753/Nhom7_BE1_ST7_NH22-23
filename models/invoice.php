<?php
class Invoice extends Db{
    public function getAllInvoice()
    {
        $sql = self::$connection->prepare("SELECT * FROM `invoice`");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function addInvoice($name, $email, $address, $country, $tel, $cart, $sum)
    {
        $sql = self::$connection->prepare("INSERT INTO `invoice`( `name`, `email`, `address`, `country`, `tel`, `cart`, `sum`) 
        VALUES (?,?,?,?,?,?,?)");
        $sql->bind_param("ssssisi",$name, $email, $address, $country, $tel, $cart, $sum );
        return $sql->execute(); //return an object 
    }
    public function deleteInvoice($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `invoice` WHERE id = ?");
        $sql->bind_param("i",$id);
        return $sql->execute(); //return an object 
    }
}