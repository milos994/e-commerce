<?php
/*
 * Ovo je Model koji odgovara tabeli cart_product 
 */
class cartProductModel implements ModelInterface {
    /*
     * Metod koji vraca spisak svih cart_product poredjanih po id broju 
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM cart_product';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    
    
    /*
     * Metod koji vraca objekat sa podacima cart_product ciji cart_product_id je dat kao argument metoda
     * @param int $id
     * @return stdClass|NULL
     */
    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM cart_product WHERE cart_product_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
}
