<?php

class AdminCategoryModel implements ModelInterface{
    
    public static function getAll() {
        $SQL = 'SELECT * FROM product_category ORDER BY category_name;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep -> execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM product_category WHERE product_category_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

    public static function getBySlug($slug) {
        $SQL = 'SELECT * FROM product_category WHERE slug = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$slug]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function add($category_name, $slug) {
       $SQL = 'INSERT INTO product_category (category_name, slug) VALUES (?, ?);';
       $prep = DataBase::getInstance()->prepare($SQL);
       return $prep->execute([$category_name, $slug]);
    }

    public static function edit ($category_name, $slug, $id) {
        $SQL = 'UPDATE product_category SET category_name = ?, slug = ? WHERE product_category_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$category_name, $slug, $id]);
    }     
    
     public static function delete($id) {
        $id = intval($id);
        $SQL = 'DELETE FROM product_category WHERE product_category_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$id]);
    }  
}
