<?php
/**
 * Model koji odgovara tabeli product_category.
 */
class AdminCategoryModel implements ModelInterface{
    
    /**
     * Metod koji vraca spisak svih kategorija poredjanih po imenu kategorije.
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM product_category ORDER BY category_name;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Metod koji vraca objekat sa podacima kategorije ciji product_category_id
     * je dat kao argument metoda.
     * @param int $id
     * @return stdClass|null
     */
    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM product_category WHERE product_category_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vraca objekat sa podacima kategorije ciji slug je dat kao 
     * argument metoda.
     * @param string $slug
     * @return stdClass|null
     */
    public static function getBySlug($slug) {
        $SQL = 'SELECT * FROM product_category WHERE slug = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$slug]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vrsi dodavanje zapisa kategorije u bazu podataka.
     * @param varchar $category_name
     * @param varchar $slug
     * @return boolean
     */
    public static function add($category_name, $slug) {
       $SQL = 'INSERT INTO product_category (category_name, slug) VALUES (?, ?);';
       $prep = DataBase::getInstance()->prepare($SQL);
       return $prep->execute([$category_name, $slug]);
    }
    
    /**
     * Metod koji vrsi izmenu zapisa kategorije u bazi podataka.
     * @param varchar $category_name
     * @param varchar $slug
     * @param int $id
     * @return boolean
     */
    public static function edit ($category_name, $slug, $id) {
        $SQL = 'UPDATE product_category SET category_name = ?, slug = ? WHERE product_category_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$category_name, $slug, $id]);
    }     
    
    /**
     * Metod koji vrsi brisanje zapisa kategorije iz baze podataka.
     * @param int $id
     * @return boolean
     */
     public static function delete($id) {
        $id = intval($id);
        $SQL = 'DELETE FROM product_category WHERE product_category_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$id]);
    }  
}
