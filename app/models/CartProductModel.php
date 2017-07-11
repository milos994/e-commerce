<?php
/**
 * Model koji odgovara tabeli cart_product.
 */
class CartProductModel {
    
    /**
     * Metod koji vraca spisak svih proizvoda iz korpe.
     * @return array
     */
    public static function cartGetAll($user_id) {
        $SQL = 'SELECT * FROM cart c, cart_product cp, product p WHERE c.user_id = ? AND c.cart_id = cp.cart_id AND cp.product_id = p.product_id';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute([$user_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vraca objekat sa podacima korpe proizvoda ciji je id dat kao
     * argument metoda.
     * @param int $id
     * @return stdClass|null
     */
    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM cart WHERE cart_product_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Metod koji vrsi dodavanje zapisa proizvoda u korpu proizvoda.
     * @param int $product_id
     * @param int $user_id
     * @return void
     */
    public static function add($product_id, $user_id) {
        $product_id = intval($product_id);
        $SQL = 'SELECT * FROM cart WHERE user_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $is_success = $prep->execute([$user_id]);
        $cart = $prep->fetch(PDO::FETCH_OBJ);
        
        if($cart) {
            if(isset($cart->cart_id)) {
                $SQL = 'INSERT INTO cart_product (cart_id, product_id) VALUES (?, ?);';
                $prep = DataBase::getInstance()->prepare($SQL);
                return $prep->execute([$cart->cart_id, $product_id]);
            }
        } else {
            $SQL = 'INSERT INTO cart (user_id) VALUES (?);';
            $prep = DataBase::getInstance()->prepare($SQL);
            $is_success = $prep->execute([$user_id]);
            
            if($is_success) {
                 $SQL = 'SELECT * FROM cart WHERE user_id = ?';
                 $prep = DataBase::getInstance()->prepare($SQL);
                 $is_success = $prep->execute([$user_id]);
                 $cart = $prep->fetch(PDO::FETCH_OBJ);
                
                $SQL = 'INSERT INTO cart_product (cart_id, product_id) VALUES (?, ?);';
                $prep = DataBase::getInstance()->prepare($SQL);
                return $prep->execute([$cart->cart_id, $product_id]);
            }
            
        }
    }
    
    /**
     *  Metod koji vrsi brisanje proizvoda iz korpe.
     * @param int $cart_id
     * @param int $user_id
     * @return boolean
     */
    public function remove($cart_id, $user_id) {
        
        $SQL = 'DELETE FROM cart WHERE user_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$user_id]);
        
    }
        
}
