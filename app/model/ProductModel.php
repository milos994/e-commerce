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
        $SQL = 'SELECT p.product_id, p.name, p.short_text, p.long_text,'
                . ' p.prikaz_sata, pp.amount FROM product p LEFT JOIN'
                . ' product_price pp ON pp.product_id = p.product_id'
                . ' GROUP BY p.product_id ORDER BY p.product_id';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        $products = $prep->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
    
    /*
     * Metod koji vraca objekat sa podacima proizvoda ciji product_id je dat kao argument metoda
     * @param int $id
     * @return stdClass|NULL
     */
    public static function getById($id) {
        $id = explode('/', $id);
        $id = intval(end($id));
        $SQL = 'SELECT p.product_id, p.name, p.short_text, p.long_text, p.prikaz_sata, pp.amount FROM product p LEFT JOIN product_price pp ON pp.product_id = p.product_id WHERE p.product_id = ?;';
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
     * @param string $prikaz_sata
     * @param int $amount
     * @return int|boolean ID broj zapisa u bazi ako je kreiran ili false ako je doslo do greske 
     */
    public static function add($name, $short_text, $long_text, $prikaz_sata, $amount) {
       $SQL = 'INSERT INTO product (name, short_text, long_text, prikaz_sata) VALUES (?, ?, ?, ?);';
       $prep = DataBase::getInstance()->prepare($SQL);
       $res = $prep->execute([$name, $short_text, $long_text, $prikaz_sata]);
       $id = DataBase::getInstance()->lastInsertId();
       
       if ($res && $id) {
            $SQL1 = 'INSERT INTO product_price (product_id, amount) VALUES (?, ?);';
            $prep1 = DataBase::getInstance()->prepare($SQL1);
            $res1 = $prep1->execute([intval($id), $amount]);
            return $res1;
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
     * @param string $prikaz_sata
     * @param int $amount
     * @returnboolean
     */
    public static function edit ($name, $short_text, $long_text, $prikaz_sata, $amount, $id) {
        $id = explode('/', $id);
        $id = intval(end($id));
        $SQL = 'UPDATE product SET name = ?, short_text = ?, long_text = ?, prikaz_sata = ? WHERE product_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$name, $short_text, $long_text, $prikaz_sata, $id]);
        
        if($res) {
            $SQL = 'SELECT count(*) FROM product_price WHERE product_id = ?;';
            $prep = Database::getInstance()->prepare($SQL);
            $res = $prep->execute([$id]);
            if($res) {
                $price = $prep->fetchAll(PDO::FETCH_NUM);
                if($price[0][0] !== 0) {
                    $SQL = 'UPDATE product_price SET amount = ? WHERE product_id = ?;';
                    $prep = DataBase::getInstance()->prepare($SQL);
                    
                    return $prep->execute([$amount, $id]);
               } else {
                    $SQL = 'INSERT INTO product_price (product_id, amount) VALUES (?, ?);';
                    $prep = DataBase::getInstance()->prepare($SQL);

                    return $prep->execute([$id, $amount]);
               }
            }
            
        } else {
            echo 'error';
        }
    }
    
}
