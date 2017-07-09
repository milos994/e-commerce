<?php

class CartModel implements ModelInterface {

    public static function getAll() {
        $SQL = 'SELECT * FROM cart';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM cart WHERE cart_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
}
