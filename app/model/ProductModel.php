<?php
/*
 * Ovo je Model koji odgovara tabeli product
 */
class ProductModel {

    /*
     * Metod koji vraca spisak svih proizvoda poredjanih po id broju 
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM product p LEFT JOIN product_price pp ON pp.product_id = p.product_id';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    /*
     * Metod koji vraca objekat sa podacima proizvoda ciji product_id je dat kao argument metoda
     * @param int $id
     * @return stdClass|NULL
     */
    public static function getById($id) {
        $id = explode('/', $id);
        $id = intval(end($id));
        $SQL = 'SELECT * FROM product WHERE product_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    /*
     * Metod koji vraca objekat po ceni proizvoda.
     */
    public static function getByPrice($price_min, $price_max) {
        $SQL = 'SELECT * FROM product p LEFT JOIN product_price pp ON pp.product_id = p.product_id WHERE pp.amount > ? AND pp.amount < ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute([$price_min, $price_max]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    /*
     * Metod koji vraca objekat po imenu proizvoda.
     */
    public static function getByName($name) {
        $SQL = 'SELECT * FROM product p LEFT JOIN product_price pp ON pp.product_id = p.product_id WHERE name = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute([$name]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vrsi dodavanje zapisa proizvoda u bazu podataka
     * @param int $product_id
     * @param string $name
     * @param string $short_text
     * @param string $long_text
     * @param type $active
     * @param int $user_id
     * @param string $prikaz_sata
     * @return int|boolean ID broj zapisa u bazi ako je kreiran ili false ako je doslo do greske 
     */
    public static function add($name, $short_text, $long_text, $user_id, $prikaz_sata) {
       $SQL = 'INSERT INTO product (name, short_text, long_text, user_id, prikaz_sata) VALUES (?, ?, ?, ?, ?);';
       $prep = DataBase::getInstance()->prepare($SQL);
       $res = $prep->execute([$name, $short_text, $long_text, $user_id, $prikaz_sata]); 
       
       if ($res) {
           return DataBase::getInstance()->lastInsertId();
       } else {
           return false;
       }
    }
    
    /** Metod koji vrsi izmenu zapisa proizvoda u bazi podataka.
     * @param int $id
     * @param string $name
     * @param string $short_text
     * @param string $long_text
     * @param type $active
     * @param int $user_id
     * @param string $prikaz_sata
     * @returnboolean
     */
    public static function edit ($name, $short_text, $long_text, $user_id, $prikaz_sata, $id) {
       $SQL = 'UPDATE product SET name = ?, short_text = ?, long_text = ?, user_id = ?, prikaz_sata = ?) WHERE product_id = ?';
       $prep = DataBase::getInstance()->prepare($SQL);
       var_dump($prep);
       return $prep->execute([$name, $short_text, $long_text, $user_id, $prikaz_sata, $id]);
    }
    
}
