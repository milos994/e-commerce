<?php
/**
 * Model koji odgovara tabeli cart_product.
 */
class CartProductModel implements ModelInterface {
    
    /**
     * Metod koji vraca spisak svih proizvoda iz korpe.
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM cart_product';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vraca objekat sa podacima korpe proizvoda ciji je id dat kao
     * argument metoda.
     * @param int $id
     * @return stdClass|null
     */
    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM cart_product WHERE cart_product_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vrsi dodavanje zapisa proizvoda u korpu proizvoda.
     * @param int $product_id
     * @return boolean
     */
    public static function add($product_id) {
        $SQL = 'INSERT INTO cart_product (product_id) VALUES (?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$product_id]);
    }
    
}
