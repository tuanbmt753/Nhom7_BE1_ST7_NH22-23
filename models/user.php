<?php
class User extends Db{
    public function checkLogin($username,$password)
    {
        $sql = self::$connection->prepare("SELECT * FROM users 
        WHERE users.username = ?  AND `password` = ?");
        $password = md5($password);
        $sql->bind_param("ss", $username, $password);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->num_rows;
        if($items == 1){
            return true;
        }
        else{
            return false;
        }
    }
    public function checkLogin2($username,$password)
    {
        $password = md5($password);
        $sql = self::$connection->prepare("SELECT * FROM users WHERE users.username = '$username'  AND `password` = '$password'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getUserByUserId($user_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM users WHERE user_id = ?");
        $sql->bind_param("i",$user_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getUserByUserName($username)
    {
        $sql = self::$connection->prepare("SELECT * FROM `users` WHERE username = '$username'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getAllLogin()
    {
        $sql = self::$connection->prepare("SELECT * FROM users");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getAllLogin2($user_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `users` WHERE `user_id` <> ?");
        $sql->bind_param("i",$user_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function addUser($username,$password,$rold_id)
    {
        $password = md5($password);
        $sql = self::$connection->prepare("INSERT INTO `users`(`username`, `password`, `role_id`) VALUES ('$username','$password','$rold_id')");
        $sql->execute(); //return an object
    }

    public function deleteUser($user_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `users` WHERE user_id = ?");
        $sql->bind_param("i",$user_id);
        $sql->execute(); //return an object
    }

    public function editUser($username, $password, $rold_id, $user_id)
    {    
        if($password !=""){
            $password = md5($password);
            $sql = self::$connection->prepare("UPDATE `users` 
            SET `username`= ?,`password`= ?,`role_id`= ? 
            WHERE user_id = ?");
            $sql->bind_param("ssii",$username, $password, $rold_id, $user_id);
            return $sql->execute(); //return an object
        }
        else{
            $password = md5($password);
            $sql = self::$connection->prepare("UPDATE `users` 
            SET `username`= ?,`role_id`= ? 
            WHERE user_id = ?");
            $sql->bind_param("sii",$username, $rold_id, $user_id);
            return $sql->execute(); //return an object
        }
       
    }

}