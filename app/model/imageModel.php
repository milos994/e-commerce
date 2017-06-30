<?php
/*
 * Ovo je Model koji odgovara tabeli image 
 */
class imageModel implements ModelInterface {
    /*
     * Metod koji vraca spisak svih slika poredjanih po id broju imenu
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM image';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    
    
    /*
     * Metod koji vraca objekat sa podacima slike ciji image_id je dat kao argument metoda
     * @param int $id
     * @return stdClass|NULL
     */
    public static function getById($id) {
        $image_id = intval($id);
        $SQL = 'SELECT * FROM image WHERE image_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute([$image_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
}
