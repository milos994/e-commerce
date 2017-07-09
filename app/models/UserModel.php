<?php

class UserModel implements ModelInterface {

    public static function getAll() {
        $SQL = 'SELECT * FROM user;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute();
        if ($res) {
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function getById($user_id) {
        $SQL = 'SELECT * FROM user WHERE user_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$user_id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    public static function getByUsernameAndPasswordHash($username, $passwordHash) {
        $SQL = 'SELECT * FROM user WHERE `username` = ? AND `password` = ? AND active = 1;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$username, $passwordHash]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    public static function getByUsernameAndEmail($username, $email) {
        $SQL = 'SELECT * FROM user WHERE `username` = ? AND `email` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$username, $email]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    public static function add($name, $surname, $email, $username, $passwordhash, $ip) {
        $SQL = 'INSERT INTO user (name, surname, email, username, password, ip) VALUES (?, ?, ?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$name, $surname, $email, $username, $passwordhash, $ip]);
    }

    public static function delete($user_id) {
        $user_id = intval($user_id);
        $SQL = 'DELETE from user WHERE user_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$user_id]);
    }

}
