<?php
/**
 * Model koji odgovara tabeli cart.
 */
class CartModel implements ModelInterface {
    
    /**
     * Metod koji vraca spisak svih korpa iz tabele cart.
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM cart';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vraca objekat sa podacima korpe ciji id je dat kao argument
     * metoda.
     * @param int $id
     * @return stdClass|null
     */
    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM cart WHERE cart_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
}
