<?php

/*
 * Ovo je Model koji odgovara tabeli product
 */
class ProductModel implements ModelInterface{

    /*
     * Metod koji vraca spisak svih proizvoda poredjanih po id broju 
     * @return array
     */
    public static function getAll() {
        $SQL = 'Select * from product inner JOIN product_category on product.product_category_id = product_category.product_category_id;';
        
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $SQL = 'Select * from product inner JOIN product_category on product.product_category_id = product_category.product_category_id where product.product_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

    public static function edit ($name, $short_text, $long_text, $prikaz_sata, $amount, $id) {
        
    }
    
    public static function delete($id) {
        $id = intval($id);
        $SQL = 'DELETE FROM product WHERE product_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$id]);
    }

    public static function add($name, $short_text, $prikaz_sata, $long_text, $active, $product_category_id) {
        $SQL = 'INSERT INTO product (name, short_text, prikaz_sata, long_text, active, product_category_id) VALUES (?, ?, ?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$name, $short_text, $prikaz_sata, $long_text, $active, $product_category_id]);
    }
    
}
