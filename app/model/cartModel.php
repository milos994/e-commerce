<?php
/*
 * Ovo je Model koji odgovara tabeli cart 
 */
class cartModel implements ModelInterface {
    /*
     * Metod koji vraca spisak svih cart poredjanih po id broju 
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM cart';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    
    
    /*
     * Metod koji vraca objekat sa podacima carta ciji cart_id je dat kao argument metoda
     * @param int $id
     * @return stdClass|NULL
     */
    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM cart WHERE cart_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
}
