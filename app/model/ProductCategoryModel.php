<?php
/*
 * Ovo je Model koji odgovara tabeli product_category 
 */
class ProductCategoryModel {
    
    /*
     * Metod koji vraca spisak svih kategorija proizvoda poredjanih po imenu
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM product_category ORDER BY product_category_id';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    
    
    /*
     * Metod koji vraca objekat sa podacima ciji je product_category_id dat kao argument metoda
     * @param int $product_category_id
     * @return stdClass|NULL
     */
    public static function getById($id) {
        $id = preg_match("/\/(\d+)$/",$id,$matches);
        $id = intval($matches[1]);
        
        $SQL = 'SELECT * FROM product_category WHERE product_category_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    /*
     * Metod koji vraca objekat sa podacima ciji slug je dat kao argument metoda
     * @param string $slug
     * @return stdClass|NULL
     */
    public static function getBySlug($slug) {
        $SQL = 'SELECT * FROM product_category WHERE slug = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$slug]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    /*
     * Metod koji vraca niz objekata sa podacima kategorije proizvoda ciji ID broj je dat kao argument 
     * @param int $id broj kategorije proizvoda
     * @return array
     */
    public static function getProductsByProductCategoryId($id) {
        $SQL = 'SELECT
                  *, pp.amount
                FROM
                  product p
                  INNER JOIN product_product_category ppc ON ppc.product_id = p.product_id
                  LEFT JOIN product_price pp ON pp.product_id = p.product_id
                WHERE ppc.product_category_id = :id';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vrsi dodavanje zapisa proizvoda u bazu podataka
     * @param string $name
     */
    public static function add($name) {
       $SQL = 'INSERT INTO product_category (name) VALUES (?);';
       $prep = DataBase::getInstance()->prepare($SQL);
       $res = $prep->execute([$name]);
       $id = DataBase::getInstance()->lastInsertId();
       
       if($res) {
           return intval(DataBase::getInstance()->lastInsertId());
        } else {
           return false;
        }
    }
    
    /** Metod koji vrsi izmenu zapisa proizvoda u bazi podataka.
     * @param int $id
     * @param string $name
     */
    public static function edit ($id, $name) {
        
        $SQL = 'UPDATE product_category SET name = ? WHERE product_category_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$name, $id]);
        
        return $res;

    }     
}
