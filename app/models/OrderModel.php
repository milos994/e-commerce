<?php

/**
 * Model koji odgovara tabeli order.
 */
class OrderModel implements ModelInterface {
    /**
     * Metod koji vraca spisak svih ordera iz baze podataka.
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM order';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vraca objekat sa podacima ordera proizvoda ciji je id dat kao
     * argument metoda.
     * @param int $id
     * @return stdClass|null
     */
    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM order WHERE order_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
}

