<?php
class Products extends Db{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function addProduct($name, $manu_id, $type_id, $price, $image, $description, $feature)
    {
        $sql = self::$connection->prepare("INSERT INTO `products`(`name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`) 
        VALUES (?,?,?,?,?,?,?)");
        $sql->bind_param("siiissi",$name, $manu_id, $type_id, $price, $image, $description, $feature);
        return $sql->execute(); //return an object 
    }
    public function editProduct($id, $name, $manu_id, $type_id, $price, $image, $description, $feature, $sold, $inventory)
    {
        if($image != ""){
            $sql = self::$connection->prepare("UPDATE `products` 
            SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`image`=?,`description`=?,`feature`=?,`sold`=?,`inventory`=?
            WHERE `id`=?");
            $sql->bind_param("siiissiiii",$name, $manu_id, $type_id, $price, $image, $description, $feature, $sold, $inventory, $id);
            return $sql->execute(); //return an object 
        }
        else{
            $sql = self::$connection->prepare("UPDATE `products` 
            SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`description`=?,`feature`=?,`sold`=?,`inventory`=?
            WHERE `id`=?");
            $sql->bind_param("siiisiiii",$name, $manu_id, $type_id, $price,$description, $feature, $sold, $inventory, $id);
            return $sql->execute(); //return an object 
        }
       
    }
    public function removeProduct($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE id = ?");
        $sql->bind_param("i",$id);
        return $sql->execute(); //return an object 
    }
    public function getAllProducts3()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM products, manufactures, protypes 
        WHERE products.manu_id = manufactures.manu_id and products.type_id = protypes.type_id 
        ORDER BY id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllProductsProtypes()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`,protypes WHERE products.type_id = protypes.type_id");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i",$id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getProductByType_id($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ?");
        $sql->bind_param("i",$id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getProductByManu_id($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE manu_id = ?");
        $sql->bind_param("i",$id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getNewProducts()
    {
        $sql = self::$connection->prepare("SELECT products.id,products.name,protypes.type_name,products.price,products.image FROM `products`,protypes WHERE products.type_id = protypes.type_id ORDER BY created_at DESC LIMIT 0,10");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getTopSelling()
    {
        $sql = self::$connection->prepare("SELECT products.id,products.name,protypes.type_name,products.price,products.image,products.sold FROM `products`,protypes WHERE products.type_id = protypes.type_id ORDER BY sold DESC LIMIT 0,10");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getTopThreeSelling($top)
    {
        $sql = self::$connection->prepare("SELECT products.id,products.name,protypes.type_name,products.price,products.image,products.sold FROM `products`,protypes WHERE products.type_id = protypes.type_id ORDER BY sold DESC LIMIT $top,3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductProtypesByTypeID($type_id,$start,$end)
    {
        $sql = self::$connection->prepare("SELECT products.id,products.name,protypes.type_name,products.price,products.image,products.sold FROM `products`,protypes WHERE products.type_id = protypes.type_id AND protypes.type_id = $type_id ORDER BY sold DESC LIMIT $start,$end");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductProtypesByID($id,$start,$end)
    {
        $sql = self::$connection->prepare("SELECT products.id,products.description,products.name,protypes.type_name,products.price,products.image,products.sold FROM `products`,protypes WHERE products.type_id = protypes.type_id AND products.id = $id ORDER BY sold DESC LIMIT $start,$end");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getTopSellingByTypeID($type_id,$start,$end)
    {
        $sql = self::$connection->prepare("SELECT products.id,products.name,protypes.type_name,products.price,products.image,products.sold FROM `products`,protypes WHERE products.type_id = protypes.type_id AND protypes.type_id = $type_id ORDER BY sold DESC LIMIT $start,$end");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function search($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM products,protypes
        WHERE products.type_id = protypes.type_id AND
        description LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s",$keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
   
    function paginate($url, $total, $perPage)
    {
        $totalLinks = ceil($total/$perPage);
        $link ="";
        for($j=1; $j <= $totalLinks ; $j++)
        {
        $link = $link."<li><a href='$url?page=$j'>$j</a></li>";
        } 
        return $link;
    }
    public function getAllProducts2($keyword,$page,$perPage)
    {
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * 
        FROM products,protypes 
        WHERE products.type_id = protypes.type_id AND products.description LIKE '%$keyword%'
        LIMIT $page,$perPage");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}