<?php
class Protypes extends Db{
    public function getAllProtypes()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function addProtypes($type_name)
    {
        $sql = self::$connection->prepare("INSERT INTO `protypes`(`type_name`) VALUES (?)");
        $sql->bind_param("s",$type_name);
        return $sql->execute(); //return an object 
    }

    public function deleteProtypes($type_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `protypes` WHERE type_id = ?");
        $sql->bind_param("i",$type_id);
        return $sql->execute(); //return an object 
    }


    public function editProtypes($type_name,$type_id)
    {
        $sql = self::$connection->prepare("UPDATE `protypes` SET `type_name`= ? WHERE `type_id`= ? ");
        $sql->bind_param("si",$type_name,$type_id);
        return $sql->execute(); //return an object 
    }
}