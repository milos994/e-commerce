<?php
/**
 * Model koji odgovara tabeli product.
 */
class AdminProductModel implements ModelInterface{
    
    /**
     * Metod koji vraca spisak svih prizvoda iz tabele product.
     * @return array
     */
    public static function getAll() {
        $SQL = 'Select * from product inner JOIN product_category on product.product_category_id = product_category.product_category_id;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vraca objekat sa podacima proizvoda ciji je id dat kao argument
     * metoda. 
     * @param int $id
     * @return stdClass|null
     */
    public static function getById($id) {
        $SQL = 'Select * from product inner JOIN product_category on product.product_category_id = product_category.product_category_id where product.product_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vrsi dodavanje zapisa proizvoda u bazu podataka.
     * @param varchar $name
     * @param varchar $short_text
     * @param varchar $prikaz_sata
     * @param varchar $long_text
     * @param enum $active
     * @param int $amount
     * @param int $product_category_id
     * @return boolean
     */
    public static function add($name, $short_text, $prikaz_sata, $long_text, $active, $amount, $product_category_id) {
        $SQL = 'INSERT INTO product (name, short_text, prikaz_sata, long_text, active, amount, product_category_id) VALUES (?, ?, ?, ?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$name, $short_text, $prikaz_sata, $long_text, $active, $amount, $product_category_id]);
    }
    
    /**
     * Metod koji vrsi izmenu zapisa proizvoda u bazi podataka.
     * @param varchar $name
     * @param varchar $short_text
     * @param varchar $prikaz_sata
     * @param varchar $long_text
     * @param enum $active
     * @param int $amount
     * @param int $product_category_id
     * @param int $product_id
     * @return boolean
     */
    public static function edit ($name, $short_text, $prikaz_sata, $long_text, $active, $amount, $product_category_id, $product_id) {
        $product_id = intval($product_id);
        $SQL = 'UPDATE product SET name = ?, short_text = ?, prikaz_sata = ?, long_text = ?, active = ?, amount = ?, product_category_id = ? WHERE product_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$name, $short_text, $prikaz_sata, $long_text, $active, $amount, $product_category_id, $product_id]);
    }
    
    /**
     * Metod koji vrsi brisanje zapisa proizvoda iz baze podataka.
     * @param int $id
     * @return boolean
     */
    public static function delete($id) {
        $id = intval($id);
        $SQL = 'DELETE FROM product WHERE product_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$id]);
    }


}

