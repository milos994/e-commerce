<?php
/**
 * Model koji odgovara tabeli admin.
 */
class AdminModel implements ModelInterface {
    
    /**
     * Metod koji vraca spisak svih admina iz tabele admin.
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM admin;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vraca objekat sa podacima admina ciji je admin_id dat kao 
     * argument metoda.
     * @param int $id
     * @return stdClass|null
     */
    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM admin WHERE admin_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vraca objekat sa podacima admina ciji su username i passwordHash
     * dati kao argumenti metoda.
     * @param varchar $username
     * @param char $passwordHash
     * @return stdClass|null
     */
    public static function getByUsernameAndPasswordHash($username, $passwordHash) {
        $SQL = 'SELECT * FROM admin WHERE `username` = ? AND `password` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$username, $passwordHash]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

}
