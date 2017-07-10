<?php

class CartProductModel implements ModelInterface {

    public static function getAll() {
        $SQL = 'SELECT * FROM cart_product';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM cart_product WHERE cart_product_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function add($product_id) {
        $SQL = 'INSERT INTO cart_product (product_id) VALUES (?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$product_id]);
    }
    
}
