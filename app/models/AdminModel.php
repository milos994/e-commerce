<?php

/*
 * Ovo je Model koji odgovara tabeli user 
 */

// implements ModelInterface
class AdminModel implements ModelInterface {

    public static function getAll() {
        $SQL = 'SELECT * FROM admin;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM admin WHERE admin_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

    public static function getByUsernameAndPasswordHash($username, $passwordHash) {
        $SQL = 'SELECT * FROM admin WHERE `username` = ? AND `password` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$username, $passwordHash]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    

    //login
    //logout
}
